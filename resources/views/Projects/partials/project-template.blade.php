<section class="section hero">
    <div class="container">
        <div class="hero-simple">
            <p class="eyebrow">{{ $eyebrow ?? __('Case study') }}</p>
            <h1 class="page-hero-title">{{ $projectTitle }}</h1>
            @if(!empty($subtitle))
                <p class="hero-subtitle">{{ $subtitle }}</p>
            @endif

            <div class="hero-badges">
                @foreach(($badges ?? []) as $badge)
                    <span class="badge">{{ $badge }}</span>
                @endforeach
            </div>

            <div class="hero-cta">
                @foreach(($downloads ?? []) as $download)
                    <a href="{{ $download['href'] }}" download class="btn {{ $loop->first ? 'primary' : 'ghost' }}">{{ $download['label'] }}</a>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">{{ __('Project summary') }}</p>
            <h2>{{ __('Context and objectives') }}</h2>
        </div>

        <div class="cards-grid two">
            <article class="card">
                <h3>{{ __('Context') }}</h3>
                <p></p>
            </article>

            <article class="card">
                <h3>{{ __('Objectives') }}</h3>
                <p></p>
            </article>
        </div>
    </div>
</section>

<section class="section muted">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">{{ __('Implementation') }}</p>
            <h2>{{ __('Main deliverables') }}</h2>
        </div>

        <div class="cards-grid two">
            <article class="card">
                <h3>{{ __('Work done') }}</h3>
                <p></p>
            </article>

            <article class="card">
                <h3>{{ __('Results') }}</h3>
                <p></p>
            </article>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <p class="eyebrow">{{ __('Skills used') }}</p>
            <h2>{{ __('Technical skills') }}</h2>
        </div>

        <div class="cards-grid three">
            <article class="card">
                <h3>{{ __('Languages') }}</h3>
                <p></p>
            </article>

            <article class="card">
                <h3>{{ __('Frameworks') }}</h3>
                <p></p>
            </article>

            <article class="card">
                <h3>{{ __('Tools') }}</h3>
                <p></p>
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