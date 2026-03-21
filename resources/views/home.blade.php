@extends('layouts.app')

@section('title', __('Portfolio Title'))
@section('description', __('Portfolio Description'))

@section('content')
    {{-- Pass articles data to JavaScript --}}
    <script>
        window.__VEILLE_ARTICLES__ = @json($articles ?? []);
    </script>
    {{-- ========== HERO SECTION ========== --}}
    <section id="accueil" class="section hero">
        <div class="container hero-simple">
            <p class="eyebrow">{{ __('BTS SIO SLAM') }} • 2024-2026</p>
            <svg class="hero-title" viewBox="0 0 800 100" width="100%" height="auto" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                    <text class="line" x="50%" y="75" text-anchor="middle" font-size="70" font-weight="bold" font-family="'Poppins', sans-serif">Reda Mekaoui</text>
                </g>
            </svg>
            <p class="hero-subtitle">{{ __('Full-stack developer in the making') }}</p>

            <div class="hero-cta">
                <a class="btn primary" href="#presentation">{{ __('Learn more') }}</a>
                <a class="btn ghost" href="{{ route('portfolio.cv') }}" download aria-label="{{ __('Download CV') }}">{{ __('Download my CV') }}</a>
            </div>
        </div>
    </section>

    {{-- ========== PRESENTATION SECTION ========== --}}
  <section id="presentation" class="section">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">{{ __('My journey') }}</p>
            <h2>{{ __('Presentation & Curriculum') }}</h2>
        </div>

        <div class="presentation-grid">
            
            <div class="grid-block cursus-frame">
                <div class="block-header">
                    <span class="icon">🏛️</span>
                    <h3>{{ __('The framework: BTS SIO') }}</h3>
                </div>
                <p class="block-intro">{{ __('BTS SIO Description') }}</p>
                <div class="options-flex">
                    <div class="option-item sisr">
                        <strong>{{ __('SISR') }} :</strong> {{ __('SISR Description') }}
                    </div>
                    <div class="option-item slam-highlight">
                        <strong>{{ __('SLAM') }} :</strong> {{ __('SLAM Description') }}
                    </div>
                </div>
            </div>

            <div class="grid-block my-choice">
                 <div class="block-header">
                    <span class="icon">🎯</span>
                    <h3>{{ __('My specialization choice') }}</h3>
                </div>
                <ul class="clean-list highlight-list">
                     <li><strong>{{ __('SLAM Option') }} :</strong> {{ __('SLAM Option Description') }}</li>
                     <li><strong>{{ __('Advanced Mathematics Option') }} :</strong> {{ __('Advanced Mathematics Description') }}</li>
                     <li class="status-tag">{{ __('Currently in 2nd year') }}</li>
                </ul>
            </div>

            <div class="grid-block profile-skills">
                 <div class="block-header">
                    <span class="icon">🧠</span>
                    <h3>{{ __('Who I am & My strengths') }}</h3>
                </div>
                <p class="profile-summary">
                    {!! __('Profile Summary') !!}
                </p>
                <div class="skills-tags">
                    <span class="skill-tag">{{ __('Autonomy & Research') }}</span>
                    <span class="skill-tag">{{ __('Algorithmic logic') }}</span>
                    <span class="skill-tag">{{ __('Teamwork') }}</span>
                    <span class="skill-tag">{{ __('Rigor (Clean Code)') }}</span>
                    <span class="skill-tag">{{ __('Tech curiosity') }}</span>
                </div>
            </div>

        </div>
    </div>
