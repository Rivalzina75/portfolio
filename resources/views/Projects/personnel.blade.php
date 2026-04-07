@extends('layouts.app')

@section('title', __('Personnel Project') . ' – M2L')
@section('description', __('Personnel Meta Description'))

@section('content')
@include('Projects.partials.project-template', [
    'eyebrow' => __('E6 Case Study') . ' • ' . __('Case Study #2'),
    'projectTitle' => __('Personnel Project'),
    'subtitle' => __('Personnel Subtitle'),
    'projectImage' => asset('images/personnel.svg'),
    'projectIcon' => '👥',
    'badges' => ['Java', 'JDBC', 'MySQL', 'JUnit 5'],
    'downloads' => [
        ['href' => app()->getLocale() === 'en' ? '/files/EN/Doc_Personnel_EN.pdf' : '/files/FR/Doc_Personnel_FR.pdf', 'label' => __('Download documentation')],
        ['href' => app()->getLocale() === 'en' ? '/files/EN/Fiche_situation_1_Mekaoui_Mohamed_EN.pdf' : '/files/FR/Fiche_situation_1_Mekaoui_Mohamed_FR.pdf', 'label' => __('Download professional situation sheet')],
    ],
    'contextText' => __('Personnel Context Text'),
    'objectives' => [__('Personnel Obj 1'), __('Personnel Obj 2'), __('Personnel Obj 3'), __('Personnel Obj 4'), __('Personnel Obj 5')],
    'workDone' => [__('Personnel Work 1'), __('Personnel Work 2')],
    'results' => [__('Personnel Result 1'), __('Personnel Result 2')],
    'skillLanguagesText' => __('Personnel Skills Languages'),
    'skillFrameworksText' => __('Personnel Skills Frameworks'),
    'skillToolsText' => __('Personnel Skills Tools'),
])
@endsection
