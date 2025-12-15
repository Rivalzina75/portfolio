@extends('layouts.app')

@section('title', 'Assuroweb - Stage BTS SIO SLAM')
@section('description', 'Étude de cas du stage Assuroweb - Développement full-stack Laravel, Docker et déploiement en production')

@section('content')
<!-- Hero Section -->
<section id="Assuroweb-hero" class="section hero">
    <div class="container">
        <div class="hero-simple">
            <p class="eyebrow">STAGE BTS SIO SLAM • 5 MAI - 6 JUIN 2025</p>
            <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); color: var(--primary); margin-bottom: 16px; line-height: 1.1;">
                Assuroweb
            </h1>
            <p class="hero-subtitle">Plateforme web d'assurance moderne</p>
            <p class="lede">
                Développement full-stack d'un système de gestion d'articles pour une plateforme d'assurance.
                Stage de 30 jours axé sur Laravel, Docker et les bonnes pratiques professionnelles.
            </p>
            
            <div class="hero-badges">
                <span class="badge">Laravel</span>
                <span class="badge">Docker</span>
                <span class="badge">PHP 8</span>
                <span class="badge">MySQL</span>
                <span class="badge accent">Stage 1ère année</span>
            </div>

            <div class="hero-cta">
                <a href="#contexte" class="btn primary">📖 Découvrir le projet</a>
                <a href="/files/RAPPORT DE STAGE 5 Mai-6 Juin _ MEKAOUI MOHAMED, BTS SIO1.pdf" download class="btn ghost">📄 Télécharger le rapport</a>
            </div>
        </div>
    </div>
</section>

<!-- Chiffres Clés -->
<section class="section muted">
    <div class="container">
        <div class="stats-hero">
            <h2 style="text-align: center; margin-bottom: 48px; font-size: clamp(1.8rem, 4vw, 2.8rem);">Jours de stage</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">22</div>
                    <p class="stat-label">Jours de stage</p>
                </div>
                <div class="stat-card">
                    <div class="stat-number">6</div>
                    <p class="stat-label">Fonctionnalités livrées</p>
                </div>
                <div class="stat-card">
                    <div class="stat-number">100%</div>
                    <p class="stat-label">En production</p>
                </div>
                <div class="stat-card">
                    <div class="stat-number">1</div>
                    <p class="stat-label">Système CRUD complet</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contexte -->
<section id="contexte" class="section">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">CONTEXTE</p>
            <h2>Objectifs du stage</h2>
            <p class="lede">Stage de première année BTS SIO SLAM chez Assuroweb, entreprise spécialisée dans les solutions digitales pour l'assurance.</p>
        </div>

        <div class="cards-grid three">
            <article class="card">
                <div class="card-icon">🎯</div>
                <h3>Mission principale</h3>
                <p>Développer un système complet de gestion d'articles (blog/actualités) avec interface d'administration et affichage public.</p>
            </article>
            <article class="card">
                <div class="card-icon">🏢</div>
                <h3>Environnement</h3>
                <p>Travail à distance avec Docker, suivi via Trello/GitHub, code reviews régulières par le tuteur technique.</p>
            </article>
            <article class="card">
                <div class="card-icon">🚀</div>
                <h3>Livrable</h3>
                <p>Application déployée en production via WinSCP/SSH, avec documentation et rapport de stage complet.</p>
            </article>
        </div>
    </div>
</section>

<!-- Réalisations -->
<section class="section muted">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">RÉALISATIONS</p>
            <h2>Fonctionnalités développées</h2>
        </div>

        <div class="cards-grid two">
            <article class="card">
                <div class="card-icon">⚙️</div>
                <h3>Backend Laravel</h3>
                <ul class="list">
                    <li>Architecture MVC avec Controllers dédiés</li>
                    <li>Routes dynamiques avec paramètres et slugs</li>
                    <li>Connexion MySQL avec Eloquent ORM</li>
                    <li>CRUD complet pour les articles</li>
                    <li>Gestion des erreurs 404 personnalisées</li>
                </ul>
            </article>

            <article class="card">
                <div class="card-icon">🎨</div>
                <h3>Frontend & UX</h3>
                <ul class="list">
                    <li>Intégration QuillJS (éditeur WYSIWYG)</li>
                    <li>Responsive design (desktop 1024p, mobile 425p)</li>
                    <li>Slider d'articles sur la page d'accueil</li>
                    <li>Messages de succès/erreur dynamiques (JS)</li>
                    <li>Dégradés et CSS personnalisés</li>
                </ul>
            </article>
        </div>
    </div>
