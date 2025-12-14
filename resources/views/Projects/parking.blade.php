@extends('layouts.app')

@section('title', 'Étude de cas – Projet Parking')

@section('content')
    <section id="parking-project" class="section">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">Étude de cas</p>
                <h2>Projet Parking</h2>
                <p class="lede">Gestion des places, réservations et notifications, avec API et interface web.</p>
            </div>

            <div class="cards-grid three">
                <article class="card">
                    <div class="card-icon">🎯</div>
                    <h3>Objectifs</h3>
                    <ul class="list">
                        <li>Réservation et suivi des places</li>
                        <li>Notifications en temps réel</li>
                        <li>Dashboard de supervision</li>
                    </ul>
                </article>
                <article class="card">
                    <div class="card-icon">🛠️</div>
                    <h3>Stack clé</h3>
                    <ul class="list">
                        <li>Laravel • PHP</li>
                        <li>MySQL</li>
                        <li>JavaScript / CSS</li>
                    </ul>
                </article>
                <article class="card">
                    <div class="card-icon">🚀</div>
                    <h3>Livrables</h3>
                    <ul class="list">
                        <li>API de réservation</li>
                        <li>UI tableau de bord</li>
                        <li>Notifications (mail / app)</li>
                    </ul>
                </article>
            </div>

            <div class="skills-panel" style="margin-top:32px;">
                <div class="panel-content" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 18px;">
                    <div class="skill-item" style="justify-content:center;"><p style="margin:0;">Laravel</p></div>
                    <div class="skill-item" style="justify-content:center;"><p style="margin:0;">MySQL</p></div>
                    <div class="skill-item" style="justify-content:center;"><p style="margin:0;">JavaScript</p></div>
                </div>
            </div>

            <div class="hero-cta" style="margin-top:32px;">
                <a class="btn primary" href="{{ route('portfolio.home') }}#projets">↩ Retour aux projets</a>
            </div>
        </div>
    </section>
@endsection
