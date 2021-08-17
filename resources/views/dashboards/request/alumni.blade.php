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
                <li class="breadcrumb-item active"><a href="{{ route('alumni.request') }}">Alumni</a></li>
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
                            @if(auth()->user()->alumnirequests()->first())
                            @foreach (auth()->user()->alumnirequests()->get() as $key=>$request)
                            <div class="accordion__item">
                                <div class="accordion__header{{ ($key)!=0 ? ' collapsed' : '' }}" data-toggle="collapse" data-target="#bordered_collapse{{ $key+1 }}"> <span class="accordion__header--text">Mahasiswa {{ $request->generation->year }}</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="bordered_collapse{{ $key+1 }}" class="collapse accordion__body{{ ($key)!=0 ? '' : ' show' }}">
                                    <div class="accordion__body--text text-center">
                                        @if($request->confirm == 1)
                                        <p>Permintaan database disetujui, akses database dengan menekan tombol dibawah ini.</p>
                                        <a href="{{ route('detail.alumni.request', ['alumnirequest'=>$request->id]) }}" class="btn btn-info btn-sm">Lihat Database</a>
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
                    {!! Form::open(['route' => 'request.alumni.post', 'class'=>'form-valide']) !!}
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
                                        {{ Form::checkbox('interest', 1, '', ['class'=>'custom-control-input','id'=>'interest']) }}
                                        <label class="custom-control-label" for="interest">Bidang Minat</label>
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
                                        {{ Form::checkbox('instagram', 1, '', ['class'=>'custom-control-input','id'=>'instagram']) }}
                                        <label class="custom-control-label" for="instagram">Instagram</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('twitter', 1, '', ['class'=>'custom-control-input','id'=>'twitter']) }}
                                        <label class="custom-control-label" for="twitter">Twitter</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('facebook', 1, '', ['class'=>'custom-control-input','id'=>'facebook']) }}
                                        <label class="custom-control-label" for="facebook">Facebook</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('linkedin', 1, '', ['class'=>'custom-control-input','id'=>'linkedin']) }}
                                        <label class="custom-control-label" for="linkedin">LinkedIn</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('salary', 1, '', ['class'=>'custom-control-input','id'=>'salary']) }}
                                        <label class="custom-control-label" for="salary">Rentang Gaji</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('education', 1, '', ['class'=>'custom-control-input','id'=>'education']) }}
                                        <label class="custom-control-label" for="education">Pendidikan Lanjut</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('job', 1, '', ['class'=>'custom-control-input','id'=>'job']) }}
                                        <label class="custom-control-label" for="job">Riwayat Pekerjaan</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                        {{ Form::checkbox('certification', 1, '', ['class'=>'custom-control-input','id'=>'certification']) }}
                                        <label class="custom-control-label" for="certification">Sertifikasi</label>
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
@if(session('denied'))
<script>
    toastr.error("Anda tidak memiliki akses!", "Gagal", {
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