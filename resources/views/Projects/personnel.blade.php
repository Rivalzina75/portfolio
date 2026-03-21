@extends('layouts.app')

@section('title', __('Personnel Project') . ' – M2L')
@section('description', __('Personnel Meta Description'))

@section('content')
@include('Projects.partials.project-template', [
    'eyebrow' => __('E6 Case Study') . ' • ' . __('Case Study #2'),
    'projectTitle' => __('Personnel Project'),
    'subtitle' => __('Personnel Subtitle'),
    'badges' => ['Java', 'JDBC', 'MySQL', 'JUnit 5'],
    'downloads' => [
        ['href' => '/files/Documentation_Personnel_M2L.pdf', 'label' => __('Download documentation')],
        ['href' => '/files/Fiche_situation_professionnelle_Personnel_M2L.docx', 'label' => __('Download professional situation sheet')],
    ],
])
@endsection
