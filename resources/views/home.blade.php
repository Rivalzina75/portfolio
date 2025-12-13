@extends('layouts.app')

@section('title', 'Portfolio BTS SIO SLAM – Mekaoui Reda')
@section('description', 'Portfolio professionnel de Mekaoui Reda, étudiant en BTS SIO option SLAM. Développeur full-stack junior.')

@section('content')
    {{-- ========== HERO SECTION ========== --}}
    <section id="accueil" class="section hero">
        <div class="container hero-simple">
            <p class="eyebrow">BTS SIO SLAM • 2024-2026</p>
            <svg class="hero-title" viewBox="0 0 800 100" width="100%" height="auto" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                    <text class="line" x="50%" y="75" text-anchor="middle" font-size="70" font-weight="bold" font-family="'Poppins', sans-serif">Reda Mekaoui</text>
                </g>
            </svg>
            <p class="hero-subtitle">Développeur full-stack en devenir</p>
            <p class="lede">
                Je conçois des applications web modernes avec Laravel et JavaScript,
                en privilégiant la maintenabilité, la performance et l'expérience utilisateur.
            </p>
            <div class="hero-cta">
                <a class="btn primary" href="#presentation">En savoir plus</a>
            </div>
        </div>
    </section>

    {{-- ========== PRESENTATION SECTION ========== --}}
    <section id="presentation" class="section">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">Qui suis-je ?</p>
                <h2>Présentation & méthode</h2>
                <p class="lede">
                    Une approche méthodique centrée sur la valeur livrée,
                    la maintenabilité du code et l'expérience utilisateur.
                </p>
            </div>
            <div class="cards-grid three">
                <article class="card">
                    <div class="card-icon">👤</div>
                    <h3>Qui je suis</h3>
                    <ul class="list">
                        <li>Étudiant passionné par le développement web</li>
                        <li>Focus Laravel, API REST et front soigné</li>
                        <li>Recherche alternance / stage dès 2025</li>
                        <li>Bac général spé. Maths & Physique-Chimie</li>
                    </ul>
                </article>
                <article class="card">
                    <div class="card-icon">🛠️</div>
                    <h3>Ce que je fais</h3>
                    <ul class="list">
                        <li>Applications web Laravel (API, dashboards, sites)</li>
                        <li>Frontend réactif avec Vite, JS et CSS</li>
                        <li>Git, bonnes pratiques, revues de code</li>
                        <li>Tests & validation (fonctionnel, intégration)</li>
                        <li>Performance, accessibilité et UX</li>
                    </ul>
                </article>
                <article class="card">
                    <div class="card-icon">🎓</div>
                    <h3>BTS SIO & option SLAM</h3>
                    <ul class="list">
                        <li>BTS SIO : support et solutions informatiques</li>
                        <li>Option SLAM : conception, dev et tests d'applications</li>
                        <li>Bases solides : UML, bases de données, sécurité</li>
                        <li>Projets : API REST, dashboards, sites vitrines</li>
                        <li>Objectif : livrer des solutions fiables et maintenables</li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    {{-- ========== PARCOURS TIMELINE SECTION ========== --}}
    <section id="parcours" class="section">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">Chronologie</p>
                <h2>Mon parcours</h2>
                <p class="lede">Parcours académique et professionnel</p>
            </div>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3>2024-2026 - BTS SIO SLAM</h3>
                        <p>BTS Services Informatiques aux Organisations, option Solutions Logicielles et Applications Métiers</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3>2024 - Baccalauréat Général</h3>
                        <p>Obtention du Baccalauréat général spécialités Mathématiques et Physique-Chimie</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ========== COMPETENCES SECTION ========== --}}
    <section id="competences" class="section muted">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">Stack technique</p>
                <h2>Technologies & outils maîtrisés</h2>
                <p class="lede">
                    Langages, frameworks et outils utilisés quotidiennement
                    dans mes projets professionnels et personnels.
                </p>
            </div>
            <div class="skills-tabs">
                <div role="tablist" aria-label="Catégories de compétences" class="skills-nav">
                    <button role="tab" class="skill-tab is-active" aria-selected="true" data-target="langages">Langages</button>
                    <button role="tab" class="skill-tab" aria-selected="false" data-target="frameworks">Frameworks</button>
                    <button role="tab" class="skill-tab" aria-selected="false" data-target="stack">Stack / Env.</button>
                    <button role="tab" class="skill-tab" aria-selected="false" data-target="bdd">BDD</button>
                    <button role="tab" class="skill-tab" aria-selected="false" data-target="outils">Outils</button>
                </div>

                <div class="skills-panel">
                    <div class="panel-content">
                        <div class="panel-group is-active" id="langages" role="tabpanel">
                            <div class="skill-item"><img src="{{ asset('icons/php-original.svg') }}" alt="PHP" width="40" height="40"><p>PHP</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/javascript-plain.svg') }}" alt="JavaScript" width="40" height="40"><p>JavaScript</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/python-original.svg') }}" alt="Python" width="40" height="40"><p>Python</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/html5-plain.svg') }}" alt="HTML5" width="40" height="40"><p>HTML5</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/css3-plain.svg') }}" alt="CSS3" width="40" height="40"><p>CSS3</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/java-original.svg') }}" alt="SQL" width="40" height="40"><p>Java</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/c-original.svg') }}" alt="C" width="40" height="40"><p>C</p></div>
                        </div>

                        <div class="panel-group" id="frameworks" role="tabpanel" aria-hidden>
                            <div class="skill-item"><img src="{{ asset('icons/laravel-original.svg') }}" alt="Laravel" width="40" height="40"><p>Laravel</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/vitejs-original.svg') }}" alt="Vite" width="40" height="40"><p>Vite</p></div>
                        </div>

                        <div class="panel-group" id="stack" role="tabpanel" aria-hidden>
                            <div class="skill-item"><img src="{{ asset('icons/docker-plain-wordmark.svg') }}" alt="Docker" width="40" height="40"><p>Docker</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/linux-original.svg') }}" alt="Linux" width="40" height="40"><p>Linux</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/composer-original.svg') }}" alt="Composer" width="40" height="40"><p>Composer</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/npm-original.svg') }}" alt="NPM" width="40" height="40"><p>NPM</p></div>
                        </div>

                        <div class="panel-group" id="bdd" role="tabpanel" aria-hidden>
                            <div class="skill-item"><img src="{{ asset('icons/mysql-original.svg') }}" alt="MySQL" width="40" height="40"><p>MySQL</p></div>
                        </div>

                        <div class="panel-group" id="outils" role="tabpanel" aria-hidden>
                            <div class="skill-item"><img src="{{ asset('icons/git-plain.svg') }}" alt="Git" width="40" height="40"><p>Git</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/github-original.svg') }}" alt="GitHub" width="40" height="40"><p>GitHub</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/intellij-original.svg') }}" alt="IntelliJ IDEA" width="40" height="40"><p>IntelliJ IDEA</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/vscode-original.svg') }}" alt="Visual Studio Code" width="40" height="40"><p>VS Code</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ========== PROJETS SECTION ========== --}}
    <section id="projets" class="section">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">Réalisations</p>
                <h2>Projets & études de cas</h2>
            </div>

            <div class="projects-carousel">
                <button class="carousel-nav carousel-prev" aria-label="Précédent">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <div class="swiper projects-swiper">
                    <div class="swiper-wrapper">
                        <!-- Projet 1 -->
                        <div class="swiper-slide">
                            <div class="project-card">
                                <div class="project-preview">
                                    <div class="project-mockup">
                                        <div class="mockup-header">
                                            <span class="mockup-dot"></span>
                                            <span class="mockup-dot"></span>
                                            <span class="mockup-dot"></span>
                                        </div>
                                        <div class="mockup-content">
                                            <img src="{{ asset('images/project-1.png') }}" alt="Portfolio Personnel">
                                        </div>
                                    </div>
                                </div>
                                <div class="project-info">
                                    <h3>Portfolio Personnel</h3>
                                    <p>Site web personnel développé avec Laravel et Vite. Design moderne avec animations SVG et particules interactives.</p>
                                    <div class="project-tags">
                                        <span class="tag">Laravel</span>
                                        <span class="tag">JavaScript</span>
                                        <span class="tag">CSS3</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Projet 2 -->
                        <div class="swiper-slide">
                            <div class="project-card">
                                <div class="project-preview">
                                    <div class="project-mockup">
                                        <div class="mockup-header">
                                            <span class="mockup-dot"></span>
                                            <span class="mockup-dot"></span>
                                            <span class="mockup-dot"></span>
                                        </div>
                                        <div class="mockup-content">
                                            <img src="{{ asset('images/project-2.png') }}" alt="Application de Gestion">
                                        </div>
                                    </div>
                                </div>
                                <div class="project-info">
                                    <h3>Application de Gestion</h3>
                                    <p>Application web de gestion avec système d'authentification, tableaux de bord et génération de rapports.</p>
                                    <div class="project-tags">
                                        <span class="tag">PHP</span>
                                        <span class="tag">MySQL</span>
                                        <span class="tag">Docker</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Projet 3 -->
                        <div class="swiper-slide">
                            <div class="project-card">
                                <div class="project-preview">
                                    <div class="project-mockup">
                                        <div class="mockup-header">
                                            <span class="mockup-dot"></span>
                                            <span class="mockup-dot"></span>
                                            <span class="mockup-dot"></span>
                                        </div>
                                        <div class="mockup-content">
                                            <img src="{{ asset('images/project-3.png') }}" alt="API REST">
                                        </div>
                                    </div>
                                </div>
                                <div class="project-info">
                                    <h3>API REST</h3>
                                    <p>API RESTful complète avec documentation Swagger, authentification JWT et tests automatisés.</p>
                                    <div class="project-tags">
                                        <span class="tag">Laravel</span>
                                        <span class="tag">API</span>
                                        <span class="tag">PHPUnit</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

                <button class="carousel-nav carousel-next" aria-label="Suivant">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </div>
    </section>

    {{-- ========== VEILLE TECHNOLOGIQUE SECTION ========== --}}
    <section id="veille" class="section muted">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">Innovation & Apprentissage</p>
                <h2>Veille technologique</h2>
            </div>
        </div>
    </section>

    {{-- ========== CONTACT SECTION ========== --}}
    <section id="contact" class="section">
        <div class="container contact-shell">
            <div class="contact-intro">
                <p class="eyebrow">Parlons ensemble</p>
                <h2>Envoyez-moi un message</h2>
                <p class="lede">
                    Alternance, collaboration, projet ou simple question :
                    je réponds généralement sous 24h.
                </p>
                <div class="contact-cards">
                    <div class="info-card">
                        <p class="mini-label">Email</p>
                        <p class="mini-value">reda.dev75@gmail.com</p>
                    </div>
                    <div class="info-card">
                        <p class="mini-label">Téléphone</p>
                        <p class="mini-value">+33 7 64 39 97 66</p>
                    </div>
                    <div class="info-card">
                        <p class="mini-label">Disponibilité</p>
                        <p class="mini-value">Immédiate</p>
                    </div>
                </div>
            </div>

            <form id="contactForm" class="contact-form" action="{{ route('portfolio.contact.submit') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Nom complet</label>
                        <input type="text"
                               id="name"
                               name="name"
                               placeholder="Votre nom"
                               required
                               autocomplete="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email"
                               id="email"
                               name="email"
                               placeholder="vous@email.com"
                               required
                               autocomplete="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject">Sujet</label>
                    <input type="text"
                           id="subject"
                           name="subject"
                           placeholder="Alternance, projet, question..."
                           required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message"
                              name="message"
                              rows="5"
                              placeholder="Décrivez votre demande en quelques lignes..."
                              required></textarea>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn primary btn-submit">
                        Envoyer le message
                    </button>
                    <p class="form-hint" id="formStatus" role="status" aria-live="polite"></p>
                </div>
            </form>
        </div>
    </section>
@endsection
