@extends('layouts.app')

@section('title', 'Étude de cas – Assuroweb')

@section('content')
    <section id="assuroweb-project" class="section">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">Étude de cas</p>
                <h2>Assuroweb (Stage)</h2>
                <p class="lede">Refonte de modules métiers assurance, dockerisation, intégration SQL et amélioration des parcours utilisateurs.</p>
            </div>

            <div class="cards-grid three">
                <article class="card">
                    <div class="card-icon">🎯</div>
                    <h3>Objectifs</h3>
                    <ul class="list">
                        <li>Stabiliser et conteneuriser les environnements</li>
                        <li>Moderniser des écrans métier assurance</li>
                        <li>Optimiser les requêtes SQL critiques</li>
                    </ul>
                </article>
                <article class="card">
                    <div class="card-icon">🛠️</div>
                    <h3>Stack clé</h3>
                    <ul class="list">
                        <li>Laravel • PHP</li>
                        <li>Docker • Docker Compose</li>
                        <li>MySQL / MariaDB</li>
                    </ul>
                </article>
                <article class="card">
                    <div class="card-icon">🚀</div>
                    <h3>Livrables</h3>
                    <ul class="list">
                        <li>Images Docker prêtes pour CI/CD</li>
                        <li>Écrans refactorés et responsive</li>
                        <li>Requêtes et index optimisés</li>
                    </ul>
                </article>
            </div>

            <div class="cards-grid two" style="margin-top:32px;">
                <article class="card">
                    <div class="card-icon">📐</div>
                    <h3>Architecture</h3>
                    <ul class="list">
                        <li>Services dockerisés (app, db, cache)</li>
                        <li>Config .env unifiée pour les envs</li>
                        <li>Migrations/seeders pour données de test</li>
                    </ul>
                </article>
                <article class="card">
                    <div class="card-icon">✅</div>
                    <h3>Qualité</h3>
                    <ul class="list">
                        <li>Revue de code et guidelines</li>
                        <li>Tests basiques de flux critiques</li>
                        <li>Monitoring simple des erreurs</li>
                    </ul>
                </article>
            </div>

            <div class="skills-panel" style="margin-top:32px;">
                <div class="panel-content" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 18px;">
                    <div class="skill-item" style="justify-content:center;"><p style="margin:0;">Laravel</p></div>
                    <div class="skill-item" style="justify-content:center;"><p style="margin:0;">Docker</p></div>
                    <div class="skill-item" style="justify-content:center;"><p style="margin:0;">MySQL</p></div>
                    <div class="skill-item" style="justify-content:center;"><p style="margin:0;">Git / GitHub</p></div>
                </div>
            </div>

            <div class="hero-cta" style="margin-top:32px;">
                <a class="btn primary" href="{{ route('portfolio.home') }}#projets">↩ Retour aux projets</a>
            </div>
        </div>
    </section>
@endsection
