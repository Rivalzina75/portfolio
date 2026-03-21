@extends('layouts.app')

@section('title', __('Next2You'))
@section('description', __('Next2You Description'))

@section('content')
@include('Projects.partials.project-template', [
    'projectTitle' => 'Next2You',
    'subtitle' => __('Next2You Subtitle'),
    'badges' => ['Laravel', 'Docker', 'PHP', 'JavaScript'],
    'downloads' => [
        ['href' => '/files/Documentation_Next2You.pdf', 'label' => __('Download documentation')],
    ],
])
@endsection
