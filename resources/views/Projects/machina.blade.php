@extends('layouts.app')

@section('title', 'Étude de cas – Machina')

@section('content')
    <section id="machina-project" class="section">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">Étude de cas</p>
                <h2>Machina</h2>
                <p class="lede">Application de gestion industrielle : interfaces responsive et API sécurisée.</p>
            </div>

            <div class="cards-grid three">
                <article class="card">
                    <div class="card-icon">🎯</div>
                    <h3>Objectifs</h3>
                    <ul class="list">
                        <li>Suivi des équipements et interventions</li>
                        <li>Interfaces responsives pour opérateurs</li>
                        <li>API sécurisée pour intégrations</li>
                    </ul>
                </article>
                <article class="card">
                    <div class="card-icon">🛠️</div>
                    <h3>Stack clé</h3>
                    <ul class="list">
                        <li>Laravel • PHP</li>
                        <li>Docker</li>
                        <li>HTML5 / CSS3 / JS</li>
                    </ul>
                </article>
                <article class="card">
                    <div class="card-icon">🚀</div>
                    <h3>Livrables</h3>
                    <ul class="list">
                        <li>API documentée</li>
                        <li>UI responsive et thèmes</li>
                        <li>Pipeline Docker prêt</li>
                    </ul>
                </article>
            </div>

            <div class="skills-panel" style="margin-top:32px;">
                <div class="panel-content" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 18px;">
                    <div class="skill-item" style="justify-content:center;"><p style="margin:0;">Laravel</p></div>
                    <div class="skill-item" style="justify-content:center;"><p style="margin:0;">Docker</p></div>
                    <div class="skill-item" style="justify-content:center;"><p style="margin:0;">API / Sécurité</p></div>
                    <div class="skill-item" style="justify-content:center;"><p style="margin:0;">HTML/CSS/JS</p></div>
                </div>
            </div>

            <div class="hero-cta" style="margin-top:32px;">
                <a class="btn primary" href="{{ route('portfolio.home') }}#projets">↩ Retour aux projets</a>
            </div>
        </div>
    </section>
@endsection
