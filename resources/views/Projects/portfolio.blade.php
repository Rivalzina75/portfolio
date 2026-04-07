@extends('layouts.app')

@section('title', __('Portfolio'))
@section('description', __('Portfolio Meta Description'))

@section('content')
@include('Projects.partials.project-template', [
    'eyebrow' => __('E6 Case Study') . ' • ' . __('Case Study #1'),
    'projectTitle' => __('Portfolio'),
    'subtitle' => __('Portfolio Subtitle'),
    'projectImage' => asset('images/portfolio.png'),
    'projectIcon' => '🧑‍💻',
    'badges' => ['Laravel 12', 'JavaScript', 'CSS', 'Vite'],
    'downloads' => [
        ['href' => app()->getLocale() === 'en' ? '/files/EN/Doc_Portfolio_EN.pdf' : '/files/FR/Doc_Portfolio_FR.pdf', 'label' => __('Download documentation')],
    ],
    'contextText' => __('Portfolio Context Text'),
    'objectives' => [__('Portfolio Obj 1'), __('Portfolio Obj 2'), __('Portfolio Obj 3'), __('Portfolio Obj 4')],
    'workDone' => [__('Portfolio Work 1'), __('Portfolio Work 2')],
    'results' => [__('Portfolio Result 1'), __('Portfolio Result 2')],
    'skillLanguagesText' => __('Portfolio Skills Languages'),
    'skillFrameworksText' => __('Portfolio Skills Frameworks'),
    'skillToolsText' => __('Portfolio Skills Tools'),
])
@endsection
