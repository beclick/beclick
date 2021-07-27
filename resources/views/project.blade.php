@extends('layouts.app')

@section('title', $project->title)

@section('content')
    <div class="flex">
        <a href="{{ route('projects') }}" class="back-mob-link"></a>
        <div class="page-name">
            <div class="navi other">
                {{ $project->title }} <i class="fa fa-angle-left"></i> <a
                    href="{{ route('projects') }}">{{ __('app.project1') }}</a>
                <i class="fa fa-angle-left"></i> <a href="{{ route('home') }}">{{ __('app.project2') }}</a>
            </div>
        </div>
        <div class="top-back-link other">
            <a href="{{ route('projects') }}" class="other"><span></span> {{ __('app.project3') }}</a>
        </div>
    </div>
    <div class="project-page">
        <div class="top-info">
            <div class="flex">
                <div class="date">
                    ID {{ $project->id }}
                    <span>{{ \Illuminate\Support\Carbon::parse($project->created_at)->format('d.m.Y H:i') }}</span>
                </div>
                <div class="views">
                    {{ $project->views }}
                </div>
            </div>
            <div class="flex">
                <div class="info">
                    <div class="name">
                        {{ $project->title }}
                    </div>
                    <p>{{ $project->text }}</p>
                    <div class="field-name">
                        {!! $project->questions !!}
                    </div>
                    <div class="button">
                        @if($project->status == 0)
                            <a href="{{ route('requested', ['project' => $project->id]) }}">
                                <button><span></span> {{ __('app.project4') }}</button>
                            </a>
                        @endif
                        <a class="trash edit"
                           href="{{ route('new_project', ['project' => $project->id]) }}">{{ __('app.project5') }}</a>
                        @if($project->status == 0)
                            <a class="trash"
                               href="{{ route('projects', ['delete' => $project->id]) }}">{{ __('app.project6') }}</a>
                        @else
                            <a class="trash"
                               href="{{ route('projects', ['return' => $project->id]) }}">{{ __('app.project7') }}</a>
                        @endif
                    </div>
                </div>
                <table>
                    <tr>
                        <td>{{ __('app.project8') }}</td>
                        <td>
                            @foreach (explode('|', $project->regions) as $region)
                                @if ($loop->index > 0)
                                    <p>{{ $region }}</p>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        @isset($project->profile->address)
                            <td>{{ __('app.project9') }}</td>
                            <td>{{ $project->profile->address }}</td>
                        @endisset
                    </tr>
                    <tr>
                        @isset($project->profile->contact_phone)
                            <td>{{ __('app.project10') }}</td>
                            <td>{{ $project->profile->contact_phone }}</td>
                        @endisset
                    </tr>
                    <tr>
                        @isset($project->profile->email)
                            <td>{{ __('app.email') }}</td>
                            <td><a href="mailto:{{ $project->profile->email }}">{{ $project->profile->email }}</a></td>
                        @endisset
                    </tr>
                    <tr>
                        @isset($project->profile->contact_person)
                            <td>{{ __('app.project11') }}</td>
                            <td>{{ $project->profile->contact_person }}</td>
                        @endisset
                    </tr>
                    <tr>
                        @isset($project->docs_url)
                            <td>{{ __('app.project12') }}</td>
                            <td><a target="_blank" href="{{ $project->docs_url }}">{{ __('app.project13') }}</a></td>
                        @endisset
                    </tr>
                </table>
            </div>
        </div>
        <div class="flex">
            <nav class="menu">
                <span>{{ __('app.project14') }}</span>
                <ul>
                    <li><a class="a1 active">{{ __('app.project15') }}</a></li>
                    <li><a class="a2">{{ __('app.project16') }}</a></li>
                    <li><a class="a3">{{ __('app.project17') }}</a></li>
                </ul>
            </nav>
            <div class="middle-price">
                {{ __('app.project18') }} <span>$ {{ number_format($price, 2, '.', '') }}</span>
            </div>
        </div>
        <div class="list l1 active">
            @isset($project->responses)
                @foreach($project->responses as $response)
                    <div class="response">
                        <div class="main-info flex">
                            <div class="name">
                                <div>
                                    <a href="{{ route('company', ['id' => $response->profile->id]) }}">
                                        <div class="avatar"
                                             style=" @isset($response->profile->image) background-image: url({{ asset('storage/' . $response->profile->image) }}); @endisset background-size: contain; background-repeat: no-repeat; background-position: center;">
                                        </div>
                                    </a>
                                </div>
                                <div style="padding-right: 2rem">
                                    <div class="n">
                                        {{ $response->profile->name }}
                                    </div>
                                    <p>{!! $response->text !!}</p>
                                    <div class="links">
                                        <a href=tel:{{ $response->profile->contact_phone }}"
                                           class="wa">{{ $response->profile->contact_phone }} @isset($response->profile->contact_phone_d)
                                                {{ __('app.items6') }} {{ $response->profile->contact_phone_d }} @endisset</a>
                                        <a href="mailto:{{ $response->profile->email }}">{{ $response->profile->email }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="date">
                                <p>{{ \Illuminate\Support\Carbon::parse($response->created_at)->format('d.m.Y H:i') }}</p>
                                <div class="price">
                                    {{ __('app.project19') }}
                                    <span>${{ $response->price }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="button flex">
                            <div class="but">
                                @if ($response->status == 0)
                                    <a href="{{ route('projects', ['select' => $response->id]) }}">
                                        <button>{{ __('app.project20') }}</button>
                                    </a>
                                    <a href="{{ route('projects', ['reject' => $response->id]) }}">{{ __('app.project21') }}</a>
                                @elseif ($response->status == 1)
                                    <a id="undo"
                                       href="{{ route('projects', ['reject' => $response->id]) }}">{{ __('app.project22') }}</a>
                                    {{ __('app.project23') }}
                                @elseif ($response->status == 2)
                                    <button class="active"><span></span> {{ __('app.project24') }}</button>
                                    <a id="undo"
                                       href="{{ route('projects', ['select' => $response->id]) }}">{{ __('app.project25') }}</a>
                                @endif
                            </div>
                            @isset($response->pdf)
                                <a data-fancybox="pdf{{ $response->id }}"
                                   href="{{ asset('storage/' . $response->pdf) }}"
                                   class="pdf">{{ __('app.project26') }}</a>
                            @endisset
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="list l2">
            @isset($project->responses)
                @foreach($project->responses->where('status', 2) as $response)
                    <div class="response">
                        <div class="main-info flex">
                            <div class="name">
                                <div>
                                    <a href="{{ route('company', ['id' => $response->profile->id]) }}">
                                        <div class="avatar"
                                             style=" @isset($response->profile->image) background-image: url({{ asset('storage/' . $response->profile->image) }}); @endisset background-size: contain; background-repeat: no-repeat; background-position: center;">
                                        </div>
                                    </a>
                                </div>
                                <div style="padding-right: 2rem">
                                    <div class="n">
                                        {{ $response->profile->name }}
                                    </div>
                                    <p>{!! $response->text !!}</p>
                                    <div class="links">
                                        <a href=tel:{{ $response->profile->contact_phone }}"
                                           class="wa">{{ $response->profile->contact_phone }} @isset($response->profile->contact_phone_d)
                                                {{ __('app.items6') }} {{ $response->profile->contact_phone_d }} @endisset</a>
                                        <a href="mailto:{{ $response->profile->email }}">{{ $response->profile->email }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="date">
                                <p>{{ \Illuminate\Support\Carbon::parse($response->created_at)->format('d.m.Y H:i') }}</p>
                                <div class="price">
                                    {{ __('app.project19') }}
                                    <span>${{ $response->price }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="button flex">
                            <div class="but">
                                <button class="active"><span></span> {{ __('app.project24') }}</button>
                                <a id="undo"
                                   href="{{ route('projects', ['select' => $response->id]) }}">{{ __('app.project25') }}</a>
                            </div>
                            @isset($response->pdf)
                                <a data-fancybox="pdf{{ $response->id }}"
                                   href="{{ asset('storage/' . $response->pdf) }}"
                                   class="pdf">{{ __('app.project26') }}</a>
                            @endisset
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="list l3">
            @isset($project->responses)
                @foreach($project->responses->where('status', 1) as $response)
                    <div class="response">
                        <div class="main-info flex">
                            <div class="name">
                                <div>
                                    <a href="{{ route('company', ['id' => $response->profile->id]) }}">
                                        <div class="avatar"
                                             style=" @isset($response->profile->image) background-image: url({{ asset('storage/' . $response->profile->image) }}); @endisset background-size: contain; background-repeat: no-repeat; background-position: center;">
                                        </div>
                                    </a>
                                </div>
                                <div style="padding-right: 2rem">
                                    <div class="n">
                                        {{ $response->profile->name }}
                                    </div>
                                    <p>{!! $response->text !!}</p>
                                    <div class="links">
                                        <a href=tel:{{ $response->profile->contact_phone }}"
                                           class="wa">{{ $response->profile->contact_phone }} @isset($response->profile->contact_phone_d)
                                                {{ __('app.items6') }} {{ $response->profile->contact_phone_d }} @endisset</a>
                                        <a href="mailto:{{ $response->profile->email }}">{{ $response->profile->email }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="date">
                                <p>{{ \Illuminate\Support\Carbon::parse($response->created_at)->format('d.m.Y H:i') }}</p>
                                <div class="price">
                                    {{ __('app.project19') }}
                                    <span>${{ $response->price }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="button flex">
                            <div class="but">
                                <a id="undo"
                                   href="{{ route('projects', ['reject' => $response->id]) }}">{{ __('app.project22') }}</a>
                                {{ __('app.project23') }}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
@endsection
