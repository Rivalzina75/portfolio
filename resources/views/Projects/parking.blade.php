@extends('layouts.app')

@section('title', __('Parking Project'))
@section('description', __('Parking Description'))

@section('content')
<section class="section hero">
    <div class="container">
        <div class="hero-simple">
            <p class="eyebrow">{{ __('Case study') }}</p>
            <h1 class="page-hero-title">
                {{ __('Parking Project') }}
            </h1>
            <p class="hero-subtitle">{{ __('Parking Subtitle') }}</p>

            <div class="hero-badges">
                <span class="badge">Laravel</span>
                <span class="badge">MySQL</span>
                <span class="badge">JavaScript</span>
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
                    {{ __('Parking Context Text') }}
                </p>
            </article>

            <article class="card">
                <h3>{{ __('Objectives') }}</h3>
                <ul class="list">
                    <li>{{ __('Parking Obj 1') }}</li>
                    <li>{{ __('Parking Obj 2') }}</li>
                    <li>{{ __('Parking Obj 3') }}</li>
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
                    <span class="skill-tag">SQL</span>
                </div>
            </article>

            <article class="card">
                <h3>{{ __('Frameworks') }} & {{ __('Tools') }}</h3>
                <div class="skills-tags">
                    <span class="skill-tag">Laravel</span>
                </div>
            </article>

            <article class="card">
                <h3>{{ __('Database') }}</h3>
                <div class="skills-tags">
                    <span class="skill-tag">MySQL</span>
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
