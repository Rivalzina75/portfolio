@extends('layouts.app')

@section('title', __('Personal Portfolio'))
@section('description', __('Portfolio Meta Description'))

@section('content')
@include('Projects.partials.project-template', [
    'eyebrow' => __('E6 Case Study') . ' • ' . __('Case Study #1'),
    'projectTitle' => __('Personal Portfolio'),
    'subtitle' => __('Portfolio Subtitle'),
    'badges' => ['Laravel 11', 'JavaScript', 'CSS', 'Vite'],
    'downloads' => [
        ['href' => route('portfolio.documentation'), 'label' => __('Download documentation')],
    ],
])
@endsection
