@extends('layouts.app')

@section('title', __('Stage 2026 (forecast)'))
@section('description', __('Stage 2026 Description'))

@section('content')
<section class="section hero">
    <div class="container">
        <div class="hero-simple">
            <p class="eyebrow">{{ __('Internship') }} &bull; {{ __('Forecast') }}</p>
            <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); color: var(--primary); margin-bottom: 16px; line-height: 1.1;">
                {{ __('Stage 2026 (forecast)') }}
            </h1>
            <p class="hero-subtitle">{{ __('Stage 2026 Subtitle') }}</p>

            <div class="hero-badges">
                <span class="badge">Laravel</span>
                <span class="badge">Docker</span>
                <span class="badge">CI/CD</span>
            </div>

            <div class="hero-cta">
                {{-- <a href="#" class="btn primary" download>{{ __('Download documentation') }}</a> --}}
                {{-- <a href="#" class="btn ghost" download>{{ __('Download case study') }}</a> --}}
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
                    {{ __('Stage 2026 Context Text') }}
                </p>
            </article>

            <article class="card">
                <h3>{{ __('Objectives') }}</h3>
                <ul class="list">
                    <li>{{ __('Stage 2026 Obj 1') }}</li>
                    <li>{{ __('Stage 2026 Obj 2') }}</li>
                    <li>{{ __('Stage 2026 Obj 3') }}</li>
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
                    <span class="skill-tag">PHP</span>
                    <span class="skill-tag">JavaScript</span>
                </div>
            </article>

            <article class="card">
                <h3>{{ __('Frameworks') }} & {{ __('Tools') }}</h3>
                <div class="skills-tags">
                    <span class="skill-tag">Laravel</span>
                    <span class="skill-tag">Docker</span>
                </div>
            </article>

            <article class="card">
                <h3>{{ __('Other') }}</h3>
                <div class="skills-tags">
                    <span class="skill-tag">CI/CD</span>
                    <span class="skill-tag">Git</span>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="section">
    <div class="container" style="text-align: center;">
        <a href="{{ route('portfolio.home') }}#projets" class="btn ghost" style="display: inline-flex; align-items: center; gap: 8px;">
            <span>&larr;</span> {{ __('Back to projects') }}
        </a>
    </div>
</section>
@endsection
