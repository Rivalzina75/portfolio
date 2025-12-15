@extends('layouts.app')

@section('title', 'Portfolio - Projet Portfolio BTS SIO SLAM')
@section('description', 'Présentation détaillée du projet Portfolio - Site vitrine développé en Laravel avec animations, veille technologique et gestion de projets')

@section('content')
<!-- Hero Section -->
<section id="portfolio-hero" class="section hero">
    <div class="container">
        <div class="hero-simple">
            <p class="eyebrow">ÉTUDE DE CAS DÉTAILLÉE</p>
            <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); color: var(--primary); margin-bottom: 16px; line-height: 1.1;">
                Portfolio BTS SIO SLAM
            </h1>
            <p class="hero-subtitle">Site vitrine professionnel avec veille technologique en temps réel</p>
            <p class="lede">
                Un portfolio moderne développé en Laravel 11, intégrant des animations fluides, 
                une architecture MVC structurée, et une section de veille technologique connectée via flux RSS.
            </p>
            
            <div class="hero-badges">
                <span class="badge">Laravel 11</span>
                <span class="badge">Blade Templates</span>
                <span class="badge">JavaScript Vanilla</span>
                <span class="badge">CSS Custom</span>
                <span class="badge accent">En Production</span>
            </div>

            <div class="hero-cta">
                <a href="#project-details" class="btn primary">
                    📖 Découvrir le projet
                </a>
                <a href="{{ route('portfolio.documentation') }}" download class="btn ghost">
                    📄 Télécharger la documentation
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Project Overview -->
<section id="project-details" class="section">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">APERÇU DU PROJET</p>
            <h2>Contexte et Objectifs</h2>
            <p class="lede">
                Ce projet a été développé dans le cadre de la formation BTS SIO option SLAM 
                pour présenter mes compétences techniques et projets professionnels.
            </p>
        </div>

        <div class="cards-grid three">
            <article class="card">
                <div class="card-icon">🎯</div>
                <h3>Objectifs</h3>
                <ul class="list">
                    <li>Présenter mon parcours et compétences techniques</li>
                    <li>Démontrer ma maîtrise du framework Laravel</li>
                    <li>Intégrer une veille technologique dynamique</li>
                    <li>Offrir une expérience utilisateur moderne et fluide</li>
                </ul>
            </article>

            <article class="card">
                <div class="card-icon">🚀</div>
                <h3>Fonctionnalités Clés</h3>
                <ul class="list">
                    <li>Navigation smooth scroll avec animations</li>
                    <li>Système de carrousel pour les projets</li>
                    <li>Veille techno connectée aux flux RSS</li>
                    <li>Formulaire de contact avec validation Ajax</li>
                    <li>Design responsive et accessible</li>
                </ul>
            </article>

            <article class="card">
                <div class="card-icon">💡</div>
                <h3>Innovations</h3>
                <ul class="list">
                    <li>Animations Canvas avec particules</li>
                    <li>Système de rotation automatique des articles</li>
                    <li>Architecture MVC Laravel optimisée</li>
                    <li>Intégration Vite pour le bundling</li>
                    <li>Thème dark avec effets néon</li>
                </ul>
            </article>
        </div>
    </div>
</section>