</section>

    {{-- ========== PARCOURS TIMELINE SECTION ========== --}}
    <section id="parcours" class="section">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">{{ __('Timeline') }}</p>
                <h2>{{ __('My path') }}</h2>
                <p class="lede">{{ __('Academic path') }}</p>
            </div>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3>{{ __('2024-2026 - BTS SIO SLAM') }}</h3>
                        <p>{{ __('BTS SIO SLAM Description') }}</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3>{{ __('2024 - General Baccalaureate') }}</h3>
                        <p>{{ __('Baccalaureate Description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   {{-- ========== EXPERIENCE SECTION ========== --}}
<section id="experience" class="section">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">{{ __('Professional Path') }}</p>
            <h2>{{ __('Professional experiences') }}</h2>
            <p class="lede">{{ __('Practical application') }}</p>
        </div>

        <div class="xp-grid">

            {{-- ---- STAGE 2 : OhLogiciel / Scootup ---- --}}
            <article class="xp-card xp-card--featured">
                <div class="xp-card__header">
                    <div class="xp-card__meta">
                        <span class="xp-badge xp-badge--new">{{ app()->getLocale() == 'fr' ? '2ème année' : '2nd year' }}</span>
                        <span class="xp-date">Janv. – Fév. 2026 · 5 {{ app()->getLocale() == 'fr' ? 'semaines' : 'weeks' }}</span>
                    </div>
                    <div class="xp-card__title-row">
                        <div>
                            <p class="xp-company">OhLogiciel</p>
                            <h3 class="xp-role">{{ app()->getLocale() == 'fr' ? 'Développeur Fullstack Mobile & Backend' : 'Fullstack Mobile & Backend Developer' }}</h3>
                        </div>
                        <div class="xp-icon xp-icon--scootup">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                        </div>
                    </div>
                    <p class="xp-project-label">{{ app()->getLocale() == 'fr' ? 'Projet' : 'Project' }} : <strong>Scootup</strong> — {{ app()->getLocale() == 'fr' ? 'Solution de stationnement sécurisé pour trottinettes électriques' : 'Secure e-scooter parking solution' }}</p>
                </div>

                <div class="xp-card__body">
                    <div class="xp-missions">
                        <p class="xp-missions__label">{{ app()->getLocale() == 'fr' ? 'Missions principales' : 'Key missions' }}</p>
                        <ul>
                            <li>{{ app()->getLocale() == 'fr' ? 'Développement complet de l\'application mobile client (React Native + Expo + TypeScript)' : 'Full development of the client mobile app (React Native + Expo + TypeScript)' }}</li>
                            <li>{{ app()->getLocale() == 'fr' ? 'Conception et développement du backend REST API (NestJS + Prisma + PostgreSQL + PostGIS)' : 'Design & development of the REST API backend (NestJS + Prisma + PostgreSQL + PostGIS)' }}</li>
                            <li>{{ app()->getLocale() == 'fr' ? 'Intégration paiement Stripe (SetupIntent), authentification Firebase SMS, filtrage géospatial' : 'Stripe payment integration (SetupIntent), Firebase SMS auth, geospatial filtering' }}</li>
                            <li>{{ app()->getLocale() == 'fr' ? 'Pipeline CI/CD GitLab avec Docker — 78 tests Jest + Supertest à 93,23% de couverture' : 'GitLab CI/CD pipeline with Docker — 78 Jest + Supertest tests at 93.23% coverage' }}</li>
                        </ul>
                    </div>

                    <div class="xp-stats">
                        <div class="xp-stat">
                            <span class="xp-stat__value">93%</span>
                            <span class="xp-stat__label">{{ app()->getLocale() == 'fr' ? 'couverture tests' : 'test coverage' }}</span>
                        </div>
                        <div class="xp-stat">
                            <span class="xp-stat__value">78</span>
                            <span class="xp-stat__label">{{ app()->getLocale() == 'fr' ? 'tests E2E' : 'E2E tests' }}</span>
                        </div>
                        <div class="xp-stat">
                            <span class="xp-stat__value">6</span>
                            <span class="xp-stat__label">{{ app()->getLocale() == 'fr' ? 'défis résolus' : 'challenges solved' }}</span>
                        </div>
                    </div>

                    <div class="xp-stack">
                        <span class="skill-tag">React Native</span>
                        <span class="skill-tag">TypeScript</span>
                        <span class="skill-tag">NestJS</span>
                        <span class="skill-tag">Prisma</span>
                        <span class="skill-tag">PostgreSQL</span>
                        <span class="skill-tag">PostGIS</span>
                        <span class="skill-tag">Stripe</span>
                        <span class="skill-tag">Firebase</span>
                        <span class="skill-tag">GitLab CI/CD</span>
                        <span class="skill-tag">Docker</span>
                    </div>
                </div>

                <div class="xp-card__footer">
                    <a href="{{ route('project.scootup') }}" class="btn primary btn-small">
                        {{ app()->getLocale() == 'fr' ? 'Voir le projet' : 'View project' }} →
                    </a>
                    <a href="/files/Rapport_Stage_Scootup_Reda_Mekaoui.pdf" download class="btn ghost btn-small">
                        {{ app()->getLocale() == 'fr' ? 'Télécharger le rapport' : 'Download report' }}
                    </a>
                </div>
            </article>

            {{-- ---- STAGE 1 : Assuroweb ---- --}}
            <article class="xp-card">
                <div class="xp-card__header">
                    <div class="xp-card__meta">
                        <span class="xp-badge">{{ app()->getLocale() == 'fr' ? '1ère année' : '1st year' }}</span>
                        <span class="xp-date">Mai – Juin 2025 · 22 {{ app()->getLocale() == 'fr' ? 'jours' : 'days' }}</span>
                    </div>
                    <div class="xp-card__title-row">
                        <div>
                            <p class="xp-company">Assuroweb</p>
                            <h3 class="xp-role">{{ app()->getLocale() == 'fr' ? 'Développeur Web Laravel' : 'Laravel Web Developer' }}</h3>
                        </div>
                        <div class="xp-icon xp-icon--assuroweb">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg>
                        </div>
                    </div>
                    <p class="xp-project-label">{{ app()->getLocale() == 'fr' ? 'Comparateur d\'assurances en ligne' : 'Online insurance comparison platform' }}</p>
                </div>

                <div class="xp-card__body">
                    <div class="xp-missions">
                        <p class="xp-missions__label">{{ app()->getLocale() == 'fr' ? 'Missions principales' : 'Key missions' }}</p>
                        <ul>
                            <li>{{ app()->getLocale() == 'fr' ? 'Développement d\'un module complet d\'articles (CRUD, Eloquent ORM, routes dynamiques par slug)' : 'Full article module development (CRUD, Eloquent ORM, dynamic slug routing)' }}</li>
                            <li>{{ app()->getLocale() == 'fr' ? 'Intégration d\'un éditeur de contenu riche Quill.js et interface d\'administration' : 'Rich content editor integration with Quill.js and admin interface' }}</li>
                            <li>{{ app()->getLocale() == 'fr' ? 'Design responsive (mobile, tablette, bureau) et refonte CSS de l\'identité visuelle' : 'Responsive design (mobile, tablet, desktop) and CSS visual identity rework' }}</li>
                            <li>{{ app()->getLocale() == 'fr' ? 'Déploiement en production via WinSCP / SSH — workflow Git par mission' : 'Production deployment via WinSCP / SSH — Git workflow per mission' }}</li>
                        </ul>
                    </div>

                    <div class="xp-stack">
                        <span class="skill-tag">Laravel</span>
                        <span class="skill-tag">PHP 8</span>
                        <span class="skill-tag">Blade</span>
                        <span class="skill-tag">Eloquent ORM</span>
                        <span class="skill-tag">MySQL</span>
                        <span class="skill-tag">Quill.js</span>
                        <span class="skill-tag">Docker</span>
                        <span class="skill-tag">Git / GitHub</span>
                        <span class="skill-tag">SSH / WinSCP</span>
                    </div>
                </div>

                <div class="xp-card__footer">
                    <a href="{{ route('project.assuroweb') }}" class="btn primary btn-small">
                        {{ app()->getLocale() == 'fr' ? 'Voir le projet' : 'View project' }} →
                    </a>
                    <a href="/files/RAPPORT DE STAGE 5 Mai-6 Juin _ MEKAOUI MOHAMED, BTS SIO1.pdf" download class="btn ghost btn-small">
                        {{ app()->getLocale() == 'fr' ? 'Télécharger le rapport' : 'Download report' }}
                    </a>
                </div>
            </article>

        </div>
    </div>
</section>

    {{-- ========== COMPETENCES SECTION ========== --}}
    <section id="competences" class="section muted">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">{{ __('Technical stack') }}</p>
                <h2>{{ __('Technologies & tools mastered') }}</h2>
                <p class="lede">
                    {{ __('Skills Subtitle') }}
                </p>
            </div>
            <div class="skills-tabs">
                <div role="tablist" aria-label="Catégories de compétences" class="skills-nav">
                    <button role="tab" class="skill-tab is-active" aria-selected="true" data-target="langages">{{ __('Languages') }}</button>
                    <button role="tab" class="skill-tab" aria-selected="false" data-target="frameworks">{{ __('Frameworks') }}</button>
                    <button role="tab" class="skill-tab" aria-selected="false" data-target="stack">{{ __('Stack / Env.') }}</button>
                    <button role="tab" class="skill-tab" aria-selected="false" data-target="bdd">{{ __('Database') }}</button>
                    <button role="tab" class="skill-tab" aria-selected="false" data-target="outils">{{ __('Tools') }}</button>
                    <button role="tab" class="skill-tab" aria-selected="false" data-target="réseau/cybersécurité">{{ __('Network / Cybersecurity') }}</button>
                    <button role="tab" class="skill-tab" aria-selected="false" data-target="autre">{{ __('Other') }}</button>
                </div>

                <div class="skills-panel">
                    <div class="panel-content">

                        {{-- LANGAGES --}}
                        <div class="panel-group is-active" id="langages" role="tabpanel">
                            <div class="skill-item"><img src="{{ asset('icons/php-original.svg') }}" alt="PHP" width="40" height="40"><p>PHP</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/javascript-plain.svg') }}" alt="JavaScript" width="40" height="40"><p>JavaScript</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/typescript-original.svg') }}" alt="TypeScript" width="40" height="40"><p>TypeScript</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/python-original.svg') }}" alt="Python" width="40" height="40"><p>Python</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/html5-plain.svg') }}" alt="HTML5" width="40" height="40"><p>HTML5</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/css3-plain.svg') }}" alt="CSS3" width="40" height="40"><p>CSS3</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/java-original.svg') }}" alt="Java" width="40" height="40"><p>Java</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/c-original.svg') }}" alt="C" width="40" height="40"><p>C</p></div>
                        </div>

                        {{-- FRAMEWORKS --}}
                        <div class="panel-group" id="frameworks" role="tabpanel" aria-hidden>
                            <div class="skill-item"><img src="{{ asset('icons/laravel-original.svg') }}" alt="Laravel" width="40" height="40"><p>Laravel</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/reactnative-original.svg') }}" alt="React Native" width="40" height="40"><p>React Native</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/nestjs-original.svg') }}" alt="NestJS" width="40" height="40"><p>NestJS</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/bootstrap-original.svg') }}" alt="Bootstrap" width="40" height="40"><p>Bootstrap</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/expo-original.svg') }}" alt="Expo" width="40" height="40"><p>Expo</p></div>
                        </div>

                        {{-- STACK / ENV --}}
                        <div class="panel-group" id="stack" role="tabpanel" aria-hidden>
                            <div class="skill-item"><img src="{{ asset('icons/vitejs-original.svg') }}" alt="Vite" width="40" height="40"><p>Vite</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/nodejs-original.svg') }}" alt="Node.js" width="40" height="40"><p>Node.js</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/composer-original.svg') }}" alt="Composer" width="40" height="40"><p>Composer</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/npm-original.svg') }}" alt="NPM" width="40" height="40"><p>NPM</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/docker-plain-wordmark.svg') }}" alt="Docker" width="40" height="40"><p>Docker</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/linux-original.svg') }}" alt="Linux" width="40" height="40"><p>Linux</p></div>
                        </div>

                        {{-- BASE DE DONNÉES --}}
                        <div class="panel-group" id="bdd" role="tabpanel" aria-hidden>
                            <div class="skill-item"><img src="{{ asset('icons/mysql-original.svg') }}" alt="MySQL" width="40" height="40"><p>MySQL</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/postgresql-original.svg') }}" alt="PostgreSQL" width="40" height="40"><p>PostgreSQL</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/prisma-original.svg') }}" alt="Prisma" width="40" height="40"><p>Prisma ORM</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/sqlite-original.svg') }}" alt="SQLite" width="40" height="40"><p>SQLite</p></div>
                        </div>

                        {{-- OUTILS --}}
                        <div class="panel-group" id="outils" role="tabpanel" aria-hidden>
                            <div class="skill-item"><img src="{{ asset('icons/git-plain.svg') }}" alt="Git" width="40" height="40"><p>Git</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/github-original.svg') }}" alt="GitHub" width="40" height="40"><p>GitHub</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/gitlab-original.svg') }}" alt="GitLab" width="40" height="40"><p>GitLab</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/vscode-original.svg') }}" alt="VS Code" width="40" height="40"><p>VS Code</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/intellij-original.svg') }}" alt="IntelliJ IDEA" width="40" height="40"><p>IntelliJ IDEA</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/postman-original.svg') }}" alt="Postman" width="40" height="40"><p>Postman</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/trello-original.svg') }}" alt="Trello" width="40" height="40"><p>Trello</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/phpunit-logo-idea.png') }}" alt="PHPUnit" width="40" height="40"><p>PHPUnit</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/jest-plain.svg') }}" alt="Jest" width="40" height="40"><p>Jest</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/maven-original.svg') }}" alt="Maven" width="40" height="40"><p>Maven</p></div>
                        </div>

                        {{-- RÉSEAU / CYBERSÉCURITÉ --}}
                        <div class="panel-group" id="réseau/cybersécurité" role="tabpanel" aria-hidden>
                            <div class="skill-item"><img src="{{ asset('icons/icon-tcp-ip.jpg') }}" alt="TCP/IP" width="40" height="40"><p>TCP/IP</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/HTTP_logo.svg.png') }}" alt="HTTP" width="40" height="40"><p>HTTP</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/icon-mod-osi.jpg') }}" alt="Modèle OSI" width="40" height="40"><p>{{ __('OSI Model') }}</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/dhcp.png') }}" alt="DHCP" width="40" height="40"><p>DHCP</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/DNS.png') }}" alt="DNS" width="40" height="40"><p>DNS</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/JWT-icon.webp') }}" alt="JWT" width="40" height="40"><p>JWT</p></div>
                        </div>

                        {{-- AUTRE --}}
                        <div class="panel-group" id="autre" role="tabpanel" aria-hidden>
                            <div class="skill-item"><img src="{{ asset('icons/RGPD.png') }}" alt="RGPD" width="40" height="40"><p>RGPD</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/CNIL-icon.webp') }}" alt="CNIL" width="40" height="40"><p>CNIL</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/MCD-icon.png') }}" alt="MCD" width="40" height="40"><p>Merise / MCD</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/stripe-icon.png') }}" alt="Stripe" width="40" height="40"><p>Stripe</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/githubactions-original.svg') }}" alt="GitHub Actions" width="40" height="40"><p>GitHub Actions</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/firebase-icon.png') }}" alt="Firebase" width="40" height="40"><p>Firebase</p></div>
                            <div class="skill-item"><img src="{{ asset('icons/google-cloud-platform.png') }}" alt="GCP" width="40" height="40"><p>GCP</p></div>
                        </div>

                    </div>
                </div>
        </div>
    </section>

    {{-- ========== PROJETS SECTION ========== --}}
    <section id="projets" class="section">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">{{ __('Achievements') }}</p>
                <h2>{{ __('Projects & case studies') }}</h2>
            </div>

            <div class="projects-carousel">
                <button class="carousel-nav carousel-prev" aria-label="{{ __('Previous') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <div class="swiper projects-swiper">
                    <div class="swiper-wrapper">
                        <!-- Portfolio -->
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
                                            <img src="{{ asset('images/portfolio.png') }}" alt="{{ __('Personal Portfolio') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="project-info">
                                    <h3>{{ __('Personal Portfolio') }}</h3>
                                    <p>{{ __('Portfolio Description') }}</p>
                                    <div class="project-tags">
                                        <span class="tag">Laravel</span>
                                        <span class="tag">Vite</span>
                                        <span class="tag">CSS3</span>
                                    </div>
                                    <div class="project-tags">
                                        <a class="btn btn-small ghost" href="{{ route('project.portfolio') }}">{{ __('View project') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Assuroweb -->
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
                                            <img src="{{ asset('images/assuroweb.png') }}" alt="Assuroweb">
                                        </div>
                                    </div>
                                </div>
                                <div class="project-info">
                                    <h3>{{ __('Assuroweb (Internship)') }}</h3>
                                    <p>{{ __('Assuroweb Description') }}</p>
                                    <div class="project-tags">
                                        <span class="tag">Laravel</span>
                                        <span class="tag">Docker</span>
                                        <span class="tag">SQL</span>
                                    </div>
                                    <div class="project-tags">
                                        <a class="btn btn-small ghost" href="{{ route('project.assuroweb') }}">{{ __('View project') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Next2You -->
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
                                            <img src="{{ asset('images/next2you.png') }}" alt="Next2You">
                                        </div>
                                    </div>
                                </div>
                                <div class="project-info">
                                    <h3>{{ __('Next2You') }}</h3>
                                    <p>{{ __('Next2You Description') }}</p>
                                    <div class="project-tags">
                                        <span class="tag">Laravel</span>
                                        <span class="tag">Docker</span>
                                        <span class="tag">JavaScript</span>
                                    </div>
                                    <div class="project-tags">
                                        <a class="btn btn-small ghost" href="{{ route('project.next2you') }}">{{ __('View project') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Machina -->
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
                                            <img src="{{ asset('images/machina.png') }}" alt="Machina">
                                        </div>
                                    </div>
                                </div>
                                <div class="project-info">
                                    <h3>{{ __('Machina') }}</h3>
                                    <p>{{ __('Machina Description') }}</p>
                                    <div class="project-tags">
                                        <span class="tag">Laravel</span>
                                        <span class="tag">PHP</span>
                                        <span class="tag">Docker</span>
                                    </div>
                                    <div class="project-tags">
                                        <a class="btn btn-small ghost" href="{{ route('project.machina') }}">{{ __('View project') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Projet Parking -->
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
                                        </div>
                                    </div>
                                </div>
                                <div class="project-info">
                                    <h3>{{ __('Parking Project') }}</h3>
                                    <p>{{ __('Parking Description') }}</p>
                                    <div class="project-tags">
                                        <span class="tag">Laravel</span>
                                        <span class="tag">MySQL</span>
                                        <span class="tag">JS</span>
                                    </div>
                                    <div class="project-tags">
                                        <a class="btn btn-small ghost" href="{{ route('project.parking') }}">{{ __('View project') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Projet Personnel -->
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
                                            <img src="{{ asset('images/portfolio.png') }}" alt="Projet Personnel M2L">
                                        </div>
                                    </div>
                                </div>
                                <div class="project-info">
                                    <h3>{{ __('Personnel Project') }}</h3>
                                    <p>{{ __('Personnel Description') }}</p>
                                    <div class="project-tags">
                                        <span class="tag">Java</span>
                                        <span class="tag">JDBC</span>
                                        <span class="tag">JUnit 5</span>
                                    </div>
                                    <div class="project-tags">
                                        <a class="btn btn-small ghost" href="{{ route('project.personnel') }}">{{ __('View project') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Scootup -->
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
                                            <img src="{{ asset('images/project-1.png') }}" alt="{{ __('Scootup') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="project-info">
                                    <h3>{{ __('Scootup') }}</h3>
                                    <p>{{ __('Scootup Description') }}</p>
                                    <div class="project-tags">
                                        <span class="tag">Laravel</span>
                                        <span class="tag">Docker</span>
                                        <span class="tag">Roadmap</span>
                                    </div>
                                    <div class="project-tags">
                                        <a class="btn btn-small ghost" href="{{ route('project.scootup') }}">{{ __('View project') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

                <button class="carousel-nav carousel-next" aria-label="{{ __('Next') }}">
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
                <p class="eyebrow">{{ __('Innovation & Learning') }}</p>
                <h2>{{ __('Tech watch') }}</h2>
                <p class="lede">
                    {{ __('Veille Subtitle') }}
                </p>
            </div>

            <div class="veille-shell">
                <div class="veille-header">
                    <h3>{{ __('What is tech watch?') }}</h3>
                    <p>
                        {{ __('Veille Definition') }}
                    </p>
                    <h3 class="section-title-spaced">{{ __('My topic: Generative AI in complex UI interactions') }}</h3>
                    <p>
                        {{ __('Veille Topic Description') }}
                    </p>
                </div>

                <div class="veille-grid" id="veilleCards">
                    {{-- On boucle exactement 6 fois pour créer les 6 slots fixes --}}
                    @for ($i = 0; $i < 6; $i++)
                        @php
                            // On récupère l'article n° $i s'il existe, sinon null
                            $article = $articles[$i] ?? null;
                        @endphp

                        <article class="veille-card" data-slot="{{ $i }}">
                            {{-- Rendu serveur : affiche l'image réelle si disponible, sinon placeholder neutre --}}
                            @if($article && !empty($article['image']) && str_starts_with($article['image'], 'http'))
                                <div class="veille-image">
                                    <img src="{{ $article['image'] }}"
                                         alt="{{ $article['title'] }}"
                                         loading="{{ $i < 3 ? 'eager' : 'lazy' }}"
                                         onerror="this.parentElement.innerHTML='📰';this.parentElement.classList.add('no-image')">
                                </div>
                            @else
                                <div class="veille-image no-image">📰</div>
                            @endif

                            <p class="veille-title">
                                {{ $article ? \Illuminate\Support\Str::limit($article['title'], 60) : __('Loading...') }}
                            </p>

                            <p class="veille-date">
                                {{ $article ? __('Published on') . ' : ' . $article['date'] : '' }}
                            </p>

                            <a class="veille-button veille-link"
                               href="{{ $article['link'] ?? '#' }}"
                               target="_blank"
                               rel="noopener">
                               {{ __('Read article') }}
                            </a>
                        </article>
                    @endfor
                </div>

                <div class="veille-progress-container">
                    <div class="veille-progress-bar" id="veilleProgress"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- ========== CONTACT SECTION ========== --}}
    <section id="contact" class="section">
        <div class="container contact-shell">
            <div class="contact-intro">
                <p class="eyebrow">{{ __('Let\'s talk') }}</p>
                <h2>{{ __('Send me a message') }}</h2>
                <p class="lede">
                    {{ __('Contact Subtitle') }}
                </p>
                <div class="contact-cards">
                    <div class="info-card">
                        <p class="mini-label">{{ __('Email') }}</p>
                        <p class="mini-value">reda.dev75@gmail.com</p>
                    </div>
                    <div class="info-card">
                        <p class="mini-label">{{ __('Phone') }}</p>
                        <p class="mini-value">+33 7 64 39 97 66</p>
                    </div>
                    <div class="info-card">
                        <p class="mini-label">{{ __('Availability') }}</p>
                        <p class="mini-value">{{ __('Immediate') }}</p>
                    </div>
                </div>
            </div>

            <form id="contactForm" class="contact-form" action="{{ route('portfolio.contact.submit') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">{{ __('Full name') }}</label>
                        <input type="text"
                               id="name"
                               name="name"
                               placeholder="{{ __('Your name') }}"
                               required
                               autocomplete="name">
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Email address') }}</label>
                        <input type="email"
                               id="email"
                               name="email"
                               placeholder="vous@email.com"
                               required
                               autocomplete="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject">{{ __('Subject') }}</label>
                    <input type="text"
                           id="subject"
                           name="subject"
                           placeholder="{{ __('Subject placeholder') }}"
                           required>
                </div>
                <div class="form-group">
                    <label for="message">{{ __('Message') }}</label>
                    <textarea id="message"
                              name="message"
                              rows="5"
                              placeholder="{{ __('Message placeholder') }}"
                              required></textarea>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn primary btn-submit">
                        {{ __('Send message') }}
                    </button>
                    <p class="form-hint" id="formStatus" role="status" aria-live="polite"></p>
                </div>
            </form>
        </div>
    </section>
@endsection