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
        ['href' => app()->getLocale() === 'en' ? '/files/EN/Doc_Assuroweb_EN.pdf' : '/files/FR/Doc_Assuroweb_FR.pdf', 'label' => __('Download documentation')],
    ],
    'contextText' => __('Assuroweb Context Text'),
    'objectives' => [__('Assuroweb Obj 1'), __('Assuroweb Obj 2'), __('Assuroweb Obj 3'), __('Assuroweb Obj 4')],
    'workDone' => [__('Assuroweb Work 1'), __('Assuroweb Work 2')],
    'results' => [__('Assuroweb Result 1'), __('Assuroweb Result 2')],
    'skillLanguagesText' => __('Assuroweb Skills Languages'),
    'skillFrameworksText' => __('Assuroweb Skills Frameworks'),
    'skillToolsText' => __('Assuroweb Skills Tools'),
])
@endsection
