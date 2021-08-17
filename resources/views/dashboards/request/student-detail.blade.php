@extends('layouts.master')

@section('header')
<title>Mahasiswa {{ $studentrequest->generation->year }}</title>
@endsection

@section('header-title')
    Database Mahasiswa {{ $studentrequest->generation->year }}
@endsection

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Permintaan Database</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Mahasiswa</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('detail.student.request', ['studentrequest'=>$studentrequest->id]) }}">Angkatan {{ $studentrequest->generation->year }}</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Database Mahasiswa Angkatan {{ $studentrequest->generation->year }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="student" class="display min-w850" style="width:{{ ($count*12 < 100) ? '100' : $count*12 }}%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        @if ($studentrequest->avatar==1)
                                        <th>Foto</th>
                                        @endif
                                        <th>Nama</th>
                                        <th>NPM</th>
                                        @if ($studentrequest->email==1)
                                        <th>Email</th>
                                        @endif
                                        @if ($studentrequest->phone==1)
                                        <th>Telepon</th>
                                        @endif
                                        @if ($studentrequest->gender==1)
                                        <th>Jenis Kelamin</th>
                                        @endif
                                        @if ($studentrequest->birth_data==1)
                                        <th>Tempat, Tanggal Lahir</th>
                                        @endif
                                        @if ($studentrequest->blood_group==1)
                                        <th>Golongan Darah</th>
                                        @endif
                                        @if ($studentrequest->religion==1)
                                        <th>Agama</th>
                                        @endif
                                        @if ($studentrequest->address==1)
                                        <th>Alamat</th>
                                        @endif
                                        @if ($studentrequest->boarding_address==1)
                                        <th>Alamat Kost</th>
                                        @endif
                                        @if ($studentrequest->line==1)
                                        <th>ID Line</th>
                                        @endif
                                        @if ($studentrequest->interest==1)
                                        <th>Bidang Minat</th>
                                        @endif
                                        @if ($studentrequest->father_name==1)
                                        <th>Nama Ayah</th>
                                        @endif
                                        @if ($studentrequest->father_job==1)
                                        <th>Pekerjaan Ayah</th>
                                        @endif
                                        @if ($studentrequest->father_phone==1)
                                        <th>Telepon Ayah</th>
                                        @endif
                                        @if ($studentrequest->mother_name==1)
                                        <th>Nama Ibu</th>
                                        @endif
                                        @if ($studentrequest->mother_job==1)
                                        <th>Pekerjaan Ibu</th>
                                        @endif
                                        @if ($studentrequest->mother_phone==1)
                                        <th>Telepon Ibu</th>
                                        @endif
                                        @if ($studentrequest->income==1)
                                        <th>Pendapatan</th>
                                        @endif
                                        @if ($studentrequest->organization==1)
                                        <th>Organisasi</th>
                                        @endif
                                        @if ($studentrequest->committee==1)
                                        <th>Kepanitiaan</th>
                                        @endif
                                        @if ($studentrequest->seminar==1)
                                        <th>Pelatihan</th>
                                        @endif
                                        @if ($studentrequest->certification==1)
                                        <th>Prestasi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($student as $key=>$st)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        @if ($studentrequest->avatar==1)
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
                                        @endif
                                        <td>{{ $st->user->name }}</td>
                                        <td>{{ $st->user->npm }}</td>
                                        @if ($studentrequest->email==1)
                                        <td>{{ $st->user->email }}</td>
                                        @endif
                                        @if ($studentrequest->phone==1)
                                        <td>{{ $st->user->phone }}</td>
                                        @endif
                                        @if ($studentrequest->gender==1)
                                        <td>
                                            @if($st->user->gender == 'L')
                                            <span class="badge light badge-success"><i class="fa fa-circle text-success mr-1"></i>Laki-laki</span>
                                            @else
                                            <span class="badge light badge-danger"><i class="fa fa-circle text-danger mr-1"></i>Perempuan</span>
                                            @endif
                                        </td>
                                        @endif
                                        @if ($studentrequest->birth_data==1)
                                        <td>
                                            @if($st->user->birth_place != NULL || $st->user->birth_date != NULL)
                                                {{ $st->user->birth_place.', '.\Carbon\Carbon::parse($st->user->birth_date)->locale('id')->isoFormat('D MMMM Y') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        @endif
                                        @if ($studentrequest->blood_group==1)
                                        <td>{{ ($st->user->blood_group!=NULL) ? $st->user->blood_group : '-' }}</td>
                                        @endif
                                        @if ($studentrequest->religion==1)
                                        <td>{{ ($st->user->religion!=NULL) ? $st->user->religion : '-' }}</td>
                                        @endif
                                        @if ($studentrequest->address==1)
                                        <td>{{ ($st->user->address!=NULL) ? $st->user->address : '-' }}</td>
                                        @endif
                                        @if ($studentrequest->boarding_address==1)
                                        <td>{{ ($st->boardning_address!=NULL) ? $st->boardning_address : '-' }}</td>
                                        @endif
                                        @if ($studentrequest->line==1)
                                        <td>{{ ($st->line!=NULL) ? $st->line : '-' }}</td>
                                        @endif
                                        @if ($studentrequest->interest==1)
                                        <td>{{ ($st->interest!=NULL) ? $st->interest : '-' }}</td>
                                        @endif
                                        @if ($studentrequest->father_name==1)
                                        <td>{{ ($st->father_name!=NULL) ? $st->father_name : '-' }}</td>
                                        @endif
                                        @if ($studentrequest->father_job==1)
                                        <td>{{ ($st->father_job!=NULL) ? $st->father_job : '-' }}</td>
                                        @endif
                                        @if ($studentrequest->father_phone==1)
                                        <td>{{ ($st->father_phone!=NULL) ? $st->father_phone : '-' }}</td>
                                        @endif
                                        @if ($studentrequest->mother_name==1)
                                        <td>{{ ($st->mother_name!=NULL) ? $st->mother_name : '-' }}</td>
                                        @endif
                                        @if ($studentrequest->mother_job==1)
                                        <td>{{ ($st->mother_job!=NULL) ? $st->mother_job : '-' }}</td>
                                        @endif
                                        @if ($studentrequest->mother_phone==1)
                                        <td>{{ ($st->mother_phone!=NULL) ? $st->mother_phone : '-' }}</td>
                                        @endif
                                        @if ($studentrequest->income==1)
                                        <td>
                                            @if($st->income==NULL || $st->income==0)
                                                <span class="badge light badge-warning">Tidak</span>
                                            @else
                                                <span class="badge light badge-success">Ya</span>
                                            @endif
                                        </td>
                                        @endif
                                        @if ($studentrequest->organization==1)
                                        <td>
                                            @if($st->organizations()->first())
                                                @foreach ($st->organizations()->get() as $or)
                                                    <p><span class="badge light badge-light">{{ $or->name.' | '.$or->position.' | '.$or->period }}</span></p>
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </td>
                                        @endif
                                        @if ($studentrequest->committee==1)
                                        <td>
                                            @if($st->committees()->first())
                                                @foreach ($st->committees()->get() as $com)
                                                    <p><span class="badge light badge-light">{{ $com->name.' | '.$com->position.' | '.$com->year }}</span></p>
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </td>
                                        @endif
                                        @if ($studentrequest->seminar==1)
                                        <td>
                                            @if($st->seminars()->first())
                                                @foreach ($st->seminars()->get() as $sem)
                                                    <p><span class="badge light badge-light">{{ $sem->name.' | '.$sem->year }}</span></p>
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </td>
                                        @endif
                                        @if ($studentrequest->certification==1)
                                        <td>
                                            @if($st->achievments()->first())
                                                @foreach ($st->achievments()->get() as $ach)
                                                    <p><span class="badge light badge-light">{{ $ach->name.' | '.$ach->level.' | '.$ach->year }}</span></p>
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </td>
                                        @endif
                                    </tr>    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script>
        $('#student').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'copyHtml5',
                {
                    extend : 'csv',
                    title : function() {
                        return "Database Mahasiswa {{ $studentrequest->generation->year }}";
                    },
                    titleAttr : 'CSV'
                },
                {
                    extend : 'excel',
                    title : function() {
                        return "Database Mahasiswa {{ $studentrequest->generation->year }}";
                    },
                    titleAttr : 'Excel'
                },
                {
                    extend : 'pdf',
                    title : function() {
                        return "Database Mahasiswa {{ $studentrequest->generation->year }}";
                    },
                    orientation : 'landscape',
                    pageSize : '{{ ($count<=12) ? "A4" : "A2" }}',
                    titleAttr : 'PDF'
                },
                {
                    extend : 'print',
                    title : function() {
                        return "Database Mahasiswa {{ $studentrequest->generation->year }}";
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
@endsection