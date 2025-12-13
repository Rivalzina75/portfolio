<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

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

        \Log::info("Starting to fetch articles from " . count($feeds) . " feeds");

        foreach ($feeds as $feedUrl) {
            try {
                \Log::info("Fetching from: {$feedUrl}");
                $articles = $this->parseFeed($feedUrl);
                \Log::info("Got " . count($articles) . " articles from this feed");
                $allArticles = array_merge($allArticles, $articles);
            } catch (\Exception $e) {
                \Log::warning("Failed to fetch RSS from {$feedUrl}: " . $e->getMessage());
            }
        }

        // Deduplicate by title (case-insensitive)
        $uniqueArticles = [];
        $seenTitles = [];
        foreach ($allArticles as $article) {
            $titleKey = strtolower(trim($article['title']));
            if (!isset($seenTitles[$titleKey])) {
                $seenTitles[$titleKey] = true;
                $uniqueArticles[] = $article;
            }
        }

        // Return latest 8 articles, sorted by date
        usort($uniqueArticles, fn($a, $b) => strtotime($b['rawDate'] ?? '0') - strtotime($a['rawDate'] ?? '0'));
        return array_slice($uniqueArticles, 0, 8);
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
                \Log::warning("Feed {$feedUrl} returned status {$response->status()}");
                return [];
            }

            \Log::info("Successfully fetched feed {$feedUrl}, body length: " . strlen($response->body()));

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
                $image = $this->extractImageFromContent((string)$entry->content);

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
                    ];
                }
            }

            return $articles;
        } catch (\Exception $e) {
            \Log::error("Error parsing RSS: " . $e->getMessage());
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
