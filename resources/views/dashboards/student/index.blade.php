@extends('layouts.master')

@section('header')
<title>Mahasiswa</title>
<link rel="stylesheet" href="{{ asset('asset_dashboard/js/crop/ijaboCropTool.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset_dashboard/css/yearpicker.css') }}">
<style>
    .hidden {
        display:none;
    } 
</style>
@endsection

@section('header-title')
    Mahasiswa
@endsection

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('student.index') }}">Profil</a></li>
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
                                    <li class="nav-item"><a href="#organization" data-toggle="tab" class="nav-link">Organisasi</a>
                                    </li>
                                    <li class="nav-item"><a href="#committee" data-toggle="tab" class="nav-link">Kepanitiaan</a>
                                    </li>
                                    <li class="nav-item"><a href="#seminar" data-toggle="tab" class="nav-link">Pelatihan</a>
                                    </li>
                                    <li class="nav-item"><a href="#achievment" data-toggle="tab" class="nav-link">Prestasi</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="profile-settings" class="tab-pane fade active show">
                                        <div class="pt-4 border-bottom-1 pb-3">
                                            <h4 class="text-primary">Data Pribadi</h4>
                                            <div class="settings-form">
                                                {!! Form::open(['route' => 'student.profile.update','class'=>'form-valide']) !!}
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
                                                        <label>Alamat Kost</label>
                                                        {!! Form::textarea('boarding_address', auth()->user()->activestudent->boarding_address, ['id'=>'boarding_address','class'=>'form-control','rows'=>4]) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Bidang Minat</label>
                                                        {!! Form::select('interest', [
                                                            'Murni' => ['Aljabar'=>'Aljabar','Analisis'=>'Analisis'],
                                                            'Terapan'=> ['Riset Operasi'=>'Riset Operasi','Matematika Keuangan'=>'Matematika Keuangan','Biologi dan Lingkungan'=>'Biologi dan Lingkungan','Pemodelan Stokastik'=>'Pemodelan Stokastik','Matematika Komputasi'=>'Matematika Komputasi'],
                                                            ], auth()->user()->activestudent->interest, ['class'=>'form-control default-select','id'=>'interest','placeholder'=>'Pilih Bidang Minat']) !!}
                                                    </div>
                                                    <br>
                                                    <h4 class="text-primary">Media Sosial</h4>
                                                    <div class="form-group">
                                                        <label>ID Line</label>
                                                        {!! Form::text('line', auth()->user()->activestudent->line, ['id'=>'line','class'=>'form-control']) !!}
                                                    </div>
                                                    <br>
                                                    <h4 class="text-primary">Orang Tua</h4>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Nama Ayah</label>
                                                            {!! Form::text('father_name', auth()->user()->activestudent->father_name, ['id'=>'father_name','class'=>'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Pekerjaan Ayah</label>
                                                            {!! Form::text('father_job', auth()->user()->activestudent->father_job, ['id'=>'father_job','class'=>'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Nomor Telepon Ayah</label>
                                                            {!! Form::text('father_phone', auth()->user()->activestudent->father_phone, ['id'=>'father_phone','class'=>'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Nama Ibu</label>
                                                            {!! Form::text('mother_name', auth()->user()->activestudent->mother_name, ['id'=>'mother_name','class'=>'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Pekerjaan Ibu</label>
                                                            {!! Form::text('mother_job', auth()->user()->activestudent->mother_job, ['id'=>'mother_job','class'=>'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Nomor Telepon Ibu</label>
                                                            {!! Form::text('mother_phone', auth()->user()->activestudent->mother_phone, ['id'=>'mother_phone','class'=>'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h4 class="text-primary">Pendapatan</h4>
                                                    <div class="form-group">
                                                        <label>Memiliki Penghasilan</label>
                                                        {!! Form::select('income', ['0' => 'Tidak','1' => 'Ya'], auth()->user()->activestudent->income, ['class'=>'form-control default-select','id'=>'income','placeholder'=>'Pilih Kategori']) !!}
                                                    </div>
                                                    @if(auth()->user()->activestudent->income == 1)
                                                    <div id="group1" name="group1" class="">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Nama Usaha</label>
                                                                {!! Form::text('name_business', auth()->user()->activestudent->business->name, ['id'=>'name_business','class'=>'form-control']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Jenis Usaha</label>
                                                                {!! Form::text('type', auth()->user()->activestudent->business->type, ['id'=>'type','class'=>'form-control']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Pendapatan</label>
                                                                {!! Form::select('income_business', ['< Rp 3.000.000,00' => '< Rp 3.000.000,00','Rp 3.000.001,00 - Rp 6.000.000,00' => 'Rp 3.000.001,00 - Rp 6.000.000,00','Rp 6.000.001,00 - Rp 10.000.000,00'=>'Rp 6.000.001,00 - Rp 10.000.000,00','> Rp 10.000.001,00'=>'> Rp 10.000.001,00'], auth()->user()->activestudent->business->income, ['class'=>'form-control default-select','id'=>'income_business','placeholder'=>'Pilih Rentang Pendapatan']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Instagram</label>
                                                                {!! Form::text('instagram', auth()->user()->activestudent->business->instagram, ['id'=>'instagram','class'=>'form-control']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Line</label>
                                                                {!! Form::text('line_business', auth()->user()->activestudent->business->line, ['id'=>'line_business','class'=>'form-control']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div id="group1" name="group1" class="hidden">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Nama Usaha</label>
                                                                {!! Form::text('name_business', '', ['id'=>'name_business','class'=>'form-control']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Jenis Usaha</label>
                                                                {!! Form::text('type', '', ['id'=>'type','class'=>'form-control']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Pendapatan</label>
                                                                {!! Form::select('income_business', ['< Rp 3.000.000,00' => '< Rp 3.000.000,00','Rp 3.000.001,00 - Rp 6.000.000,00' => 'Rp 3.000.001,00 - Rp 6.000.000,00','Rp 6.000.001,00 - Rp 10.000.000,00'=>'Rp 6.000.001,00 - Rp 10.000.000,00','> Rp 10.000.001,00'=>'> Rp 10.000.001,00'], '', ['class'=>'form-control default-select','id'=>'income_business','placeholder'=>'Pilih Rentang Pendapatan']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Instagram</label>
                                                                {!! Form::text('instagram', '', ['id'=>'instagram','class'=>'form-control']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Line</label>
                                                                {!! Form::text('line_business', '', ['id'=>'line_business','class'=>'form-control']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <br>
                                                    <button class="btn btn-primary" type="submit">Perbaharui Data</button>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div id="organization" class="tab-pane fade">
                                        <div class="profile-about-me">
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <h4 class="text-primary">Riwayat Organisasi</h4>
                                                <p class="mb-2">Silakan mengisi form dibawah ini untuk menambah riwayat organisasi.</p>
                                                @if(auth()->user()->activestudent->organizations()->first())
                                                <div class="table-responsive">
                                                    <table class="table header-border table-bordered table-hover verticle-middle">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nama</th>
                                                                <th>Posisi</th>
                                                                <th>Periode</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach (auth()->user()->activestudent->organizations()->orderBy('period')->get() as $key=>$organization)
                                                            <tr>
                                                                <td>{{ $key+1 }}</td>
                                                                <td>{{ $organization->name }}</td>
                                                                <td>
                                                                    <span class="badge badge-primary">{{ $organization->position }}</span>
                                                                </td>
                                                                <td>{{ $organization->period }}</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <a href="javascript:void(0)" organization_id="{{ $organization->id }}" o_name="{{ $organization->name }}" position="{{ $organization->position }}" period="{{ $organization->period }}" data-toggle="modal" data-target="#OrModal" class="btn btn-primary shadow btn-xs sharp mr-1 modal-edit1"><i class="fa fa-pencil"></i></a>
                                                                        <a href="javascript:void(0)" organization-id="{{ $organization->id }}" num="{{ $key+1 }}" class="btn btn-danger shadow btn-xs sharp delete-or"><i class="fa fa-trash"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endif
                                                <div class="settings-form">
                                                    {!! Form::open(['route' => 'student.organization.add','class'=>'organization-valide']) !!}
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Nama Organisasi</label>
                                                                {!! Form::text('name', '', ['id'=>'name_organization','class'=>'form-control']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Posisi</label>
                                                                {!! Form::text('position', '', ['id'=>'position','class'=>'form-control']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Periode</label>
                                                                {!! Form::text('period', '', ['id'=>'period','class'=>'form-control','autocomplete'=>'off']) !!}
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <button class="btn btn-primary" type="submit">Tambah Data</button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="committee" class="tab-pane fade">
                                        <div class="profile-about-me">
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <h4 class="text-primary">Riwayat Kepanitiaan</h4>
                                                <p class="mb-2">Silakan mengisi form dibawah ini untuk menambah riwayat kepanitiaan.</p>
                                                @if(auth()->user()->activestudent->committees()->first())
                                                <div class="table-responsive">
                                                    <table class="table header-border table-bordered table-hover verticle-middle">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nama Kepanitiaan</th>
                                                                <th>Posisi</th>
                                                                <th>Tahun</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach (auth()->user()->activestudent->committees()->orderBy('year')->get() as $key=>$committee)
                                                            <tr>
                                                                <td>{{ $key+1 }}</td>
                                                                <td>{{ $committee->name }}</td>
                                                                <td>
                                                                    <span class="badge badge-primary">{{ $committee->position }}</span>
                                                                </td>
                                                                <td>{{ $committee->year }}</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <a href="javascript:void(0)" committee_id="{{ $committee->id }}" position="{{ $committee->position }}" year="{{ $committee->year }}" com_name="{{ $committee->name }}" data-toggle="modal" data-target="#ComModal" class="btn btn-primary shadow btn-xs sharp mr-1 modal-edit2"><i class="fa fa-pencil"></i></a>
                                                                        <a href="javascript:void(0)" committee-id="{{ $committee->id }}" num="{{ $key+1 }}" class="btn btn-danger shadow btn-xs sharp delete-com"><i class="fa fa-trash"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endif
                                                <div class="settings-form">
                                                    {!! Form::open(['route' => 'student.committee.add','class'=>'com-valide']) !!}
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Nama Kepanitiaan</label>
                                                                {!! Form::text('name', '', ['id'=>'com_name','class'=>'form-control','autocomplete'=>'off']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Posisi</label>
                                                                {!! Form::text('position', '', ['id'=>'position_com','class'=>'form-control']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Tahun</label>
                                                                {!! Form::text('year', '', ['id'=>'year_com','class'=>'form-control','autocomplete'=>'off']) !!}
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <button class="btn btn-primary" type="submit">Tambah Data</button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="seminar" class="tab-pane fade">
                                        <div class="profile-about-me">
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <h4 class="text-primary">Pelatihan atau Seminar</h4>
                                                <p class="mb-2">Silakan mengisi form dibawah ini untuk menambah pelatihan atau seminar.</p>
                                                @if(auth()->user()->activestudent->seminars()->first())
                                                <div class="table-responsive">
                                                    <table class="table header-border table-bordered table-hover verticle-middle">
                                                    {{-- <table class="table table-bordered table-responsive-sm"> --}}
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nama</th>
                                                                <th>Tahun</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach (auth()->user()->activestudent->seminars()->orderBy('year')->get() as $key=>$seminar)
                                                            <tr>
                                                                <td>{{ $key+1 }}</td>
                                                                <td>{{ $seminar->name }}</td>
                                                                <td>{{ $seminar->year }}</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <a href="javascript:void(0)" seminar_id="{{ $seminar->id }}" year="{{ $seminar->year }}" s_name="{{ $seminar->name }}" data-toggle="modal" data-target="#SeminarModal" class="btn btn-primary shadow btn-xs sharp mr-1 modal-edit3"><i class="fa fa-pencil"></i></a>
                                                                        <a href="javascript:void(0)" seminar-id="{{ $seminar->id }}" num="{{ $key+1 }}" class="btn btn-danger shadow btn-xs sharp delete-seminar"><i class="fa fa-trash"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endif
                                                <div class="settings-form">
                                                    {!! Form::open(['route' => 'student.seminar.add','class'=>'seminar-valide']) !!}
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Nama Pelatihan/Seminar</label>
                                                                {!! Form::text('name', '', ['id'=>'seminar_name','class'=>'form-control','autocomplete'=>'off']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Tahun</label>
                                                                {!! Form::text('year', '', ['id'=>'year_seminar','class'=>'form-control','autocomplete'=>'off']) !!}
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <button class="btn btn-primary" type="submit">Tambah Data</button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="achievment" class="tab-pane fade">
                                        <div class="profile-about-me">
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <h4 class="text-primary">Penghargaan atau Prestasi</h4>
                                                <p class="mb-2">Silakan mengisi form dibawah ini untuk menambah penghargaan atau prestasi.</p>
                                                @if(auth()->user()->activestudent->achievments()->first())
                                                <div class="table-responsive">
                                                    <table class="table header-border table-bordered table-hover verticle-middle">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nama</th>
                                                                <th>Tingkat</th>
                                                                <th>Tahun</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach (auth()->user()->activestudent->achievments()->orderBy('year')->get() as $key=>$achievment)
                                                            <tr>
                                                                <td>{{ $key+1 }}</td>
                                                                <td>{{ $achievment->name }}</td>
                                                                <td>
                                                                    <span class="badge badge-primary">{{ $achievment->level }}</span>
                                                                </td>
                                                                <td>{{ $achievment->year }}</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <a href="javascript:void(0)" achievment_id="{{ $achievment->id }}" year="{{ $achievment->year }}" ach_name="{{ $achievment->name }}" level="{{ $achievment->level }}" data-toggle="modal" data-target="#AchModal" class="btn btn-primary shadow btn-xs sharp mr-1 modal-edit4"><i class="fa fa-pencil"></i></a>
                                                                        <a href="javascript:void(0)" achievment-id="{{ $achievment->id }}" num="{{ $key+1 }}" class="btn btn-danger shadow btn-xs sharp delete-achievment"><i class="fa fa-trash"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endif
                                                <div class="settings-form">
                                                    {!! Form::open(['route' => 'student.achievment.add','class'=>'ach-valide']) !!}
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Nama Penghargaan/Prestasi</label>
                                                                {!! Form::text('name', '', ['id'=>'achievment_name','class'=>'form-control','autocomplete'=>'off']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Tingkat</label>
                                                                {!! Form::text('level', '', ['id'=>'level_achievment','class'=>'form-control','autocomplete'=>'off']) !!}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Tahun</label>
                                                                {!! Form::text('year', '', ['id'=>'year_achievment','class'=>'form-control','autocomplete'=>'off']) !!}
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
                {!! Form::open(['route' => 'student.password.edit','class'=>'password-valide']) !!}
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
<div class="modal fade" id="OrModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Organisasi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'student.organization.edit','class'=>'or-edit-valide']) !!}
                    <div class="row"> 
                        {!! Form::hidden('organization_id', '', ['id'=>'organization_id']) !!}
                        <div class="col-lg-12 form-group">
                            <label>Nama Organisasi</label>
                            {!! Form::text('name', '', ['id'=>'organization_name_edit','class'=>'form-control']) !!}
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>Posisi</label>
                            {!! Form::text('position', '', ['id'=>'position_edit','class'=>'form-control']) !!}
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>Periode</label>
                            {!! Form::text('period', '', ['id'=>'period_edit','class'=>'form-control','autocomplete'=>'off']) !!}
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
<div class="modal fade" id="ComModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Kepanitiaan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'student.committee.edit','class'=>'com-edit-valide']) !!}
                    <div class="row"> 
                        {!! Form::hidden('committee_id', '', ['id'=>'committee_id']) !!}
                        <div class="col-lg-12 form-group">
                            <label>Nama Kepanitiaan</label>
                            {!! Form::text('name', '', ['id'=>'committee_name_edit','class'=>'form-control']) !!}
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>Posisi</label>
                            {!! Form::text('position', '', ['id'=>'position_com_edit','class'=>'form-control']) !!}
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>Tahun</label>
                            {!! Form::text('year', '', ['id'=>'year_com_edit','class'=>'form-control','autocomplete'=>'off']) !!}
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
<div class="modal fade" id="SeminarModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Pelatihan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'student.seminar.edit','class'=>'seminar-edit-valide']) !!}
                    <div class="row"> 
                        {!! Form::hidden('seminar_id', '', ['id'=>'seminar_id']) !!}
                        <div class="col-lg-12 form-group">
                            <label>Nama Pelatihan/Seminar</label>
                            {!! Form::text('name', '', ['id'=>'seminar_name_edit','class'=>'form-control']) !!}
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>Tahun</label>
                            {!! Form::text('year', '', ['id'=>'year_seminar_edit','class'=>'form-control','autocomplete'=>'off']) !!}
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
<div class="modal fade" id="AchModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Prestasi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'student.achievment.edit','class'=>'ach-edit-valide']) !!}
                    <div class="row"> 
                        {!! Form::hidden('achievment_id', '', ['id'=>'achievment_id']) !!}
                        <div class="col-lg-12 form-group">
                            <label>Nama Penghargaan/Prestasi</label>
                            {!! Form::text('name', '', ['id'=>'ach_name_edit','class'=>'form-control']) !!}
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>Tingkat</label>
                            {!! Form::text('level', '', ['id'=>'level_ach_edit','class'=>'form-control']) !!}
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>Tahun</label>
                            {!! Form::text('year', '', ['id'=>'year_ach_edit','class'=>'form-control','autocomplete'=>'off']) !!}
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
<script src="{{ asset('asset_dashboard/js/student-index-init.js') }}"></script>
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
    $('.delete-or').click(function(){
        var education_id = $(this).attr('organization-id');
        var num = $(this).attr('num');
        var url = "{{route('student.delete.organization', '')}}"+"/"+education_id;
        swal({   
            title: "Yakin ?",   
            text: "Hapus riwayat organisasi nomor "+num+" ?",   
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
    $('.delete-com').click(function(){
        var com_id = $(this).attr('committee-id');
        var num = $(this).attr('num');
        var url = "{{route('student.delete.committee', '')}}"+"/"+com_id;
        swal({   
            title: "Yakin ?",   
            text: "Hapus riwayat kepanitiaan nomor "+num+" ?",   
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
    $('.delete-seminar').click(function(){
        var seminar_id = $(this).attr('seminar-id');
        var num = $(this).attr('num');
        var url = "{{route('student.delete.seminar', '')}}"+"/"+seminar_id;
        swal({   
            title: "Yakin ?",   
            text: "Hapus riwayat pelatihan nomor "+num+" ?",   
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
    $('.delete-achievment').click(function(){
        var achievment_id = $(this).attr('achievment-id');
        var num = $(this).attr('num');
        var url = "{{route('student.delete.achievment', '')}}"+"/"+achievment_id;
        swal({   
            title: "Yakin ?",   
            text: "Hapus penghargaan/prestasi nomor "+num+" ?",   
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