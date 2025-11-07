@extends('layouts.app') 

@section('title', 'BTS SIO SLAM - Projet portfolio') 

@section('content')

    <section id="portfolio-project-details" class="section">
        <div class="container">
            
            <h2 class="section-title">Analyse du Projet : Mon Portfolio (Étude de Cas)</h2>
            
            <div class="modal-body">
                
                <h3>Description et Contexte du Projet</h3>
                <p>Ce projet consiste en la conception et la réalisation de mon portfolio numérique pour la soutenance du BTS SIO SLAM (Épreuve E4). L'objectif est de présenter de manière structurée et professionnelle mes compétences techniques, mes projets réalisés, et ma veille technologique.</p>
                <p>L'approche adoptée a été de créer un site <span class="highlight">mono-page</span> pour une consultation rapide, tout en prévoyant une extension <span class="highlight">multi-pages</span> pour les études de cas détaillées comme celle-ci.</p>

                <hr style="margin: 2rem 0; border-color: var(--text-secondary); opacity: 0.3;">
                
                <h3>Choix Techniques et Stack</h3>
                <div class="about-details">
                    <p>La stack a été choisie pour démontrer la maîtrise des technologies modernes :</p>
                    <ul>
                        <li><span class="highlight">Framework</span> : Laravel 10 (Blade) pour la structure du projet, les routes et l'héritage du layout.</li>
                        <li><span class="highlight">Front-end/Design</span> : HTML5 et CSS pur (avec usage de variables CSS) pour le thème sombre, le responsive design et les animations.</li>
                        <li><span class="highlight">Interactivité</span> : JavaScript pour les interactions utilisateur (navigation, modals, animations de barres de compétences).</li>
                        <li><span class="highlight">Gestion de Version</span> : Git/GitHub pour le suivi des évolutions et la collaboration.</li>
                    </ul>
                </div>
                
                <h3>Compétences Techniques & Méthodologiques</h3>
                <p>La réalisation du portfolio a permis de valider les compétences suivantes :</p>
                <ul class="missions-list">
                    <li><span class="highlight">Conception</span> : Définition des besoins, maquettage (Wireframing) de l'interface utilisateur (UI).</li>
                    <li><span class="highlight">Intégration</span> : Maîtrise du Responsive Design pour une expérience utilisateur optimale sur tous les appareils.</li>
                    <li><span class="highlight">Développement Back-end</span>: Utilisation de la structure MVC de Laravel pour les vues (Blade) et la gestion des routes.</li>
                    <li><span class="highlight">Qualité Logicielle</span> : Optimisation du code CSS (modularité et variables) et du code HTML (sémantique).</li>
                </ul>

            </div>
        </div>
    </section>

@endsection