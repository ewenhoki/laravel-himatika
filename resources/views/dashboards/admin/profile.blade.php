@extends('layouts.master')

@section('header')
<title>Pengaturan Akun</title>
@endsection

@section('header-title')
    Pengaturan Akun
@endsection

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin.profile') }}">Pengaturan Akun</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{{ asset('asset_dashboard/images/profile/profile-default.png') }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{ auth()->user()->name }}</h4>
                                    <p>Admin</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{ auth()->user()->email }}</h4>
                                    <p>Email</p>
                                </div>
                                <div class="dropdown ml-auto">
                                    <a href="javascript:void(0)" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item"><a href="javascript:void(0)" data-toggle="modal" data-target="#PasswordModal"><i class="fa fa-user-circle text-primary mr-2"></i> Ganti Kata Sandi</li></a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-statistics mb-5">
                            <h3 class="text-primary">Informasi Akun</h3>
                            <br>
                            <h4 class="f-w-500">Nama</h4>
                            <p>{{ auth()->user()->name }}</p>
                            <h4 class="f-w-500">Email</h4>
                            <p>{{ auth()->user()->email }}</p>
                            <h4 class="f-w-500">Nomor Telepon</h4>
                            <p>{{ auth()->user()->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link active show">Pengaturan</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="profile-settings" class="tab-pane fade active show">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <br>
                                                {!! Form::open(['route' => 'admin.profile.edit','class'=>'form-valide']) !!}
                                                    <div class="form-group">
                                                        <label>Nama Lengkap</label>
                                                        {!! Form::text('name', auth()->user()->name, ['id'=>'name','class'=>'form-control']) !!}
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Email</label>
                                                            {!! Form::email('email', auth()->user()->email, ['id'=>'email','class'=>'form-control']) !!}
                                                            @if($errors->has('email'))
                                                                <div class="valid-feedback animated fadeInUp" style="display: block; color:red;">{{$errors->first('email')}}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Nomor Telepon</label>
                                                            {!! Form::number('phone', auth()->user()->phone, ['id'=>'phone','class'=>'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <button class="btn btn-primary" type="submit">Perbaharui Akun</button>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="PasswordModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ganti Kata Sandi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'admin.password.edit','class'=>'password-valide']) !!}
                    <div class="row"> 
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-black font-w600">Kata Sandi Lama <span class="required">*</span></label>
                                {!! Form::password('password', ['id'=>'password','class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-black font-w600">Kata Sandi Baru <span class="required">*</span></label>
                                {!! Form::password('new_password', ['id'=>'new_password','class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-black font-w600">Konfirmasi Kata Sandi Baru <span class="required">*</span></label>
                                {!! Form::password('confirm_password', ['id'=>'confirm_password','class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="custom-control custom-switch toggle-switch text-left mr-4 mb-2">
                                    <input type="checkbox" class="custom-control-input" id="gridCheck" onclick="myFunction()">
                                    <label class="custom-control-label" for="gridCheck"> Lihat Kata Sandi</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-0">
                                <input type="submit" value="Kirim" class="submit btn btn-primary btn-sm" name="submit">
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->
@endsection

@section('footer')
<script src="{{ asset('asset_dashboard/js/admin-profile-init.js') }}"></script>
@if(session('fail'))
    <script>
        swal({   
            title: "Gagal",   
            text: "Kata sandi salah! Gagal mengubah kata sandi.",   
            type: "error",      
            confirmButtonText: "Tutup",    
        })
    </script>
@endif
@if(session('updated'))
    <script>
        toastr.success("Kata sandi berhasil diperbaharui!", "Berhasil", {
            timeOut: 5e3,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            positionClass: "toast-top-right",
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        });
    </script>
@endif
@if(session('success'))
    <script>
        toastr.success("Data akun berhasil diperbaharui!", "Berhasil", {
            timeOut: 5e3,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            positionClass: "toast-top-right",
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        });
    </script>
@endif
@if($errors->has('email'))
    <script>
        toastr.error("Data akun gagal diperbaharui!", "Gagal", {
            timeOut: 5e3,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            positionClass: "toast-top-right",
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        });
    </script>
@endif
@endsection
