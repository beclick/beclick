@extends('layouts.app')

@section('title', __('app.requests_title'))

@section('content')
    <div class="flex">
        <div class="page-name">
            <div class="navi">
                {{ __('app.requests_title') }} <i class="fa fa-angle-left"></i> <a href="{{ route('home') }}">{{ __('app.requests1') }}</a>
            </div>
            <h1>{{ __('app.requests_title') }}</h1>
        </div>
        <div class="projects-top-menu">
            <ul>
                <li><a class="a1 active">{{ __('app.requests2') }}</a></li>
                <li><a class="a2">{{ __('app.requests3') }}</a></li>
                <li><a class="a3">{{ __('app.requests4') }}</a></li>
            </ul>
        </div>
    </div>
    <div class="projects-page p3">
        @foreach($requs as $requ)
            @if($requ->status != 0)
                <div class="item">
                    <div class="main-info">
                        <div class="flex">
                            <div class="date">
                                ID {{ $requ->project->id }}
                                @if ($requ->read == 1)
                                    <span><strong style="color: #EB5757">{{ __('app.requests5') }}</strong> {{ \Illuminate\Support\Carbon::parse($requ->project->updated_at)->format('d.m.Y H:i') }}</span>
                                @else
                                    <span>{{ \Illuminate\Support\Carbon::parse($requ->project->updated_at)->format('d.m.Y H:i') }}</span>
                                @endif
                            </div>
                            <div class="views">
                                {{ $requ->project->views }}
                            </div>
                        </div>
                        <a href="#" class="name">{{ $requ->project->title }}</a>
                        <p class="ellipsis">{{ $requ->project->text }}</p>
                    </div>
                    <div class="button flex">
                        <a href="{{ route('requests', ['return' => $requ->project->id]) }}" class="link">{{ __('app.requests6') }}</a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="projects-page p2">
        @foreach($requs as $requ)
            @if($requ->project->responses->count() > 0 and $requ->status == 0)
                <div class="item">
                    <div class="main-info">
                        <div class="flex">
                            <div class="date">
                                ID {{ $requ->project->id }}
                                @if ($requ->read == 1)
                                    <span><strong style="color: #EB5757">{{ __('app.requests5') }}</strong> {{ \Illuminate\Support\Carbon::parse($requ->project->updated_at)->format('d.m.Y H:i') }}</span>
                                @else
                                    <span>{{ \Illuminate\Support\Carbon::parse($requ->project->updated_at)->format('d.m.Y H:i') }}</span>
                                @endif
                            </div>
                            <div class="views">
                                {{ $requ->project->views }}
                            </div>
                        </div>
                        <a href="{{ route('requests', ['proj' =>$requ->project->id]) }}"
                           class="name">{{ $requ->project->title }}</a>
                        <p class="ellipsis">{{ $requ->project->text }}</p>
                    </div>
                    <div class="button flex">
                        @if ($subscription == true)
                            <a href="{{ route('requests', ['delete' => $requ->project->id]) }}"
                               class="link">{{ __('app.requests7') }}</a>
                            <div>
                                <a href="{{ route('requests', ['proj' =>$requ->project->id]) }}">
                                    <button class="active"><span></span> {{ __('app.requests8') }}</button>
                                </a>
                            </div>
                        @else
                            <a href="{{ route('payment') }}" class="link">{{ __('app.requests9') }}</a>
                            <div>
                                <button class="active" disabled><span></span> {{ __('app.requests10') }}</button>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="projects-page p1 active flex2">
        @foreach($requs as $requ)
            @if($requ->project->responses->count() == 0 and $requ->status == 0)
                <div class="item">
                    <div class="main-info">
                        <div class="flex">
                            <div class="date">
                                ID {{ $requ->project->id }}
                                @if ($requ->read == 1)
                                    <span><strong style="color: #EB5757">{{ __('app.requests5') }}</strong> {{ \Illuminate\Support\Carbon::parse($requ->project->updated_at)->format('d.m.Y H:i') }}</span>
                                @else
                                    <span>{{ \Illuminate\Support\Carbon::parse($requ->project->updated_at)->format('d.m.Y H:i') }}</span>
                                @endif
                            </div>
                            <div class="views">
                                {{ $requ->project->views }}
                            </div>
                        </div>
                        <a href="{{ route('requests', ['proj' =>$requ->project->id]) }}"
                           class="name">{{ $requ->project->title }}</a>
                        <p class="ellipsis">{{ $requ->project->text }}</p>
                    </div>
                    <div class="button flex">
                        @if ($subscription == true)
                            <a href="{{ route('requests', ['delete' => $requ->project->id]) }}" class="link">{{ __('app.requests11') }}</a>
                            <div>
                                <a href="{{ route('requests', ['proj' =>$requ->project->id]) }}">
                                    <button class="big"><span></span> {{ __('app.requests12') }}</button>
                                </a>
                            </div>
                        @else
                            <a href="{{ route('payment') }}" class="link">{{ __('app.requests9') }}</a>
                            <div>
                                <button class="big" disabled><span></span> {{ __('app.requests12') }}</button>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
    </div>

@endsection
