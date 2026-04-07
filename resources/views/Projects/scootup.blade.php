@extends('layouts.app')

@section('title', 'Scootup — Stage OhLogiciel Jan–Fév 2026')
@section('description', __('Stage 2026 Description'))

@section('content')
@include('Projects.partials.project-template', [
    'eyebrow' => __('Scootup project eyebrow'),
    'projectTitle' => 'Scootup',
    'subtitle' => __('Scootup project subtitle short'),
    'projectImage' => asset('images/scootup.svg'),
    'projectIcon' => '🛴',
    'badges' => ['React Native', 'TypeScript', 'NestJS', 'PostgreSQL', 'PostGIS', 'Stripe', 'Firebase', 'GitLab CI/CD'],
    'downloads' => [
        ['href' => app()->getLocale() === 'en' ? '/files/EN/Doc_Scootup_EN.pdf' : '/files/FR/Doc_Scootup_FR.pdf', 'label' => __('Download documentation')],
    ],
    'contextText' => __('Scootup Context Text'),
    'objectives' => [__('Scootup Obj 1'), __('Scootup Obj 2'), __('Scootup Obj 3')],
    'workDone' => [__('Scootup Work 1'), __('Scootup Work 2')],
    'results' => [__('Scootup Result 1'), __('Scootup Result 2')],
    'skillLanguagesText' => __('Scootup Skills Languages'),
    'skillFrameworksText' => __('Scootup Skills Frameworks'),
    'skillToolsText' => __('Scootup Skills Tools'),
])
@endsection
