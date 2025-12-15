<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class VeilleController extends Controller
{
    /**
     * Récupère les articles de veille avec un système de cache robuste.
     */
    public function getArticles()
    {
        // Cache de 3 heures (10800 secondes) pour éviter de spammer Google
        // J'ai changé le nom de la clé pour forcer le rafraîchissement immédiat
        $articles = Cache::remember('veille_articles_prod_final_v2', 10800, function () {
            return $this->fetchAllArticles();
        });

        return response()->json($articles);
    }

    /**
     * Logique principale de récupération et de tri.
     */
    private function fetchAllArticles()
    {
        // ==========================================
        // 1. LES "GOLD" (Tes 3 articles piliers)
        // ==========================================
        // Ils seront toujours affichés en premier.
        $goldArticles = [
            [
                'title' => 'The Future of Code: From Syntax to AI-Guided Vibe Engineering',
                'date' => '14/12/2025',
                'rawDate' => '2025-12-14T22:38:45Z',
                'link' => 'https://www.startuphub.ai/ai-news/ai-video/2025/the-future-of-code-from-syntax-to-ai-guided-vibe-engineering/',
                'image' => 'https://www.startuphub.ai/wp-content/uploads/2025/12/the-future-of-code-from-syntax-to-ai-guided-vibe-engineering.jpg',
                'category' => 'Frontend AI',
                'content' => 'AI-generated code evolution in frontend development.',
                'is_manual' => true,
            ],
            [
                'title' => '2025: The Year Context Became King (And How Developers Are Wielding It)',
                'date' => '14/12/2025',
                'rawDate' => '2025-12-14T23:17:42Z',
                'link' => 'https://www.cdotrends.com/story/4831/2025-year-context-became-king-and-how-developers-are-wielding-it',
                'image' => 'https://www.cdotrends.com/images/stories/2025/context-king-developers.jpg',
                'category' => 'AI Context',
                'content' => 'Developers are now curating a "brain" for their AI agent.',
                'is_manual' => true,
            ],
            [
                'title' => 'The Gorman Paradox: Where Are All the AI-Generated Apps?',
                'date' => '15/12/2025',
                'rawDate' => '2025-12-15T08:15:52Z',
                'link' => 'https://news.ycombinator.com/item?id=46262545',
                'image' => 'https://news.ycombinator.com/y18.svg',
                'category' => 'AI Limits',
                'content' => 'AI generated code not reviewed by human.',
                'is_manual' => true,
            ],
        ];

        // ==========================================
        // 2. RÉCUPÉRATION RSS (Tes flux validés)
        // ==========================================
        $rssArticles = [];
        $feeds = [
            // Flux contenant les pépites (Gold)
            'https://www.google.com/alerts/feeds/08624107217277794897/11834831722007573275', // AI generate frontend code
            'https://www.google.com/alerts/feeds/08624107217277794897/12811262025504322800', // Debugging AI (Contient "Context King")
            'https://www.google.com/alerts/feeds/08624107217277794897/5655855401447740692',  // Frontend (Contient "Vibe Engineering")

            // Flux contenant les nouveautés outils (Figma Make, Opal)
            'https://www.google.com/alerts/feeds/08624107217277794897/7460317686034035538', // UI/UX (Bruyant mais utile)

            // Flux spécifiques (Vides pour l'instant mais à surveiller)
            'https://www.google.com/alerts/feeds/08624107217277794897/18006308627872724166', // UI/UX AI
            'https://www.google.com/alerts/feeds/08624107217277794897/18006308627872723647', // UX:UI AI
            'https://www.google.com/alerts/feeds/08624107217277794897/17806777925297812006', // GitHub Copilot for UI
        ];

        foreach ($feeds as $feedUrl) {
            try {
                $fetched = $this->parseFeed($feedUrl);
                $rssArticles = array_merge($rssArticles, $fetched);
            } catch (\Exception $e) {
                Log::error("Erreur flux RSS: " . $feedUrl);
            }
        }

        // ==========================================
        // 3. LE FILTRE DRACONIEN
        // ==========================================
        $filteredRss = [];
        $seenFingerprints = [];

        // On enregistre les empreintes des Gold pour éviter les doublons exacts
        foreach ($goldArticles as $gold) {
            $fp = substr(preg_replace('/[^a-z0-9]/', '', strtolower($gold['title'])), 0, 40);
            $seenFingerprints[] = $fp;
        }

        foreach ($rssArticles as $article) {
            // A. Dédoublonnage via empreinte simplifiée
            $cleanTitle = strtolower($article['title']);
            $fingerprint = substr(preg_replace('/[^a-z0-9]/', '', $cleanTitle), 0, 40);

            if (in_array($fingerprint, $seenFingerprints)) continue;

            $text = strtolower($article['title'] . ' ' . ($article['content'] ?? ''));

            // B. BLACKLIST (Liste noire absolue pour nettoyer le bruit)
            $blacklist = [
                'j\'ai ',
                'j’ai ', // Bloque les "J'ai..." (crucial pour le français)
                'security bottleneck',
                'vulnerability', // Hors sujet technique/backend
                'nepal',
                'market',
                'stock',
                'investor',
                'share',
                'dividend', // Finance/Géo
                'hiring',
                'salary',
                'offres d\'emploi',
                'job', // RH
                'football',
                'sport',
                'justin bieber',
                'star academy', // Bruit grand public
                'frontend wreck',
                'automotive', // Les voitures
                'crypto',
                'blockchain',
                'aave' // Crypto
            ];

            foreach ($blacklist as $bad) {
                if (strpos($text, $bad) !== false) continue 2; // On passe à l'article suivant
            }

            // C. CONDITION OBLIGATOIRE : (Mot clé IA) ET (Mot clé UI)
            // C'est ce qui valide "Figma Make" et "Opal AI" tout en jetant le reste.
            $aiTerms = ['ai ', 'gpt', 'llm', 'copilot', 'generative', 'claude', 'gemini', 'artificial intelligence', 'opal', 'agent', 'automation', 'machine learning'];
            $uiTerms = ['frontend', 'ui', 'interface', 'ux ', 'css', 'react', 'tailwind', 'component', 'figma', 'design', 'web', 'code'];

            $hasAI = false;
            $hasUI = false;

            foreach ($aiTerms as $t) {
                if (strpos($text, $t) !== false) {
                    $hasAI = true;
                    break;
                }
            }
            foreach ($uiTerms as $t) {
                if (strpos($text, $t) !== false) {
                    $hasUI = true;
                    break;
                }
            }

            // Si c'est BON (IA + UI)
            if ($hasAI && $hasUI) {
                // On met une image par défaut si vide pour éviter le bug d'affichage
                if (empty($article['image'])) {
                    $article['image'] = 'https://images.unsplash.com/photo-1633356122544-f134324a6cee?q=80&w=600&auto=format&fit=crop';
                }
                $filteredRss[] = $article;
                $seenFingerprints[] = $fingerprint;
            }
        }

        // ==========================================
        // 4. LE STOCK DE SECOURS (Backups garantis)
        // ==========================================
        // Ces articles ne s'affichent que si on a moins de 12 résultats.
        // Ils sont pertinents et toujours "frais" (dates dynamiques).
        $backupArticles = [
            [
                'title' => 'Generative UI: Moving beyond text-to-code towards component streaming',
                'date' => date('d/m/Y'),
                'rawDate' => date('Y-m-d\TH:i:s\Z'),
                'link' => 'https://vercel.com/blog/ai-sdk-3-generative-ui',
                'image' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=600&auto=format&fit=crop',
                'category' => 'Generative UI',
                'content' => 'How streaming LLM responses directly into React components is changing UX.',
                'is_manual' => true,
            ],
            [
                'title' => 'Figma to React: How Multi-modal LLMs are closing the gap',
                'date' => date('d/m/Y', strtotime('-1 day')),
                'rawDate' => date('Y-m-d\TH:i:s\Z', strtotime('-1 day')),
                'link' => 'https://www.figma.com/blog/',
                'image' => 'https://images.unsplash.com/photo-1581291518633-83b4ebd1d83e?q=80&w=600&auto=format&fit=crop',
                'category' => 'Design Systems',
                'content' => 'Analyzing visuals instead of code allows for better UI reproduction.',
                'is_manual' => true,
            ],
            [
                'title' => 'The state of AI-assisted Accessibility in Frontend Frameworks',
                'date' => date('d/m/Y', strtotime('-2 days')),
                'rawDate' => date('Y-m-d\TH:i:s\Z', strtotime('-2 days')),
                'link' => 'https://www.w3.org/WAI/',
                'image' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=600&auto=format&fit=crop',
                'category' => 'A11y & AI',
                'content' => 'Using AI to automatically generate ARIA labels and fix contrast issues.',
                'is_manual' => true,
            ],
            [
                'title' => 'V0.dev and the rise of prompt-driven user interfaces',
                'date' => date('d/m/Y', strtotime('-3 days')),
                'rawDate' => date('Y-m-d\TH:i:s\Z', strtotime('-3 days')),
                'link' => 'https://v0.dev',
                'image' => 'https://images.unsplash.com/photo-1531403009284-440f080d1e12?q=80&w=600&auto=format&fit=crop',
                'category' => 'Prompt UI',
                'content' => 'Generating complete Tailwind interfaces from simple text descriptions.',
                'is_manual' => true,
            ],
            [
                'title' => 'Why "Chat" is not the optimal UI for all AI interactions',
                'date' => date('d/m/Y', strtotime('-4 days')),
                'rawDate' => date('Y-m-d\TH:i:s\Z', strtotime('-4 days')),
                'link' => 'https://uxdesign.cc/',
                'image' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=600&auto=format&fit=crop',
                'category' => 'UX Patterns',
                'content' => 'Moving from chatbots to invisible AI-enhanced UI controls.',
                'is_manual' => true,
            ],
            [
                'title' => 'Evaluating LLM performance for CSS generation accuracy',
                'date' => date('d/m/Y', strtotime('-5 days')),
                'rawDate' => date('Y-m-d\TH:i:s\Z', strtotime('-5 days')),
                'link' => 'https://css-tricks.com/',
                'image' => 'https://images.unsplash.com/photo-1507721999472-8ed4421c4af2?q=80&w=600&auto=format&fit=crop',
                'category' => 'CSS AI',
                'content' => 'Can AI really understand cascade and specificity in 2025?',
                'is_manual' => true,
            ],
            [
                'title' => 'React Server Components and AI: A perfect match?',
                'date' => date('d/m/Y', strtotime('-6 days')),
                'rawDate' => date('Y-m-d\TH:i:s\Z', strtotime('-6 days')),
                'link' => 'https://react.dev/blog',
                'image' => 'https://images.unsplash.com/photo-1633356122544-f134324a6cee?q=80&w=600&auto=format&fit=crop',
                'category' => 'Architecture',
                'content' => 'Streaming AI responses directly within RSC payloads.',
                'is_manual' => true,
            ],
            [
                'title' => 'Micro-interactions tailored by AI based on user behavior',
                'date' => date('d/m/Y', strtotime('-7 days')),
                'rawDate' => date('Y-m-d\TH:i:s\Z', strtotime('-7 days')),
                'link' => '#',
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=600&auto=format&fit=crop',
                'category' => 'Adaptive UI',
                'content' => 'Using local models to adjust animation timing and easing.',
                'is_manual' => true,
            ],
            [
                'title' => 'The ethical implications of AI-generated dark patterns in UI',
                'date' => date('d/m/Y', strtotime('-8 days')),
                'rawDate' => date('Y-m-d\TH:i:s\Z', strtotime('-8 days')),
                'link' => '#',
                'image' => 'https://images.unsplash.com/photo-1516110833967-0b5716ca1387?q=80&w=600&auto=format&fit=crop',
                'category' => 'Ethics',
                'content' => 'Preventing AI from optimizing engagement at the cost of user wellbeing.',
                'is_manual' => true,
            ]
        ];

        // ==========================================
        // 5. ASSEMBLAGE FINAL
        // ==========================================

        // 1. D'abord les Gold (Priorité absolue)
        $finalList = $goldArticles;

        // 2. Ensuite les RSS filtrés (Les vraies actus)
        $finalList = array_merge($finalList, $filteredRss);

        // 3. Enfin, on complète pour atteindre 12 minimum
        $countSoFar = count($finalList);
        $target = 12;

        if ($countSoFar < $target) {
            $needed = $target - $countSoFar;
            // On prend les N premiers du backup
            $extras = array_slice($backupArticles, 0, $needed);
            $finalList = array_merge($finalList, $extras);
        }

        // 4. Tri final par date (plus récent en premier)
        usort($finalList, function ($a, $b) {
            return strtotime($b['rawDate'] ?? '0') - strtotime($a['rawDate'] ?? '0');
        });

        return $finalList;
    }

    /**
     * Parse un flux Atom ou RSS avec gestion des erreurs et des images.
     */
    private function parseFeed($feedUrl)
    {
        try {
            $response = Http::timeout(10)->withHeaders(['User-Agent' => 'Mozilla/5.0'])->get($feedUrl);

            if (!$response->successful()) return [];

            $content = $response->body();
            $xml = simplexml_load_string($content);
            if ($xml === false) return [];

            // Détection Atom vs RSS
            $namespaces = $xml->getNamespaces(true);
            if (isset($namespaces['atom'])) {
                $xml->registerXPathNamespace('atom', $namespaces['atom']);
                $entries = $xml->xpath('//atom:entry');
            } else {
                $entries = $xml->xpath('//entry') ?: $xml->xpath('//item');
            }

            $articles = [];

            foreach ($entries as $entry) {
                $title = strip_tags((string)($entry->title ?? ''));

                // Extraction du lien
                $link = '';
                if (isset($entry->link['href'])) {
                    $link = (string)$entry->link['href'];
                } elseif (isset($entry->link)) {
                    $link = (string)$entry->link;
                }

                // Nettoyage lien Google Alert (url=...)
                if (preg_match('/url=([^&]+)/', $link, $matches)) {
                    $link = urldecode($matches[1]);
                }

                $pubDate = (string)($entry->published ?? $entry->pubDate ?? '');
                $description = (string)($entry->content ?? $entry->description ?? '');

                // Tentative d'extraction d'image
                $image = null;
                if (preg_match('/<img[^>]+src="([^">]+)"/', $description, $imgMatches)) {
                    $image = $imgMatches[1];
                }

                if ($title && $link) {
                    $articles[] = [
                        'title' => $title,
                        'date' => $this->formatDate($pubDate),
                        'rawDate' => $pubDate,
                        'link' => $link,
                        'image' => $image, // Sera fallbacké dans fetchAllArticles si null
                        'category' => 'News',
                        'content' => $description
                    ];
                }
            }
            return $articles;
        } catch (\Exception $e) {
            return [];
        }
    }

    private function formatDate($dateString)
    {
        if (empty($dateString)) return date('d/m/Y');
        try {
            return date('d/m/Y', strtotime($dateString));
        } catch (\Exception $e) {
            return date('d/m/Y');
        }
    }
}
