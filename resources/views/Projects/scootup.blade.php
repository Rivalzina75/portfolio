@extends('layouts.app')

@section('title', 'Scootup — Stage OhLogiciel Jan–Fév 2026')
@section('description', __('Stage 2026 Description'))

@section('content')

{{-- ===== HERO ===== --}}
<section class="section hero">
    <div class="container">
        <div class="hero-simple">
            <p class="eyebrow">{{ __('Internship') }} &bull; BTS SIO SLAM 2ème année &bull; E6</p>
            <h1 class="page-hero-title">
                Scootup
            </h1>
            <p class="hero-subtitle">
                {{ app()->getLocale() == 'fr'
                    ? 'Solution complète de stationnement sécurisé pour trottinettes électriques — application mobile React Native, API NestJS, intégration IoT et paiement Stripe. Développé de A à Z en 5 semaines chez OhLogiciel.'
                    : 'Full secure e-scooter parking solution — React Native mobile app, NestJS API, IoT integration and Stripe payment. Built end-to-end in 5 weeks at OhLogiciel.' }}
            </p>

            <div class="hero-badges">
                <span class="badge">React Native</span>
                <span class="badge">TypeScript</span>
                <span class="badge">NestJS</span>
                <span class="badge">PostgreSQL</span>
                <span class="badge">PostGIS</span>
                <span class="badge">Stripe</span>
                <span class="badge">Firebase</span>
                <span class="badge">GitLab CI/CD</span>
                <span class="badge accent">{{ app()->getLocale() == 'fr' ? 'Stage 2ème année · 5 semaines' : '2nd year internship · 5 weeks' }}</span>
            </div>

            <div class="hero-cta">
                <a href="/files/Rapport_Stage_Scootup_Reda_Mekaoui.pdf" download class="btn primary">
                    {{ app()->getLocale() == 'fr' ? 'Télécharger le rapport de stage' : 'Download internship report' }}
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ===== RÉSUMÉ EXÉCUTIF ===== --}}
<section class="section">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">{{ app()->getLocale() == 'fr' ? 'Vue d\'ensemble' : 'Overview' }}</p>
            <h2>{{ app()->getLocale() == 'fr' ? 'Résumé du projet' : 'Project summary' }}</h2>
        </div>

        <div class="cards-grid two cards-grid-spaced">
            <article class="card">
                <h3>{{ app()->getLocale() == 'fr' ? 'Contexte & problématique' : 'Context & problem' }}</h3>
                <p>
                    {{ app()->getLocale() == 'fr'
                        ? 'OhLogiciel développe Scootup, une solution IoT pour résoudre le stationnement anarchique des trottinettes électriques dans les grandes métropoles françaises. Des casiers sécurisés et connectés permettent aux utilisateurs de localiser, réserver et déverrouiller un emplacement via une application mobile.'
                        : 'OhLogiciel develops Scootup, an IoT solution to address the chaotic parking of electric scooters in major French cities. Secure, connected lockers allow users to locate, book and unlock a space via a mobile application.' }}
                </p>
            </article>

            <article class="card">
                <h3>{{ app()->getLocale() == 'fr' ? 'Mon rôle' : 'My role' }}</h3>
                <p>
                    {{ app()->getLocale() == 'fr'
                        ? 'Développeur principal de l\'ensemble de l\'écosystème logiciel : application mobile client (React Native), interface d\'administration back-office, et backend API avec intégration IoT. Travail en méthodologie Agile avec sprints hebdomadaires et code reviews régulières avec mon tuteur Oualid Handoura.'
                        : 'Lead developer of the entire software ecosystem: client mobile app (React Native), back-office admin interface, and API backend with IoT integration. Agile methodology with weekly sprints and regular code reviews with my supervisor Oualid Handoura.' }}
                </p>
            </article>
        </div>

        {{-- LIVRABLES ===== --}}
        <div class="stage-livrables">
            <p class="eyebrow stage-livrables-title">{{ app()->getLocale() == 'fr' ? 'Livrables' : 'Deliverables' }}</p>
            <div class="livrables-grid">
                <div class="livrable livrable--done">
                    <div class="livrable__icon">✓</div>
                    <div class="livrable__info">
                        <span class="livrable__name">{{ app()->getLocale() == 'fr' ? 'Application mobile client' : 'Client mobile app' }}</span>
                        <span class="livrable__tech">React Native + Expo + TypeScript</span>
                    </div>
                </div>
                <div class="livrable livrable--done">
                    <div class="livrable__icon">✓</div>
                    <div class="livrable__info">
                        <span class="livrable__name">Backend API REST</span>
                        <span class="livrable__tech">NestJS + Prisma + PostgreSQL</span>
                    </div>
                </div>
                <div class="livrable livrable--done">
                    <div class="livrable__icon">✓</div>
                    <div class="livrable__info">
                        <span class="livrable__name">{{ app()->getLocale() == 'fr' ? 'Filtrage géospatial' : 'Geospatial filtering' }}</span>
                        <span class="livrable__tech">PostGIS (ST_DWithin, ST_Distance)</span>
                    </div>
                </div>
                <div class="livrable livrable--done">
                    <div class="livrable__icon">✓</div>
                    <div class="livrable__info">
                        <span class="livrable__name">{{ app()->getLocale() == 'fr' ? 'Intégration paiement' : 'Payment integration' }}</span>
                        <span class="livrable__tech">Stripe (SetupIntent, PaymentMethod)</span>
                    </div>
                </div>
                <div class="livrable livrable--done">
                    <div class="livrable__icon">✓</div>
                    <div class="livrable__info">
                        <span class="livrable__name">Pipeline CI/CD</span>
                        <span class="livrable__tech">GitLab CI + Docker</span>
                    </div>
                </div>
                <div class="livrable livrable--done">
                    <div class="livrable__icon">✓</div>
                    <div class="livrable__info">
                        <span class="livrable__name">Tests E2E backend</span>
                        <span class="livrable__tech">Jest + Supertest — 93,23% coverage</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== MISSIONS ===== --}}
