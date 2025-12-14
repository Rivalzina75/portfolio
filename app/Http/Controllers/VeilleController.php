<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class VeilleController extends Controller
{
    /**
     * Get veille articles from RSS feeds
     * Supports Google Alerts RSS, Medium RSS, Dev.to RSS, etc.
     */
    public function getArticles()
    {
        // Cache for 1 hour (using file cache as fallback)
        $articles = Cache::remember('veille_articles', 3600, function () {
            return $this->fetchAllArticles();
        });

        return response()->json($articles);
    }

    /**
     * Fetch articles from all feeds
     */
    private function fetchAllArticles()
    {
        $allArticles = [];

        // Define your RSS feeds - Google Alerts URLs
        $feeds = [
            // Remplace ces URLs par tes vraies Google Alerts RSS
            'https://www.google.com/alerts/feeds/08624107217277794897/11834831722007573275', // AI generate frontend code
            'https://www.google.com/alerts/feeds/08624107217277794897/11613282588683397431', // code quality AI assistants
            'https://www.google.com/alerts/feeds/08624107217277794897/12811262025504322800', // debugging AI code
            'https://www.google.com/alerts/feeds/08624107217277794897/17806777925297812006', // GitHub Copilot for UI
            'https://www.google.com/alerts/feeds/08624107217277794897/2894901103864049013',  // low-code AI front-end
        ];

        foreach ($feeds as $feedUrl) {
            try {
                $articles = $this->parseFeed($feedUrl);
                $allArticles = array_merge($allArticles, $articles);
            } catch (\Exception $e) {
                Log::warning("Failed to fetch RSS from {$feedUrl}: " . $e->getMessage());
            }
        }

        // Add manually curated articles - don't deduplicate these, they're hand-picked
        $manualArticles = [
            [
                'title' => 'AI code is creating security bottlenecks faster than it\'s solving them - SC Media',
                'date' => '13/12/2025',
                'rawDate' => '2025-12-13T07:40:27Z',
                'link' => 'https://www.scworld.com/perspective/ai-code-is-creating-security-bottlenecks-faster-than-its-solving-them',
                'image' => 'https://www.scworld.com/wp-content/uploads/2024/01/GettyImages-1418838508-scaled.jpg',
                'content' => 'AI code generation creates security bottlenecks. Assistants optimize for code generation while leaving review process unchanged.',
            ],
            [
                'title' => 'Are AI systems credible coders? - Raconteur',
                'date' => '13/12/2025',
                'rawDate' => '2025-12-13T00:56:16Z',
                'link' => 'https://www.raconteur.net/technology/are-ai-systems-credible-coders',
                'image' => 'https://assets.raconteur.net/uploads/2025/12/rsz_gettyimages-2165829780-900x506.jpg',
                'content' => 'Analysis shows that just 55% of AI-generated code is free of errors. AI systems lack credibility as reliable coders.',
            ],
            [
                'title' => 'Why AI-driven development still demands human oversight - SD Times',
                'date' => '13/12/2025',
                'rawDate' => '2025-12-13T06:50:29Z',
                'link' => 'https://sdtimes.com/ai/why-ai-driven-development-still-demands-human-oversight/',
                'image' => 'https://sdtimes.com/wp-content/uploads/2025/12/Screenshot-2025-12-12-134553.png',
                'content' => 'AI-driven development still demands human oversight. Code review process cannot be left unchanged. Human validation is essential.',
            ],
            [
                'title' => 'JetBrains pivots IDE strategy: embracing AI over native tools',
                'date' => '14/12/2025',
                'rawDate' => '2025-12-14T00:00:00Z',
                'link' => 'https://www.webpronews.com/jetbrains-to-discontinue-fleet-ide-in-2025-pivots-to-ai-powered-tools/',
                'image' => 'https://www.webpronews.com/wp-content/uploads/2023/07/newlogotest.png',
                'content' => 'JetBrains discontinues Fleet IDE, signaling limitations of traditional approaches against AI-driven development. Industry shifting toward AI-powered tools despite challenges.',
            ],
        ];

        // Deduplicate by title (case-insensitive) - keep manual articles when duplicates exist
        $uniqueArticles = [];
        $seenTitles = [];

        // Merge manual articles FIRST so they get priority in dedup
        $allArticles = array_merge($manualArticles, $allArticles);

        foreach ($allArticles as $article) {
            $titleKey = strtolower(trim($article['title']));
            if (!isset($seenTitles[$titleKey])) {
                $seenTitles[$titleKey] = true;
                $uniqueArticles[] = $article;
            }
        }

        // Filter articles: keep only those relevant to "Limites de l'IA générative dans les interactions UI complexes"
        // Articles MUST discuss: AI limitations (not just general AI features)
        $relevantArticles = array_filter($uniqueArticles, function ($article) {
            // Must have an image
            if (empty($article['image'])) {
                return false;
            }

            $title = strtolower($article['title']);
            $content = strtolower($article['content'] ?? '');
            $combined = $title . ' ' . $content;

            // Keywords to EXCLUDE - articles about these topics are not relevant
            $excludeKeywords = [
                'whatsapp',
                'mobilegpt',
                'slack',
                'student',
                'learn',
                'tutorial',
                'guide',
                'benchmark',
                'performance',
                'speed',
                'feature implementation',
                'best practices',
                'integrate',
                'integration',
                'deployment',
                'app store',
                'vibe coding',
                'low-code',
                'no-code',
                'gpt-5.2',
                'gpt-5'
            ];

            // Check if article contains excluded keywords
            foreach ($excludeKeywords as $keyword) {
                if (strpos($combined, $keyword) !== false) {
                    return false;
                }
            }

            // REQUIRED: Article must talk about limitations/problems/challenges with AI
            $limitationKeywords = [
                'limit',
                'problem',
                'issue',
                'challenge',
                'bottleneck',
                'security',
                'oversight',
                'validation',
                'human',
                'credible',
                'credibility',
                'fails',
                'failure',
                'error',
                'accuracy',
                'reliability',
                'trust',
                'mistake',
                'flaw',
                'weakness',
                'inadequate',
                'insufficient',
                'shortcoming',
                'pitfall',
                'risk',
                'concern',
                'struggle',
                'difficult'
            ];

            $hasLimitationKeyword = false;
            foreach ($limitationKeywords as $keyword) {
                if (strpos($combined, $keyword) !== false) {
                    $hasLimitationKeyword = true;
                    break;
                }
            }

            // REQUIRED: Must mention AI
            $hasAIKeyword = strpos($combined, 'ai') !== false;

            if (!$hasAIKeyword) {
                return false;
            }

            if (!$hasLimitationKeyword) {
                return false;
            }

            // Composite keywords (UI + AI, UX + AI, Frontend + AI)
            $compositeKeywords = [
                'ui ai',
                'ai ui',
                'ux ai',
                'ai ux',
                'frontend ai',
                'ai frontend',
                'front-end ai',
                'ai front-end',
                'interaction ai',
                'ai interaction',
                'design ai',
                'ai design',
                'ui design ai',
                'ai ui design',
                'accessibility ai',
                'ai accessibility',
                'animation ai',
                'ai animation',
                'css ai',
                'ai css',
                'visual ai',
                'ai visual'
            ];

            $hasCompositeKeyword = false;
            foreach ($compositeKeywords as $keyword) {
                if (strpos($combined, $keyword) !== false) {
                    $hasCompositeKeyword = true;
                    break;
                }
            }

            // PREFERRED: Should mention UI/UX/Frontend/Design/Interactions
            $uiKeywords = [
                'ui',
                'ux',
                'frontend',
                'front-end',
                'design',
                'interaction',
                'accessibility',
                'animation',
                'interface',
                'component'
            ];

            $hasUIKeyword = false;
            foreach ($uiKeywords as $keyword) {
                if (strpos($combined, $keyword) !== false) {
                    $hasUIKeyword = true;
                    break;
                }
            }

            // Context: developer/code related
            $hasDeveloperContext = strpos($combined, 'developer') !== false ||
                strpos($combined, 'development') !== false ||
                strpos($combined, 'code') !== false ||
                strpos($combined, 'coder') !== false;

            // Accept if:
            // 1. Has composite keyword (UI+AI, UX+AI, etc) AND limitation
            // 2. OR has limitation AND AI AND (UI keyword OR developer context)
            if (!($hasCompositeKeyword || $hasUIKeyword || $hasDeveloperContext)) {
                return false;
            }

            return true;
        });

        // Sort by relevance: composite keywords first, then by date
        usort($relevantArticles, function ($a, $b) {
            $aCompositeKeywords = [
                'ui ai',
                'ai ui',
                'ux ai',
                'ai ux',
                'frontend ai',
                'ai frontend',
                'front-end ai',
                'ai front-end',
                'interaction ai',
                'ai interaction'
            ];
            $bCompositeKeywords = $aCompositeKeywords;

            $combined_a = strtolower($a['title'] . ' ' . ($a['content'] ?? ''));
            $combined_b = strtolower($b['title'] . ' ' . ($b['content'] ?? ''));

            $aHasComposite = false;
            $bHasComposite = false;

            foreach ($aCompositeKeywords as $kw) {
                if (strpos($combined_a, $kw) !== false) {
                    $aHasComposite = true;
                    break;
                }
            }

            foreach ($bCompositeKeywords as $kw) {
                if (strpos($combined_b, $kw) !== false) {
                    $bHasComposite = true;
                    break;
                }
            }

            if ($aHasComposite && !$bHasComposite) return -1;
            if (!$aHasComposite && $bHasComposite) return 1;

            // Then sort by date
            return strtotime($b['rawDate'] ?? '0') - strtotime($a['rawDate'] ?? '0');
        });

        // Return latest 6 articles
        $allFiltered = array_slice($relevantArticles, 0, 6);

        Log::info("Total articles after filter: " . count($allFiltered));
        foreach ($allFiltered as $art) {
            Log::info("- " . $art['title']);
        }

        return $allFiltered;
    }

    /**
     * Parse Atom RSS feed and extract articles
     */
    private function parseFeed($feedUrl)
    {
        try {
            $response = Http::timeout(10)
                ->withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
                ])
                ->get($feedUrl);

            if (!$response->successful()) {
                Log::warning("Feed {$feedUrl} returned status {$response->status()}");
                return [];
            }

            Log::info("Successfully fetched feed {$feedUrl}, body length: " . strlen($response->body()));

            // Register Atom namespace
            $xml = simplexml_load_string($response->body());
            $xml->registerXPathNamespace('atom', 'http://www.w3.org/2005/Atom');

            $articles = [];

            // Parse Atom feed entries
            $entries = $xml->xpath('//atom:entry');

            foreach ($entries as $entry) {
                $entry->registerXPathNamespace('atom', 'http://www.w3.org/2005/Atom');

                // Extract title (remove HTML tags)
                $title = (string)$entry->title;
                $title = strip_tags(html_entity_decode($title));

                // Extract link - Google Alerts uses simple <link href="..."/>
                $link = '';

                // Try to find link element with href attribute
                $linkElements = $entry->xpath('atom:link');
                if (!empty($linkElements)) {
                    foreach ($linkElements as $linkEl) {
                        $href = (string)$linkEl->attributes()['href'];
                        if (!empty($href)) {
                            // Extract real URL from Google redirect: url=...&ct=
                            if (preg_match('/url=([^&]+)/', $href, $matches)) {
                                $link = urldecode($matches[1]);
                            } else {
                                $link = $href;
                            }
                            break;
                        }
                    }
                }

                // Fallback: check for link as direct element (no namespace)
                if (empty($link) && isset($entry->link)) {
                    $href = (string)$entry->link->attributes()['href'];
                    if (!empty($href)) {
                        if (preg_match('/url=([^&]+)/', $href, $matches)) {
                            $link = urldecode($matches[1]);
                        } else {
                            $link = $href;
                        }
                    }
                }

                // Extract date
                $pubDate = (string)$entry->published;
                $date = $this->formatDate($pubDate);

                // Extract image from content
                $contentHtml = (string)$entry->content;
                $image = $this->extractImageFromContent($contentHtml);

                // If no image found in feed, try to extract from the actual article page
                if (!$image && !empty($link)) {
                    $image = $this->extractImageFromArticlePage($link);
                }

                if ($title && $link) {
                    $articles[] = [
                        'title' => $title,
                        'date' => $date,
                        'rawDate' => $pubDate,
                        'link' => $link,
                        'image' => $image,
                        'content' => $contentHtml, // Add for filtering
                    ];
                }
            }

            return $articles;
        } catch (\Exception $e) {
            Log::error("Error parsing RSS: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Format date from ISO 8601 (Atom format)
     */
    private function formatDate($pubDate)
    {
        try {
            // ISO 8601 format: 2025-12-12T19:56:02Z
            $date = \Carbon\Carbon::createFromFormat(
                'Y-m-d\TH:i:s\Z',
                $pubDate
            );
            return $date->format('d/m/Y');
        } catch (\Exception $e) {
            try {
                // Fallback pour d'autres formats
                $date = \Carbon\Carbon::parse($pubDate);
                return $date->format('d/m/Y');
            } catch (\Exception $e2) {
                return date('d/m/Y');
            }
        }
    }

    /**
     * Extract image from content HTML
     * Tries to get og:image, image tags, or makes a best effort guess
     */
    private function extractImageFromContent($contentHtml)
    {
        if (empty($contentHtml)) {
            return null;
        }

        // Try to extract img tag from content
        if (preg_match('/<img[^>]+src="([^">]+)"/', $contentHtml, $matches)) {
            $src = $matches[1];
            // Only return if it's a valid absolute URL
            if (filter_var($src, FILTER_VALIDATE_URL)) {
                return $src;
            }
        }

        return null;
    }

    /**
     * Try to extract og:image from the article page
     */
    private function extractImageFromArticlePage($articleUrl)
    {
        try {
            $response = Http::timeout(5)
                ->withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
                ])
                ->get($articleUrl);

            if (!$response->successful()) {
                return null;
            }

            $html = $response->body();

            // Try to extract og:image meta tag
            if (preg_match('/<meta\s+property="og:image"\s+content="([^"]+)"/', $html, $matches)) {
                return $matches[1];
            }

            // Try twitter:image
            if (preg_match('/<meta\s+name="twitter:image"\s+content="([^"]+)"/', $html, $matches)) {
                return $matches[1];
            }

            // Try to extract first img tag
            if (preg_match('/<img[^>]+src="([^">]+)"[^>]*>/i', $html, $matches)) {
                $src = $matches[1];
                // Make relative URLs absolute
                if (strpos($src, 'http') !== 0) {
                    $parsed = parse_url($articleUrl);
                    $domain = $parsed['scheme'] . '://' . $parsed['host'];
                    $src = $domain . (strpos($src, '/') === 0 ? $src : '/' . $src);
                }
                return $src;
            }

            return null;
        } catch (\Exception $e) {
            return null;
        }
    }
}