<!-- Technical Stack -->
<section id="tech-stack" class="section muted">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">STACK TECHNIQUE</p>
            <h2>Technologies & Compétences</h2>
            <p class="lede">
                Technologies utilisées pour développer ce projet et compétences mobilisées
            </p>
        </div>

        <div class="cards-grid two">
            <article class="card">
                <div class="card-icon">⚙️</div>
                <h3>Backend & Architecture</h3>
                <div class="skills-tags">
                    <span class="skill-tag">Laravel 11</span>
                    <span class="skill-tag">PHP 8.2</span>
                    <span class="skill-tag">Blade Templates</span>
                    <span class="skill-tag">MVC Pattern</span>
                    <span class="skill-tag">Cache Driver</span> <span class="skill-tag">Controllers</span>
                    <span class="skill-tag">API REST</span>
                </div>
                <ul class="list" style="margin-top: 20px;">
                    <li>Architecture MVC avec séparation des responsabilités</li>
                    <li>Routes dédiées pour chaque fonctionnalité</li>
                    <li>Contrôleur VeilleController avec algorithme de tri</li> <li>Système de Cache (3h) pour optimiser les appels API</li> </ul>
            </article>

            <article class="card">
                <div class="card-icon">🎨</div>
                <h3>Frontend & UX</h3>
                <div class="skills-tags">
                    <span class="skill-tag">JavaScript ES6+</span>
                    <span class="skill-tag">CSS Custom</span>
                    <span class="skill-tag">Animations</span>
                    <span class="skill-tag">Canvas API</span>
                    <span class="skill-tag">Swiper.js</span>
                    <span class="skill-tag">Anime.js</span>
                    <span class="skill-tag">Responsive Design</span>
                </div>
                <ul class="list" style="margin-top: 20px;">
                    <li>Animations fluides avec JavaScript vanilla</li>
                    <li>Système de particules Canvas performant</li>
                    <li>Carrousel projets avec Swiper.js</li>
                    <li>Design responsive mobile-first</li>
                </ul>
            </article>
        </div>

        <div class="cards-grid three" style="margin-top: 32px;">
            <article class="card">
                <div class="card-icon">🔧</div>
                <h3>Outils & DevOps</h3>
                <div class="skills-tags">
                    <span class="skill-tag">Vite</span>
                    <span class="skill-tag">Composer</span>
                    <span class="skill-tag">NPM</span>
                    <span class="skill-tag">Git</span>
                </div>
            </article>

            <article class="card">
                <div class="card-icon">📊</div>
                <h3>Data & API</h3>
                <div class="skills-tags">
                    <span class="skill-tag">RSS/Atom</span>
                    <span class="skill-tag">HTTP Client</span>
                    <span class="skill-tag">XML Parsing</span>
                    <span class="skill-tag">JSON API</span>
                </div>
            </article>

            <article class="card">
                <div class="card-icon">✅</div>
                <h3>Qualité & Sécurité</h3>
                <div class="skills-tags">
                    <span class="skill-tag">CSRF Protection</span>
                    <span class="skill-tag">Validation</span>
                    <span class="skill-tag">Sanitization</span>
                    <span class="skill-tag">Accessibilité</span>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Architecture & Implementation -->
<section id="implementation" class="section">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">ARCHITECTURE & RÉALISATION</p>
            <h2>Structure et Implémentation</h2>
        </div>

        <div class="cards-grid two">
            <article class="card">
                <div class="card-icon">📐</div>
                <h3>Architecture Applicative</h3>
                <ul class="list">
                    <li><strong>Routes :</strong> Définition claire dans routes.php (accueil, projets, veille, contact)</li>
                    <li><strong>Controllers :</strong> VeilleController pour la gestion des flux RSS avec cache</li>
                    <li><strong>Views :</strong> Templates Blade modulaires avec layout principal</li>
                    <li><strong>Assets :</strong> Compilation Vite pour CSS et JS optimisés</li>
                    <li><strong>API :</strong> Endpoint /api/veille/articles pour la rotation dynamique</li>
                </ul>
            </article>

            <article class="card">
                <div class="card-icon">🔍</div>
                <h3>Fonctionnalité Veille Techno</h3>
                <ul class="list">
                    <li><strong>Agrégation :</strong> Fusion de multiples flux RSS (Google Alerts, Blogs)</li>
                    <li><strong>Filtrage Intelligent :</strong> Algorithme strict (Mots-clés IA + UI obligatoires)</li> <li><strong>Nettoyage :</strong> Blacklist anti-bruit (Crypto, Sport, Faits divers)</li> <li><strong>Parsing :</strong> Analyse XML native avec SimpleXML et XPath</li> <li><strong>Résilience :</strong> Fallback sur images par défaut si manquantes</li> </ul>
            </article>
        </div>


    </div>
</section>

