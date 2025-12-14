@extends('layouts.app')

@section('title', 'Étude de cas – Stage 2026 (prévision)')

@section('content')
    <section id="stage2026-project" class="section">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">Prévision</p>
                <h2>Stage 2026</h2>
                <p class="lede">Emplacement réservé pour le futur stage 2026. Objectifs et backlog à définir.</p>
            </div>

            <div class="cards-grid two">
                <article class="card">
                    <div class="card-icon">🧭</div>
                    <h3>Pistes envisagées</h3>
                    <ul class="list">
                        <li>Projet web full-stack (Laravel)</li>
                        <li>Dockerisation et CI/CD</li>
                        <li>Monitoring et qualité</li>
                    </ul>
                </article>
                <article class="card">
                    <div class="card-icon">🗓️</div>
                    <h3>Prochaines étapes</h3>
                    <ul class="list">
                        <li>Définir le cahier des charges</li>
                        <li>Planifier le backlog</li>
                        <li>Mettre en place l’environnement</li>
                    </ul>
                </article>
            </div>

            <div class="skills-panel" style="margin-top:32px;">
                <div class="panel-content" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 18px;">
                    <div class="skill-item" style="justify-content:center;"><p style="margin:0;">Laravel</p></div>
                    <div class="skill-item" style="justify-content:center;"><p style="margin:0;">Docker</p></div>
                    <div class="skill-item" style="justify-content:center;"><p style="margin:0;">CI/CD</p></div>
                </div>
            </div>

            <div class="hero-cta" style="margin-top:32px;">
                <a class="btn primary" href="{{ route('portfolio.home') }}#projets">↩ Retour aux projets</a>
            </div>
        </div>
    </section>
@endsection
