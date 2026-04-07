<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description', __('Portfolio Description'))">
    <meta name="keywords" content="BTS SIO, SLAM, Laravel, PHP, Portfolio, Développeur Web, Full Stack">
    <meta name="author" content="Mekaoui Reda">

    <!-- Open Graph / Social Media -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', __('Portfolio Title'))">
    <meta property="og:description" content="@yield('description', __('Portfolio Description'))">

    <title>@yield('title', __('Portfolio Title'))</title>

    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

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
            <button class="nav-toggle" id="navToggle" aria-label="Ouvrir le menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <nav class="nav" id="navMenu" role="navigation">
                <a href="{{ route('portfolio.home') }}#accueil" class="nav a">{{ __('Home') }}</a>
                <a href="{{ route('portfolio.home') }}#presentation" class="nav a">{{ __('About') }}</a>
                <a href="{{ route('portfolio.home') }}#parcours" class="nav a">{{ __('Journey') }}</a>
                <a href="{{ route('portfolio.home') }}#experience" class="nav a">{{ __('Experience') }}</a>
                <a href="{{ route('portfolio.home') }}#competences" class="nav a">{{ __('Skills') }}</a>
                <a href="{{ route('portfolio.home') }}#projects" class="nav a">{{ __('Projects') }}</a>
                <a href="{{ route('portfolio.home') }}#veille" class="nav a">{{ __('Tech Watch') }}</a>
                <a href="{{ route('portfolio.home') }}#contact" class="nav a">{{ __('Contact') }}</a>
            </nav>

            <div class="lang-switcher">
                <a href="{{ route('language.switch', 'fr') }}" class="lang-btn {{ app()->getLocale() == 'fr' ? 'active' : '' }}" aria-label="Français">FR</a>
                <span class="lang-separator">/</span>
                <a href="{{ route('language.switch', 'en') }}" class="lang-btn {{ app()->getLocale() == 'en' ? 'active' : '' }}" aria-label="English">EN</a>
            </div>
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
                <p class="footer-meta-text">
                    {{ __('copyright') }} © {{ date('Y') }} Mekaoui Reda. {{ __('All rights reserved') }}.
                </p>
            </div>
            <div class="foot-downloads">
                <p class="footer-col-title">{{ __('Documents') }}</p>
                <a href="{{ route('portfolio.cv') }}" download aria-label="{{ __('Download CV') }}">📄 {{ __('CV') }}</a>
                <a href="{{ route('portfolio.tableau_synthese') }}" download aria-label="{{ __('Download Synthesis Table') }}">📊 {{ __('Synthesis Table') }}</a>
            </div>
            <div class="foot-links">
                <p class="footer-col-title">{{ __('Information') }}</p>
                <a href="https://github.com/Rivalzina75" target="_blank" rel="noopener noreferrer" aria-label="Voir mon GitHub">GitHub</a>
                <a href="https://www.linkedin.com/in/reda-mekaoui-76412a322/" target="_blank" rel="noopener noreferrer" aria-label="Voir mon LinkedIn">LinkedIn</a>
            </div>
        </div>
    </footer>

    @stack('scripts')

    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="scroll-to-top" aria-label="Remonter en haut" title="Remonter en haut"></button>
</body>
</html>
