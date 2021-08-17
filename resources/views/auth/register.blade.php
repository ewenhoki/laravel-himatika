<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset_dashboard/images/LOGO-HIMATIKA-FMIPA-UNPAD.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_login/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_login/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_login/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_login/css/iofrm-theme20.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_dashboard/css/yearpicker.css') }}">
    <style>
        .specialspace{
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="form-body without-side">
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
                        <h3>Daftar Akun Baru</h3>
                        <p>Harap lengkapi formulir di bawah ini untuk daftar akun baru.</p>
                        @error('email')
                            <div class="alert alert-danger with-icon" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        @error('npm')
                            <div class="alert alert-danger with-icon" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        {!! Form::open(['route' => 'register','class'=>'form-valide']) !!}
                            {!! Form::text('npm', old('npm'), ['id'=>'npm','class'=>'form-control','placeholder'=>'NPM','required']) !!}
                            {!! Form::text('name', old('name'), ['id'=>'name','class'=>'form-control'.($errors->has('name') ? ' is-invalid' : null),'placeholder'=>'Nama Lengkap','required']) !!}
                            {!! Form::number('generation', old('angkatan'), ['class'=>'form-control','placeholder'=>'Angkatan','id'=>'year','required']) !!}
                            {!! Form::email('email', old('email'), ['id'=>'email','class'=>'form-control'.($errors->has('email') ? ' is-invalid' : null),'placeholder'=>'E-mail','required']) !!}
                            {!! Form::password('password', ['id'=>'password','class'=>'form-control'.($errors->has('password') ? ' is-invalid' : null),'placeholder'=>'Kata Sandi','required']) !!}
                            {!! Form::password('password_confirmation', ['id'=>'password-confirm','class'=>'form-control','placeholder'=>'Konfirmasi Kata Sandi','required']) !!}
                            {!! Form::number('phone', old('phone'), ['id'=>'phone','class'=>'form-control','placeholder'=>'Nomor Telepon','required']) !!}
                            {!! Form::select('gender', ['L' => 'Laki-laki', 'P' => 'Perempuan'], 'L', ['class'=>'form-control specialspace','id'=>'jenis_kelamin']) !!}
                            {!! Form::select('role', ['A' => 'Alumni', 'M' => 'Mahasiswa Aktif'], 'M', ['class'=>'form-control specialspace','id'=>'role']) !!}
                            <input class="form-control" type="checkbox" id="gridCheck" onclick="myFunction()">
                            <label for="gridCheck">Lihat Kata Sandi</label>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">{{ __('Register') }}</button>
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
<script src="{{ asset('asset_dashboard/js/yearpicker.js') }}"></script>
<!-- Masked Input -->
<script src="{{ asset('asset_login/js/jquery.maskedinput.js') }}" type="text/javascript"></script>
<!-- Jquery Validation -->
<script src="{{ asset('asset_dashboard/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('asset_login/js/register-init.js') }}"></script>></script>
<script>
    $('#year').yearpicker();
</script>
</body>
</html>

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
