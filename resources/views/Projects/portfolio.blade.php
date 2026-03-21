@extends('layouts.app')

@section('title', __('Personal Portfolio'))
@section('description', __('Portfolio Meta Description'))

@section('content')
<section class="section hero">
    <div class="container">
        <div class="hero-simple">
            <p class="eyebrow">{{ __('E6 Case Study') }} &bull; {{ __('Case Study #1') }}</p>
            <h1 class="page-hero-title">
                {{ __('Personal Portfolio') }}
            </h1>
            <p class="hero-subtitle">{{ __('Portfolio Subtitle') }}</p>

            <div class="hero-badges">
                <span class="badge">Laravel 11</span>
                <span class="badge">JavaScript</span>
                <span class="badge">CSS</span>
                <span class="badge">Vite</span>
                <span class="badge accent">{{ __('In production') }}</span>
            </div>

            <div class="hero-cta">
                <a href="{{ route('portfolio.documentation') }}" download class="btn primary">{{ __('Download documentation') }}</a>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">{{ __('Context') }}</p>
            <h2>{{ __('Context and objectives') }}</h2>
        </div>

        <div class="cards-grid two">
            <article class="card">
                <h3>{{ __('Context') }}</h3>
                <p>
                    {{ __('Portfolio Context Text') }}
                </p>
            </article>

            <article class="card">
                <h3>{{ __('Objectives') }}</h3>
                <ul class="list">
                    <li>{{ __('Portfolio Obj 1') }}</li>
                    <li>{{ __('Portfolio Obj 2') }}</li>
                    <li>{{ __('Portfolio Obj 3') }}</li>
                    <li>{{ __('Portfolio Obj 4') }}</li>
                </ul>
            </article>
        </div>
    </div>
</section>

<section class="section muted">
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
                    <span class="skill-tag">JavaScript ES6+</span>
                    <span class="skill-tag">HTML / CSS</span>
                </div>
            </article>

            <article class="card">
                <h3>{{ __('Frameworks') }} & {{ __('Tools') }}</h3>
                <div class="skills-tags">
                    <span class="skill-tag">Laravel 11</span>
                    <span class="skill-tag">Blade</span>
                    <span class="skill-tag">Vite</span>
                    <span class="skill-tag">Swiper.js</span>
                    <span class="skill-tag">Anime.js</span>
                </div>
            </article>

            <article class="card">
                <h3>{{ __('Stack / Env.') }}</h3>
                <div class="skills-tags">
                    <span class="skill-tag">Git / GitHub</span>
                    <span class="skill-tag">Render</span>
                    <span class="skill-tag">RSS / Atom</span>
                    <span class="skill-tag">NPM</span>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="section">
    <div class="container project-back">
        <a href="{{ route('portfolio.home') }}#projets" class="btn ghost project-back-link">
            <span>&larr;</span> {{ __('Back to projects') }}
        </a>
    </div>
</section>
@endsection
