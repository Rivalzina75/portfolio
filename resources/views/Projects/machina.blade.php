@extends('layouts.app')

@section('title', __('Machina'))
@section('description', __('Machina Description'))

@section('content')
<section class="section hero">
    <div class="container">
        <div class="hero-simple">
            <p class="eyebrow">{{ __('Case study') }}</p>
            <h1 class="page-hero-title">
                Machina
            </h1>
            <p class="hero-subtitle">{{ __('Machina Subtitle') }}</p>

            <div class="hero-badges">
                <span class="badge">Laravel</span>
                <span class="badge">Docker</span>
                <span class="badge">PHP</span>
                <span class="badge">HTML / CSS / JS</span>
            </div>

            <div class="hero-cta">
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
                    {{ __('Machina Context Text') }}
                </p>
            </article>

            <article class="card">
                <h3>{{ __('Objectives') }}</h3>
                <ul class="list">
                    <li>{{ __('Machina Obj 1') }}</li>
                    <li>{{ __('Machina Obj 2') }}</li>
                    <li>{{ __('Machina Obj 3') }}</li>
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
                    <span class="skill-tag">HTML / CSS</span>
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
                    <span class="skill-tag">API</span>
                    <span class="skill-tag">Git</span>
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