<!-- Results & Next Steps -->
<section id="results" class="section muted">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">RÉSULTATS & PERSPECTIVES</p>
            <h2>Bilan et Évolutions</h2>
        </div>

        <div class="cards-grid two">
            <article class="card">
                <div class="card-icon">✨</div>
                <h3>Résultats & Qualité</h3>
                <ul class="list">
                    <li><strong>Pertinence :</strong> Veille automatisée avec 0% de hors-sujet grâce au filtrage</li> <li><strong>UI cohérente :</strong> Thème dark avec néon cyan, style Glassmorphism</li>
                    <li><strong>Performance :</strong> Vite bundling, images lazy-load, Cache Laravel</li>
                    <li><strong>Accessibilité :</strong> Contraste soigné, navigation claire</li>
                    <li><strong>Responsive :</strong> Mobile-first, adaptation tablette et desktop</li>
                </ul>
            </article>

            <article class="card">
                <div class="card-icon">�</div>
                <h3>Apprentissages Clés</h3>
                <ul class="list">
                    <li><strong>Gestion des flux RSS :</strong> Parsing XML complexe avec gestion d'erreurs robuste</li>
                    <li><strong>Performance :</strong> Système de cache efficace pour réduire les appels API</li>
                    <li><strong>UX dynamique :</strong> Rotation automatique d'articles avec feedback utilisateur</li>
                    <li><strong>Clean Code :</strong> Architecture Laravel modulaire et maintenable</li>
                    <li><strong>Accessibilité :</strong> Design inclusif avec contraste et navigation claire</li>
                </ul>
            </article>
        </div>
    </div>
</section>

<!-- Key Metrics & CTA -->
<section id="metrics" class="section muted">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">CHIFFRES CLÉS</p>
            <h2>Impact et Performance</h2>
        </div>

        <div class="cards-grid four" style="margin-bottom: 48px;">
            <div class="card" style="text-align: center;">
                <div style="font-size: 2.5rem; color: var(--primary); font-weight: bold; margin-bottom: 8px;">100%</div>
                <p style="color: var(--muted);">Filtrage pertinent</p>
                <p style="font-size: 0.85rem; color: var(--muted);">0 article hors-sujet</p>
            </div>
            <div class="card" style="text-align: center;">
                <div style="font-size: 2.5rem; color: var(--primary); font-weight: bold; margin-bottom: 8px;">~50</div>
                <p style="color: var(--muted);">Articles filtrés</p>
                <p style="font-size: 0.85rem; color: var(--muted);">Chaque mise à jour</p>
            </div>
            <div class="card" style="text-align: center;">
                <div style="font-size: 2.5rem; color: var(--primary); font-weight: bold; margin-bottom: 8px;">3h</div>
                <p style="color: var(--muted);">Cache durée</p>
                <p style="font-size: 0.85rem; color: var(--muted);">Rafraîchissement auto</p>
            </div>
            <div class="card" style="text-align: center;">
                <div style="font-size: 2.5rem; color: var(--primary); font-weight: bold; margin-bottom: 8px;">6</div>
                <p style="color: var(--muted);">Flux RSS</p>
                <p style="font-size: 0.85rem; color: var(--muted);">Agrégés quotidiennement</p>
            </div>
        </div>
    </div>
</section>

<!-- Documentation & Resources -->
<section id="resources" class="section">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">DOCUMENTATION & RESSOURCES</p>
            <h2>Accédez au projet en détail</h2>
        </div>

        <div class="cards-grid two">
            <div class="card" style="display: flex; flex-direction: column; align-items: center; text-align: center; padding: 40px 32px;">
                <div class="card-icon">📄</div>
                <h3 style="margin-top: 16px;">Documentation PDF</h3>
                <p style="flex-grow: 1; margin: 12px 0 24px;">
                    Architecture technique, diagrammes UML, cas d'usage et documentation API complète.
                </p>
                <a href="{{ route('portfolio.documentation') }}" download class="btn primary">
                    📥 Télécharger (25 pages)
                </a>
            </div>

            <div class="card" style="display: flex; flex-direction: column; align-items: center; text-align: center; padding: 40px 32px;">
                <div class="card-icon">🏠</div>
                <h3 style="margin-top: 16px;">Retour au Portfolio</h3>
                <p style="flex-grow: 1; margin: 12px 0 24px;">
                    Découvrez tous mes projets, ma parcours académique et ma veille technologique.
                </p>
                <a href="{{ route('portfolio.home') }}#projets" class="btn ghost">
                    ← Tous les projets
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
