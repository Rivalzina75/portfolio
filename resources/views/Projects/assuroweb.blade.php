@extends('layouts.app')

@section('title', __('Assuroweb — Stage Mai–Juin 2025'))
@section('description', __('Assuroweb Meta Description'))

@section('content')

{{-- ===== HERO ===== --}}
<section class="section hero">
    <div class="container">
        <div class="hero-simple">
            <p class="eyebrow">{{ __('Internship') }} &bull; BTS SIO SLAM 1ère année &bull; E6</p>
            <h1 class="page-hero-title">
                Assuroweb
            </h1>
            <p class="hero-subtitle">
                {{ app()->getLocale() == 'fr'
                    ? 'Développement web Laravel au sein d\'un comparateur d\'assurances en ligne — du CSS à la mise en production en 22 jours.'
                    : 'Laravel web development within an online insurance comparison platform — from CSS to production deployment in 22 days.' }}
            </p>

            <div class="hero-badges">
                <span class="badge">Laravel</span>
                <span class="badge">PHP 8</span>
                <span class="badge">MySQL</span>
                <span class="badge">Quill.js</span>
                <span class="badge">Docker</span>
                <span class="badge">WinSCP / SSH</span>
                <span class="badge accent">{{ app()->getLocale() == 'fr' ? 'Stage 1ère année · 22 jours' : '1st year internship · 22 days' }}</span>
            </div>

            <div class="hero-cta">
                <a href="/files/RAPPORT DE STAGE 5 Mai-6 Juin _ MEKAOUI MOHAMED, BTS SIO1.pdf" download class="btn primary">
                    {{ app()->getLocale() == 'fr' ? 'Télécharger le rapport de stage' : 'Download internship report' }}
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ===== CONTEXT ===== --}}
<section class="section">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">{{ __('Context') }}</p>
            <h2>{{ app()->getLocale() == 'fr' ? 'Contexte et objectifs' : 'Context and objectives' }}</h2>
        </div>

        <div class="cards-grid two">
            <article class="card">
                <h3>{{ app()->getLocale() == 'fr' ? 'L\'entreprise' : 'The company' }}</h3>
                <p>
                    {{ app()->getLocale() == 'fr'
                        ? 'Assuroweb est une société de courtage en assurances proposant un comparateur en ligne permettant aux particuliers et professionnels d\'obtenir des devis personnalisés (auto, moto, habitation, assurance pro). L\'environnement de travail était professionnel — Docker, GitHub, VS Code — sous la direction d\'un tuteur technique expérimenté.'
                        : 'Assuroweb is an insurance brokerage offering an online comparison platform for individuals and professionals to get personalised quotes (auto, motorcycle, home, professional insurance). The work environment was professional — Docker, GitHub, VS Code — under the guidance of an experienced technical supervisor.' }}
                </p>
            </article>

            <article class="card">
                <h3>{{ app()->getLocale() == 'fr' ? 'Objectifs du stage' : 'Internship objectives' }}</h3>
                <ul class="list">
                    <li>{{ app()->getLocale() == 'fr' ? 'Comprendre et intégrer une base de code Laravel existante' : 'Understand and integrate an existing Laravel codebase' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Développer de nouvelles fonctionnalités de A à Z (module articles)' : 'Develop new features end-to-end (article module)' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Maîtriser le cycle complet : développement, tests, déploiement SSH' : 'Master the full cycle: development, testing, SSH deployment' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Travailler en autonomie progressive avec workflow Git rigoureux' : 'Work with progressive autonomy using a rigorous Git workflow' }}</li>
                </ul>
            </article>
        </div>
    </div>
</section>

{{-- ===== MISSIONS ===== --}}
<section class="section muted">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">{{ app()->getLocale() == 'fr' ? 'Réalisations' : 'Achievements' }}</p>
            <h2>{{ app()->getLocale() == 'fr' ? 'Modules développés' : 'Developed modules' }}</h2>
            <p class="lede">{{ app()->getLocale() == 'fr' ? '14 fonctionnalités livrées — 100% du cahier des charges réalisé' : '14 features delivered — 100% of requirements completed' }}</p>
        </div>

        <div class="cards-grid three">

            <article class="card">
                <div class="module-header">
                    <div class="module-icon module-icon--sm">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M4.22 4.22l2.12 2.12M17.66 17.66l2.12 2.12M2 12h3M19 12h3M4.22 19.78l2.12-2.12M17.66 6.34l2.12-2.12"/></svg>
                    </div>
                    <h3 class="module-title">{{ app()->getLocale() == 'fr' ? 'Identité visuelle CSS' : 'CSS Visual Identity' }}</h3>
                </div>
                <ul class="list">
                    <li>{{ app()->getLocale() == 'fr' ? 'Suppression des ombres (box-shadow) sur les pages Assurance Pro et Assurance Personnes' : 'Removed unwanted box-shadows on Pro Insurance and Personal Insurance pages' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Dégradé vertical (#20a8e2 → #0757945c) sur toutes les pages hors accueil via linear-gradient' : 'Vertical gradient (#20a8e2 → #0757945c) on all pages except home via linear-gradient' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Design responsive — 3 breakpoints : 1024px (3 colonnes), 768px (2 colonnes), 425px (1 colonne)' : 'Responsive design — 3 breakpoints: 1024px (3 cols), 768px (2 cols), 425px (1 col)' }}</li>
                </ul>
            </article>

            <article class="card">
                <div class="module-header">
                    <div class="module-icon module-icon--sm">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    </div>
                    <h3 class="module-title">{{ app()->getLocale() == 'fr' ? 'Module Articles' : 'Article Module' }}</h3>
                </div>
                <ul class="list">
                    <li>{{ app()->getLocale() == 'fr' ? 'Section Articles sur la page d\'accueil — cards avec image, titre, bouton En savoir plus' : 'Articles section on homepage — cards with image, title, Learn more button' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Routes Laravel dynamiques /news/detail-{slug} — 404 automatique si slug inconnu' : 'Dynamic Laravel routes /news/detail-{slug} — automatic 404 if unknown slug' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Table MySQL (titre, slug, description, contenu HTML, image, timestamps) + Eloquent ORM' : 'MySQL table (title, slug, description, HTML content, image, timestamps) + Eloquent ORM' }}</li>
                </ul>
            </article>

            <article class="card">
                <div class="module-header">
                    <div class="module-icon module-icon--sm">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                    </div>
                    <h3 class="module-title">{{ app()->getLocale() == 'fr' ? 'Interface d\'administration' : 'Admin Interface' }}</h3>
                </div>
                <ul class="list">
                    <li>{{ app()->getLocale() == 'fr' ? 'Formulaire de création avec éditeur Quill.js (gras, italique, souligné, listes, code inline)' : 'Creation form with Quill.js editor (bold, italic, underline, lists, inline code)' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Page de sélection et d\'édition d\'un article existant avec formulaire pré-rempli' : 'Selection and editing page for existing articles with pre-filled form' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Upload d\'image, stockage MySQL et carrousel automatique sur l\'accueil' : 'Image upload, MySQL storage and automatic carousel on homepage' }}</li>
                </ul>
            </article>

            <article class="card">
                <div class="module-header">
                    <div class="module-icon module-icon--sm">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
                    </div>
                    <h3 class="module-title">Backend Laravel MVC</h3>
                </div>
                <ul class="list">
                    <li>{{ app()->getLocale() == 'fr' ? 'Architecture MVC complète — NewsController, routes web.php avec variables de chemin' : 'Full MVC architecture — NewsController, web.php routes with path variables' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Modèle Eloquent Article avec champs complets et gestion des slugs' : 'Eloquent Article model with full fields and slug management' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Vues Blade avec héritage de layout — liste, détail, création, édition' : 'Blade views with layout inheritance — list, detail, create, edit' }}</li>
                </ul>
            </article>

            <article class="card">
                <div class="module-header">
                    <div class="module-icon module-icon--sm">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                    </div>
                    <h3 class="module-title">{{ app()->getLocale() == 'fr' ? 'DevOps & Déploiement' : 'DevOps & Deployment' }}</h3>
                </div>
                <ul class="list">
                    <li>{{ app()->getLocale() == 'fr' ? 'Workflow Git strict : branche feat/nom-mission par fonctionnalité, commits descriptifs, pull requests GitHub revues par le tuteur' : 'Strict Git workflow: feat/mission-name branch per feature, descriptive commits, GitHub PRs reviewed by supervisor' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Environnement isolé Docker pour le développement local' : 'Isolated Docker environment for local development' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Mise en production WinSCP avec authentification par clé SSH vers le serveur de production' : 'WinSCP production deployment with SSH key authentication to the production server' }}</li>
                </ul>
            </article>

            <article class="card module-highlight-card">
                <h3>{{ app()->getLocale() == 'fr' ? 'Bilan du stage' : 'Internship summary' }}</h3>
                <div class="module-summary-grid">
                    <div class="module-summary-item">
                        <div class="module-summary-value">14</div>
                        <div class="module-summary-label">{{ app()->getLocale() == 'fr' ? 'fonctionnalités' : 'features' }}</div>
                    </div>
                    <div class="module-summary-item">
                        <div class="module-summary-value">22</div>
                        <div class="module-summary-label">{{ app()->getLocale() == 'fr' ? 'jours' : 'days' }}</div>
                    </div>
                    <div class="module-summary-item module-summary-item--wide">
                        <div class="module-summary-value module-summary-value--success">100%</div>
                        <div class="module-summary-label">{{ app()->getLocale() == 'fr' ? 'du cahier des charges' : 'of requirements' }}</div>
                    </div>
                </div>
            </article>

        </div>
    </div>
</section>

{{-- ===== STACK ===== --}}
<section class="section">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">{{ __('Skills used') }}</p>
            <h2>{{ __('Technical skills') }}</h2>
        </div>

        <div class="cards-grid three">
            <article class="card">
                <h3>{{ __('Languages') }}</h3>
                <div class="skills-tags">
                    <span class="skill-tag">PHP 8</span>
                    <span class="skill-tag">JavaScript</span>
                    <span class="skill-tag">SQL</span>
                    <span class="skill-tag">HTML5 / CSS3</span>
                </div>
            </article>
            <article class="card">
                <h3>{{ __('Frameworks') }} & {{ __('Tools') }}</h3>
                <div class="skills-tags">
                    <span class="skill-tag">Laravel</span>
                    <span class="skill-tag">Blade</span>
                    <span class="skill-tag">Eloquent ORM</span>
                    <span class="skill-tag">Quill.js</span>
                </div>
            </article>
            <article class="card">
                <h3>{{ __('Stack / Env.') }}</h3>
                <div class="skills-tags">
                    <span class="skill-tag">Docker</span>
                    <span class="skill-tag">Git / GitHub</span>
                    <span class="skill-tag">MySQL</span>
                    <span class="skill-tag">WinSCP / SSH</span>
                    <span class="skill-tag">Trello</span>
                </div>
            </article>
        </div>
    </div>
</section>

{{-- ===== TIMELINE ===== --}}
<section class="section muted">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">{{ app()->getLocale() == 'fr' ? 'Journal de bord' : 'Logbook' }}</p>
            <h2>{{ app()->getLocale() == 'fr' ? 'Chronologie des missions' : 'Mission timeline' }}</h2>
        </div>

        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h3>{{ app()->getLocale() == 'fr' ? 'Jours 1–4 : Environnement & identité visuelle' : 'Days 1–4: Environment & visual identity' }}</h3>
                    <p>{{ app()->getLocale() == 'fr' ? 'Installation Docker et prise en main de la base de code. Suppression des ombres CSS, refonte du dégradé de fond, intégration de la section Articles en HTML/CSS/Blade.' : 'Docker installation and codebase onboarding. CSS shadow removal, background gradient rework, Articles section integration in HTML/CSS/Blade.' }}</p>
                    <div class="skills-tags timeline-tags-compact"><span class="skill-tag">CSS</span><span class="skill-tag">Git</span><span class="skill-tag">Blade</span></div>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h3>{{ app()->getLocale() == 'fr' ? 'Jours 5–9 : Laravel, routes & responsive' : 'Days 5–9: Laravel, routes & responsive' }}</h3>
                    <p>{{ app()->getLocale() == 'fr' ? 'Apprentissage de Laravel en conditions réelles. Mise en place du design responsive sur 3 breakpoints. Création des routes dynamiques et du NewsController. Page de détail article avec gestion 404.' : 'Learning Laravel in real conditions. Responsive design on 3 breakpoints. Dynamic routes and NewsController creation. Article detail page with 404 handling.' }}</p>
                    <div class="skills-tags timeline-tags-compact"><span class="skill-tag">Laravel</span><span class="skill-tag">PHP</span><span class="skill-tag">CSS Media Queries</span></div>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h3>{{ app()->getLocale() == 'fr' ? 'Jours 10–15 : Base de données & administration' : 'Days 10–15: Database & administration' }}</h3>
                    <p>{{ app()->getLocale() == 'fr' ? 'Création et connexion de la table MySQL articles. Modèle Eloquent avec gestion des slugs. Formulaire d\'administration, intégration Quill.js, confirmation JavaScript.' : 'MySQL articles table creation and connection. Eloquent model with slug management. Admin form, Quill.js integration, JavaScript confirmation.' }}</p>
                    <div class="skills-tags timeline-tags-compact"><span class="skill-tag">MySQL</span><span class="skill-tag">Eloquent</span><span class="skill-tag">Quill.js</span></div>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h3>{{ app()->getLocale() == 'fr' ? 'Jours 16–22 : Finitions & mise en production' : 'Days 16–22: Finishing & production deployment' }}</h3>
                    <p>{{ app()->getLocale() == 'fr' ? 'Édition d\'articles, upload et stockage d\'images, carrousel JavaScript responsive sur l\'accueil. Correctifs esthétiques. Déploiement en production via WinSCP avec authentification SSH.' : 'Article editing, image upload and storage, responsive JavaScript carousel on homepage. Aesthetic fixes. Production deployment via WinSCP with SSH authentication.' }}</p>
                    <div class="skills-tags timeline-tags-compact"><span class="skill-tag">WinSCP</span><span class="skill-tag">SSH</span><span class="skill-tag">JavaScript</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== BACK ===== --}}
<section class="section">
    <div class="container project-back">
        <a href="{{ route('portfolio.home') }}#projets" class="btn ghost project-back-link">
            <span>&larr;</span> {{ __('Back to projects') }}
        </a>
    </div>
</section>

@endsection
