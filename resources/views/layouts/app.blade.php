<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio SIO SLAM')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite(['resources/css/style.css', 'resources/js/script.js'])
</head>
<body>
    <canvas id="particles" aria-hidden="true"></canvas>
    <header class="site-header">
        <div class="nav-shell container">
            <a href="{{ route('portfolio.home') }}" class="brand" aria-label="Retour à l'accueil">MR<span>_</span></a>
            <button class="nav-toggle" id="navToggle" aria-label="Ouvrir le menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
            <nav class="nav" id="navMenu">
                <a href="#accueil" class="nav-link active">Accueil</a>
                <a href="#presentation" class="nav-link">Présentation</a>
                <a href="#competences" class="nav-link">Compétences</a>
                <a href="#projets" class="nav-link">Projets</a>
                <a href="#contact" class="nav-link">Contact</a>
            </nav>
        </div>
    </header>
    <main class="main-content">
        @yield('content')
    </main>
    <footer class="footer">
        <div class="container footer-grid">
            <div>
                <p class="foot-brand">Mekaoui Reda — BTS SIO SLAM</p>
                <p class="foot-note">Portfolio professionnel, démonstration des compétences et projets.</p>
            </div>
            <div class="foot-links">
                <a href="mailto:reda.mekaoui.pro@gmail.com">Email</a>
                <a href="https://github.com/Rivalzina75" target="_blank" rel="noreferrer">GitHub</a>
                <a href="#contact">Contact</a>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>