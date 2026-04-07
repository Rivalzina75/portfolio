@extends('layouts.app')

@section('title', __('Parking Project'))
@section('description', __('Parking Description'))

@section('content')
@include('Projects.partials.project-template', [
    'projectTitle' => __('Parking Project'),
    'subtitle' => __('Parking Subtitle'),
    'projectImage' => asset('images/parking.svg'),
    'projectIcon' => '🅿️',
    'badges' => ['Laravel', 'MySQL', 'JavaScript'],
    'downloads' => [
        ['href' => app()->getLocale() === 'en' ? '/files/EN/Doc_Parking_EN.pdf' : '/files/FR/Doc_Parking_FR.pdf', 'label' => __('Download documentation')],
        ['href' => app()->getLocale() === 'en' ? '/files/EN/Fiche_Situation_2_Mekaoui_Mohamed_EN.pdf' : '/files/FR/Fiche_Situation_2_Mekaoui_Mohamed_FR.pdf', 'label' => __('Download professional situation sheet')],
    ],
    'contextText' => __('Parking Context Text'),
    'objectives' => [__('Parking Obj 1'), __('Parking Obj 2'), __('Parking Obj 3')],
    'workDone' => [__('Parking Work 1'), __('Parking Work 2')],
    'results' => [__('Parking Result 1'), __('Parking Result 2')],
    'skillLanguagesText' => __('Parking Skills Languages'),
    'skillFrameworksText' => __('Parking Skills Frameworks'),
    'skillToolsText' => __('Parking Skills Tools'),
])
@endsection
