<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description', 'Portfolio professionnel de Mekaoui Reda - BTS SIO SLAM. Développeur full-stack Laravel, PHP, JavaScript.')">
    <meta name="keywords" content="BTS SIO, SLAM, Laravel, PHP, Portfolio, Développeur Web, Full Stack">
    <meta name="author" content="Mekaoui Reda">

    <!-- Open Graph / Social Media -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'Portfolio BTS SIO SLAM – Mekaoui Reda')">
    <meta property="og:description" content="@yield('description', 'Portfolio professionnel - Développeur full-stack en formation BTS SIO')">

    <title>@yield('title', 'Portfolio BTS SIO SLAM – Mekaoui Reda')</title>

    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Styles -->
    @vite(['resources/css/style.css', 'resources/js/script.js'])

    @stack('styles')
</head>
<body>
    <!-- Particles Canvas -->
    <canvas id="particles" aria-hidden="true"></canvas>

    <!-- Header Navigation -->
    <header class="site-header">
        <div class="nav-shell container">
            <a href="{{ route('portfolio.home') }}" class="brand" aria-label="Retour à l'accueil">
                MR<span>_</span>
            </a>

            <button class="nav-toggle" id="navToggle" aria-label="Ouvrir le menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <nav class="nav" id="navMenu" role="navigation">
                <a href="{{ route('portfolio.home') }}#accueil" class="nav a">Accueil</a>
                <a href="{{ route('portfolio.home') }}#presentation" class="nav a">Présentation</a>
                <a href="{{ route('portfolio.home') }}#parcours" class="nav a">Parcours</a>
                <a href="{{ route('portfolio.home') }}#competences" class="nav a">Compétences</a>
                <a href="{{ route('portfolio.home') }}#projets" class="nav a">Projets</a>
                <a href="{{ route('portfolio.home') }}#veille" class="nav a">Veille Tech</a>
                <a href="{{ route('portfolio.home') }}#contact" class="nav a">Contact</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-grid">
            <div>
                <p class="foot-brand">Mekaoui Reda — BTS SIO SLAM</p>
                <p class="foot-note">Portfolio professionnel • Promotion 2025</p>
                <p class="foot-note" style="margin-top: 8px; font-size: 0.75rem; opacity: 0.7;">
                    Développé avec Laravel 10, Vite & Blade
                </p>
            </div>
            <div class="foot-downloads">
                <p style="font-size: 0.85rem; color: var(--text-secondary); margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.05em;">Documents</p>
                <a href="{{ route('portfolio.cv') }}" download aria-label="Télécharger le CV">📄 CV</a>
                <a href="{{ route('portfolio.tableau_synthese') }}" download aria-label="Télécharger le tableau de synthèse">📊 Tableau synthèse</a>
            </div>
            <div class="foot-links">
                <a href="mailto:reda.mekaoui.pro@gmail.com" aria-label="Envoyer un email">Email</a>
                <a href="https://github.com/Rivalzina75" target="_blank" rel="noopener noreferrer" aria-label="Voir mon GitHub">GitHub</a>
                <a href="https://linkedin.com/in/reda-mekaoui" target="_blank" rel="noopener noreferrer" aria-label="Voir mon LinkedIn">LinkedIn</a>
                <a href="{{ route('portfolio.home') }}#contact">Contact</a>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
