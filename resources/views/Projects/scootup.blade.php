@extends('layouts.app')

@section('title', 'Scootup — Stage OhLogiciel Jan–Fév 2026')
@section('description', __('Stage 2026 Description'))

@section('content')
@include('Projects.partials.project-template', [
    'eyebrow' => __('Scootup project eyebrow'),
    'projectTitle' => 'Scootup',
    'subtitle' => __('Scootup project subtitle short'),
    'badges' => ['React Native', 'TypeScript', 'NestJS', 'PostgreSQL', 'PostGIS', 'Stripe', 'Firebase', 'GitLab CI/CD'],
    'downloads' => [
        ['href' => '/files/Documentation_Scootup.pdf', 'label' => __('Download documentation')],
    ],
])
@endsection
