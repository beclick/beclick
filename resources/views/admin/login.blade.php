@extends('layouts.admin')

@section('title', 'Login admin – Beclick')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card rounded-0 shadow">
                    <div class="card-header bg-light text-black-50 text-center">
                        <h4>Admin panel</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group container">
                            <form method="POST" action="{{ route('admin.login') }}">
                                @csrf
                                <input type="text" placeholder="Login" class="form-control form-control-lg rounded-0" name="login" required autofocus autocomplete="off">
                                <br>
                                <input type="password" placeholder="Password" class="form-control form-control-lg rounded-0" name="password" required autocomplete="off">
                                <br>
                                <button class="btn btn-success btn-lg btn-block rounded-0" type="submit">Login as administrator</button>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
