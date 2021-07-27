@extends('layouts.admin')

@section('title', 'Admin – Beclick')

@section('content')

    <div class="container mt-3">
        <h3>Users</h3>
        <hr>
        <div class="alert alert-success rounded row text-right">
            <div class="col-auto">
                <strong>Total: </strong>{{ $profiles->count() }}
            </div>
            <div class="col-auto">
                <strong>Active: </strong>{{ $profiles->whereNotNull('subscription')->count() }}
            </div>
        </div>
        <hr>
        @foreach($profiles as $profile)
            <div class="alert alert-info rounded row text-right">
                <div class="col-auto">
                    <strong>ID: </strong>{{ $profile->id }}
                </div>
                <div class="col-auto">
                    <strong>REG: </strong>{{ $profile->created_at }}
                </div>
                <div class="col">
                    <strong>MAIL: </strong><a
                        href="mailto:{{ $profile->user->email }}">{{ $profile->user->email }}</a>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.home', ['id' => $profile->id]) }}"><strong>PROFILE</strong></a>
                </div>
                <div class="col-auto">
                    @if ($profile->advert == 0)
                        <strong class="text-danger">ADVERT</strong>
                    @elseif ($profile->advert == 1)
                        <strong class="text-success">ADVERT</strong>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
