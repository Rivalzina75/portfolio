@extends('layouts.app')

@section('title', __('Machina'))
@section('description', __('Machina Description'))

@section('content')
@include('Projects.partials.project-template', [
    'projectTitle' => 'Machina',
    'subtitle' => __('Machina Subtitle'),
    'projectImage' => asset('images/machina.png'),
    'projectIcon' => '🏭',
    'badges' => ['Laravel', 'Docker', 'PHP', 'HTML / CSS / JS'],
    'downloads' => [
        ['href' => app()->getLocale() === 'en' ? '/files/EN/Doc_Machina_EN.pdf' : '/files/FR/Doc_Machina_FR.pdf', 'label' => __('Download documentation')],
    ],
    'contextText' => __('Machina Context Text'),
    'objectives' => [__('Machina Obj 1'), __('Machina Obj 2'), __('Machina Obj 3')],
    'workDone' => [__('Machina Work 1'), __('Machina Work 2')],
    'results' => [__('Machina Result 1'), __('Machina Result 2')],
    'skillLanguagesText' => __('Machina Skills Languages'),
    'skillFrameworksText' => __('Machina Skills Frameworks'),
    'skillToolsText' => __('Machina Skills Tools'),
])
@endsection
