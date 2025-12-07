@extends('layouts.app')

@section('title', 'Portfolio BTS SIO SLAM – Mekaoui Reda')

@section('content')
    <section id="accueil" class="section hero">
        <div class="container hero-simple">
            <p class="eyebrow">BTS SIO SLAM • Promotion 2025</p>
            <h1>Développeur full-stack en devenir.</h1>
            <p class="lede">
                Je conçois des applications web modernes avec Laravel, un front soigné et un delivery rigoureux.
            </p>
            <div class="hero-cta">
                <a class="btn primary" href="#projets">Voir mes projets</a>
                <a class="btn ghost" href="#contact">Discuter</a>
            </div>
            <div class="hero-badges">
                <span class="badge">Laravel • Blade • Vite</span>
                <span class="badge accent">Alternance 2025</span>
            </div>
        </div>
    </section>

    <section id="presentation" class="section">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">Parcours</p>
                <h2>Présentation & méthode</h2>
                <p class="lede">Une approche centrée sur la valeur livrée et la clarté du code.</p>
            </div>
            <div class="cards-grid three">
                <article class="card">
                    <div class="card-icon">🎓</div>
                    <h3>Formation</h3>
                    <ul class="list">
                        <li>BTS SIO option SLAM (2024–2025)</li>
                        <li>Bac général Maths & Physique</li>
                        <li>Projets : API, dashboards, sites</li>
                    </ul>
                </article>
                <article class="card">
                    <div class="card-icon">🛠️</div>
                    <h3>Approche</h3>
                    <ul class="list">
                        <li>User stories, maquettes, validation</li>
                        <li>Git flow, tests, révisions</li>
                        <li>Doc schémas & endpoints</li>
                    </ul>
                </article>
                <article class="card">
                    <div class="card-icon">🎯</div>
                    <h3>Objectifs</h3>
                    <ul class="list">
                        <li>Expertise Laravel + front (Vite)</li>
                        <li>Qualité et performance</li>
                        <li>Full-stack autonome</li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    <section id="competences" class="section muted">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">Stack</p>
                <h2>Technologies maîtrisées</h2>
                <p class="lede">Langages, frameworks et outils du quotidien.</p>
            </div>
            <div class="skills-block">
                <div class="skills-grid">
                    @foreach ([
                        ['HTML5', 'html5-plain.svg'],
                        ['CSS3', 'css3-plain.svg'],
                        ['JavaScript', 'javascript-plain.svg'],
                        ['PHP 8', 'php-original.svg'],
                        ['Laravel', 'laravel-original.svg'],
                        ['MySQL', 'mysql-original.svg'],
                        ['Docker', 'docker-plain-wordmark.svg'],
                        ['Linux', 'linux-original.svg'],
                        ['Git', 'git-plain.svg'],
                        ['GitHub', 'github-original.svg'],
                        ['Composer', 'composer-original.svg'],
                        ['NPM', 'npm-original.svg'],
                        ['Python', 'python-original.svg'],
                        ['Java', 'java-original.svg'],
                        ['Langage C', 'c-original.svg'],
                    ] as [$label, $icon])
                        <div class="skill-card">
                            <img src="{{ asset('icons/' . $icon) }}" alt="{{ $label }}" loading="lazy">
                            <p>{{ $label }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="skill-summary">
                    <div class="summary-box">
                        <p class="mini-label">Frontend</p>
                        <p>HTML5, CSS3, JavaScript, Vite, animations personnalisées</p>
                    </div>
                    <div class="summary-box">
                        <p class="mini-label">Backend</p>
                        <p>Laravel 10, PHP 8, Eloquent, middlewares, Mailables</p>
                    </div>
                    <div class="summary-box">
                        <p class="mini-label">Infrastruc.</p>
                        <p>Docker/Sail, Linux, MySQL, CI/CD basique, Git</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="projets" class="section">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">Projets</p>
                <h2>Études de cas</h2>
                <p class="lede">Cliquez pour explorer chaque projet en détail.</p>
            </div>
            <div class="carousel-shell">
                <div class="carousel-controls">
                    <button class="carousel-btn carousel-prev" aria-label="Projet précédent" title="Précédent">←</button>
                    <div class="carousel-dots">
                        <span class="dot active" data-slide="0"></span>
                        <span class="dot" data-slide="1"></span>
                        <span class="dot" data-slide="2"></span>
                        <span class="dot" data-slide="3"></span>
                        <span class="dot" data-slide="4"></span>
                    </div>
                    <button class="carousel-btn carousel-next" aria-label="Projet suivant" title="Suivant">→</button>
                </div>
                <div class="carousel-track" id="carouselTrack">
                    <!-- Slide 1 -->
                    <div class="carousel-slide">
                        <div class="project-card-full">
                            <div class="card-badge">Laravel • Vite</div>
                            <h3>Portfolio BTS SIO (E4)</h3>
                            <p class="project-desc">Site vitrine personnel avec sections ancrées, carrousel de compétences, particules animées et formulaire de contact intégré.</p>
                            <div class="project-highlights">
                                <span>Architecture Blade modulaire</span>
                                <span>Animations CSS + Canvas</span>
                                <span>Formulaire AJAX</span>
                            </div>
                            <div class="project-tech">
                                <span class="tech-tag">Laravel 10</span>
                                <span class="tech-tag">Vite</span>
                                <span class="tech-tag">JavaScript</span>
                                <span class="tech-tag">CSS3</span>
                            </div>
                            <a href="#contact" class="btn primary btn-small">Discuter du projet</a>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-slide">
                        <div class="project-card-full">
                            <div class="card-badge">API REST</div>
                            <h3>API Gestion de tâches</h3>
                            <p class="project-desc">Backend RESTful sécurisé avec authentification JWT, routes protégées et validation des données. Documentation complète et tests Postman.</p>
                            <div class="project-highlights">
                                <span>Authentification JWT</span>
                                <span>Rôles & permissions</span>
                                <span>Tests PHPUnit</span>
                            </div>
                            <div class="project-tech">
                                <span class="tech-tag">Laravel</span>
                                <span class="tech-tag">REST API</span>
                                <span class="tech-tag">JWT Auth</span>
                                <span class="tech-tag">MySQL</span>
                            </div>
                            <a href="#contact" class="btn ghost btn-small">Voir la doc</a>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-slide">
                        <div class="project-card-full">
                            <div class="card-badge">Dashboard</div>
                            <h3>Suivi de stock web</h3>
                            <p class="project-desc">Application de gestion d'inventaire pour TPE. Imports CSV, alertes temps réel, graphiques et exports PDF/Excel.</p>
                            <div class="project-highlights">
                                <span>Modèle SQL complexe</span>
                                <span>UI responsive & fluide</span>
                                <span>Exports multiformats</span>
                            </div>
                            <div class="project-tech">
                                <span class="tech-tag">Laravel</span>
                                <span class="tech-tag">MySQL</span>
                                <span class="tech-tag">CSV Parser</span>
                                <span class="tech-tag">Charts.js</span>
                            </div>
                            <a href="#contact" class="btn ghost btn-small">Détails</a>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="carousel-slide">
                        <div class="project-card-full">
                            <div class="card-badge">Web App</div>
                            <h3>Plateforme événements étudiants</h3>
                            <p class="project-desc">Application complète pour organiser et consulter des événements. Notifications par email, système de réservation et panneau admin.</p>
                            <div class="project-highlights">
                                <span>Mailables transactionnels</span>
                                <span>Authentification OAuth</span>
                                <span>Admin panel</span>
                            </div>
                            <div class="project-tech">
                                <span class="tech-tag">Laravel</span>
                                <span class="tech-tag">PHP Mail</span>
                                <span class="tech-tag">Docker</span>
                                <span class="tech-tag">PostgreSQL</span>
                            </div>
                            <a href="#contact" class="btn ghost btn-small">Démo</a>
                        </div>
                    </div>

                    <!-- Slide 5 -->
                    <div class="carousel-slide">
                        <div class="project-card-full">
                            <div class="card-badge">Automation</div>
                            <h3>Scripts d'optimisation PHP</h3>
                            <p class="project-desc">Outils CLI pour automatiser les tâches : cleanup de base, génération de rapports et migrations de données.</p>
                            <div class="project-highlights">
                                <span>Commands Laravel</span>
                                <span>Batch processing</span>
                                <span>Logging & monitoring</span>
                            </div>
                            <div class="project-tech">
                                <span class="tech-tag">PHP 8</span>
                                <span class="tech-tag">Laravel Commands</span>
                                <span class="tech-tag">MySQL</span>
                                <span class="tech-tag">Bash</span>
                            </div>
                            <a href="#contact" class="btn ghost btn-small">Code</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="section muted">
        <div class="container contact-shell">
            <div class="contact-intro">
                <p class="eyebrow">Parlons ensemble</p>
                <h2>Envoyez un message</h2>
                <p class="lede">Alternance, collaboration, question : je réponds rapidement.</p>
                <div class="contact-cards">
                    <div class="info-card">
                        <p class="mini-label">Email</p>
                        <p class="mini-value">reda.mekaoui.pro@gmail.com</p>
                    </div>
                    <div class="info-card">
                        <p class="mini-label">Téléphone</p>
                        <p class="mini-value">+33 6 00 00 00 00</p>
                    </div>
                </div>
            </div>
            <form id="contactForm" class="contact-form" action="{{ route('portfolio.contact.submit') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name" placeholder="Votre nom" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="vous@email.com" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject">Sujet</label>
                    <input type="text" id="subject" name="subject" placeholder="Alternance, projet, question..." required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" placeholder="Détails..." required></textarea>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn primary btn-submit">Envoyer</button>
                    <p class="form-hint" id="formStatus" role="status" aria-live="polite"></p>
                </div>
            </form>
        </div>
    </section>
@endsection
