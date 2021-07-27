@extends('layouts.app')

@section('title', __('app.projects_title'))

@section('content')
    <div class="flex">
        <div class="page-name">
            <div class="navi">
                {{ __('app.projects_title') }} <i class="fa fa-angle-left"></i> <a href="{{ route('home') }}">{{ __('app.projects1') }}</a>
            </div>
            <h1>{{ __('app.projects_title') }}</h1>
        </div>
        <div class="projects-top-menu">
            <ul>
                <li><a class="a1 active">{{ __('app.projects2') }}</a></li>
                <li><a class="a2">{{ __('app.projects3') }}</a></li>
            </ul>
        </div>
    </div>
    <div class="projects-page flex2 p2">
        @isset($projects[1])
            @foreach($projects[1] as $project)
                <div class="item">
                    <div class="main-info">
                        <div class="flex">
                            <div class="date">
                                ID {{ $project->id }}
                                <span>{{ \Illuminate\Support\Carbon::parse($project->created_at)->format('d.m.Y H:i') }}</span>
                            </div>
                            <div class="views">
                                {{ $project->views }}
                            </div>
                        </div>
                        <a href="{{ route('projects', ['proj' => $project->id]) }}"
                           class="name">{{ $project->title }}</a>
                        <p class="ellipsis">{{ $project->text }}</p>
                    </div>
                    <div class="button flex">
                        @if (isset($project->responses) and $project->responses->count() > 0)
                            <div class="count">
                                @if ($project->responses->where('status', 0)->count() > 0)
                                    <span>+ {{ $project->responses->where('status', 0)->count() }}</span>
                                @endif
                                {{ $project->responses->count() }}<a
                                    href="{{ route('projects', ['proj' => $project->id]) }}">{{ __('app.projects4') }}</a>
                            </div>
                        @else
                            <div class="count no2">
                                {{ __('app.projects5') }}
                            </div>
                        @endif
                        <div>
                            <a class="edit" href="{{ route('new_project', ['project' => $project->id]) }}"></a>
                            <a class="trash" href="{{ route('projects', ['return' => $project->id]) }}"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
    <div class="projects-page p1 active flex2">
        @isset($projects[0])
            @foreach($projects[0] as $project)
                <div class="item">
                    <div class="main-info">
                        <div class="flex">
                            <div class="date">
                                ID {{ $project->id }}
                                <span>{{ \Illuminate\Support\Carbon::parse($project->created_at)->format('d.m.Y H:i') }}</span>
                            </div>
                            <div class="views">
                                {{ $project->views }}
                            </div>
                        </div>
                        <a href="{{ route('projects', ['proj' => $project->id]) }}"
                           class="name">{{ $project->title }}</a>
                        <p class="ellipsis">{{ $project->text }}</p>
                    </div>
                    <div class="button flex">
                        @if (isset($project->responses) and $project->responses->count() > 0)
                            <div class="count">
                                @if ($project->responses->where('status', 0)->count() > 0)
                                    <span>+ {{ $project->responses->where('status', 0)->count() }}</span>
                                @endif
                                {{ $project->responses->count() }}<a
                                    href="{{ route('projects', ['proj' => $project->id]) }}">{{ __('app.projects4') }}</a>
                            </div>
                        @else
                            <div class="count no2">
                                {{ __('app.projects5') }}
                            </div>
                        @endif
                        <div>
                            <a class="edit" href="{{ route('new_project', ['project' => $project->id]) }}"></a>
                            <a class="trash" href="{{ route('projects', ['delete' => $project->id]) }}"></a>
                            <a href="{{ route('requested', ['project' => $project->id]) }}">
                                <button><span></span> {{ __('app.projects6') }}</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
@endsection
