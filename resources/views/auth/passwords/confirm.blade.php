@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card rounded-0 shadow">
                    <div class="card-header bg-light text-black-50 text-center">
                        Подтверждение пароля
                    </div>
                    <div class="card-body">
                        <div class="form-group container">
                            <form method="POST" action="{{ route('password.confirm') }}">
                                @csrf
                                <input id="password" type="password" placeholder="Пароль"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
                                <button type="submit" class="btn btn-success btn-lg btn-block rounded-0">
                                    Подтвердить пароль
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Забыли Ваш пароль?
                                    </a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
