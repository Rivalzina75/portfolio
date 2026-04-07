@php
    $resolvedDownloads = [];
    foreach (($downloads ?? []) as $download) {
        $label = $download['label'] ?? __('Download documentation');
        $href = $download['href'] ?? null;
        $available = false;

        if (is_string($href) && $href !== '') {
            $relativePath = ltrim((string) (parse_url($href, PHP_URL_PATH) ?? ''), '/');
            if ($relativePath !== '' && file_exists(public_path($relativePath))) {
                $available = true;
            } else {
                $fallbackHref = str_replace(['/EN/', '_EN.'], ['/FR/', '_FR.'], $href);
                $fallbackPath = ltrim((string) (parse_url($fallbackHref, PHP_URL_PATH) ?? ''), '/');
                if ($fallbackPath !== '' && file_exists(public_path($fallbackPath))) {
                    $href = $fallbackHref;
                    if (app()->getLocale() === 'en') {
                        $label .= ' (FR)';
                    }
                    $available = true;
                }
            }
        }

        $resolvedDownloads[] = [
            'label' => $label,
            'href' => $href,
            'available' => $available,
        ];
    }

    $projectImagePath = $projectImage ?? null;
    $projectImageIsRemote = is_string($projectImagePath) && preg_match('/^https?:\/\//i', $projectImagePath);
    $projectImagePublicPath = ltrim((string) (parse_url((string) $projectImagePath, PHP_URL_PATH) ?? ''), '/');
    $hasProjectImage = $projectImageIsRemote || ($projectImagePublicPath !== '' && file_exists(public_path($projectImagePublicPath)));
    
    $objectivesCount = count((array) ($objectives ?? []));
    $resultsCount = count((array) ($results ?? []));
    $workCount = count((array) ($workDone ?? []));
    $badgesCount = count((array) ($badges ?? []));
@endphp

{{-- ==================== HERO SECTION ==================== --}}
<section class="section project-hero-v2">
    <div class="project-hero-bg"></div>
    <div class="container">
        <div class="project-hero-grid">
            {{-- Left: Content --}}
            <div class="project-hero-content">
                <nav class="project-breadcrumb">
                    <a href="{{ route('portfolio.home') }}#projets">{{ __('Projects') }}</a>
                    <span class="breadcrumb-sep">/</span>
                    <span class="breadcrumb-current">{{ $projectTitle }}</span>
                </nav>
                
                <span class="project-eyebrow">{{ $eyebrow ?? __('Case study') }}</span>
                
                <h1 class="project-title-main">{{ $projectTitle }}</h1>
                
                @if(!empty($subtitle))
                    <p class="project-subtitle-main">{{ $subtitle }}</p>
                @endif

                {{-- Quick Stats --}}
                <div class="project-quick-stats">
                    <div class="quick-stat">
                        <span class="quick-stat-value">{{ $objectivesCount }}</span>
                        <span class="quick-stat-label">{{ __('Objectives') }}</span>
                    </div>
                    <div class="quick-stat-divider"></div>
                    <div class="quick-stat">
                        <span class="quick-stat-value">{{ $workCount }}</span>
                        <span class="quick-stat-label">{{ __('Deliverables') }}</span>
                    </div>
                    <div class="quick-stat-divider"></div>
                    <div class="quick-stat">
                        <span class="quick-stat-value">{{ $badgesCount }}</span>
                        <span class="quick-stat-label">{{ __('Technologies') }}</span>
                    </div>
                </div>

                {{-- Tech Stack --}}
                <div class="project-stack">
                    @foreach(($badges ?? []) as $badge)
                        <span class="stack-tag">{{ $badge }}</span>
                    @endforeach
                </div>

                {{-- CTAs --}}
                <div class="project-actions">
                    @foreach($resolvedDownloads as $download)
                        @if($download['available'])
                            <a href="{{ $download['href'] }}" download class="btn {{ $loop->first ? 'primary' : 'ghost' }}">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                    <polyline points="7,10 12,15 17,10"/>
                                    <line x1="12" y1="15" x2="12" y2="3"/>
                                </svg>
                                {{ $download['label'] }}
                            </a>
                        @else
                            <span class="btn ghost is-disabled" aria-disabled="true">{{ $download['label'] }}</span>
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- Right: Visual --}}
            <div class="project-hero-visual">
                <div class="project-visual-frame">
                    <div class="visual-frame-header">
                        <div class="frame-dots">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="frame-url">
                            <span class="frame-lock">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                </svg>
                            </span>
                            <span>{{ strtolower(str_replace(' ', '-', $projectTitle)) }}.dev</span>
                        </div>
                    </div>
                    <div class="visual-frame-content">
                        @if($hasProjectImage)
                            <img src="{{ $projectImagePath }}"
                                 alt="{{ $projectTitle }}"
                                 loading="eager"
                                 class="project-main-image"
                                 onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                        @endif
                        <div class="project-image-fallback" @if($hasProjectImage) style="display:none" @endif>
                            <div class="fallback-pattern"></div>
                            <span class="fallback-text">{{ $projectTitle }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==================== CONTEXT & OBJECTIVES SECTION ==================== --}}
