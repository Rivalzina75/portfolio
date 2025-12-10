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
            <div class="skills-columns">
                {{-- Colonne 1: Langages --}}
                <div class="skill-column">
                    <h3 class="column-title">Langages</h3>
                    <div class="skills-list">
                        @foreach ([
                            ['PHP', 'php-original.svg'],
                            ['JavaScript', 'javascript-plain.svg'],
                            ['Python', 'python-original.svg'],
                            ['Java', 'java-original.svg'],
                            ['C', 'c-original.svg'],
                            ['HTML5', 'html5-plain.svg'],
                            ['CSS3', 'css3-plain.svg'],
                        ] as [$label, $icon])
                            <div class="skill-item">
                                <img src="{{ asset('icons/' . $icon) }}"
                                     alt="{{ $label }}"
                                     loading="lazy"
                                     width="40"
                                     height="40">
                                <p>{{ $label }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Colonne 2: Frameworks & Infrastructure --}}
                <div class="skill-column">
                    <h3 class="column-title">Frameworks & Stack</h3>
                    <div class="skills-list">
                        @foreach ([
                            ['Laravel', 'laravel-original.svg'],
                            ['Docker', 'docker-plain-wordmark.svg'],
                            ['Linux', 'linux-original.svg'],
                            ['Git', 'git-plain.svg'],
                            ['GitHub', 'github-original.svg'],
                            ['Vite', 'vitejs-original.svg'],
                            ['Composer', 'composer-original.svg'],
                            ['NPM', 'npm-original.svg'],
                        ] as [$label, $icon])
                            <div class="skill-item">
                                <img src="{{ asset('icons/' . $icon) }}"
                                     alt="{{ $label }}"
                                     loading="lazy"
                                     width="40"
                                     height="40">
                                <p>{{ $label }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Colonne 3: Outils & Bases de données --}}
                <div class="skill-column">
                    <h3 class="column-title">Outils & BD</h3>
                    <div class="skills-list">
                        @foreach ([
                            ['MySQL', 'mysql-original.svg'],
                            ['VS Code', 'vscode-original.svg'],
                            ['IntelliJ IDEA', 'intellij-original.svg'],
                        ] as [$label, $icon])
                            <div class="skill-item">
                                <img src="{{ asset('icons/' . $icon) }}"
                                     alt="{{ $label }}"
                                     loading="lazy"
                                     width="40"
                                     height="40">
                                <p>{{ $label }}</p>
                            </div>
                        @endforeach
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
                        <p class="mini-label">LinkedIn</p>
                        <p class="mini-value">reda-mekaoui</p>
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
