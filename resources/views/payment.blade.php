@extends('layouts.app')

@section('title', __('app.payment_title'))

@section('content')
    <div class="payment-page">
        <h1>{{ __('app.payment1') }}</h1>
        <div class="top-text">
            {{ __('app.payment2') }}
        </div>
        <div class="flex">
            <input type="radio" class="radio" id="r2" name="r1">
            <label for="r2">
                <span class="badge">{{ __('app.payment3') }}</span>
                <div class="name">
                    {{ __('app.payment4') }}
                </div>
                <div class="price">
                    {{ __('app.payment5') }}
                </div>
                <div class="text">
                    {!! __('app.payment6') !!}
                </div>
                <button>{{ __('app.payment7') }}</button>
            </label>
            <input type="radio" class="radio" id="r1" name="r1">
            <label for="r1">
                <span class="badge green">{{ __('app.payment8') }}</span>
                <div class="name">
                    {{ __('app.payment9') }}
                </div>
                <div class="price">
                    {{ __('app.payment10') }}
                </div>
                <div class="text">
                    {!! __('app.payment11') !!}
                </div>
                <button class="green">{{ __('app.payment12') }}</button>
            </label>
        </div>
        <div class="invite">
            <p>{{ __('app.payment13') }}</p>
            <div class="links">
                <a href="#"><span>{{ __('app.payment14') }}</span></a>
                <a href="#"><span>{{ __('app.payment15') }}</span></a>
                <a href="#"><span>{{ __('app.payment16') }}</span></a>
            </div>
            <div class="link">
                <span>{{ __('app.payment17') }}</span> <input type="text" value="catchdeal.me/r/companyname">
            </div>
        </div>
    </div>

@endsection
