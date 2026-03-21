<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class VeilleController extends Controller
{
    // ——— Config ————————————————————————————————————————————
    private const TARGET    = 30;
    private const CACHE_TTL = 10800;        // 3h
    private const CACHE_KEY = 'veille_articles_v5';

    /**
     * Palette d'images de fallback par catégorie.
     * Toujours une image, jamais de vide.
     */
    private const FALLBACK_IMAGES = [
        'Frontend AI'    => 'https://images.unsplash.com/photo-1633356122544-f134324a6cee?q=80&w=600&auto=format&fit=crop',
        'AI Context'     => 'https://images.unsplash.com/photo-1620712943543-bcc4688e7485?q=80&w=600&auto=format&fit=crop',
        'AI Limits'      => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?q=80&w=600&auto=format&fit=crop',
        'Vibe Coding'    => 'https://images.unsplash.com/photo-1607799279861-4dd421887fb3?q=80&w=600&auto=format&fit=crop',
        'Generative UI'  => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=600&auto=format&fit=crop',
        'AI Tools'       => 'https://images.unsplash.com/photo-1555949963-aa79dcee981c?q=80&w=600&auto=format&fit=crop',
        'AI IDE'         => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?q=80&w=600&auto=format&fit=crop',
        'Prompt UI'      => 'https://images.unsplash.com/photo-1531403009284-440f080d1e12?q=80&w=600&auto=format&fit=crop',
        'App Builder AI' => 'https://images.unsplash.com/photo-1531297484001-80022131f5a1?q=80&w=600&auto=format&fit=crop',
        'Copilot'        => 'https://images.unsplash.com/photo-1556075798-4825dfaaf498?q=80&w=600&auto=format&fit=crop',
        'Design Systems' => 'https://images.unsplash.com/photo-1581291518633-83b4ebd1d83e?q=80&w=600&auto=format&fit=crop',
        'Components'     => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=600&auto=format&fit=crop',
        'Architecture'   => 'https://images.unsplash.com/photo-1518770660439-4636190af475?q=80&w=600&auto=format&fit=crop',
        'CSS AI'         => 'https://images.unsplash.com/photo-1507721999472-8ed4421c4af2?q=80&w=600&auto=format&fit=crop',
        'CSS Tooling'    => 'https://images.unsplash.com/photo-1507721999472-8ed4421c4af2?q=80&w=600&auto=format&fit=crop',
        'UX Patterns'    => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=600&auto=format&fit=crop',
        'A11y & AI'      => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=600&auto=format&fit=crop',
        'TypeScript AI'  => 'https://images.unsplash.com/photo-1516216628859-9bccecab13ca?q=80&w=600&auto=format&fit=crop',
        'Next.js AI'     => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=600&auto=format&fit=crop',
        'Animation AI'   => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=600&auto=format&fit=crop',
        'Adaptive UI'    => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=600&auto=format&fit=crop',
        'AI Ethics'      => 'https://images.unsplash.com/photo-1516110833967-0b5716ca1387?q=80&w=600&auto=format&fit=crop',
        'Svelte AI'      => 'https://images.unsplash.com/photo-1518770660439-4636190af475?q=80&w=600&auto=format&fit=crop',
        'Design Tokens'  => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?q=80&w=600&auto=format&fit=crop',
        'Testing AI'     => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=600&auto=format&fit=crop',
        'Design to Code' => 'https://images.unsplash.com/photo-1559028012-481c04fa702d?q=80&w=600&auto=format&fit=crop',
        'Replit AI'      => 'https://images.unsplash.com/photo-1504639725590-34d0984388bd?q=80&w=600&auto=format&fit=crop',
        '3D & AI'        => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?q=80&w=600&auto=format&fit=crop',
        'AI Art'         => 'https://images.unsplash.com/photo-1509343256512-d77a5cb3791b?q=80&w=600&auto=format&fit=crop',
        'News'           => 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?q=80&w=600&auto=format&fit=crop',
        'default'        => 'https://images.unsplash.com/photo-1633356122544-f134324a6cee?q=80&w=600&auto=format&fit=crop',
    ];

    /**
     * Pool global unique : toutes les images disponibles pour les fallbacks.
     * Ordre = priorité d'attribution (les premières sont les plus "jolies").
     * Aucune URL ne doit apparaître deux fois dans cette liste.
     */
    private const UNIQUE_IMAGE_POOL = [
        'https://images.unsplash.com/photo-1633356122544-f134324a6cee?q=80&w=600&auto=format&fit=crop', // code AI purple
        'https://images.unsplash.com/photo-1620712943543-bcc4688e7485?q=80&w=600&auto=format&fit=crop', // AI context
        'https://images.unsplash.com/photo-1607799279861-4dd421887fb3?q=80&w=600&auto=format&fit=crop', // vibe coding
        'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=600&auto=format&fit=crop', // generative UI
        'https://images.unsplash.com/photo-1555949963-aa79dcee981c?q=80&w=600&auto=format&fit=crop', // AI tools
        'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?q=80&w=600&auto=format&fit=crop', // IDE
        'https://images.unsplash.com/photo-1531403009284-440f080d1e12?q=80&w=600&auto=format&fit=crop', // prompt UI
        'https://images.unsplash.com/photo-1531297484001-80022131f5a1?q=80&w=600&auto=format&fit=crop', // app builder
        'https://images.unsplash.com/photo-1556075798-4825dfaaf498?q=80&w=600&auto=format&fit=crop', // copilot
        'https://images.unsplash.com/photo-1581291518633-83b4ebd1d83e?q=80&w=600&auto=format&fit=crop', // design system
        'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=600&auto=format&fit=crop', // components
        'https://images.unsplash.com/photo-1507721999472-8ed4421c4af2?q=80&w=600&auto=format&fit=crop', // CSS
        'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=600&auto=format&fit=crop', // UX patterns
        'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=600&auto=format&fit=crop', // accessibility
        'https://images.unsplash.com/photo-1516216628859-9bccecab13ca?q=80&w=600&auto=format&fit=crop', // typescript
        'https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=600&auto=format&fit=crop', // next.js
        'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=600&auto=format&fit=crop', // animation
        'https://images.unsplash.com/photo-1516110833967-0b5716ca1387?q=80&w=600&auto=format&fit=crop', // ethics
        'https://images.unsplash.com/photo-1518770660439-4636190af475?q=80&w=600&auto=format&fit=crop', // svelte / architecture
        'https://images.unsplash.com/photo-1561070791-2526d30994b5?q=80&w=600&auto=format&fit=crop', // design tokens
        'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=600&auto=format&fit=crop', // testing
        'https://images.unsplash.com/photo-1559028012-481c04fa702d?q=80&w=600&auto=format&fit=crop', // design to code
        'https://images.unsplash.com/photo-1504639725590-34d0984388bd?q=80&w=600&auto=format&fit=crop', // replit
        'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?q=80&w=600&auto=format&fit=crop', // 3D / AI limits
        'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=600&auto=format&fit=crop', // AI limits 2
        'https://images.unsplash.com/photo-1504711434969-e33886168f5c?q=80&w=600&auto=format&fit=crop', // news 1
        'https://images.unsplash.com/photo-1488590528505-98d2b5aba04b?q=80&w=600&auto=format&fit=crop', // news 2
        'https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=600&auto=format&fit=crop', // news 3
        'https://images.unsplash.com/photo-1515879218367-8466d910aaa4?q=80&w=600&auto=format&fit=crop', // news 4
        'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=600&auto=format&fit=crop', // news 5
        'https://images.unsplash.com/photo-1526374870839-e155464bb9b2?q=80&w=600&auto=format&fit=crop', // news 6
        'https://images.unsplash.com/photo-1535378917042-10a22c95931a?q=80&w=600&auto=format&fit=crop', // news 7
        'https://images.unsplash.com/photo-1509343256512-d77a5cb3791b?q=80&w=600&auto=format&fit=crop', // AI art
        'https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=600&auto=format&fit=crop', // team coding
        'https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?q=80&w=600&auto=format&fit=crop', // screen data
        'https://images.unsplash.com/photo-1526925539332-aa3b66e35444?q=80&w=600&auto=format&fit=crop', // machine learning
        'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?q=80&w=600&auto=format&fit=crop', // circuit board
        'https://images.unsplash.com/photo-1531746790731-6c087fecd65a?q=80&w=600&auto=format&fit=crop', // neural net
        'https://images.unsplash.com/photo-1677442135703-1787eea5ce01?q=80&w=600&auto=format&fit=crop', // ChatGPT / LLM
        'https://images.unsplash.com/photo-1675557009875-436f7a014c37?q=80&w=600&auto=format&fit=crop', // AI robot code
    ];

    // ——— Public ————————————————————————————————————————————

    public function getArticles()
    {
        $articles = Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            return $this->fetchAllArticles();
        });

        return response()->json($articles);
    }

    // ——— Logique principale ————————————————————————————————

    private function fetchAllArticles(): array
    {
        // ==========================================
        // 1. GOLD — 7 articles fondateurs, toujours en tête
        // ==========================================
        // Jalons réels de l'histoire IA x Frontend 2024-2026.
        $goldArticles = [
            [
                // Andrej Karpathy invente le terme "vibe coding" — moment fondateur absolu
                'title'     => '"Vibe coding": Andrej Karpathy on fully giving in to AI and forgetting the code exists',
                'date'      => '02/02/2025',
                'rawDate'   => '2025-02-02T18:00:00Z',
                'link'      => 'https://x.com/karpathy/status/1886192184808149022',
                'image'     => self::FALLBACK_IMAGES['Vibe Coding'],
                'category'  => 'Vibe Coding',
                'content'   => 'Karpathy coins "vibe coding": describing intent, letting AI handle implementation entirely.',
                'is_manual' => true,
            ],
            [
                // Vercel AI SDK 3.0 — référence technique du Generative UI
                'title'     => 'Vercel AI SDK 3.0: Generative UI and streaming React components from LLMs',
                'date'      => '08/03/2024',
                'rawDate'   => '2024-03-08T10:00:00Z',
                'link'      => 'https://vercel.com/blog/ai-sdk-3-generative-ui',
                'image'     => self::FALLBACK_IMAGES['Generative UI'],
                'category'  => 'Generative UI',
                'content'   => 'Vercel ships the paradigm shift: LLM responses rendered as live React components.',
                'is_manual' => true,
            ],
            [
                // GitHub Copilot Workspace — agentic multi-file editing, annonce majeure
                'title'     => 'GitHub Copilot Workspace: the agentic developer environment',
                'date'      => '29/04/2024',
                'rawDate'   => '2024-04-29T14:00:00Z',
                'link'      => 'https://githubnext.com/projects/copilot-workspace',
                'image'     => self::FALLBACK_IMAGES['Copilot'],
                'category'  => 'Copilot',
                'content'   => 'GitHub Next introduces task-driven, multi-file AI coding that rewrites how features ship.',
                'is_manual' => true,
            ],
            [
                // Cursor 1M devs — adoption de masse, signal fort de l'industrie
                'title'     => 'Cursor reaches 1 million developers: the AI code editor that changed the workflow',
                'date'      => '10/09/2024',
                'rawDate'   => '2024-09-10T09:00:00Z',
                'link'      => 'https://cursor.sh/blog',
                'image'     => self::FALLBACK_IMAGES['AI IDE'],
                'category'  => 'AI IDE',
                'content'   => 'Cursor becomes the first AI-first IDE to reach 1M devs, signaling a permanent paradigm shift.',
                'is_manual' => true,
            ],
            [
                // The Future of Code — article pilier original
                'title'     => 'The Future of Code: From Syntax to AI-Guided Vibe Engineering',
                'date'      => '14/12/2025',
                'rawDate'   => '2025-12-14T22:38:45Z',
                'link'      => 'https://www.startuphub.ai/ai-news/ai-video/2025/the-future-of-code-from-syntax-to-ai-guided-vibe-engineering/',
                'image'     => 'https://www.startuphub.ai/wp-content/uploads/2025/12/the-future-of-code-from-syntax-to-ai-guided-vibe-engineering.jpg',
                'category'  => 'Frontend AI',
                'content'   => 'AI-generated code evolution: from syntax mastery to intent-driven engineering.',
                'is_manual' => true,
            ],
            [
                // Context is King — article pilier original
                'title'     => '2025: The Year Context Became King (And How Developers Are Wielding It)',
                'date'      => '14/12/2025',
                'rawDate'   => '2025-12-14T23:17:42Z',
                'link'      => 'https://www.cdotrends.com/story/4831/2025-year-context-became-king-and-how-developers-are-wielding-it',
                'image'     => self::FALLBACK_IMAGES['AI Context'],
                'category'  => 'AI Context',
                'content'   => 'Developers now curate a "brain" for their AI agent — context windows define productivity.',
                'is_manual' => true,
            ],
            [
                // Gorman Paradox — article pilier original
                'title'     => 'The Gorman Paradox: Where Are All the AI-Generated Apps?',
                'date'      => '15/12/2025',
                'rawDate'   => '2025-12-15T08:15:52Z',
                'link'      => 'https://news.ycombinator.com/item?id=46262545',
                'image'     => self::FALLBACK_IMAGES['AI Limits'],
                'category'  => 'AI Limits',
                'content'   => 'Despite AI hype, production apps still need human validation and architectural judgment.',
                'is_manual' => true,
            ],
        ];

        // ==========================================
        // 2. FLUX RSS — Google Alerts validés
        // ==========================================
        $rssArticles = [];
        $feeds = [
            'https://www.google.com/alerts/feeds/08624107217277794897/11834831722007573275', // AI generate frontend code
            'https://www.google.com/alerts/feeds/08624107217277794897/12811262025504322800', // Debugging AI
            'https://www.google.com/alerts/feeds/08624107217277794897/5655855401447740692',  // Frontend / Vibe Engineering
            'https://www.google.com/alerts/feeds/08624107217277794897/7460317686034035538',  // UI/UX outils
            'https://www.google.com/alerts/feeds/08624107217277794897/18006308627872724166', // UI/UX AI
            'https://www.google.com/alerts/feeds/08624107217277794897/18006308627872723647', // UX:UI AI
            'https://www.google.com/alerts/feeds/08624107217277794897/17806777925297812006', // GitHub Copilot for UI
        ];

        foreach ($feeds as $feedUrl) {
            try {
                $fetched     = $this->parseFeed($feedUrl);
                $rssArticles = array_merge($rssArticles, $fetched);
            } catch (\Exception $e) {
                Log::warning("VeilleController — flux RSS échoué: {$feedUrl} — " . $e->getMessage());
            }
        }

        // ==========================================
        // 3. FILTRE + SCORING
        // ==========================================
        $filteredRss      = [];
        $seenFingerprints = [];

        foreach ($goldArticles as $gold) {
            $seenFingerprints[] = $this->fingerprint($gold['title']);
        }

        // ——— Blacklist ————————————————————————————————————
        $blacklist = [
            // Français hors-sujet
            "j'ai ",
            "j\u2019ai ",
            'j&rsquo;ai ',
            // Finance / marchés
            'market cap',
            'stock market',
            'investor',
            'share price',
            'dividend',
            'ipo ',
            'nasdaq',
            'bourse',
            'trading',
            'fund manager',
            // RH / recrutement
            'hiring',
            'salary',
            "offres d'emploi",
            'job offer',
            'recruitment',
            'get hired',
            'remote job',
            'apply now',
            // Géopolitique / off-topic
            'nepal',
            'israel',
            'ukraine',
            'election',
            'political party',
            'military',
            'war ',
            'conflict',
            'sanctions',
            // Cybersécurité off-topic
            'security bottleneck',
            'vulnerability',
            'malware',
            'ransomware',
            'data breach',
            'exploit',
            'phishing',
            'zero-day',
            // Loisirs / pop culture
            'football',
            'soccer',
            'basketball',
            'sport ',
            'justin bieber',
            'star academy',
            'celebrity',
            'netflix series',
            'movie review',
            'box office',
            'trailer',
            // Secteurs non-pertinents
            'automotive',
            'electric vehicle',
            'agriculture',
            'healthcare ai',
            'medical imaging',
            'radiology',
            'drug discovery',
            'real estate',
            // Crypto
            'crypto',
            'blockchain',
            'nft ',
            'bitcoin',
            'ethereum',
            'aave',
            'defi ',
            'web3 token',
            'solana',
            // SEO spam
            'click here',
            'sign up now',
            'best deals',
            'discount code',
            'buy now',
            'limited offer',
        ];

        // ——— Termes AI (35+) ——————————————————————————————
        $aiTerms = [
            ' ai ',
            'artificial intelligence',
            'llm',
            'large language model',
            'generative ai',
            'gpt',
            'gpt-4',
            'gpt-4o',
            'gpt-5',
            'o1 ',
            'o3 ',
            'claude',
            'gemini',
            'openai',
            'anthropic',
            'mistral',
            'llama',
            'copilot',
            'github copilot',
            'cursor ',
            'windsurf',
            'codeium',
            'tabnine',
            'replit agent',
            'devin ',
            'v0.dev',
            ' v0 ',
            'lovable',
            'bolt.new',
            'bolt ',
            'figma make',
            'figma ai',
            'vibe coding',
            'vibe-coding',
            'agentic',
            'ai agent',
            'multimodal',
            'prompt engineering',
            'rag ',
            'retrieval augmented',
            'fine-tuning',
            'context window',
            'ai-generated',
            'ai generated',
            'machine learning',
            'automation',
            'opal ',
            'diffusion model',
            'code generation',
            'pair programmer',
            'ai assistant',
            'ai copilot',
        ];

        // ——— Termes UI/Frontend (30+) —————————————————————
        $uiTerms = [
            'frontend',
            'front-end',
            ' ui ',
            'user interface',
            'ux ',
            'user experience',
            'react',
            'next.js',
            'nextjs',
            'vue.js',
            'vue ',
            'svelte',
            'angular',
            'nuxt',
            'remix ',
            'astro ',
            'qwik',
            'typescript',
            'javascript',
            'tailwind',
            ' css',
            'html ',
            'scss',
            'shadcn',
            'radix',
            'headless',
            'figma',
            'framer',
            'webflow',
            'design system',
            'component',
            'storybook',
            'animation',
            'motion',
            'three.js',
            'webgl',
            'svg ',
            'interface',
            'web app',
            'webapp',
            'responsive',
            'accessibility',
            'a11y',
            'developer',
            'coding',
            'code ',
            'component library',
            'design token',
        ];

        $newsVariantIndex = 0;

        foreach ($rssArticles as $article) {
            $fp = $this->fingerprint($article['title']);
            if (in_array($fp, $seenFingerprints)) continue;

            $text = strtolower($article['title'] . ' ' . ($article['content'] ?? ''));

            // Blacklist check
            $blacklisted = false;
            foreach ($blacklist as $bad) {
                if (strpos($text, $bad) !== false) {
                    $blacklisted = true;
                    break;
                }
            }
            if ($blacklisted) continue;

            // Scoring pertinence
            $aiScore = 0;
            $uiScore = 0;
            foreach ($aiTerms as $t) {
                if (strpos($text, $t) !== false) $aiScore++;
            }
            foreach ($uiTerms as $t) {
                if (strpos($text, $t) !== false) $uiScore++;
            }

            if ($aiScore >= 1 && $uiScore >= 1) {
                // Image : RSS si valide, sinon variante News rotative
                if (!$this->isValidImageUrl($article['image'] ?? null)) {
                    $article['image'] = self::NEWS_VARIANTS[$newsVariantIndex % count(self::NEWS_VARIANTS)];
                    $newsVariantIndex++;
                }
                $article['_score']  = $aiScore + $uiScore;
                $filteredRss[]      = $article;
                $seenFingerprints[] = $fp;
            }
        }

        // Trier par score desc, puis date desc
        usort($filteredRss, function ($a, $b) {
            $diff = ($b['_score'] ?? 0) - ($a['_score'] ?? 0);
            return $diff !== 0 ? $diff : strtotime($b['rawDate'] ?? '0') - strtotime($a['rawDate'] ?? '0');
        });

        // ==========================================
        // 4. BACKUP — 23 articles (activés si RSS insuffisant)
        // ==========================================
        $backupArticles = [
            [
                'title'     => 'V0.dev and the rise of prompt-driven user interfaces',
                'date'      => date('d/m/Y', strtotime('-2 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-2 days')),
                'link'      => 'https://v0.dev',
                'image'     => self::FALLBACK_IMAGES['Prompt UI'],
                'category'  => 'Prompt UI',
                'content'   => 'Generating complete Tailwind interfaces from simple text descriptions.',
                'is_manual' => true,
            ],
            [
                'title'     => 'Windsurf IDE: the agentic code editor that outpaced Cursor',
                'date'      => date('d/m/Y', strtotime('-3 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-3 days')),
                'link'      => 'https://codeium.com/windsurf',
                'image'     => self::FALLBACK_IMAGES['AI IDE'],
                'category'  => 'AI IDE',
                'content'   => 'Next-gen AI-native development environments with full cascade context awareness.',
                'is_manual' => true,
            ],
            [
                'title'     => 'Lovable.dev: building full-stack apps through conversation',
                'date'      => date('d/m/Y', strtotime('-4 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-4 days')),
                'link'      => 'https://lovable.dev/',
                'image'     => self::FALLBACK_IMAGES['App Builder AI'],
                'category'  => 'App Builder AI',
                'content'   => 'How no-code meets AI to ship React apps at conversation speed.',
                'is_manual' => true,
            ],
            [
                'title'     => 'Bolt.new: zero-config full-stack apps from a single prompt',
                'date'      => date('d/m/Y', strtotime('-5 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-5 days')),
                'link'      => 'https://bolt.new/',
                'image'     => 'https://images.unsplash.com/photo-1526374870839-e155464bb9b2?q=80&w=600&auto=format&fit=crop',
                'category'  => 'App Builder AI',
                'content'   => 'StackBlitz brings Bolt.new for instant deployable web apps from plain-text prompts.',
                'is_manual' => true,
            ],
            [
                'title'     => 'shadcn/ui and AI: auto-generating accessible component libraries',
                'date'      => date('d/m/Y', strtotime('-6 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-6 days')),
                'link'      => 'https://ui.shadcn.com/',
                'image'     => self::FALLBACK_IMAGES['Components'],
                'category'  => 'Components',
                'content'   => 'How copy-paste UI components become AI-first and context-aware.',
                'is_manual' => true,
            ],
            [
                'title'     => 'Framer Motion meets AI: procedural animation from text descriptions',
                'date'      => date('d/m/Y', strtotime('-7 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-7 days')),
                'link'      => 'https://www.framer.com/motion/',
                'image'     => self::FALLBACK_IMAGES['Animation AI'],
                'category'  => 'Animation AI',
                'content'   => 'Describing animations in plain English and letting AI implement them in React.',
                'is_manual' => true,
            ],
            [
                'title'     => 'Why "Chat" is not the optimal UI for all AI interactions',
                'date'      => date('d/m/Y', strtotime('-8 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-8 days')),
                'link'      => 'https://uxdesign.cc/',
                'image'     => self::FALLBACK_IMAGES['UX Patterns'],
                'category'  => 'UX Patterns',
                'content'   => 'Moving from chatbots to invisible AI-enhanced UI controls and contextual interactions.',
                'is_manual' => true,
            ],
            [
                'title'     => 'The state of AI-assisted Accessibility in Frontend Frameworks',
                'date'      => date('d/m/Y', strtotime('-9 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-9 days')),
                'link'      => 'https://www.w3.org/WAI/',
                'image'     => self::FALLBACK_IMAGES['A11y & AI'],
                'category'  => 'A11y & AI',
                'content'   => 'Using AI to automatically generate ARIA labels and fix contrast issues.',
                'is_manual' => true,
            ],
            [
                'title'     => 'Evaluating LLM performance for CSS generation accuracy',
                'date'      => date('d/m/Y', strtotime('-10 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-10 days')),
                'link'      => 'https://css-tricks.com/',
                'image'     => self::FALLBACK_IMAGES['CSS AI'],
                'category'  => 'CSS AI',
                'content'   => 'Can AI really understand cascade, specificity and responsive breakpoints in 2026?',
                'is_manual' => true,
            ],
            [
                'title'     => 'Figma to React: How Multi-modal LLMs are closing the design-to-code gap',
                'date'      => date('d/m/Y', strtotime('-11 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-11 days')),
                'link'      => 'https://www.figma.com/blog/',
                'image'     => self::FALLBACK_IMAGES['Design Systems'],
                'category'  => 'Design Systems',
                'content'   => 'Analyzing visuals instead of code allows for better UI reproduction at scale.',
                'is_manual' => true,
            ],
            [
                'title'     => 'React Server Components and AI: streaming intelligence into the UI',
                'date'      => date('d/m/Y', strtotime('-12 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-12 days')),
                'link'      => 'https://react.dev/blog',
                'image'     => self::FALLBACK_IMAGES['Architecture'],
                'category'  => 'Architecture',
                'content'   => 'Streaming LLM responses directly within RSC payloads for reactive UI.',
                'is_manual' => true,
            ],
            [
                'title'     => 'TypeScript + LLMs: stronger typed interfaces through AI code review',
                'date'      => date('d/m/Y', strtotime('-13 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-13 days')),
                'link'      => 'https://www.typescriptlang.org/',
                'image'     => self::FALLBACK_IMAGES['TypeScript AI'],
                'category'  => 'TypeScript AI',
                'content'   => 'How AI transforms TypeScript type generation, inference and error correction.',
                'is_manual' => true,
            ],
            [
                'title'     => 'Tailwind CSS v4 and AI: smarter theming, zero configuration',
                'date'      => date('d/m/Y', strtotime('-14 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-14 days')),
                'link'      => 'https://tailwindcss.com/blog',
                'image'     => self::FALLBACK_IMAGES['CSS Tooling'],
                'category'  => 'CSS Tooling',
                'content'   => 'How AI pairs with utility-first CSS to remove boilerplate and enforce consistency.',
                'is_manual' => true,
            ],
            [
                'title'     => 'Next.js 15 and AI route handlers: building smarter API layers',
                'date'      => date('d/m/Y', strtotime('-15 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-15 days')),
                'link'      => 'https://nextjs.org/blog',
                'image'     => self::FALLBACK_IMAGES['Next.js AI'],
                'category'  => 'Next.js AI',
                'content'   => 'Integrating LLM calls directly into Next.js server actions and edge functions.',
                'is_manual' => true,
            ],
            [
                'title'     => 'LLM hallucinations in UI code: patterns and guardrails for developers',
                'date'      => date('d/m/Y', strtotime('-16 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-16 days')),
                'link'      => '#',
                'image'     => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=600&auto=format&fit=crop',
                'category'  => 'AI Limits',
                'content'   => 'When AI confidently generates broken CSS or wrong event handlers — and how to detect it.',
                'is_manual' => true,
            ],
            [
                'title'     => 'Design tokens and AI: automating consistent theming at scale',
                'date'      => date('d/m/Y', strtotime('-17 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-17 days')),
                'link'      => '#',
                'image'     => self::FALLBACK_IMAGES['Design Tokens'],
                'category'  => 'Design Tokens',
                'content'   => 'AI-driven token management for cross-platform design systems at enterprise scale.',
                'is_manual' => true,
            ],
            [
                'title'     => 'Svelte 5 runes and AI: reactive primitives meet intelligent code generation',
                'date'      => date('d/m/Y', strtotime('-18 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-18 days')),
                'link'      => 'https://svelte.dev/blog',
                'image'     => self::FALLBACK_IMAGES['Svelte AI'],
                'category'  => 'Svelte AI',
                'content'   => 'Svelte 5 reactive system as an ideal compilation target for LLM-generated components.',
                'is_manual' => true,
            ],
            [
                'title'     => 'Micro-interactions tailored by AI based on real user behavior',
                'date'      => date('d/m/Y', strtotime('-19 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-19 days')),
                'link'      => '#',
                'image'     => self::FALLBACK_IMAGES['Adaptive UI'],
                'category'  => 'Adaptive UI',
                'content'   => 'Using local models to adjust animation timing and easing curves per user session.',
                'is_manual' => true,
            ],
            [
                'title'     => 'Testing AI-written frontend code: automated QA for generated components',
                'date'      => date('d/m/Y', strtotime('-20 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-20 days')),
                'link'      => '#',
                'image'     => self::FALLBACK_IMAGES['Testing AI'],
                'category'  => 'Testing AI',
                'content'   => 'Playwright and Vitest in CI/CD pipelines to validate AI-generated UI components.',
                'is_manual' => true,
            ],
            [
                'title'     => 'The ethical implications of AI-generated dark patterns in UI',
                'date'      => date('d/m/Y', strtotime('-21 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-21 days')),
                'link'      => '#',
                'image'     => self::FALLBACK_IMAGES['AI Ethics'],
                'category'  => 'AI Ethics',
                'content'   => 'Preventing AI from optimizing engagement at the cost of user wellbeing and privacy.',
                'is_manual' => true,
            ],
            [
                'title'     => 'Replit Agent: from idea to deployed web app in minutes',
                'date'      => date('d/m/Y', strtotime('-22 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-22 days')),
                'link'      => 'https://replit.com/',
                'image'     => self::FALLBACK_IMAGES['Replit AI'],
                'category'  => 'Replit AI',
                'content'   => 'Cloud-based AI pair programmer handles full deployment cycles autonomously.',
                'is_manual' => true,
            ],
            [
                'title'     => 'From wireframe to production: the AI-accelerated design-to-code pipeline',
                'date'      => date('d/m/Y', strtotime('-23 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-23 days')),
                'link'      => '#',
                'image'     => self::FALLBACK_IMAGES['Design to Code'],
                'category'  => 'Design to Code',
                'content'   => 'How AI shrinks the gap between design mockup and shipped, tested component.',
                'is_manual' => true,
            ],
            [
                'title'     => 'WebGL and generative AI: procedural 3D UI elements from plain prompts',
                'date'      => date('d/m/Y', strtotime('-24 days')),
                'rawDate'   => date('Y-m-d\TH:i:s\Z', strtotime('-24 days')),
                'link'      => '#',
                'image'     => self::FALLBACK_IMAGES['3D & AI'],
                'category'  => '3D & AI',
                'content'   => 'Three.js and WebGL scenes generated from natural language descriptions.',
                'is_manual' => true,
            ],
        ];

        // ==========================================
        // 5. ASSEMBLAGE FINAL
        // ==========================================

        // Gold en tête (hors tri)
        $finalList = $goldArticles;

        // RSS triés par pertinence
        $finalList = array_merge($finalList, $filteredRss);

        // Compléter avec les backups si nécessaire
        if (count($finalList) < self::TARGET) {
            $needed    = self::TARGET - count($finalList);
            $finalList = array_merge($finalList, array_slice($backupArticles, 0, $needed));
        }

        // Tronquer à TARGET
        $finalList = array_slice($finalList, 0, self::TARGET);

        // ——— Passe finale : image unique garantie sur CHAQUE article ————
        //
        // Logique :
        //   1. Si l'article a déjà une vraie image HTTP → on la garde.
        //   2. Sinon → on lui attribue la première image du pool UNIQUE_IMAGE_POOL
        //      qui n'a pas encore été assignée dans cette liste.
        //      → Jamais deux articles avec la même image de fallback.
        $usedFallbacks   = [];
        $fallbackPointer = 0;

        // Pré-enregistrer les images "réelles" déjà présentes
        foreach ($finalList as $art) {
            if ($this->isValidImageUrl($art['image'] ?? null)) {
                $usedFallbacks[] = $art['image'];
            }
        }

        foreach ($finalList as &$art) {
            unset($art['_score']); // clé interne non exposée au frontend

            if ($this->isValidImageUrl($art['image'] ?? null)) {
                continue; // image réelle : on ne touche pas
            }

            // Chercher la première image du pool non encore utilisée
            $assigned = null;
            $poolSize = count(self::UNIQUE_IMAGE_POOL);
            for ($i = 0; $i < $poolSize; $i++) {
                $candidate = self::UNIQUE_IMAGE_POOL[($fallbackPointer + $i) % $poolSize];
                if (!in_array($candidate, $usedFallbacks, true)) {
                    $assigned        = $candidate;
                    $fallbackPointer = ($fallbackPointer + $i + 1) % $poolSize;
                    break;
                }
            }

            // En dernier recours (très improbable : plus d'articles que d'images)
            if ($assigned === null) {
                $assigned = self::UNIQUE_IMAGE_POOL[$fallbackPointer % $poolSize];
                $fallbackPointer++;
            }

            $art['image']    = $assigned;
            $usedFallbacks[] = $assigned;
        }
        unset($art);

        return array_values($finalList);
    }

    // ——— Helpers ——————————————————————————————————————————

    private function fingerprint(string $title): string
    {
        return substr(preg_replace('/[^a-z0-9]/', '', strtolower($title)), 0, 40);
    }

    /**
     * Vérifie qu'une URL d'image est utilisable.
     */
    private function isValidImageUrl(?string $url): bool
    {
        if (empty($url)) return false;
        if (!preg_match('/^https?:\/\//i', $url)) return false;
        $excluded = ['y18.svg', 'placeholder', 'data:image', 'noimage', 'default.png', 'blank.'];
        foreach ($excluded as $ex) {
            if (stripos($url, $ex) !== false) return false;
        }
        return true;
    }

    /**
     * Parse un flux Atom/RSS Google Alerts.
     */
    private function parseFeed(string $feedUrl): array
    {
        try {
            $response = Http::timeout(10)
                ->withHeaders(['User-Agent' => 'Mozilla/5.0 (compatible; PortfolioVeille/1.0)'])
                ->get($feedUrl);

            if (!$response->successful()) return [];

            $xml = simplexml_load_string($response->body());
            if ($xml === false) return [];

            $namespaces = $xml->getNamespaces(true);
            if (isset($namespaces['atom'])) {
                $xml->registerXPathNamespace('atom', $namespaces['atom']);
                $entries = $xml->xpath('//atom:entry');
            } else {
                $entries = $xml->xpath('//entry') ?: $xml->xpath('//item');
            }

            if (!$entries) return [];

            $articles = [];
            foreach ($entries as $entry) {
                $title = strip_tags((string)($entry->title ?? ''));
                if (empty($title)) continue;

                // Lien
                $link = '';
                if (isset($entry->link['href'])) {
                    $link = (string)$entry->link['href'];
                } elseif (isset($entry->link)) {
                    $link = (string)$entry->link;
                }
                if (preg_match('/url=([^&]+)/', $link, $m)) {
                    $link = urldecode($m[1]);
                }

                $pubDate     = (string)($entry->published ?? $entry->pubDate ?? '');
                $description = (string)($entry->content ?? $entry->description ?? '');

                // Extraction image (guillemets doubles ET simples)
                $image = null;
                if (preg_match('/<img[^>]+src=["\']([^"\']+)["\']/', $description, $img)) {
                    $candidate = $img[1];
                    if ($this->isValidImageUrl($candidate)) {
                        $image = $candidate;
                    }
                }

                if ($title && $link) {
                    $articles[] = [
                        'title'    => $title,
                        'date'     => $this->formatDate($pubDate),
                        'rawDate'  => $pubDate,
                        'link'     => $link,
                        'image'    => $image, // null = remplacé en étape 3
                        'category' => 'News',
                        'content'  => strip_tags($description),
                    ];
                }
            }

            return $articles;
        } catch (\Exception $e) {
            Log::warning("parseFeed échoué pour {$feedUrl}: " . $e->getMessage());
            return [];
        }
    }

    private function formatDate(string $dateString): string
    {
        if (empty($dateString)) return date('d/m/Y');
        try {
            return date('d/m/Y', strtotime($dateString));
        } catch (\Exception $e) {
            return date('d/m/Y');
        }
    }
}
