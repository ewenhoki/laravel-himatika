@extends('layouts.master')

@section('header')
<title>Alumni {{ $alumnirequest->generation->year }}</title>
@endsection

@section('header-title')
    Database Alumni {{ $alumnirequest->generation->year }}
@endsection

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Permintaan Database</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Alumni</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('detail.alumni.request', ['alumnirequest'=>$alumnirequest->id]) }}">Angkatan {{ $alumnirequest->generation->year }}</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Database Alumni Angkatan {{ $alumnirequest->generation->year }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="alumni" class="display min-w850" style="width:{{ ($count*12 < 100) ? '100' : $count*12 }}%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        @if ($alumnirequest->avatar==1)
                                        <th>Foto</th>
                                        @endif
                                        <th>Nama</th>
                                        <th>NPM</th>
                                        @if ($alumnirequest->email==1)
                                        <th>Email</th>
                                        @endif
                                        @if ($alumnirequest->phone==1)
                                        <th>Telepon</th>
                                        @endif
                                        @if ($alumnirequest->gender==1)
                                        <th>Jenis Kelamin</th>
                                        @endif
                                        @if ($alumnirequest->birth_data==1)
                                        <th>Tempat, Tanggal Lahir</th>
                                        @endif
                                        @if ($alumnirequest->blood_group==1)
                                        <th>Golongan Darah</th>
                                        @endif
                                        @if ($alumnirequest->religion==1)
                                        <th>Agama</th>
                                        @endif
                                        @if ($alumnirequest->address==1)
                                        <th>Alamat</th>
                                        @endif
                                        @if ($alumnirequest->interest==1)
                                        <th>Bidang Minat</th>
                                        @endif
                                        @if ($alumnirequest->line==1)
                                        <th>ID Line</th>
                                        @endif
                                        @if ($alumnirequest->instagram==1)
                                        <th>Instagram</th>
                                        @endif
                                        @if ($alumnirequest->twitter==1)
                                        <th>Twitter</th>
                                        @endif
                                        @if ($alumnirequest->facebook==1)
                                        <th>Facebook</th>
                                        @endif
                                        @if ($alumnirequest->linkedin==1)
                                        <th>LinkedIn</th>
                                        @endif
                                        @if ($alumnirequest->salary==1)
                                        <th>Gaji</th>
                                        @endif
                                        @if ($alumnirequest->education==1)
                                        <th>Pendidikan Lanjut</th>
                                        @endif
                                        @if ($alumnirequest->job==1)
                                        <th>Riwayat Pekerjaan</th>
                                        @endif
                                        @if ($alumnirequest->certification==1)
                                        <th>Sertifikasi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumni as $key=>$al)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        @if ($alumnirequest->avatar==1)
                                        <td>
                                            @if($al->user->avatar!=NULL)
                                                @if(file_exists(public_path('user_image/'.$al->user->avatar)))
                                                <img src="{{ asset('user_image/'.$al->user->avatar) }}" class="rounded-circle" width="35" alt=""/>
                                                @else
                                                <img src="{{ asset('user_image/profile-default.png') }}" class="rounded-circle" width="35" alt=""/>
                                                @endif
                                            @else
                                            <img src="{{ asset('user_image/profile-default.png') }}" class="rounded-circle" width="35" alt=""/>
                                            @endif
                                        </td>
                                        @endif
                                        <td>{{ $al->user->name }}</td>
                                        <td>{{ $al->user->npm }}</td>
                                        @if ($alumnirequest->email==1)
                                        <td>{{ $al->user->email }}</td>
                                        @endif
                                        @if ($alumnirequest->phone==1)
                                        <td>{{ $al->user->phone }}</td>
                                        @endif
                                        @if ($alumnirequest->gender==1)
                                        <td>
                                            @if($al->user->gender == 'L')
                                            <span class="badge light badge-success"><i class="fa fa-circle text-success mr-1"></i>Laki-laki</span>
                                            @else
                                            <span class="badge light badge-danger"><i class="fa fa-circle text-danger mr-1"></i>Perempuan</span>
                                            @endif
                                        </td>
                                        @endif
                                        @if ($alumnirequest->birth_data==1)
                                        <td>
                                            @if($al->user->birth_place != NULL || $al->user->birth_date != NULL)
                                                {{ $al->user->birth_place.', '.\Carbon\Carbon::parse($al->user->birth_date)->locale('id')->isoFormat('D MMMM Y') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        @endif
                                        @if ($alumnirequest->blood_group==1)
                                        <td>{{ ($al->user->blood_group!=NULL) ? $al->user->blood_group : '-' }}</td>
                                        @endif
                                        @if ($alumnirequest->religion==1)
                                        <td>{{ ($al->user->religion!=NULL) ? $al->user->religion : '-' }}</td>
                                        @endif
                                        @if ($alumnirequest->address==1)
                                        <td>{{ ($al->user->address!=NULL) ? $al->user->address : '-' }}</td>
                                        @endif
                                        @if ($alumnirequest->interest==1)
                                        <td>{{ ($al->interest!=NULL) ? $al->interest : '-' }}</td>
                                        @endif
                                        @if ($alumnirequest->line==1)
                                        <td>{{ ($al->line!=NULL) ? $al->line : '-' }}</td>
                                        @endif
                                        @if ($alumnirequest->instagram==1)
                                        <td>{{ ($al->instagram!=NULL) ? $al->instagram : '-' }}</td>
                                        @endif
                                        @if ($alumnirequest->twitter==1)
                                        <td>{{ ($al->twitter!=NULL) ? $al->twitter : '-' }}</td>
                                        @endif
                                        @if ($alumnirequest->facebook==1)
                                        <td>{{ ($al->facebook!=NULL) ? $al->facebook : '-' }}</td>
                                        @endif
                                        @if ($alumnirequest->linkedin==1)
                                        <td>{{ ($al->linkedin!=NULL) ? $al->linkedin : '-' }}</td>
                                        @endif
                                        @if ($alumnirequest->salary==1)
                                        <td>{{ ($al->salary!=NULL) ? $al->salary : '-' }}</td>
                                        @endif
                                        @if ($alumnirequest->education==1)
                                        <td>
                                            @if($al->educations()->first())
                                                @foreach ($al->educations()->get() as $edu)
                                                    <p><span class="badge light badge-light">{{ $edu->level.' | '.$edu->university.' | '.$edu->major.' | '.$edu->year }}</span></p>
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </td>
                                        @endif
                                        @if ($alumnirequest->job==1)
                                        <td>
                                            @if($al->jobs()->first())
                                                @foreach ($al->jobs()->get() as $job)
                                                    <p><span class="badge light badge-light">{{ $job->company_name.' | '.$job->year.' | '.$job->position }}</span></p>
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </td>
                                        @endif
                                        @if ($alumnirequest->certification==1)
                                        <td>
                                            @if($al->certifications()->first())
                                                @foreach ($al->certifications()->get() as $cer)
                                                    <p><span class="badge light badge-light">{{ $cer->name.' | '.$cer->year }}</span></p>
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
     $('#alumni').DataTable({
        dom: 'Blfrtip',
        buttons: [
            'copyHtml5',
            {
                extend : 'csv',
                title : function() {
                    return "Database Mahasiswa {{ $alumnirequest->generation->year }}";
                },
                titleAttr : 'CSV'
            },
            {
                extend : 'excel',
                title : function() {
                    return "Database Mahasiswa {{ $alumnirequest->generation->year }}";
                },
                titleAttr : 'Excel'
            },
            {
                extend : 'pdf',
                title : function() {
                    return "Database Mahasiswa {{ $alumnirequest->generation->year }}";
                },
                orientation : 'landscape',
                pageSize : '{{ ($count<=12) ? "A4" : "A2" }}',
                titleAttr : 'PDF'
            },
            {
                extend : 'print',
                title : function() {
                    return "Database Mahasiswa {{ $alumnirequest->generation->year }}";
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