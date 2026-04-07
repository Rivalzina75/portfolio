# Portfolio BTS SIO SLAM - Reda Mekaoui

Portfolio professionnel developpe avec Laravel 12 pour presenter mon parcours BTS SIO SLAM, mes experiences de stage, mes projets et ma veille technologique.

## 1) Contexte pedagogique

Ce projet s'inscrit dans le cadre du BTS SIO (Services Informatiques aux Organisations), option SLAM (Solutions Logicielles et Applications Metiers), promotion 2024-2026.

Ce portfolio sert de support principal pour l'epreuve E5, avec un objectif simple: montrer des realisations concretes, expliquer les choix techniques et prouver la progression professionnelle.

### Finalite pour l'epreuve E5

- Presenter mon parcours de formation et mes stages
- Justifier les competences mobilisees sur des cas reels
- Centraliser les preuves (pages projets, documents, livrables)
- Montrer ma demarche de veille technologique et d'amelioration continue

## 2) Objectifs du portfolio

- Mettre a disposition un support clair pour un jury BTS SIO
- Valoriser des projets realises en contexte scolaire et en entreprise
- Demontrer une architecture web moderne (Laravel + Vite + JavaScript)
- Proposer une interface bilingue (FR/EN) avec fallback documentaire EN -> FR
- Illustrer une veille active sur l'IA generative appliquee aux interfaces frontend

## 3) Fonctionnalites principales

- Page d'accueil complete: presentation, parcours, experiences, competences
- Carousel de projets avec pages detaillees
- Section veille technologique dynamique (RSS + rotation automatique)
- Formulaire de contact AJAX avec validation backend
- Telechargement de documents (CV, tableau de synthese)
- Gestion de langue FR/EN via session

## 4) Focus E5: ce que le site permet de montrer

- Demarche projet: contexte, objectifs, realisation, resultats
- Competences techniques: backend, frontend, base de donnees, outillage
- Methodes de travail: qualite, organisation, documentation
- Capacite d'analyse: veille technologique et selection d'informations pertinentes

## 5) Stack technique

- Backend: PHP 8.2+, Laravel 12
- Frontend: Blade, JavaScript, CSS, Vite
- Bibliotheques UI: Swiper, Anime.js
- Outils: Composer, npm, Docker/Sail, PHPUnit
- Donnees/cache: MySQL (Sail) ou configuration locale adaptee

## 6) Architecture du projet

- app/Http/Controllers: logique applicative (HomeController, VeilleController)
- resources/views: templates Blade (accueil + pages projets)
- resources/js/script.js: interactions frontend (carousel, veille, navigation, contact)
- resources/css/style.css: design global du portfolio
- routes/routes.php: routes web et endpoint API de veille
- lang/fr.json et lang/en.json: textes traduits
- public/files: documents telechargeables (CV, tableau de synthese, documentations)

## 7) Veille technologique

Le module de veille:

- agrege plusieurs flux RSS (Google Alerts)
- applique un filtrage thematique (IA + UI/frontend)
- dedoublonne et score les articles
- met les resultats en cache
- affiche une rotation de cartes dans la section veille

Sujet de veille principal: IA generative dans les interactions UI complexes (qualite du code genere, accessibilite, micro-interactions, fiabilite en production).

## 8) Documents utiles pour le jury

- CV FR
- Tableau de synthese FR
- Pages projets detaillees
- Documentations associees aux realisations

## 9) Auteur

Reda Mekaoui

- GitHub: https://github.com/Rivalzina75
- LinkedIn: https://www.linkedin.com/in/reda-mekaoui-76412a322/

