@extends('layouts.app')

@section('title', __('Next2You'))
@section('description', __('Next2You Description'))

@section('content')
<section class="section hero">
    <div class="container">
        <div class="hero-simple">
            <p class="eyebrow">{{ __('Case study') }}</p>
            <h1 class="page-hero-title">
                Next2You
            </h1>
            <p class="hero-subtitle">{{ __('Next2You Subtitle') }}</p>

            <div class="hero-badges">
                <span class="badge">Laravel</span>
                <span class="badge">Docker</span>
                <span class="badge">PHP</span>
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
                    {{ __('Next2You Context Text') }}
                </p>
            </article>

            <article class="card">
                <h3>{{ __('Objectives') }}</h3>
                <ul class="list">
                    <li>{{ __('Next2You Obj 1') }}</li>
                    <li>{{ __('Next2You Obj 2') }}</li>
                    <li>{{ __('Next2You Obj 3') }}</li>
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
                    <span class="skill-tag">Compose</span>
                </div>
            </article>

            <article class="card">
                <h3>{{ __('Other') }}</h3>
                <div class="skills-tags">
                    <span class="skill-tag">Git</span>
                    <span class="skill-tag">Trello</span>
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
