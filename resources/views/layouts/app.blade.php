<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio SIO SLAM')</title>
    @vite(['resources/css/style.css', 'resources/js/script.js'])
</head>
<body>
    <canvas id="particles"></canvas>
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('portfolio.home') }}" class="nav-link active">Accueil</a>
            <a href="/#presentation" class="nav-link">Présentation</a> 
            <a href="/#competences" class="nav-link">Compétences</a>
            <a href="/#projets" class="nav-link">Projets</a>
            <a href="/#contexte" class="nav-link">Contexte Pro</a> 
            <a href="/#veille" class="nav-link">Veille Techno</a>
            <a href="/#contact" class="nav-link">Contact</a>
        </div>
    </nav>
    <main class="main-content">
        @yield('content')
    </main>
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Mekaoui Reda. Tous droits réservés.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>