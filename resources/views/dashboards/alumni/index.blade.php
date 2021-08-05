@extends('layouts.master')

@section('header')
<title>Profil</title>
<link rel="stylesheet" href="{{ asset('asset_dashboard/js/crop/ijaboCropTool.min.css') }}">
@endsection

@section('header-title')
    Profil
@endsection

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('alumni.index') }}">Profil</a></li>
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
                                @if(auth()->user()->avatar!=NULL)
                                    @if(file_exists(public_path('user_image/'.auth()->user()->avatar)))
                                    <img src="{{ asset('user_image/'.auth()->user()->avatar) }}" class="img-fluid rounded-circle user-picture" alt="">
                                    @else
                                    <img src="{{ asset('user_image/profile-default.png') }}" class="img-fluid rounded-circle user-picture" alt="">
                                    @endif
                                @else
                                <img src="{{ asset('user_image/profile-default.png') }}" class="img-fluid rounded-circle user-picture" alt="">
                                @endif
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{ auth()->user()->name }}</h4>
                                    <p>{{ auth()->user()->npm }}</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{ auth()->user()->email }}</h4>
                                    <p>Email</p>
                                </div>
                                <div class="dropdown ml-auto">
                                    <a href="javascript:void(0)" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item"><a href="javascript:void(0)" data-toggle="modal" data-target="#PasswordModal"><i class="fa fa-user-circle text-primary mr-2"></i> Ganti Kata Sandi</li></a>
                                        <li class="dropdown-item"><a href="javascript:void(0)" data-toggle="modal" data-target="#PhotoModal"><i class="fa fa-photo text-primary mr-2"></i> Unggah Foto Profil</li></a>
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
                            <h3 class="text-primary">Informasi Pribadi</h3>
                            <br>
                            <h4 class="f-w-500">Nama</h4>
                            <p>{{ auth()->user()->name }}</p>
                            <h4 class="f-w-500">Email</h4>
                            <p>{{ auth()->user()->email }}</p>
                            <h4 class="f-w-500">Nomor Telepon</h4>
                            <p>{{ auth()->user()->phone }}</p>
                            <h4 class="f-w-500">Jenis Kelamin</h4>
                            @if(auth()->user()->gender == 'P')
                            <p>Perempuan</p>
                            @elseif(auth()->user()->gender == 'L')
                            <p>Laki-laki</p>
                            @endif
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
                                    <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link active show">Biodata</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="profile-settings" class="tab-pane fade active show">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <br>
                                                {!! Form::open(['route' => 'alumni.profile.update','class'=>'form-valide']) !!}
                                                    <h4 class="text-primary">Data Pribadi</h4>
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
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Tempat Lahir</label>
                                                            {!! Form::text('birth_place', auth()->user()->birth_place, ['id'=>'birth_place','class'=>'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Tanggal Lahir</label>
                                                            <div class="input-group">
                                                                {!! Form::text('birth_date', auth()->user()->birth_date, ['id'=>'birth_date','class'=>'form-control datepicker-default','placeholder'=>'yyyy/mm/dd']) !!}
                                                                <span class="input-group-append"><span class="input-group-text"><i class="fa fa-calendar"></i></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Golongan Darah</label>
                                                            {!! Form::select('blood_group', ['A' => 'A','B' => 'B','AB'=>'AB','O'=>'O'], auth()->user()->blood_group, ['class'=>'form-control default-select','id'=>'blood_group','placeholder'=>'Pilih Golongan Darah']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Agama</label>
                                                            {!! Form::select('religion', ['Islam' => 'Islam','Kristen' => 'Kristen','Katolik'=>'Katolik','Buddha'=>'Buddha','Hindu'=>'Hindu'], auth()->user()->religion, ['class'=>'form-control default-select','id'=>'religion','placeholder'=>'Pilih Agama']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        {!! Form::textarea('address', auth()->user()->address, ['id'=>'address','class'=>'form-control','rows'=>4]) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Bidang Minat</label>
                                                        {!! Form::select('interest', [
                                                            'Murni' => ['Aljabar'=>'Aljabar','Analisis'=>'Analisis'],
                                                            'Terapan'=> ['Riset Operasi'=>'Riset Operasi','Matematika Keuangan'=>'Matematika Keuangan','Biologi dan Lingkungan'=>'Biologi dan Lingkungan','Pemodelan Stokastik'=>'Pemodelan Stokastik','Matematika Komputasi'=>'Matematika Komputasi'],
                                                            ], auth()->user()->inactivestudent->interest, ['class'=>'form-control default-select','id'=>'interest','placeholder'=>'Pilih Bidang Minat']) !!}
                                                    </div>
                                                    <br>
                                                    <h4 class="text-primary">Media Sosial</h4>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Instagram</label>
                                                            {!! Form::text('instagram', auth()->user()->inactivestudent->instagram, ['id'=>'instagram','class'=>'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Twitter</label>
                                                            {!! Form::text('twitter', auth()->user()->inactivestudent->twitter, ['id'=>'twitter','class'=>'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Facebook</label>
                                                            {!! Form::text('facebook', auth()->user()->inactivestudent->facebook, ['id'=>'facebook','class'=>'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>LinkedIn</label>
                                                            {!! Form::text('linkedin', auth()->user()->inactivestudent->linkedin, ['id'=>'linkedin','class'=>'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>ID Line</label>
                                                            {!! Form::text('line', auth()->user()->inactivestudent->line, ['id'=>'line','class'=>'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <button class="btn btn-primary" type="submit">Perbaharui Data</button>
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
                {!! Form::open(['route' => 'alumni.password.edit','class'=>'password-valide']) !!}
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
<div class="modal fade" id="PhotoModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Unggah Foto Profil</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row"> 
                        <div class="col-lg-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-photo mr-2"></i></button>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="avatar1" id="avatar1" class="custom-file-input">
                                    <label class="custom-file-label">Unggah</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->
@endsection

@section('footer')
<script src="{{ asset('asset_dashboard/js/crop/ijaboCropTool.min.js') }}"></script> 
<script>
    $('#avatar1').ijaboCropTool({
        preview : '.user-picture',
        processUrl:'{{ route("user.crop") }}',
        withCSRF:['_token','{{ csrf_token() }}'],
        setRatio:1,
        allowedExtensions: ['jpg', 'jpeg','png'],
        buttonsText:['CROP','BATAL'],
        buttonsColor:['#a4e3f1','#fff5dd', -15],
        onSuccess:function(message, element, status){
            alert(message);
        },
        onError:function(message, element, status){
            alert(message);
        },
    });
    function myFunction() {
        var x = document.getElementById("password");
        var y = document.getElementById("new_password");
        var z = document.getElementById("confirm_password");
        if (x.type === "password") {
            x.type = "text";
            y.type = "text";
            z.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
            z.type = "password";
        }
    }
    $('.datepicker-default').pickadate({
        format: 'yyyy/mm/dd',
        selectMonths: true,
        max: '0',
        selectYears: 75,
    });
    jQuery(".form-valide").validate({
        rules: {
            "name": {
                required: true,
                minlength: 5,
            },
            "email": {
                required: true,
                email: true,
            },
            "phone": {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 13,
            },
        },
        messages: {
            name: {
                required: "Nama Wajib Diisi !",
                minlength: "Isi paling sedikit {0} karakter !",
            },
            email: {
                required: "E-mail Wajib Diisi !",
                email: "Masukan email yang valid !",
            },
            phone: {
                required: "Nomor Telepon Wajib Diisi !",
                number: "Masukan nomor yang valid !",
                minlength: "Isi paling sedikit {0} karakter !",
                maxlength: "Isi paling banyak {0} karakter !",
            },
        },
        ignore: [],
        errorClass: "invalid-feedback animated fadeInUp",
        errorElement: "div",
        errorPlacement: function(e, a) {
            jQuery(a).parents(".form-group").append(e)
        },
        highlight: function(e) {
            jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
        },
        success: function(e) {
            jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
        },
    });
    jQuery(".password-valide").validate({
        rules: {
            "password": {
                required: true,
            },
            "new_password": {
                required: true,
                minlength: 8,
            },
            "confirm_password": {
                required: true,
                equalTo : "#new_password",
            },
        },
        messages: {
            password: {
                required: "Kata Sandi Lama Wajib Diisi !",
            },
            new_password: {
                required: "Kata Sandi Baru Wajib Diisi !",
                minlength: "Isi paling sedikit {0} karakter !",
            },
            confirm_password: {
                required: "Konfirmasi Kata Sandi Baru Wajib Diisi !",
                equalTo: "Kata Sandi Tidak Sama !",
            },
        },
        ignore: [],
        errorClass: "invalid-feedback animated fadeInUp",
        errorElement: "div",
        errorPlacement: function(e, a) {
            jQuery(a).parents(".form-group").append(e)
        },
        highlight: function(e) {
            jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
        },
        success: function(e) {
            jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
        },
    });
</script>
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
@if(session('success'))
    <script>
        toastr.success("Data berhasil diperbaharui!", "Berhasil", {
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
@if($errors->has('email'))
<script>
    toastr.error("Data gagal diperbaharui!", "Gagal", {
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