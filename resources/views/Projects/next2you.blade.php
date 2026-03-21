@extends('layouts.app')

@section('title', __('Next2You'))
@section('description', __('Next2You Description'))

@section('content')
@include('Projects.partials.project-template', [
    'projectTitle' => 'Next2You',
    'subtitle' => __('Next2You Subtitle'),
    'badges' => ['Laravel', 'Docker', 'PHP', 'JavaScript'],
    'downloads' => [
        ['href' => app()->getLocale() === 'en' ? '/files/EN/Doc_Next2You_EN.pdf' : '/files/FR/Doc_Next2You_FR.pdf', 'label' => __('Download documentation')],
    ],
    'contextText' => __('Next2You Context Text'),
    'objectives' => [__('Next2You Obj 1'), __('Next2You Obj 2'), __('Next2You Obj 3')],
    'workDone' => [__('Next2You Work 1'), __('Next2You Work 2')],
    'results' => [__('Next2You Result 1'), __('Next2You Result 2')],
    'skillLanguagesText' => __('Next2You Skills Languages'),
    'skillFrameworksText' => __('Next2You Skills Frameworks'),
    'skillToolsText' => __('Next2You Skills Tools'),
])
@endsection
