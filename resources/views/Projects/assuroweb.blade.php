@extends('layouts.app')

@section('title', __('Assuroweb — Stage Mai–Juin 2025'))
@section('description', __('Assuroweb Meta Description'))

@section('content')
@include('Projects.partials.project-template', [
    'eyebrow' => __('Assuroweb project eyebrow'),
    'projectTitle' => 'Assuroweb',
    'subtitle' => __('Assuroweb project subtitle short'),
    'badges' => ['Laravel', 'PHP 8', 'MySQL', 'Quill.js', 'Docker', 'WinSCP / SSH'],
    'downloads' => [
        ['href' => '/files/Documentation_Assuroweb.pdf', 'label' => __('Download documentation')],
    ],
])
@endsection
