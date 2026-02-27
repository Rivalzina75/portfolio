@extends('layouts.app')

@section('title', 'Étude de cas – Personnel (M2L)')
@section('description', 'Situation professionnelle E6 n°2 : application Java de gestion du personnel M2L, persistance sérialisation/JDBC et tests unitaires')

@section('content')
<section id="personnel-hero" class="section hero">
    <div class="container">
        <div class="hero-simple">
            <p class="eyebrow">FICHE E6 • RÉALISATION N°2</p>
            <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); color: var(--primary); margin-bottom: 16px; line-height: 1.1;">
                Projet Personnel – M2L
            </h1>
            <p class="hero-subtitle">Application Java de gestion des ligues et employés</p>
            <p class="lede">
                Situation professionnelle réalisée en option SLAM : modélisation métier en Java,
                gestion des droits, persistance des données (sérialisation et JDBC/MySQL) et tests JUnit.
            </p>

            <div class="hero-badges">
                <span class="badge">Java</span>
                <span class="badge">JDBC</span>
                <span class="badge">MySQL</span>
                <span class="badge">JUnit 5</span>
                <span class="badge accent">CCF</span>
            </div>

            <div class="hero-cta">
                <a href="#contexte-personnel" class="btn primary">📖 Voir la situation</a>
                <a href="{{ route('portfolio.home') }}#projets" class="btn ghost">← Retour aux projets</a>
            </div>
        </div>
    </div>
</section>

<section id="contexte-personnel" class="section">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">CONTEXTE</p>
            <h2>Contexte et objectifs</h2>
            <p class="lede">
                La M2L gère plusieurs ligues sportives avec des employés et des administrateurs.
                L'objectif était de développer une application de gestion fiable, avec contrôle des droits et sauvegarde des données.
            </p>
        </div>

        <div class="cards-grid three">
            <article class="card">
                <div class="card-icon">🎯</div>
                <h3>Objectifs</h3>
                <ul class="list">
                    <li>Gérer ligues et employés</li>
                    <li>Implémenter les rôles root/admin/employé</li>
                    <li>Sauvegarder les données durablement</li>
                    <li>Tester les fonctionnalités critiques</li>
                </ul>
            </article>

            <article class="card">
                <div class="card-icon">🧩</div>
                <h3>Modèle métier</h3>
                <ul class="list">
                    <li>Classe <strong>GestionPersonnel</strong> (singleton)</li>
                    <li>Classe <strong>Ligue</strong> (nom, administrateur, employés)</li>
                    <li>Classe <strong>Employe</strong> (identité, dates, droits)</li>
                    <li>Exceptions métier dédiées</li>
                </ul>
            </article>

            <article class="card">
                <div class="card-icon">🛠️</div>
                <h3>Technologies</h3>
                <ul class="list">
                    <li>Java</li>
                    <li>JDBC / MySQL</li>
                    <li>Sérialisation Java</li>
                    <li>JUnit 5</li>
                </ul>
            </article>
        </div>
    </div>
</section>

<section class="section muted">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">RÉALISATIONS</p>
            <h2>Travaux effectués</h2>
        </div>

        <div class="cards-grid two">
            <article class="card">
                <div class="card-icon">⚙️</div>
                <h3>Fonctionnalités développées</h3>
                <ul class="list">
                    <li>Ajout, modification et suppression de ligues</li>
                    <li>Ajout, modification et suppression d'employés</li>
                    <li>Gestion de l'administrateur de ligue</li>
                    <li>Validation des dates d'arrivée / départ</li>
                    <li>Interface en ligne de commande</li>
                </ul>
            </article>

            <article class="card">
                <div class="card-icon">✅</div>
                <h3>Validation</h3>
                <ul class="list">
                    <li>Tests unitaires sur <strong>Employe</strong></li>
                    <li>Tests unitaires sur <strong>Ligue</strong></li>
                    <li>Vérification des règles de droits</li>
                    <li>Vérification des règles de cohérence métier</li>
                </ul>
            </article>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">MCD</p>
            <h2>Modèle conceptuel de données (Merise)</h2>
        </div>

        <div class="cards-grid two">
            <article class="card">
                <div class="card-icon">🗂️</div>
                <h3>Entités</h3>
                <ul class="list">
                    <li><strong>LIGUE</strong> (id_ligue, nom)</li>
                    <li><strong>EMPLOYE</strong> (id_employe, nom, prenom, mail, password, date_arrivee, date_depart)</li>
                </ul>
            </article>

            <article class="card">
                <div class="card-icon">🔗</div>
                <h3>Associations</h3>
                <ul class="list">
                    <li><strong>Appartenir</strong> : LIGUE (1,N) ↔ EMPLOYE (1,1)</li>
                    <li><strong>Administrer</strong> : LIGUE (1,1) ↔ EMPLOYE (0,1)</li>
                </ul>
            </article>
        </div>
    </div>
</section>

<section class="section muted">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">LIEN DE LA SITUATION</p>
            <h2>Adresse de la page dans le portfolio déployé</h2>
        </div>

        <div class="cards-grid one" style="max-width: 900px; margin: 0 auto;">
            <article class="card" style="text-align: center;">
                <div class="card-icon">🌐</div>
                <h3>URL à reporter dans la fiche</h3>
                <p style="margin-bottom: 16px; color: var(--text-secondary);">https://portfolio-1hg9.onrender.com/projects/personnel</p>
                <a href="https://portfolio-1hg9.onrender.com/projects/personnel" class="btn primary" target="_blank" rel="noopener noreferrer">
                    Ouvrir la page déployée
                </a>
            </article>
        </div>
    </div>
</section>
@endsection
