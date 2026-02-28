@extends('layouts.app')

@section('title', __('Assuroweb (Internship)'))
@section('description', __('Assuroweb Meta Description'))

@section('content')
<section class="section hero">
    <div class="container">
        <div class="hero-simple">
            <p class="eyebrow">{{ __('Internship') }} &bull; {{ __('E6 Case Study') }}</p>
            <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); color: var(--primary); margin-bottom: 16px; line-height: 1.1;">
                Assuroweb
            </h1>
            <p class="hero-subtitle">{{ __('Assuroweb Subtitle') }}</p>

            <div class="hero-badges">
                <span class="badge">Laravel</span>
                <span class="badge">Docker</span>
                <span class="badge">PHP 8</span>
                <span class="badge">MySQL</span>
                <span class="badge accent">{{ __('1st year internship') }}</span>
            </div>

            <div class="hero-cta">
                <a href="/files/RAPPORT DE STAGE 5 Mai-6 Juin _ MEKAOUI MOHAMED, BTS SIO1.pdf" download class="btn primary">{{ __('Download documentation') }}</a>
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
                    {{ __('Assuroweb Context Text') }}
                </p>
            </article>

            <article class="card">
                <h3>{{ __('Objectives') }}</h3>
                <ul class="list">
                    <li>{{ __('Assuroweb Obj 1') }}</li>
                    <li>{{ __('Assuroweb Obj 2') }}</li>
                    <li>{{ __('Assuroweb Obj 3') }}</li>
                    <li>{{ __('Assuroweb Obj 4') }}</li>
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
                    <span class="skill-tag">JavaScript</span>
                    <span class="skill-tag">SQL</span>
                    <span class="skill-tag">HTML / CSS</span>
                </div>
            </article>

            <article class="card">
                <h3>{{ __('Frameworks') }} & {{ __('Tools') }}</h3>
                <div class="skills-tags">
                    <span class="skill-tag">Laravel</span>
                    <span class="skill-tag">Blade</span>
                    <span class="skill-tag">Eloquent ORM</span>
                    <span class="skill-tag">QuillJS</span>
                </div>
            </article>

            <article class="card">
                <h3>{{ __('Stack / Env.') }}</h3>
                <div class="skills-tags">
                    <span class="skill-tag">Docker</span>
                    <span class="skill-tag">Git / GitHub</span>
                    <span class="skill-tag">MySQL</span>
                    <span class="skill-tag">SSH / WinSCP</span>
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
