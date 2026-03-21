@extends('layouts.app')

@section('title', __('Personnel Project') . ' – M2L')
@section('description', __('Personnel Meta Description'))

@section('content')
<section class="section hero">
    <div class="container">
        <div class="hero-simple">
            <p class="eyebrow">{{ __('E6 Case Study') }} &bull; {{ __('Case Study #2') }}</p>
            <h1 class="page-hero-title">
                {{ __('Personnel Project') }}
            </h1>
            <p class="hero-subtitle">{{ __('Personnel Subtitle') }}</p>

            <div class="hero-badges">
                <span class="badge">Java</span>
                <span class="badge">JDBC</span>
                <span class="badge">MySQL</span>
                <span class="badge">JUnit 5</span>
                <span class="badge accent">CCF</span>
            </div>

            <div class="hero-cta">
                <a href="/files/Fiche_situation_professionnelle_Personnel_M2L.docx" class="btn primary" download>{{ __('Download case study') }}</a>
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
                    {{ __('Personnel Context Text') }}
                </p>
            </article>

            <article class="card">
                <h3>{{ __('Objectives') }}</h3>
                <ul class="list">
                    <li>{{ __('Personnel Obj 1') }}</li>
                    <li>{{ __('Personnel Obj 2') }}</li>
                    <li>{{ __('Personnel Obj 3') }}</li>
                    <li>{{ __('Personnel Obj 4') }}</li>
                    <li>{{ __('Personnel Obj 5') }}</li>
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
                    <span class="skill-tag">Java</span>
                    <span class="skill-tag">SQL</span>
                </div>
            </article>

            <article class="card">
                <h3>{{ __('Frameworks') }} & {{ __('Tools') }}</h3>
                <div class="skills-tags">
                    <span class="skill-tag">JDBC</span>
                    <span class="skill-tag">JUnit 5</span>
                    <span class="skill-tag">Maven</span>
                    <span class="skill-tag">IntelliJ IDEA</span>
                </div>
            </article>

            <article class="card">
                <h3>{{ __('Database') }}</h3>
                <div class="skills-tags">
                    <span class="skill-tag">MySQL</span>
                    <span class="skill-tag">{{ __('Java Serialization') }}</span>
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
