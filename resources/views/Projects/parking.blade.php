@extends('layouts.app')

@section('title', __('Parking Project'))
@section('description', __('Parking Description'))

@section('content')
@include('Projects.partials.project-template', [
    'projectTitle' => __('Parking Project'),
    'subtitle' => __('Parking Subtitle'),
    'badges' => ['Laravel', 'MySQL', 'JavaScript'],
    'downloads' => [
        ['href' => '/files/Documentation_Parking.pdf', 'label' => __('Download documentation')],
        ['href' => '/files/Fiche_situation_professionnelle_Parking.docx', 'label' => __('Download professional situation sheet')],
    ],
])
@endsection
