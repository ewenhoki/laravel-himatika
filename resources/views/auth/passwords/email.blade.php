<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Kata Sandi</title>
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
                    <img height="661" width="700" src="{{ asset('asset_login/images/graphic3.svg') }}" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>{{ __('Reset Password') }}</h3>
                        <p>Untuk melakukan reset kata sandi anda, masukkan alamat email yang terdaftar.</p>
                        @if (session('status'))
                            <div class="alert alert-success with-icon" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @error('email')
                            <div class="alert alert-danger with-icon" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        {!! Form::open(['route' => 'password.email']) !!}
                            {!! Form::email('email', old('email'), ['class'=>'form-control'.($errors->has('email') ? ' is-invalid' : null),'required','id'=>'email','placeholder'=>'E-mail','autofocus']) !!}
                            <div class="form-button full-width">
                                <button id="submit" type="submit" class="ibtn">Kirim Tautan Reset Kata Sandi</button>
                            </div>
                        {!! Form::close() !!}<br>
                        <div class="page-links">
                            <a href="{{ route('login') }}">Masuk ke Akun</a>
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
</body>
</html>

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
