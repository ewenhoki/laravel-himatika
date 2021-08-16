@extends('layouts.master')

@section('header')
<title>Permintaan Database</title>
@endsection

@section('header-title')
    Permintaan Database
@endsection

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Permintaan Database</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('student.request') }}">Mahasiswa</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Status Permintaan Database</h4>
                        <p class="m-0 subtitle">Database dapat diakses setelah disetujui oleh admin. Silakan cek status pengajuan secara berkala.</p>
                    </div>
                    <div class="card-body">
                        <div id="accordion-two" class="accordion accordion-primary-solid">
                            @if(auth()->user()->studentrequests()->first())
                            @foreach (auth()->user()->studentrequests()->get() as $key=>$request)
                            <div class="accordion__item">
                                <div class="accordion__header{{ ($key)!=0 ? ' collapsed' : '' }}" data-toggle="collapse" data-target="#bordered_collapse{{ $key+1 }}"> <span class="accordion__header--text">Mahasiswa {{ $request->generation->year }}</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="bordered_collapse{{ $key+1 }}" class="collapse accordion__body{{ ($key)!=0 ? '' : ' show' }}">
                                    <div class="accordion__body--text text-center">
                                        @if($request->confirm == 1)
                                        <p>Permintaan database disetujui, akses database dengan menekan tombol dibawah ini.</p>
                                        <a href="#" class="btn btn-info btn-sm">Lihat Database</a>
                                        @elseif($request->confirm == NULL)
                                        <p>Menunggu persetujuan admin.</p>
                                        @else
                                        <p>Permintaan database ditolak.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="accordion__item">
                                <div class="accordion__header" data-toggle="collapse" data-target="#bordered_collapse1"> <span class="accordion__header--text">Tidak Ada Permintaan</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="bordered_collapse1" class="collapse accordion__body show">
                                    <div class="accordion__body--text text-center">
                                        <p>Silakan mengisi form disamping untuk mengajukan permintaan database.</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Form Request Database</h4>
                        <p class="m-0 subtitle">Silakan isi form dibawah ini dengan baik.</p>
                    </div>
                    {!! Form::open(['route' => 'request.student.post', 'class'=>'form-valide']) !!}
                        <div class="card-body">
                            <div class="form-group">
                                <label>Keperluan</label>
                                {{ Form::textarea('reason','', ['class'=>'form-control','rows'=>'5']) }}
                            </div>
                            <label>Pilih Angkatan</label>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {{ Form::select('generation_id', $generation, '',['class'=>'dropdown bootstrap-select form-control default-select','tabindex'=>'-98','placeholder'=>'Belum Memilih']) }}
                                </div>
                            </div>
                            <label>Detail Database</label><br>
                            <div class="form-row">
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('npm', 1, true, ['class'=>'custom-control-input','id'=>'npm', 'disabled']) }}
                                        <label class="custom-control-label" for="npm">NPM</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('name', 1, true, ['class'=>'custom-control-input','id'=>'name', 'disabled']) }}
                                        <label class="custom-control-label" for="name">Nama</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('avatar', 1, '', ['class'=>'custom-control-input','id'=>'avatar']) }}
                                        <label class="custom-control-label" for="avatar">Foto</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('email', 1, '', ['class'=>'custom-control-input','id'=>'email']) }}
                                        <label class="custom-control-label" for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('phone', 1, '', ['class'=>'custom-control-input','id'=>'phone']) }}
                                        <label class="custom-control-label" for="phone">Nomor Telepon</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('gender', 1, '', ['class'=>'custom-control-input','id'=>'gender']) }}
                                        <label class="custom-control-label" for="gender">Jenis Kelamin</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('birth_data', 1, '', ['class'=>'custom-control-input','id'=>'birth_data']) }}
                                        <label class="custom-control-label" for="birth_data">Tempat, Tanggal Lahir</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('blood_group', 1, '', ['class'=>'custom-control-input','id'=>'blood_group']) }}
                                        <label class="custom-control-label" for="blood_group">Golongan Darah</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('religion', 1, '', ['class'=>'custom-control-input','id'=>'religion']) }}
                                        <label class="custom-control-label" for="religion">Agama</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('address', 1, '', ['class'=>'custom-control-input','id'=>'address']) }}
                                        <label class="custom-control-label" for="address">Alamat</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('boarding_address', 1, '', ['class'=>'custom-control-input','id'=>'boarding_address']) }}
                                        <label class="custom-control-label" for="boarding_address">Alamat Kost</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('line', 1, '', ['class'=>'custom-control-input','id'=>'line']) }}
                                        <label class="custom-control-label" for="line">ID Line</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('interest', 1, '', ['class'=>'custom-control-input','id'=>'interest']) }}
                                        <label class="custom-control-label" for="interest">Bidang Minat</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('father_name', 1, '', ['class'=>'custom-control-input','id'=>'father_name']) }}
                                        <label class="custom-control-label" for="father_name">Nama Ayah</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('father_job', 1, '', ['class'=>'custom-control-input','id'=>'father_job']) }}
                                        <label class="custom-control-label" for="father_job">Pekerjaan Ayah</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('father_phone', 1, '', ['class'=>'custom-control-input','id'=>'father_phone']) }}
                                        <label class="custom-control-label" for="father_phone">Telepon Ayah</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('mother_name', 1, '', ['class'=>'custom-control-input','id'=>'mother_name']) }}
                                        <label class="custom-control-label" for="mother_name">Nama Ibu</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('mother_job', 1, '', ['class'=>'custom-control-input','id'=>'mother_job']) }}
                                        <label class="custom-control-label" for="mother_job">Pekerjaan Ibu</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('mother_phone', 1, '', ['class'=>'custom-control-input','id'=>'mother_phone']) }}
                                        <label class="custom-control-label" for="mother_phone">Telepon Ibu</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('income', 1, '', ['class'=>'custom-control-input','id'=>'income']) }}
                                        <label class="custom-control-label" for="income">Punya Penghasilan</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('organization', 1, '', ['class'=>'custom-control-input','id'=>'organization']) }}
                                        <label class="custom-control-label" for="organization">Riwayat Organisasi</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('committee', 1, '', ['class'=>'custom-control-input','id'=>'committee']) }}
                                        <label class="custom-control-label" for="committee">Riwayat Kepanitiaan</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('seminar', 1, '', ['class'=>'custom-control-input','id'=>'seminar']) }}
                                        <label class="custom-control-label" for="seminar">Pelatihan / Seminar</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('achievment', 1, '', ['class'=>'custom-control-input','id'=>'achievment']) }}
                                        <label class="custom-control-label" for="achievment">Prestasi / Penghargaan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input class="btn btn-info" type="submit" value="Request Database">
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script src="{{ asset('asset_dashboard/js/request-form-init.js') }}"></script>
@if(session('sent'))
    <script>
        toastr.success("Permintaan database berhasil dikirim!", "Berhasil", {
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
@if(session('reason'))
<script>
    swal({   
        title: "Gagal !",   
        text: "Informasi keperluan wajib diisi.",   
        type: "error",    
        confirmButtonText: "Tutup",     
    });
</script>
@endif
@if(session('gen'))
<script>
    swal({   
        title: "Gagal !",   
        text: "Belum memilih angkatan.",   
        type: "error",    
        confirmButtonText: "Tutup",     
    });
</script>
@endif
@endsection