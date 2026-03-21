@extends('layouts.app')

@section('title', __('Machina'))
@section('description', __('Machina Description'))

@section('content')
@include('Projects.partials.project-template', [
    'projectTitle' => 'Machina',
    'subtitle' => __('Machina Subtitle'),
    'badges' => ['Laravel', 'Docker', 'PHP', 'HTML / CSS / JS'],
    'downloads' => [
        ['href' => '/files/Documentation_Machina.pdf', 'label' => __('Download documentation')],
    ],
])
@endsection
