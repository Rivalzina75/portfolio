@extends('layouts.app') 

@section('title', 'BTS SIO SLAM - Portfolio de Mekaoui Reda') 

@section('content')

    <!-- Section Accueil -->
    <section id="accueil" class="section hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title fade-in">Bienvenue</h1>
                    <p class="hero-subtitle fade-in-delay-1">
                        Je suis <span class="highlight">Mekaoui Reda</span>, étudiant en BTS SIO option SLAM, passionné par le développement web et désireux de poursuivre ma carrière dans ce domaine.
                    </p>
                    <p class="hero-description fade-in-delay-2">
                        Actuellement en formation, je développe mes compétences en programmation, gestion de bases de données et conception d'applications. Mon objectif est de devenir développeur full-stack et de contribuer à des projets innovants.
                    </p>
                    <div class="hero-buttons fade-in-delay-3">
                        <a href="#projets" class="btn btn-primary">Voir mes projets</a>
                        <a href="#contact" class="btn btn-secondary">Me contacter</a>
                    </div>
                </div>
                <div class="hero-logo fade-in-delay-2">
                    <div class="logo-container">
                        <div class="logo-square">
                            <span class="logo-letter">M</span>
                        </div>
                        <h2 class="logo-name">Mekaoui</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Présentation -->
    <section id="presentation" class="section">
        <div class="container">
            <h2 class="section-title">Présentation</h2>
            <div class="presentation-grid">
                <div class="presentation-card">
                    <div class="card-icon">🎓</div>
                    <h3>Formation</h3>
                    <h4>BTS Services Informatiques aux Organisations (SIO)</h4>
                    <p class="highlight">Option SLAM (Solutions Logicielles et Applications Métiers)</p>
                    <p class="text-small">Avec l'option Mathématiques Approfondies.</p>
                    <h4>Baccalauréat Général</h4>
                    <p class="highlight">Option Mathématique et Physique-chimie</p>
                    <p>Obtenu en 2024 au Lycée Maurice Ravel à Paris 75020.</p>
                </div>
                <div class="presentation-card">
                    <div class="card-icon">💡</div>
                    <h3>Méthodologie & Atouts</h3>
                    <h4>Analyse & Conception</h4>
                    <p class="text-small">Compréhension des besoins utilisateurs et modélisation.</p>
                    <h4>Gestion de projet</h4>
                    <p class="text-small">Familiarité avec les méthodes Agiles et cycle en V pour le travail en équipe.</p>
                    <h4>Qualité logicielle</h4>
                    <p class="text-small">Écriture de code propre, commenté et versionné.</p>
                    <h4>Soft Skills</h4>
                    <p class="text-small">Curieux, autonome et force de proposition pour trouver des solutions.</p>
                </div>
                <div class="presentation-card">
                    <div class="card-icon">🎯</div>
                    <h3>Objectifs</h3>
                    <h4>Objectif Cursus</h4>
                    <p class="text-small">Poursuivre jusqu'au Master (via Licence) en spécialisation PHP.</p>
                    <h4>Objectif Expertise</h4>
                    <p class="text-small">Maîtriser les frameworks modernes (Laravel, React, Vue.js).</p>
                    <h4>Objectif Carrière</h4>
                    <p class="text-small">Évoluer à long terme vers un poste de Lead Développeur ou Architecte.</p>
                    <h4>Objectif Actuel</h4>
                    <p class="text-small">Trouver une alternance pour mettre en pratique ces connaissances.</p>
                </div>
            </div>
        </div> 
    </section>

    <!-- Section Compétences -->
    <section id="competences" class="section bg-dark">
        <div class="container">
            <h2 class="section-title">Compétences Techniques</h2>
            <div class="skills-grid">
                <div class="skill-category">
                    <h3 class="category-title">
                        <span class="category-icon">🌐</span>
                        Développement Web
                    </h3>
                    <div class="skills-list">
                        <div class="skill-item">
                            <div class="skill-name">HTML / CSS</div>
                            <div class="skill-bar">
                                <div class="skill-progress" data-progress="90"></div>
                            </div>
                            <span class="skill-percent">90%</span>
                        </div>
                        <div class="skill-item">
                            <div class="skill-name">JavaScript</div>
                            <div class="skill-bar">
                                <div class="skill-progress" data-progress="80"></div>
                            </div>
                            <span class="skill-percent">80%</span>
                        </div>
                        <div class="skill-item">
                            <div class="skill-name">PHP</div>
                            <div class="skill-bar">
                                <div class="skill-progress" data-progress="85"></div>
                            </div>
                            <span class="skill-percent">85%</span>
                        </div>
                        <div class="skill-item">
                            <div class="skill-name">Laravel</div>
                            <div class="skill-bar">
                                <div class="skill-progress" data-progress="75"></div>
                            </div>
                            <span class="skill-percent">75%</span>
                        </div>
                    </div>
                </div>

                <div class="skill-category">
                    <h3 class="category-title">
                        <span class="category-icon">🗄️</span>
                        Bases de Données
                    </h3>
                    <div class="skills-list">
                        <div class="skill-item">
                            <div class="skill-name">MySQL</div>
                            <div class="skill-bar">
                                <div class="skill-progress" data-progress="85"></div>
                            </div>
                            <span class="skill-percent">85%</span>
                        </div>
                        <div class="skill-item">
                            <div class="skill-name">PostgreSQL</div>
                            <div class="skill-bar">
                                <div class="skill-progress" data-progress="70"></div>
                            </div>
                            <span class="skill-percent">70%</span>
                        </div>
                        <div class="skill-item">
                            <div class="skill-name">MongoDB</div>
                            <div class="skill-bar">
                                <div class="skill-progress" data-progress="65"></div>
                            </div>
                            <span class="skill-percent">65%</span>
                        </div>
                    </div>
                </div>

                <div class="skill-category">
                    <h3 class="category-title">
                        <span class="category-icon">🛠️</span>
                        Outils & Frameworks
                    </h3>
                    <div class="skills-list">
                        <div class="skill-item">
                            <div class="skill-name">Git / GitHub</div>
                            <div class="skill-bar">
                                <div class="skill-progress" data-progress="80"></div>
                            </div>
                            <span class="skill-percent">80%</span>
                        </div>
                        <div class="skill-item">
                            <div class="skill-name">Bootstrap</div>
                            <div class="skill-bar">
                                <div class="skill-progress" data-progress="85"></div>
                            </div>
                            <span class="skill-percent">85%</span>
                        </div>
                        <div class="skill-item">
                            <div class="skill-name">API REST</div>
                            <div class="skill-bar">
                                <div class="skill-progress" data-progress="75"></div>
                            </div>
                            <span class="skill-percent">75%</span>
                        </div>
                    </div>
                </div>

                <div class="skill-category">
                    <h3 class="category-title">
                        <span class="category-icon">💻</span>
                        Autres Compétences
                    </h3>
                    <div class="skills-list">
                        <div class="skill-item">
                            <div class="skill-name">Python</div>
                            <div class="skill-bar">
                                <div class="skill-progress" data-progress="70"></div>
                            </div>
                            <span class="skill-percent">70%</span>
                        </div>
                        <div class="skill-item">
                            <div class="skill-name">Java</div>
                            <div class="skill-bar">
                                <div class="skill-progress" data-progress="65"></div>
                            </div>
                            <span class="skill-percent">65%</span>
                        </div>
                        <div class="skill-item">
                            <div class="skill-name">Linux</div>
                            <div class="skill-bar">
                                <div class="skill-progress" data-progress="75"></div>
                            </div>
                            <span class="skill-percent">75%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Projets -->
    <section id="projets" class="section">
        <div class="container">
            <h2 class="section-title">Projets & Réalisations</h2>
            <div class="projects-grid">
                <a href="/mon-portfolio" class="project-card">
                    <div class="project-image">
                        <div class="project-overlay">
                            {{-- Le lien est plus discret ici, car toute la carte est cliquable --}}
                            <span class="btn-view">Voir l'étude de cas</span> 
                        </div>
                    </div>
                    <div class="project-content">
                        <h3>Projet : Portfolio BTS SIO</h3>
                        <p>Conception et développement de ce portfolio pour l'épreuve E4 du BTS SIO SLAM.</p>
                        <div class="project-tags">
                            <span class="tag">Laravel/Blade</span>
                            <span class="tag">HTML/CSS</span>
                            <span class="tag">Responsive Design</span>
                        </div>
                    </div>
                </a>

                <div class="project-card">
                    <div class="project-image">
                        <div class="project-overlay">
                            <button class="btn-view" onclick="openModal('project2')">Voir détails</button>
                        </div>
                    </div>
                    <div class="project-content">
                        <h3>Projet 2 - API REST</h3>
                        <p>Création d'une API RESTful pour une application mobile de gestion de tâches.</p>
                        <div class="project-tags">
                            <span class="tag">PHP</span>
                            <span class="tag">API REST</span>
                            <span class="tag">JWT</span>
                        </div>
                    </div>
                </div>

                <div class="project-card">
                    <div class="project-image">
                        <div class="project-overlay">
                            <button class="btn-view" onclick="openModal('project3')">Voir détails</button>
                        </div>
                    </div>
                    <div class="project-content">
                        <h3>Projet 3 - Système de Gestion</h3>
                        <p>Application de gestion de stock pour une entreprise locale.</p>
                        <div class="project-tags">
                            <span class="tag">JavaScript</span>
                            <span class="tag">PHP</span>
                            <span class="tag">PostgreSQL</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Contexte Professionnel -->
    <section id="contexte" class="section bg-dark">
        <div class="container">
            <h2 class="section-title">Contexte Professionnel</h2>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3>Stage - Développeur Web</h3>
                        <p class="timeline-date">Entreprise XYZ • 2024 - 2025</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Développement de fonctionnalités pour le site web principal de l'entreprise. Maintenance et optimisation du code existant. Collaboration avec l'équipe technique pour la mise en place de nouvelles solutions.</p>
                        <ul class="missions-list">
                            <li>Développement de modules PHP pour le CMS interne</li>
                            <li>Optimisation des requêtes SQL et amélioration des performances</li>
                            <li>Intégration de templates responsive</li>
                            <li>Tests unitaires et débogage</li>
                        </ul>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3>Projet Tutoré - Application Mobile</h3>
                        <p class="timeline-date">BTS SIO • 2024</p>
                        <p>Conception et développement d'une application de gestion pour les étudiants. Travail en équipe avec méthode Agile. Présentation du projet devant un jury professionnel.</p>
                        <ul class="missions-list">
                            <li>Analyse des besoins et rédaction du cahier des charges</li>
                            <li>Développement du backend avec Laravel</li>
                            <li>Documentation technique complète</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Veille Technologique -->
    <section id="veille" class="section">
        <div class="container">
            <h2 class="section-title">Veille Technologique</h2>
            <div class="veille-intro">
                <p>Dans le cadre de ma formation en BTS SIO, je maintiens une veille technologique active pour rester informé des dernières évolutions dans le domaine du développement web et des technologies informatiques.</p>
            </div>
            <div class="veille-grid">
                <div class="veille-card">
                    <div class="veille-header">
                        <h3>Intelligence Artificielle et Développement Web</h3>
                        <span class="veille-date">Octobre 2024</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. L'intelligence artificielle transforme profondément le développement web moderne. Les outils comme GitHub Copilot et ChatGPT révolutionnent la façon dont les développeurs écrivent du code.</p>
                    <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Les frameworks de machine learning permettent maintenant d'intégrer des fonctionnalités intelligentes directement dans les applications web.</p>
                    <div class="veille-tags">N
                        <span class="tag">IA</span>
                        <span class="tag">Machine Learning</span>
                        <span class="tag">Automatisation</span>
                    </div>
                </div>

                <div class="veille-card">
                    <div class="veille-header">
                        <h3>Sécurité Web et Protection des Données</h3>
                        <span class="veille-date">Septembre 2024</span>
                    </div>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris. La sécurité des applications web est devenue primordiale avec l'augmentation des cyberattaques. Les développeurs doivent maîtriser les bonnes pratiques de sécurisation.</p>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore. Les normes comme RGPD imposent des contraintes strictes sur la gestion des données personnelles.</p>
                    <div class="veille-tags">
                        <span class="tag">Sécurité</span>
                        <span class="tag">RGPD</span>
                        <span class="tag">Cybersécurité</span>
                    </div>
                </div>
            </div>
            <div class="veille-sources">
                <h3>Mes Sources de Veille</h3>
                <ul>
                    <li>🌐 Sites spécialisés : Developer.mozilla.org, CSS-Tricks, Smashing Magazine</li>
                    <li>📰 Newsletters : JavaScript Weekly, Laravel News</li>
                    <li>🎥 YouTube : Channels techniques de développement web</li>
                    <li>📱 Réseaux sociaux : Twitter tech, LinkedIn, Dev.to</li>
                    <li>📚 Documentation officielle des frameworks utilisés</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Section Contact -->
    <section id="contact" class="section bg-dark">
        <div class="container">
            <h2 class="section-title">Me Contacter</h2>
            <div class="contact-content">
                <div class="contact-info">
                    <h3>Informations</h3>
                    <div class="contact-item">
                        <span class="contact-icon">📧</span>
                        <div>
                            <p class="contact-label">Email</p>
                            <p>votre.email@exemple.com</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">📱</span>
                        <div>
                            <p class="contact-label">Téléphone</p>
                            <p>+33 6 XX XX XX XX</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">📍</span>
                        <div>
                            <p class="contact-label">Localisation</p>
                            <p>Paris, France</p>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="https://github.com/Rivalzina75" class="social-link" title="GitHub">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-link" title="LinkedIn">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <form id="contactForm" class="contact-form" action="{{ route('portfolio.contact.submit') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="name">Nom complet</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Sujet</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-submit">
                        Envoyer le message
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Modals for Projects -->
    

    <!-- <div id="project2" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('project2')">&times;</span>
            <h2>API REST - Gestion de Tâches</h2>
            <div class="modal-body">
                <h3>Description du Projet</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Développement d'une API RESTful complète pour une application mobile de gestion de tâches avec authentification JWT.</p>

                <h3>Technologies Utilisées</h3>
                <ul>
                    <li>PHP 8.2</li>
                    <li>API REST avec architecture MVC</li>
                    <li>JWT pour l'authentification</li>
                    <li>MySQL pour le stockage des données</li>
                </ul>

                <h3>Endpoints Principaux</h3>
                <ul>
                    <li>POST /api/auth/login - Authentification</li>
                    <li>GET /api/tasks - Liste des tâches</li>
                    <li>POST /api/tasks - Création de tâche</li>
                    <li>PUT /api/tasks/{id} - Modification</li>
                    <li>DELETE /api/tasks/{id} - Suppression</li>
                </ul>

                <h3>Compétences Développées</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation. Maîtrise des principes REST, sécurisation des API, gestion des tokens JWT, et documentation avec Swagger.</p>
            </div>
        </div>
    </div> -->

    <!-- <div id="project3" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('project3')">&times;</span>
            <h2>Système de Gestion de Stock</h2>
            <div class="modal-body">
                <h3>Description du Projet</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Application web de gestion de stock développée pour une entreprise locale, permettant le suivi en temps réel des produits.</p>

                <h3>Technologies Utilisées</h3>
                <ul>
                    <li>JavaScript (ES6+)</li>
                    <li>PHP pour le backend</li>
                    <li>PostgreSQL pour la base de données</li>
                    <li>Chart.js pour les graphiques</li>
                </ul>

                <h3>Fonctionnalités</h3>
                <ul>
                    <li>Dashboard avec statistiques en temps réel</li>
                    <li>Gestion des entrées et sorties de stock</li>
                    <li>Alertes automatiques pour les stocks faibles</li>
                    <li>Génération de rapports PDF</li>
                    <li>Système de codes-barres</li>
                </ul>

                <h3>Résultats</h3>
                <p>Duis aute irure dolor in reprehenderit. L'application a permis à l'entreprise de réduire de 30% le temps de gestion du stock et d'éviter les ruptures de stock.</p>
            </div>
        </div>
    </div> -->
@endsection
</body>
</html>
