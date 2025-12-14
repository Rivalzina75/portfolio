@extends('layouts.app')

@section('title', 'Étude de cas – Next2You')

@section('content')
    <section id="next2you-project" class="section">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">Étude de cas</p>
                <h2>Next2You</h2>
                <p class="lede">Plateforme collaborative avec workflows, rôles et dockerisation complète.</p>
            </div>

            <div class="cards-grid three">
                <article class="card">
                    <div class="card-icon">🎯</div>
                    <h3>Objectifs</h3>
                    <ul class="list">
                        <li>Gestion des rôles et permissions</li>
                        <li>Workflows collaboratifs et notifications</li>
                        <li>Déploiement conteneurisé</li>
                    </ul>
                </article>
                <article class="card">
                    <div class="card-icon">🛠️</div>
                    <h3>Stack clé</h3>
                    <ul class="list">
                        <li>Laravel • PHP</li>
                        <li>Docker • Compose</li>
                        <li>JS / HTML5 / CSS3</li>
                    </ul>
                </article>
                <article class="card">
                    <div class="card-icon">🚀</div>
                    <h3>Livrables</h3>
                    <ul class="list">
                        <li>Modules rôles/profils</li>
                        <li>Board de suivi + notifications</li>
                        <li>Images Docker prêtes CI/CD</li>
                    </ul>
                </article>
            </div>

            <div class="skills-panel" style="margin-top:32px;">
                <div class="panel-content" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 18px;">
                    <div class="skill-item" style="justify-content:center;"><p style="margin:0;">Laravel</p></div>
                    <div class="skill-item" style="justify-content:center;"><p style="margin:0;">Docker</p></div>
                    <div class="skill-item" style="justify-content:center;"><p style="margin:0;">JavaScript</p></div>
                    <div class="skill-item" style="justify-content:center;"><p style="margin:0;">Git / Trello</p></div>
                </div>
            </div>

            <div class="hero-cta" style="margin-top:32px;">
                <a class="btn primary" href="{{ route('portfolio.home') }}#projets">↩ Retour aux projets</a>
            </div>
        </div>
    </section>
@endsection