<section class="section muted">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">{{ app()->getLocale() == 'fr' ? 'Missions' : 'Missions' }}</p>
            <h2>{{ app()->getLocale() == 'fr' ? 'Ce que j\'ai développé' : 'What I built' }}</h2>
        </div>

        <div class="cards-grid two">

            <article class="card">
                <div class="module-header">
                    <div class="module-icon module-icon--md">📱</div>
                    <div>
                        <h3 class="module-title">{{ app()->getLocale() == 'fr' ? 'Application Mobile Client' : 'Client Mobile App' }}</h3>
                        <p class="module-subtitle">React Native + Expo + TypeScript</p>
                    </div>
                </div>
                <ul class="list">
                    <li>{{ app()->getLocale() == 'fr' ? 'Splash screen, onboarding, authentification par code SMS (Firebase Auth) avec sélecteur de pays 185 pays custom' : 'Splash screen, onboarding, SMS code authentication (Firebase Auth) with custom 185-country selector' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Carte interactive Google Maps avec marqueurs de stations, fiche station et système de réservation (30 min → 3h)' : 'Interactive Google Maps with station markers, station card and booking system (30 min → 3h)' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Machine à états Mon Casier (PENDING / ACTIVE) avec compte à rebours 2 min et bouton Déverrouiller' : 'My Locker state machine (PENDING / ACTIVE) with 2-min countdown and Unlock button' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Portefeuille Stripe avec formulaire de carte en mode test, gestion des moyens de paiement' : 'Stripe wallet with test card form, payment methods management' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Page Profil, historique des trajets, réclamations, paramètres' : 'Profile page, trip history, claims, settings' }}</li>
                </ul>
            </article>

            <article class="card">
                <div class="module-header">
                    <div class="module-icon module-icon--md">⚙️</div>
                    <div>
                        <h3 class="module-title">Backend API REST</h3>
                        <p class="module-subtitle">NestJS + Prisma + PostgreSQL + PostGIS</p>
                    </div>
                </div>
                <ul class="list">
                    <li>{{ app()->getLocale() == 'fr' ? 'Clean Architecture (Domain / Infrastructure / Presentation) — TypeScript strict, zéro any en production' : 'Clean Architecture (Domain / Infrastructure / Presentation) — strict TypeScript, zero any in production' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Authentification JWT stateless — flux complet Firebase SMS → /auth/send-code → /auth/verify-code → JWT' : 'Stateless JWT auth — full flow Firebase SMS → /auth/send-code → /auth/verify-code → JWT' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Filtrage géospatial PostGIS avec ST_DWithin et index GIST spatial — 15ms vs 200ms en JS pur' : 'PostGIS geospatial filtering with ST_DWithin and GIST spatial index — 15ms vs 200ms in pure JS' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Module de réservation complet : 8 use cases, transactions Prisma, journal d\'audit (actionlog)' : 'Complete booking module: 8 use cases, Prisma transactions, audit log (actionlog)' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Module Stripe : table paymentmethod, StripeService, SetupIntent, 3 use cases, 3 endpoints' : 'Stripe module: paymentmethod table, StripeService, SetupIntent, 3 use cases, 3 endpoints' }}</li>
                </ul>
            </article>

            <article class="card">
                <div class="module-header">
                    <div class="module-icon module-icon--md">🔬</div>
                    <div>
                        <h3 class="module-title">{{ app()->getLocale() == 'fr' ? 'Tests & Qualité' : 'Testing & Quality' }}</h3>
                        <p class="module-subtitle">Jest + Supertest — 93,23% coverage</p>
                    </div>
                </div>
                <ul class="list">
                    <li>{{ app()->getLocale() == 'fr' ? 'Évolution de 38 tests à 88,71% → 78 tests à 93,23% (+40 tests, +4,52% de couverture en 1 semaine)' : 'Evolution from 38 tests at 88.71% → 78 tests at 93.23% (+40 tests, +4.52% coverage in 1 week)' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Tests d\'authentification, de réservation, des casiers, de santé API — validation DTOs class-validator' : 'Auth, booking, locker and health check tests — class-validator DTO validation' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? '91 erreurs ESLint réduites à 0 — passage de TypeScript strict en fin de stage' : '91 ESLint errors reduced to 0 — TypeScript strict enforcement at end of internship' }}</li>
                </ul>
            </article>

            <article class="card">
                <div class="module-header">
                    <div class="module-icon module-icon--md">🚀</div>
                    <div>
                        <h3 class="module-title">Pipeline CI/CD GitLab</h3>
                        <p class="module-subtitle">GitLab CI + Docker · 4m10s → 2m23s</p>
                    </div>
                </div>
                <ul class="list">
                    <li>{{ app()->getLocale() == 'fr' ? 'Pipeline .gitlab-ci.yml en 3 stages : build → test → deploy, déclenchement sur chaque merge request' : '.gitlab-ci.yml pipeline in 3 stages: build → test → deploy, triggered on each merge request' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Débogage de 4 erreurs de pipeline, optimisations cache et parallélisation --maxWorkers=4' : 'Debugging of 4 pipeline errors, cache optimisation and --maxWorkers=4 parallelisation' }}</li>
                    <li>{{ app()->getLocale() == 'fr' ? 'Stratégie de branches : main (production), develop, epic/payment, feat/nom-feature' : 'Branch strategy: main (production), develop, epic/payment, feat/feature-name' }}</li>
                </ul>
            </article>

        </div>
    </div>
</section>

{{-- ===== DÉFIS TECHNIQUES ===== --}}
<section class="section">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">{{ app()->getLocale() == 'fr' ? 'Problèmes → Solutions' : 'Problems → Solutions' }}</p>
            <h2>{{ app()->getLocale() == 'fr' ? 'Défis techniques résolus' : 'Technical challenges solved' }}</h2>
        </div>

        <div class="defis-list">

            <div class="defi-item">
                <div class="defi-number">01</div>
                <div class="defi-content">
                    <h3>{{ app()->getLocale() == 'fr' ? 'Persistance de session JWT' : 'JWT session persistence' }}</h3>
                    <p><strong>{{ app()->getLocale() == 'fr' ? 'Problème :' : 'Problem:' }}</strong> {{ app()->getLocale() == 'fr' ? 'Token JWT uniquement en mémoire — reconnexion obligatoire à chaque rechargement.' : 'JWT token in memory only — forced re-login on every reload.' }}</p>
                    <p><strong>{{ app()->getLocale() == 'fr' ? 'Solution :' : 'Solution:' }}</strong> {{ app()->getLocale() == 'fr' ? 'Sauvegarde dans AsyncStorage, chargement automatique au démarrage avec vérification de validité avant le splash screen.' : 'Storage in AsyncStorage, automatic loading at startup with validity check before splash screen.' }}</p>
                </div>
            </div>

            <div class="defi-item">
                <div class="defi-number">02</div>
                <div class="defi-content">
                    <h3>{{ app()->getLocale() == 'fr' ? 'Filtrage géospatial haute performance' : 'High-performance geospatial filtering' }}</h3>
                    <p><strong>{{ app()->getLocale() == 'fr' ? 'Problème :' : 'Problem:' }}</strong> {{ app()->getLocale() == 'fr' ? 'Calculs de proximité côté serveur en JavaScript pur — plus de 200ms de latence.' : 'Server-side proximity calculations in pure JavaScript — over 200ms latency.' }}</p>
                    <p><strong>{{ app()->getLocale() == 'fr' ? 'Solution :' : 'Solution:' }}</strong> {{ app()->getLocale() == 'fr' ? 'Extension PostGIS avec types POINT dans Prisma, requêtes SQL brutes ST_DWithin et index GIST spatial — 15ms de réponse.' : 'PostGIS extension with POINT types in Prisma, raw ST_DWithin SQL queries and GIST spatial index — 15ms response.' }}</p>
                </div>
            </div>

            <div class="defi-item">
                <div class="defi-number">03</div>
                <div class="defi-content">
                    <h3>{{ app()->getLocale() == 'fr' ? 'Sélecteur de pays custom (PhoneInput)' : 'Custom country selector (PhoneInput)' }}</h3>
                    <p><strong>{{ app()->getLocale() == 'fr' ? 'Problème :' : 'Problem:' }}</strong> {{ app()->getLocale() == 'fr' ? 'La bibliothèque react-native-country-picker-modal : modal invisible sur Android, recherche cassée, 150KB.' : 'react-native-country-picker-modal library: invisible modal on Android, broken search, 150KB.' }}</p>
                    <p><strong>{{ app()->getLocale() == 'fr' ? 'Solution :' : 'Solution:' }}</strong> {{ app()->getLocale() == 'fr' ? 'Composant PhoneInput.tsx custom — 185 pays avec drapeaux emoji, modal natif, recherche temps réel, 15KB.' : 'Custom PhoneInput.tsx component — 185 countries with emoji flags, native modal, real-time search, 15KB.' }}</p>
                </div>
            </div>

            <div class="defi-item">
                <div class="defi-number">04</div>
                <div class="defi-content">
                    <h3>{{ app()->getLocale() == 'fr' ? 'Machine à états du flux de réservation' : 'Booking flow state machine' }}</h3>
                    <p><strong>{{ app()->getLocale() == 'fr' ? 'Problème :' : 'Problem:' }}</strong> {{ app()->getLocale() == 'fr' ? 'Interface ne respectant pas le flux — déverrouillage pour dépôt (2 min) → attente → récupération avec confirmation.' : 'Interface not respecting the flow — unlock for deposit (2 min) → waiting → retrieval with confirmation.' }}</p>
                    <p><strong>{{ app()->getLocale() == 'fr' ? 'Solution :' : 'Solution:' }}</strong> {{ app()->getLocale() == 'fr' ? 'Machine à états (empty / deposited), compte à rebours de 2 minutes, badge "Trottinette déposée" et modal anti-erreur de 5 secondes.' : 'State machine (empty / deposited), 2-minute countdown, "Scooter deposited" badge and 5-second anti-error modal.' }}</p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ===== STATS ===== --}}
<section class="section muted">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">{{ app()->getLocale() == 'fr' ? 'Chiffres clés' : 'Key numbers' }}</p>
            <h2>{{ app()->getLocale() == 'fr' ? 'Résultats en 5 semaines' : '5-week results' }}</h2>
        </div>
        <div class="stats-showcase">
            <div class="stat-big">
                <div class="stat-big__value">93<span class="stat-unit">%</span></div>
                <div class="stat-big__label">{{ app()->getLocale() == 'fr' ? 'couverture de tests' : 'test coverage' }}</div>
                <div class="stat-big__sub">Jest + Supertest</div>
            </div>
            <div class="stat-big">
                <div class="stat-big__value">78</div>
                <div class="stat-big__label">{{ app()->getLocale() == 'fr' ? 'tests E2E backend' : 'E2E backend tests' }}</div>
                <div class="stat-big__sub">{{ app()->getLocale() == 'fr' ? '+40 en 1 semaine' : '+40 in 1 week' }}</div>
            </div>
            <div class="stat-big">
                <div class="stat-big__value">15<span class="stat-unit">ms</span></div>
                <div class="stat-big__label">{{ app()->getLocale() == 'fr' ? 'requêtes PostGIS' : 'PostGIS queries' }}</div>
                <div class="stat-big__sub">{{ app()->getLocale() == 'fr' ? 'vs 200ms en JS' : 'vs 200ms in JS' }}</div>
            </div>
            <div class="stat-big">
                <div class="stat-big__value">0</div>
                <div class="stat-big__label">{{ app()->getLocale() == 'fr' ? 'erreurs ESLint' : 'ESLint errors' }}</div>
                <div class="stat-big__sub">{{ app()->getLocale() == 'fr' ? '91 → 0 en fin de stage' : '91 → 0 at end of internship' }}</div>
            </div>
            <div class="stat-big">
                <div class="stat-big__value">2<span class="stat-unit">m23</span></div>
                <div class="stat-big__label">Pipeline CI/CD</div>
                <div class="stat-big__sub">{{ app()->getLocale() == 'fr' ? 'optimisé depuis 4m10s' : 'optimised from 4m10s' }}</div>
            </div>
            <div class="stat-big">
                <div class="stat-big__value">5</div>
                <div class="stat-big__label">{{ app()->getLocale() == 'fr' ? 'semaines' : 'weeks' }}</div>
                <div class="stat-big__sub">{{ app()->getLocale() == 'fr' ? 'fullstack complet' : 'full fullstack build' }}</div>
            </div>
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
                <h3>{{ app()->getLocale() == 'fr' ? 'Frontend Mobile' : 'Mobile Frontend' }}</h3>
                <div class="skills-tags">
                    <span class="skill-tag">React Native 0.72+</span>
                    <span class="skill-tag">Expo SDK 49+</span>
                    <span class="skill-tag">TypeScript 5</span>
                    <span class="skill-tag">React Navigation</span>
                    <span class="skill-tag">Google Maps API</span>
                    <span class="skill-tag">AsyncStorage</span>
                    <span class="skill-tag">Axios</span>
                </div>
            </article>
            <article class="card">
                <h3>Backend & Cloud</h3>
                <div class="skills-tags">
                    <span class="skill-tag">NestJS 10</span>
                    <span class="skill-tag">Prisma ORM 5</span>
                    <span class="skill-tag">PostgreSQL 15+</span>
                    <span class="skill-tag">PostGIS</span>
                    <span class="skill-tag">Firebase Auth</span>
                    <span class="skill-tag">Stripe API</span>
                    <span class="skill-tag">JWT / bcrypt</span>
                    <span class="skill-tag">GCP</span>
                </div>
            </article>
            <article class="card">
                <h3>DevOps & {{ __('Tools') }}</h3>
                <div class="skills-tags">
                    <span class="skill-tag">GitLab CI/CD</span>
                    <span class="skill-tag">Docker</span>
                    <span class="skill-tag">Jest + Supertest</span>
                    <span class="skill-tag">Postman</span>
                    <span class="skill-tag">Trello</span>
                    <span class="skill-tag">ESLint / Prettier</span>
                </div>
            </article>
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