</section>

<!-- Stack Technique -->
<section class="section">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">STACK TECHNIQUE</p>
            <h2>Technologies utilisées</h2>
        </div>

        <div class="cards-grid three">
            <article class="card">
                <div class="card-icon">🔧</div>
                <h3>Backend</h3>
                <div class="skills-tags">
                    <span class="skill-tag">Laravel</span>
                    <span class="skill-tag">PHP 8</span>
                    <span class="skill-tag">Eloquent ORM</span>
                    <span class="skill-tag">Blade</span>
                </div>
            </article>

            <article class="card">
                <div class="card-icon">🗄️</div>
                <h3>Base de données</h3>
                <div class="skills-tags">
                    <span class="skill-tag">MySQL</span>
                    <span class="skill-tag">MariaDB</span>
                    <span class="skill-tag">Migrations</span>
                </div>
            </article>

            <article class="card">
                <div class="card-icon">🐳</div>
                <h3>DevOps</h3>
                <div class="skills-tags">
                    <span class="skill-tag">Docker</span>
                    <span class="skill-tag">Git/GitHub</span>
                    <span class="skill-tag">WinSCP</span>
                    <span class="skill-tag">SSH</span>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Apprentissages -->
<section class="section muted">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">BILAN</p>
            <h2>Apprentissages clés</h2>
        </div>

        <div class="cards-grid two">
            <article class="card">
                <div class="card-icon">💻</div>
                <h3>Compétences techniques</h3>
                <ul class="list">
                    <li><strong>Laravel :</strong> Maîtrise du framework MVC et de l'écosystème Artisan</li>
                    <li><strong>Docker :</strong> Conteneurisation et environnement de dev isolé</li>
                    <li><strong>Git :</strong> Workflow professionnel (branches, commits descriptifs, PR)</li>
                    <li><strong>Déploiement :</strong> Mise en production via SSH</li>
                </ul>
            </article>

            <article class="card">
                <div class="card-icon">🎓</div>
                <h3>Compétences professionnelles</h3>
                <ul class="list">
                    <li><strong>Autonomie :</strong> Résolution de problèmes en solo (7h de debug formatrices)</li>
                    <li><strong>Méthodologie :</strong> Gestion de projet avec Trello et GitHub</li>
                    <li><strong>Communication :</strong> Échanges réguliers avec le tuteur technique</li>
                    <li><strong>Documentation :</strong> Commits structurés et rapport de stage</li>
                </ul>
            </article>
        </div>
    </div>
</section>

<!-- Documentation -->
<section class="section">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">DOCUMENTATION</p>
            <h2>Rapport de stage</h2>
        </div>

        <div class="cards-grid two">
            <div class="card" style="display: flex; flex-direction: column; align-items: center; text-align: center; padding: 40px 32px;">
                <div class="card-icon">📄</div>
                <h3 style="margin-top: 16px;">Rapport complet</h3>
                <p style="flex-grow: 1; margin: 12px 0 24px;">
                    Journal quotidien de 30 jours, captures d'écran des réalisations et bilan des apprentissages.
                </p>
                <a href="/files/RAPPORT DE STAGE 5 Mai-6 Juin _ MEKAOUI MOHAMED, BTS SIO1.pdf" download class="btn primary">
                    📥 Télécharger le PDF
                </a>
            </div>

            <div class="card" style="display: flex; flex-direction: column; align-items: center; text-align: center; padding: 40px 32px;">
                <div class="card-icon">🏠</div>
                <h3 style="margin-top: 16px;">Retour au Portfolio</h3>
                <p style="flex-grow: 1; margin: 12px 0 24px;">
                    Découvrez tous mes projets et ma veille technologique.
                </p>
                <a href="{{ route('portfolio.home') }}#projets" class="btn ghost">
                    ← Tous les projets
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
