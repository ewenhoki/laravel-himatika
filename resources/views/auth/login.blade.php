<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset_dashboard/images/LOGO-HIMATIKA-FMIPA-UNPAD.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_login/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_login/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_login/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_login/css/iofrm-theme20.css') }}">
</head>
<body>
    <div class="form-body without-side">
        <div class="website-logo">
            <a href="{{ route('login') }}">
                <div class="logo">
                    <img class="logo-size" src="{{ asset('asset_dashboard/images/LOGO-HIMATIKA-FMIPA-UNPAD.png') }}" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img height="661" width="700" src="{{ asset('asset_login/images/graphic3.svg')}}" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>{{ __('Login') }}</h3>
                        <p>Silakan masuk untuk melakukan pembaharuan data atau request database.</p>
                        @if (session('fail'))
                            <div class="alert alert-danger with-icon" role="alert">
                                Email atau kata sandi salah.
                            </div>
                        @endif
                        {!! Form::open(['route' => 'login']) !!}
                            {!! Form::email('email', old('email'), ['class'=>'form-control'.($errors->has('email') ? ' is-invalid' : null),'required','id'=>'email','placeholder'=>'E-mail','autofocus']) !!}
                            {!! Form::password('password', ['class'=>'form-control'.($errors->has('password') ? ' is-invalid' : null),'required','id'=>'password','placeholder'=>'Kata Sandi']) !!}
                            <input class="form-control" type="checkbox" id="gridCheck" onclick="myFunction()">
                            <label for="gridCheck">Lihat Kata Sandi</label>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">{{ __('Login') }}</button> <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                            </div>
                        {!! Form::close() !!}<br>
                        <div class="page-links">
                            <a href="{{ route('register') }}">Daftar Akun Baru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('asset_login/js/jquery.min.js') }}"></script>
<script src="{{ asset('asset_login/js/popper.min.js') }}"></script>
<script src="{{ asset('asset_login/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset_login/js/main.js') }}"></script>
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
</body>
</html>

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
