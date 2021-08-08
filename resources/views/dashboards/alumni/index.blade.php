@extends('layouts.master')

@section('header')
<title>Profil</title>
<link rel="stylesheet" href="{{ asset('asset_dashboard/js/crop/ijaboCropTool.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset_dashboard/css/yearpicker.css') }}">
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
                            <h4 class="f-w-500">NPM</h4>
                            <p>{{ auth()->user()->npm }}</p>
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
                            <h4 class="f-w-500">Tempat Lahir</h4>
                            <p>{{ auth()->user()->birth_place!='' ? auth()->user()->birth_place : '-' }}</p>
                            <h4 class="f-w-500">Tanggal Lahir</h4>
                            <p>{{ auth()->user()->birth_date!='' ? auth()->user()->birth_date : '-' }}</p>
                            <h4 class="f-w-500">Agama</h4>
                            <p>{{ auth()->user()->religion!='' ? auth()->user()->religion : '-' }}</p>
                            <h4 class="f-w-500">Golongan Darah</h4>
                            <p>{{ auth()->user()->blood_group!='' ? auth()->user()->blood_group : '-' }}</p>
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
                                    <li class="nav-item"><a href="#education" data-toggle="tab" class="nav-link">Pendidikan Lanjut</a>
                                    </li>
                                    <li class="nav-item"><a href="#jobs" data-toggle="tab" class="nav-link">Pekerjaan</a>
                                    </li>
                                    <li class="nav-item"><a href="#certification" data-toggle="tab" class="nav-link">Sertifikasi</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="profile-settings" class="tab-pane fade active show">
                                        <div class="pt-4 border-bottom-1 pb-3">
                                            <h4 class="text-primary">Data Pribadi</h4>
                                            <div class="settings-form">
                                                {!! Form::open(['route' => 'alumni.profile.update','class'=>'form-valide']) !!}
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
                                                    <h4 class="text-primary">Pendapatan</h4>
                                                    <div class="form-group">
                                                        <label>Rentang Gaji</label>
                                                        {!! Form::select('salary', ['< Rp 3.000.000,00' => '< Rp 3.000.000,00','Rp 3.000.001,00 - Rp 6.000.000,00' => 'Rp 3.000.001,00 - Rp 6.000.000,00','Rp 6.000.001,00 - Rp 10.000.000,00'=>'Rp 6.000.001,00 - Rp 10.000.000,00','> Rp 10.000.001,00'=>'> Rp 10.000.001,00'], auth()->user()->inactivestudent->salary, ['class'=>'form-control default-select','id'=>'salary','placeholder'=>'Pilih Rentang Gaji']) !!}
                                                    </div>
                                                    <br>
                                                    <button class="btn btn-primary" type="submit">Perbaharui Data</button>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div id="education" class="tab-pane fade">
                                        <div class="profile-about-me">
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <h4 class="text-primary">Pendidikan Lanjut</h4>
                                                <p class="mb-2">Silakan mengisi form dibawah ini untuk menambah riwayat pendidikan lanjut.</p>
                                                @if(auth()->user()->inactivestudent->educations()->first())
                                                <div class="table-responsive">
                                                    <table class="table header-border table-bordered table-hover verticle-middle">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Universitas</th>
                                                                <th>Tingkat</th>
                                                                <th>Tahun</th>
                                                                <th>Jurusan</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach (auth()->user()->inactivestudent->educations()->orderBy('year')->get() as $key=>$education)
                                                            <tr>
                                                                <td>{{ $key+1 }}</td>
                                                                <td>{{ $education->university }}</td>
                                                                <td>
                                                                    <span class="badge badge-primary">{{ $education->level }}</span>
                                                                </td>
                                                                <td>{{ $education->year }}</td>
                                                                <td>{{ $education->major }}</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <a href="javascript:void(0)" education_id="{{ $education->id }}" university="{{ $education->university }}" level="{{ $education->level }}" year="{{ $education->year }}" major="{{ $education->major }}" data-toggle="modal" data-target="#EduModal" class="btn btn-primary shadow btn-xs sharp mr-1 modal-edit1"><i class="fa fa-pencil"></i></a>
                                                                        <a href="javascript:void(0)" education-id="{{ $education->id }}" num="{{ $key+1 }}" class="btn btn-danger shadow btn-xs sharp delete-edu"><i class="fa fa-trash"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endif
                                                <div class="settings-form">
                                                    {!! Form::open(['route' => 'alumni.education.add','class'=>'education-valide']) !!}
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Tingkat</label>
                                                                {!! Form::select('level', ['S2' => 'S2','S3' => 'S3','Lainnya'=>'Lainnya'], '', ['class'=>'form-control default-select','id'=>'level','placeholder'=>'Pilih Tingkat Pendidikan']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Tahun Masuk</label>
                                                                {!! Form::text('year', '', ['id'=>'year','class'=>'form-control','autocomplete'=>'off']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Universitas</label>
                                                                {!! Form::text('university', '', ['id'=>'university','class'=>'form-control']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Jurusan</label>
                                                                {!! Form::text('major', '', ['id'=>'major','class'=>'form-control']) !!}
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <button class="btn btn-primary" type="submit">Tambah Data</button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="jobs" class="tab-pane fade">
                                        <div class="profile-about-me">
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <h4 class="text-primary">Riwayat Pekerjaan</h4>
                                                <p class="mb-2">Silakan mengisi form dibawah ini untuk menambah riwayat pekerjaan.</p>
                                                @if(auth()->user()->inactivestudent->jobs()->first())
                                                <div class="table-responsive">
                                                    <table class="table header-border table-bordered table-hover verticle-middle">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nama Perusahaan</th>
                                                                <th>Posisi</th>
                                                                <th>Tahun</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach (auth()->user()->inactivestudent->jobs()->orderBy('year')->get() as $key=>$job)
                                                            <tr>
                                                                <td>{{ $key+1 }}</td>
                                                                <td>{{ $job->company_name }}</td>
                                                                <td>
                                                                    <span class="badge badge-primary">{{ $job->position }}</span>
                                                                </td>
                                                                <td>{{ $job->year }}</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <a href="javascript:void(0)" job_id="{{ $job->id }}" position="{{ $job->position }}" year="{{ $job->year }}" company_name="{{ $job->company_name }}" data-toggle="modal" data-target="#JobModal" class="btn btn-primary shadow btn-xs sharp mr-1 modal-edit2"><i class="fa fa-pencil"></i></a>
                                                                        <a href="javascript:void(0)" job-id="{{ $job->id }}" num="{{ $key+1 }}" class="btn btn-danger shadow btn-xs sharp delete-job"><i class="fa fa-trash"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endif
                                                <div class="settings-form">
                                                    {!! Form::open(['route' => 'alumni.job.add','class'=>'job-valide']) !!}
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Nama Perusahaan</label>
                                                                {!! Form::text('company_name', '', ['id'=>'company_name','class'=>'form-control','autocomplete'=>'off']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Posisi</label>
                                                                {!! Form::text('position', '', ['id'=>'position','class'=>'form-control']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Tahun Masuk</label>
                                                                {!! Form::text('year', '', ['id'=>'year_job','class'=>'form-control','autocomplete'=>'off']) !!}
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <button class="btn btn-primary" type="submit">Tambah Data</button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="certification" class="tab-pane fade">
                                        <div class="profile-about-me">
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <h4 class="text-primary">Sertifikasi</h4>
                                                <p class="mb-2">Silakan mengisi form dibawah ini untuk menambah sertifikasi.</p>
                                                @if(auth()->user()->inactivestudent->certifications()->first())
                                                <div class="table-responsive">
                                                    <table class="table header-border table-bordered table-hover verticle-middle">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nama</th>
                                                                <th>Tahun</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach (auth()->user()->inactivestudent->certifications()->orderBy('year')->get() as $key=>$certification)
                                                            <tr>
                                                                <td>{{ $key+1 }}</td>
                                                                <td>{{ $certification->name }}</td>
                                                                <td>{{ $certification->year }}</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <a href="javascript:void(0)" certification_id="{{ $certification->id }}" year="{{ $certification->year }}" c_name="{{ $certification->name }}" data-toggle="modal" data-target="#CtfModal" class="btn btn-primary shadow btn-xs sharp mr-1 modal-edit3"><i class="fa fa-pencil"></i></a>
                                                                        <a href="javascript:void(0)" certification-id="{{ $certification->id }}" num="{{ $key+1 }}" class="btn btn-danger shadow btn-xs sharp delete-ctf"><i class="fa fa-trash"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endif
                                                <div class="settings-form">
                                                    {!! Form::open(['route' => 'alumni.certification.add','class'=>'ctf-valide']) !!}
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Nama Sertifikasi</label>
                                                                {!! Form::text('name', '', ['id'=>'ctf_name','class'=>'form-control','autocomplete'=>'off']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Tahun</label>
                                                                {!! Form::text('year', '', ['id'=>'year_ctf','class'=>'form-control','autocomplete'=>'off']) !!}
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <button class="btn btn-primary" type="submit">Tambah Data</button>
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
<div class="modal fade" id="EduModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Pendidikan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'alumni.education.edit','class'=>'edu-edit-valide']) !!}
                    <div class="row"> 
                        {!! Form::hidden('education_id', '', ['id'=>'education_id']) !!}
                        <div class="col-lg-12 form-group">
                            <label>Tingkat</label>
                            {!! Form::text('level', '', ['id'=>'level_edit','class'=>'form-control','autocomplete'=>'off','disabled']) !!}
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>Tahun Masuk</label>
                            {!! Form::text('year', '', ['id'=>'year_edit','class'=>'form-control','autocomplete'=>'off']) !!}
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>Universitas</label>
                            {!! Form::text('university', '', ['id'=>'university_edit','class'=>'form-control']) !!}
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>Jurusan</label>
                            {!! Form::text('major', '', ['id'=>'major_edit','class'=>'form-control']) !!}
                        </div>
                        <div class="col-lg-12 form-group">
                            <div class="form-group mb-0">
                                <br>
                                <input type="submit" value="Ubah" class="submit btn btn-primary btn-sm" name="submit">
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="JobModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Pekerjaan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'alumni.job.edit','class'=>'job-edit-valide']) !!}
                    <div class="row"> 
                        {!! Form::hidden('job_id', '', ['id'=>'job_id']) !!}
                        <div class="col-lg-12 form-group">
                            <label>Nama Perusahaan</label>
                            {!! Form::text('company_name', '', ['id'=>'company_name_edit','class'=>'form-control']) !!}
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>Posisi</label>
                            {!! Form::text('position', '', ['id'=>'position_edit','class'=>'form-control']) !!}
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>Tahun Masuk</label>
                            {!! Form::text('year', '', ['id'=>'year_job_edit','class'=>'form-control','autocomplete'=>'off']) !!}
                        </div>
                        <div class="col-lg-12 form-group">
                            <div class="form-group mb-0">
                                <br>
                                <input type="submit" value="Ubah" class="submit btn btn-primary btn-sm" name="submit">
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="CtfModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Sertifikasi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'alumni.certification.edit','class'=>'ctf-edit-valide']) !!}
                    <div class="row"> 
                        {!! Form::hidden('ctf_id', '', ['id'=>'ctf_id']) !!}
                        <div class="col-lg-12 form-group">
                            <label>Nama Sertifikasi</label>
                            {!! Form::text('name', '', ['id'=>'ctf_name_edit','class'=>'form-control']) !!}
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>Tahun</label>
                            {!! Form::text('year', '', ['id'=>'year_ctf_edit','class'=>'form-control','autocomplete'=>'off']) !!}
                        </div>
                        <div class="col-lg-12 form-group">
                            <div class="form-group mb-0">
                                <br>
                                <input type="submit" value="Ubah" class="submit btn btn-primary btn-sm" name="submit">
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
<script src="{{ asset('asset_dashboard/js/crop/ijaboCropTool.min.js') }}"></script> 
<script src="{{ asset('asset_dashboard/js/yearpicker.js') }}"></script>
<script src="{{ asset('asset_dashboard/js/alumni-index-init.js') }}"></script>
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
    $('.delete-edu').click(function(){
        var education_id = $(this).attr('education-id');
        var num = $(this).attr('num');
        var url = "{{route('alumni.delete.education', '')}}"+"/"+education_id;
        swal({   
            title: "Yakin ?",   
            text: "Hapus riwayat pendidikan nomor "+num+" ?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Ya",   
            cancelButtonText: "Tidak",   
        })
        .then(function(WillDelete){
            if(WillDelete.value){
                window.location = url;
            }
        });
    });
    $('.delete-job').click(function(){
        var job_id = $(this).attr('job-id');
        var num = $(this).attr('num');
        var url = "{{route('alumni.delete.job', '')}}"+"/"+job_id;
        swal({   
            title: "Yakin ?",   
            text: "Hapus riwayat pekerjaan nomor "+num+" ?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Ya",   
            cancelButtonText: "Tidak",   
        })
        .then(function(WillDelete){
            if(WillDelete.value){
                window.location = url;
            }
        });
    });
    $('.delete-ctf').click(function(){
        var ctf_id = $(this).attr('certification-id');
        var num = $(this).attr('num');
        var url = "{{route('alumni.delete.certification', '')}}"+"/"+ctf_id;
        swal({   
            title: "Yakin ?",   
            text: "Hapus sertifikasi nomor "+num+" ?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Ya",   
            cancelButtonText: "Tidak",   
        })
        .then(function(WillDelete){
            if(WillDelete.value){
                window.location = url;
            }
        });
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
@if(session('deleted'))
    <script>
        toastr.success("Berhasil menghapus data!", "Berhasil", {
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