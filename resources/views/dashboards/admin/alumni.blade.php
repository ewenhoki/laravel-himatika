@extends('layouts.master')

@section('header')
<title>Database Alumni</title>
<link href="{{ asset('asset_dashboard/vendor/lightgallery/css/lightgallery.min.css') }}" rel="stylesheet">
@endsection

@section('header-title')
    Database Alumni
@endsection

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Database</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.alumni.data') }}">Alumni</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pilih Angkatan Pada Form Berikut</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.alumni.detail']) !!}
                            <div class="form-row">
                                <label class="col-sm-3 col-form-label">Angkatan</label>
                                <div class="form-group col-sm-3">
                                    @if(isset($gen))
                                    {{ Form::select('generation_id', $generation, $gen->id, ['class'=>'dropdown bootstrap-select form-control default-select','tabindex'=>'-98','placeholder'=>'Semua Angkatan']) }}
                                    @else
                                    {{ Form::select('generation_id', $generation, '',['class'=>'dropdown bootstrap-select form-control default-select','tabindex'=>'-98','placeholder'=>'Semua Angkatan']) }}
                                    @endif
                                </div>
                                <div class="form-group col-sm-3">
                                    <input class="btn btn-success" type="submit" value="Pilih Angkatan">
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            @isset($alumni)
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if(isset($gen))
                        <h4 class="card-title">Database Alumni Angkatan {{ $gen->year }}</h4>
                        @else
                        <h4 class="card-title">Database Alumni Semua Angkatan</h4>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display min-w850" style="width:300%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>NPM</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Golongan Darah</th>
                                        <th>Agama</th>
                                        <th>Alamat</th>
                                        <th>Bidang Minat</th>
                                        <th>ID Line</th>
                                        <th>Instagram</th>
                                        <th>Twitter</th>
                                        <th>Facebook</th>
                                        <th>LinkedIn</th>
                                        <th>Gaji</th>
                                        <th>Pendidikan Lanjut</th>
                                        <th>Riwayat Pekerjaan</th>
                                        <th>Sertifikasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumni as $key=>$al)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <div class="lightgallery">
                                            @if($al->user->avatar!=NULL)
                                                @if(file_exists(public_path('user_image/'.$al->user->avatar)))
                                                <a href="{{ asset('user_image/'.$al->user->avatar) }}" data-exthumbimage="{{ asset('user_image/'.$al->user->avatar) }}" data-src="{{ asset('user_image/'.$al->user->avatar) }}">
                                                <img src="{{ asset('user_image/'.$al->user->avatar) }}" class="rounded-circle" width="35" alt=""/>
                                                @else
                                                <a href="{{ asset('user_image/profile-default.png') }}" data-exthumbimage="{{ asset('user_image/profile-default.png') }}" data-src="{{ asset('user_image/profile-default.png') }}">
                                                <img src="{{ asset('user_image/profile-default.png') }}" class="rounded-circle" width="35" alt=""/>
                                                @endif
                                            @else
                                            <a href="{{ asset('user_image/profile-default.png') }}" data-exthumbimage="{{ asset('user_image/profile-default.png') }}" data-src="{{ asset('user_image/profile-default.png') }}">
                                            <img src="{{ asset('user_image/profile-default.png') }}" class="rounded-circle" width="35" alt=""/>
                                            @endif
                                            </a>
                                            </div>
                                        </td>
                                        <td>{{ $al->user->name }}</td>
                                        <td>{{ $al->user->npm }}</td>
                                        <td>{{ $al->user->email }}</td>
                                        <td>{{ $al->user->phone }}</td>
                                        <td>
                                            @if($al->user->gender == 'L')
                                            <span class="badge light badge-success"><i class="fa fa-circle text-success mr-1"></i>Laki-laki</span>
                                            @else
                                            <span class="badge light badge-danger"><i class="fa fa-circle text-danger mr-1"></i>Perempuan</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($al->user->birth_place != NULL || $al->user->birth_date != NULL)
                                                {{ $al->user->birth_place.', '.\Carbon\Carbon::parse($al->user->birth_date)->locale('id')->isoFormat('D MMMM Y') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ ($al->user->blood_group!=NULL) ? $al->user->blood_group : '-' }}</td>
                                        <td>{{ ($al->user->religion!=NULL) ? $al->user->religion : '-' }}</td>
                                        <td>{{ ($al->user->address!=NULL) ? $al->user->address : '-' }}</td>
                                        <td>{{ ($al->interest!=NULL) ? $al->interest : '-' }}</td>
                                        <td>{{ ($al->line!=NULL) ? $al->line : '-' }}</td>
                                        <td>{{ ($al->instagram!=NULL) ? $al->instagram : '-' }}</td>
                                        <td>{{ ($al->twitter!=NULL) ? $al->twitter : '-' }}</td>
                                        <td>{{ ($al->facebook!=NULL) ? $al->facebook : '-' }}</td>
                                        <td>{{ ($al->linkedin!=NULL) ? $al->linkedin : '-' }}</td>
                                        <td>{{ ($al->salary!=NULL) ? $al->salary : '-' }}</td>
                                        <td>
                                            @if($al->educations()->first())
                                                @foreach ($al->educations()->get() as $edu)
                                                    <p><span class="badge light badge-light">{{ $edu->level.' | '.$edu->university.' | '.$edu->major.' | '.$edu->year }}</span></p>
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($al->jobs()->first())
                                                @foreach ($al->jobs()->get() as $job)
                                                    <p><span class="badge light badge-light">{{ $job->company_name.' | '.$job->year.' | '.$job->position }}</span></p>
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($al->certifications()->first())
                                                @foreach ($al->certifications()->get() as $cer)
                                                    <p><span class="badge light badge-light">{{ $cer->name.' | '.$cer->year }}</span></p>
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endisset
        </div>
    </div>
