@extends('layouts.master')

@section('header')
<title>Database Mahasiswa</title>
<style>
    @media screen and (max-width: 600px) {
    #export_all {
        visibility: hidden;
        display: none;
    }
}
</style>
@endsection

@section('header-title')
    Database Mahasiswa
@endsection

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Database</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.student.data') }}">Mahasiswa</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pilih Angkatan Pada Form Berikut</h4>
                        <div class="dropdown ml-auto" id="export_all">
                            <button type="button" class="btn btn-rounded btn-warning"><span class="btn-icon-left text-warning"><i class="fa fa-download color-warning"></i>
                            </span>Export Semua</button>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.student.detail']) !!}
                            <div class="form-row">
                                <label class="col-sm-3 col-form-label">Angkatan</label>
                                <div class="form-group col-sm-3">
                                    @if(isset($gen))
                                    {{ Form::select('generation_id', $generation, $gen->id, ['class'=>'dropdown bootstrap-select form-control default-select','tabindex'=>'-98','placeholder'=>'Belum Memilih']) }}
                                    @else
                                    {{ Form::select('generation_id', $generation, '',['class'=>'dropdown bootstrap-select form-control default-select','tabindex'=>'-98','placeholder'=>'Belum Memilih']) }}
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
            @isset($student)
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Database Angkatan {{ $gen->year }}</h4>
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
                                        <th>Alamat Kost</th>
                                        <th>ID Line</th>
                                        <th>Bidang Minat</th>
                                        <th>Nama Ayah</th>
                                        <th>Pekerjaan Ayah</th>
                                        <th>Telepon Ayah</th>
                                        <th>Nama Ibu</th>
                                        <th>Pekerjaan Ibu</th>
                                        <th>Telepon Ibu</th>
                                        <th>Pendapatan</th>
                                        <th>Organisasi</th>
                                        <th>Kepanitiaan</th>
                                        <th>Pelatihan</th>
                                        <th>Prestasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($student as $key=>$st)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            @if($st->user->avatar!=NULL)
                                                @if(file_exists(public_path('user_image/'.$st->user->avatar)))
                                                <img src="{{ asset('user_image/'.$st->user->avatar) }}" class="rounded-circle" width="35" alt=""/>
                                                @else
                                                <img src="{{ asset('user_image/profile-default.png') }}" class="rounded-circle" width="35" alt=""/>
                                                @endif
                                            @else
                                            <img src="{{ asset('user_image/profile-default.png') }}" class="rounded-circle" width="35" alt=""/>
                                            @endif
                                        </td>
                                        <td>{{ $st->user->name }}</td>
                                        <td>{{ $st->user->npm }}</td>
                                        <td>{{ $st->user->email }}</td>
                                        <td>{{ $st->user->phone }}</td>
                                        <td>
                                            @if($st->user->gender == 'L')
                                            <span class="badge light badge-success"><i class="fa fa-circle text-success mr-1"></i>Laki-laki</span>
                                            @else
                                            <span class="badge light badge-danger"><i class="fa fa-circle text-danger mr-1"></i>Perempuan</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($st->user->birth_place != NULL || $st->user->birth_date != NULL)
                                                {{ $st->user->birth_place.', '.\Carbon\Carbon::parse($st->user->birth_date)->locale('id')->isoFormat('D MMMM Y') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ ($st->user->blood_group!=NULL) ? $st->user->blood_group : '-' }}</td>
                                        <td>{{ ($st->user->religion!=NULL) ? $st->user->religion : '-' }}</td>
                                        <td>{{ ($st->user->address!=NULL) ? $st->user->address : '-' }}</td>
                                        <td>{{ ($st->boardning_address!=NULL) ? $st->boardning_address : '-' }}</td>
                                        <td>{{ ($st->line!=NULL) ? $st->line : '-' }}</td>
                                        <td>{{ ($st->interest!=NULL) ? $st->interest : '-' }}</td>
                                        <td>{{ ($st->father_name!=NULL) ? $st->father_name : '-' }}</td>
                                        <td>{{ ($st->father_job!=NULL) ? $st->father_job : '-' }}</td>
                                        <td>{{ ($st->father_phone!=NULL) ? $st->father_phone : '-' }}</td>
                                        <td>{{ ($st->mother_name!=NULL) ? $st->mother_name : '-' }}</td>
                                        <td>{{ ($st->mother_job!=NULL) ? $st->mother_job : '-' }}</td>
                                        <td>{{ ($st->mother_phone!=NULL) ? $st->mother_phone : '-' }}</td>
                                        <td>
                                            @if($st->income==NULL || $st->income==0)
                                                <span class="badge light badge-warning">Tidak</span>
                                            @else
                                                <span class="badge light badge-success">Ya</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($st->organizations()->first())
                                                @foreach ($st->organizations()->get() as $or)
                                                    <p><span class="badge light badge-light">{{ $or->name.' | '.$or->position.' | '.$or->period }}</span></p>
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($st->committees()->first())
                                                @foreach ($st->committees()->get() as $com)
                                                    <p><span class="badge light badge-light">{{ $com->name.' | '.$com->position.' | '.$com->year }}</span></p>
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($st->seminars()->first())
                                                @foreach ($st->seminars()->get() as $sem)
                                                    <p><span class="badge light badge-light">{{ $sem->name.' | '.$sem->year }}</span></p>
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($st->achievments()->first())
                                                @foreach ($st->achievments()->get() as $ach)
                                                    <p><span class="badge light badge-light">{{ $ach->name.' | '.$ach->level.' | '.$ach->year }}</span></p>
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
@isset($student)
<script>
    $('#example').DataTable({
        dom: 'Blfrtip',
        buttons: [
            'copyHtml5',
            {
                extend : 'csv',
                exportOptions: {
                    columns: [ 0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24 ]
                },
                title : function() {
                    return "Database Mahasiswa {{ $gen->year }}";
                },
                titleAttr : 'CSV'
            },
            {
                extend : 'excel',
                exportOptions: {
                    columns: [ 0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24 ]
                },
                title : function() {
                    return "Database Mahasiswa {{ $gen->year }}";
                },
                titleAttr : 'Excel'
            },
            {
                extend : 'pdf',
                exportOptions: {
                    columns: [ 0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24 ]
                },
                title : function() {
                    return "Database Mahasiswa {{ $gen->year }}";
                },
                orientation : 'landscape',
                pageSize : 'A2',
                titleAttr : 'PDF'
            },
            {
                extend : 'print',
                exportOptions: {
                    columns: [ 0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24 ]
                },
                title : function() {
                    return "Database Mahasiswa {{ $gen->year }}";
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