<section class="section project-context-section">
    <div class="container">
        <div class="context-layout">
            {{-- Context Block --}}
            <div class="context-block">
                <div class="block-label">
                    <span class="label-line"></span>
                    <span class="label-text">{{ __('Context') }}</span>
                </div>
                <h2 class="context-title">{{ __('Project overview') }}</h2>
                <p class="context-text">{{ $contextText ?? '' }}</p>
            </div>
            
            {{-- Objectives Block --}}
            <div class="objectives-block">
                <div class="block-label">
                    <span class="label-line"></span>
                    <span class="label-text">{{ __('Objectives') }}</span>
                </div>
                @if(!empty($objectives))
                    <ul class="objectives-list">
                        @foreach($objectives as $index => $objective)
                            <li class="objective-item">
                                <span class="obj-marker">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <span class="obj-content">{{ $objective }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ==================== WORK & RESULTS SECTION ==================== --}}
<section class="section project-work-section">
    <div class="container">
        <div class="section-intro">
            <div class="block-label block-label--center">
                <span class="label-line"></span>
                <span class="label-text">{{ __('Implementation') }}</span>
                <span class="label-line"></span>
            </div>
            <h2 class="section-title">{{ __('Work and results') }}</h2>
            <p class="section-desc">{{ __('Work results description') }}</p>
        </div>

        <div class="work-grid">
            {{-- Work Done --}}
            <article class="work-card">
                <header class="work-card-header">
                    <div class="work-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                            <path d="M2 17l10 5 10-5"/>
                            <path d="M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <h3>{{ __('Work done') }}</h3>
                </header>
                @if(!empty($workDone))
                    <ul class="work-list">
                        @foreach($workDone as $item)
                            <li>
                                <span class="work-check">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                        <polyline points="20,6 9,17 4,12"/>
                                    </svg>
                                </span>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </article>

            {{-- Results --}}
            <article class="work-card work-card--results">
                <header class="work-card-header">
                    <div class="work-icon work-icon--accent">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="8" r="7"/>
                            <polyline points="8.21,13.89 7,23 12,20 17,23 15.79,13.88"/>
                        </svg>
                    </div>
                    <h3>{{ __('Results') }}</h3>
                </header>
                @if(!empty($results))
                    <ul class="work-list">
                        @foreach($results as $result)
                            <li>
                                <span class="work-check work-check--accent">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                        <polyline points="20,6 9,17 4,12"/>
                                    </svg>
                                </span>
                                <span>{{ $result }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </article>
        </div>
    </div>
</section>

{{-- ==================== SKILLS SECTION ==================== --}}
<section class="section project-skills-section">
    <div class="container">
        <div class="section-intro">
            <div class="block-label block-label--center">
                <span class="label-line"></span>
                <span class="label-text">{{ __('Skills used') }}</span>
                <span class="label-line"></span>
            </div>
            <h2 class="section-title">{{ __('Technical expertise') }}</h2>
        </div>

        <div class="skills-grid">
            <article class="skill-card">
                <div class="skill-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <polyline points="16,18 22,12 16,6"/>
                        <polyline points="8,6 2,12 8,18"/>
                    </svg>
                </div>
                <h3>{{ __('Languages') }}</h3>
                <p>{{ $skillLanguagesText ?? '' }}</p>
            </article>

            <article class="skill-card">
                <div class="skill-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <rect x="3" y="3" width="7" height="7"/>
                        <rect x="14" y="3" width="7" height="7"/>
                        <rect x="14" y="14" width="7" height="7"/>
                        <rect x="3" y="14" width="7" height="7"/>
                    </svg>
                </div>
                <h3>{{ __('Frameworks') }}</h3>
                <p>{{ $skillFrameworksText ?? '' }}</p>
            </article>

            <article class="skill-card">
                <div class="skill-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                    </svg>
                </div>
                <h3>{{ __('Tools') }}</h3>
                <p>{{ $skillToolsText ?? '' }}</p>
            </article>
        </div>
    </div>
</section>

{{-- ==================== BACK NAVIGATION ==================== --}}
<section class="section project-nav-section">
    <div class="container">
        <a href="{{ route('portfolio.home') }}#projets" class="back-link">
            <span class="back-link-arrow">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="19" y1="12" x2="5" y2="12"/>
                    <polyline points="12,19 5,12 12,5"/>
                </svg>
            </span>
            <span class="back-link-text">{{ __('Back to projects') }}</span>
        </a>
    </div>
</section>