</div>
@endsection

@section('footer')
<script src="{{ asset('asset_dashboard/vendor/lightgallery/js/lightgallery-all.min.js') }}"></script>
@isset($alumni)
<script>
    $('.lightgallery').lightGallery({
        loop:true,
        thumbnail:true,
        exThumbImage: 'data-exthumbimage'
    });
    $('#example').DataTable({
        dom: 'Blfrtip',
        buttons: [
            'copyHtml5',
            {
                extend : 'csv',
                exportOptions: {
                    columns: [ 0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20 ]
                },
                title : function() {
                    return "Database Alumni {{ (isset($gen)) ? $gen->year : 'Semua Angkatan'}}";
                },
                titleAttr : 'CSV'
            },
            {
                extend : 'excel',
                exportOptions: {
                    columns: [ 0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20 ]
                },
                title : function() {
                    return "Database Alumni {{ (isset($gen)) ? $gen->year : 'Semua Angkatan'}}";
                },
                titleAttr : 'Excel'
            },
            {
                extend : 'pdf',
                exportOptions: {
                    columns: [ 0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20 ]
                },
                title : function() {
                    return "Database Alumni {{ (isset($gen)) ? $gen->year : 'Semua Angkatan'}}";
                },
                orientation : 'landscape',
                pageSize : 'A2',
                titleAttr : 'PDF'
            },
            {
                extend : 'print',
                exportOptions: {
                    columns: [ 0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20 ]
                },
                title : function() {
                    return "Database Alumni {{ (isset($gen)) ? $gen->year : 'Semua Angkatan'}}";
                },
                customize: function(win){
                    var last = null;
                    var current = null;
                    var bod = [];
    
                    var css = '@page { size: landscape; }',
                        head = win.document.head || win.document.getElementsByTagName('head')[0],
                        style = win.document.createElement('style');
    
                    style.type = 'text/css';
                    style.media = 'print';
    
                    if (style.styleSheet)
                    {
                    style.styleSheet.cssText = css;
                    }
                    else
                    {
                    style.appendChild(win.document.createTextNode(css));
                    }
    
                    head.appendChild(style);
                },
                pageSize : 'A2',
            },
        ],
        "language": {
            "search": "Cari",
            "paginate": {
                "previous": "Sebelumnya",
                "next": "Setelahnya",
            },
            "lengthMenu": "Tampilkan _MENU_ entri",
            "zeroRecords": "Tidak ditemukan entri yang cocok",
            "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Data kosong",
            "infoFiltered": "(filter dari _MAX_ total entri)"
        }
    });
</script>
@endisset
@endsection