@extends('layouts.app')

@section('title', 'Étude de cas – Portfolio BTS SIO SLAM')

@section('content')
    <section id="portfolio-project-details" class="section">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">Étude de cas</p>
                <h2>Portfolio BTS SIO SLAM</h2>
                <p class="lede">Site vitrine mono-page avec sections animées, veille technologique connectée (RSS), et pages détaillées pour chaque projet.</p>
            </div>

            <div class="cards-grid three">
                <article class="card">
                    <div class="card-icon">🎯</div>
                    <h3>Objectif</h3>
                    <ul class="list">
                        <li>Présenter les compétences et projets pour l'épreuve E4</li>
                        <li>Mettre en avant la veille technologique en temps réel</li>
                        <li>Offrir une navigation fluide (scroll + animations)</li>
                    </ul>
                </article>

                <article class="card">
                    <div class="card-icon">🛠️</div>
                    <h3>Stack & choix</h3>
                    <ul class="list">
                        <li>Laravel 11 + Blade, routes dédiées (projets, veille)</li>
                        <li>Vite + JS vanilla pour les interactions et carrousels</li>
                        <li>CSS custom (thème dark, gradients, animations)</li>
                    </ul>
                </article>

                <article class="card">
                    <div class="card-icon">🚀</div>
                    <h3>Livrables clés</h3>
                    <ul class="list">
                        <li>Page d'accueil animée (hero, parcours, compétences)</li>
                        <li>Section veille connectée aux flux Google Alerts</li>
                        <li>Pages projets détaillées, dont cette étude de cas</li>
                    </ul>
                </article>
            </div>

            <div class="cards-grid two" style="margin-top: 32px;">
                <article class="card">
                    <div class="card-icon">📐</div>
                    <h3>Architecture & données</h3>
                    <ul class="list">
                        <li>Routes Laravel dédiées : accueil, projets, veille (API)</li>
                        <li>Contrôleur `VeilleController` : fetch RSS + dédup + images (og:image)</li>
                        <li>Injection des articles côté Blade → consommation JS pour la rotation</li>
                    </ul>
                </article>

                <article class="card">
                    <div class="card-icon">✅</div>
                    <h3>Résultats & qualité</h3>
                    <ul class="list">
                        <li>UI cohérente (dark, néon, cartes, progress bar)</li>
                        <li>Accessibilité : contraste, focus states, navigation clavier</li>
                        <li>Performance : Vite bundling, lazy images, fallback robuste</li>
                    </ul>
                </article>
            </div>

            <div class="cards-grid two" style="margin-top: 32px;">
                <article class="card">
                    <div class="card-icon">👤</div>
                    <h3>Rôle et responsabilités</h3>
                    <ul class="list">
                        <li>Conception UI/UX et prototypage des sections</li>
                        <li>Intégration front (hero, timelines, carrousel projets)</li>
                        <li>Backend Laravel (routes, contrôleurs, API veille)</li>
                        <li>Qualité : revues, optimisation, correctifs responsive</li>
                    </ul>
                </article>

                <article class="card">
                    <div class="card-icon">🔭</div>
                    <h3>Prochaines étapes</h3>
                    <ul class="list">
                        <li>Ajout de tests de contrôleur pour l'API veille</li>
                        <li>Internationalisation FR/EN</li>
                        <li>Mode offline pour le carrousel de veille</li>
                    </ul>
                </article>
            </div>

            <div class="skills-panel" style="margin-top: 40px;">
                <div class="panel-content" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 18px;">
                    <div class="skill-item" style="justify-content: center;">
                        <p style="margin: 0;">Laravel 11 • Blade • Vite</p>
                    </div>
                    <div class="skill-item" style="justify-content: center;">
                        <p style="margin: 0;">CSS custom • Animations</p>
                    </div>
                    <div class="skill-item" style="justify-content: center;">
                        <p style="margin: 0;">JavaScript (carrousel, veille)</p>
                    </div>
                    <div class="skill-item" style="justify-content: center;">
                        <p style="margin: 0;">RSS/HTTP • Cache</p>
                    </div>
                    <div class="skill-item" style="justify-content: center;">
                        <p style="margin: 0;">Accessibilité & responsive</p>
                    </div>
                </div>
            </div>

            <div class="hero-cta" style="margin-top: 32px; justify-content: flex-start;">
                <a class="btn primary" href="{{ route('portfolio.home') }}#projets">↩ Retour aux projets</a>
                <a class="btn ghost" href="{{ route('portfolio.home') }}#veille">Voir la veille</a>
            </div>
        </div>
    </section>
@endsection