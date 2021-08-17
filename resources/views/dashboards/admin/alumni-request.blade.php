@extends('layouts.master')

@section('header')
<title>Permintaan Database Alumni</title>
@endsection

@section('header-title')
    Permintaan Database Alumni
@endsection

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Permintaan Database</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.alumni.request') }}">Alumni</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Permintaan Database Alumni</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="studentrequest" class="display min-w850" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Role</th>
                                        <th>Nama</th>
                                        <th>NPM</th>
                                        <th style="width:15%">Keperluan</th>
                                        <th>Angkatan</th>
                                        <th style="width:18%">Data yang Diminta</th>
                                        <th>Waktu Request</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requests as $key=>$request)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            @if($request->user->role=='A')
                                                <span class="badge light badge-secondary">Alumni</span>
                                            @else
                                                <span class="badge light badge-success">Mahasiswa</span>
                                            @endif
                                        </td>
                                        <td>{{ $request->user->name }}</td>
                                        <td>{{ $request->user->npm }}</td>
                                        <td>{{ $request->reason }}</td>
                                        <td>{{ $request->generation->year }}</td>
                                        <td>
                                            <a class="btn btn-warning light btn-xs mb-1">Nama</a>
                                            <a class="btn btn-warning light btn-xs mb-1">NPM</a>
                                            @if ($request->avatar==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Foto</a>
                                            @endif
                                            @if ($request->email==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Email</a> 
                                            @endif
                                            @if ($request->phone==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Telepon</a> 
                                            @endif
                                            @if ($request->gender==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Jenis Kelamin</a> 
                                            @endif
                                            @if ($request->birth_data==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Tempat & Tanggal Lahir</a> 
                                            @endif
                                            @if ($request->blood_group==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Golongan Darah</a> 
                                            @endif
                                            @if ($request->religion==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Agama</a> 
                                            @endif
                                            @if ($request->address==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Alamat</a> 
                                            @endif
                                            @if ($request->interest==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Bidang Minat</a> 
                                            @endif
                                            @if ($request->line==1)
                                            <a class="btn btn-warning light btn-xs mb-1">ID Line</a> 
                                            @endif
                                            @if ($request->instagram==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Instagram</a> 
                                            @endif
                                            @if ($request->twitter==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Twitter</a> 
                                            @endif
                                            @if ($request->facebook==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Facebook</a> 
                                            @endif
                                            @if ($request->linkedin==1)
                                            <a class="btn btn-warning light btn-xs mb-1">LinkedIn</a> 
                                            @endif
                                            @if ($request->salary==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Gaji</a> 
                                            @endif
                                            @if ($request->education==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Pendidikan Lanjut</a> 
                                            @endif
                                            @if ($request->job==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Riwayat Pekerjaan</a> 
                                            @endif
                                            @if ($request->certification==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Sertifikasi</a> 
                                            @endif
                                        </td>
                                        <td>{{ $request->created_at }}</td>
                                        <td>
                                            @if ($request->confirm == 1)
                                            <a class="btn btn-success light btn-xs mb-1">Disetujui</a> 
                                            @elseif ($request->confirm == 2)
                                            <a class="btn btn-danger light btn-xs mb-1">Ditolak</a> 
                                            @else
                                            <a class="btn btn-light light btn-xs mb-1">Menunggu</a> 
                                            @endif
                                        </td>
                                        <td>
                                            @if ($request->confirm == NULL)
                                            <a href="javascript:void(0)" title="Kirim" request-id="{{ $request->id }}" nama="{{ $request->user->name }}" class="btn btn-success shadow btn-xs sharp accept"><i class="fa fa-check"></i></a>
                                            <a href="javascript:void(0)" title="Tolak" request-id="{{ $request->id }}" nama="{{ $request->user->name }}" class="btn btn-danger shadow btn-xs sharp reject"><i class="fa fa-times"></i></a>
                                            @elseif ($request->confirm == 1 || $request->confirm == 2)
                                            <a href="javascript:void(0)" title="Hapus" request-id="{{ $request->id }}" nama="{{ $request->user->name }}" class="btn btn-danger shadow btn-xs sharp deletereq"><i class="fa fa-trash"></i></a>
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
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script>
         $('.accept').click(function(){
            var request_id = $(this).attr('request-id');
            var nama = $(this).attr('nama');
            var url = "{{ route('admin.request.alumni.accept', '') }}"+"/"+request_id;
            swal({   
                title: "Setuju ?",   
                text: "Beri akses database ke user dengan nama "+nama+" ?",  
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
        $('.reject').click(function(){
            var request_id = $(this).attr('request-id');
            var nama = $(this).attr('nama');
            var url = "{{ route('admin.request.alumni.reject', '') }}"+"/"+request_id;
            swal({   
                title: "Tolak ?",   
                text: "Tolak permintaan user dengan nama "+nama+" ?",  
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
        $('.deletereq').click(function(){
            var request_id = $(this).attr('request-id');
            var nama = $(this).attr('nama');
            var url = "{{ route('admin.request.alumni.delete', '') }}"+"/"+request_id;
            swal({   
                title: "Hapus ?",   
                text: "Hapus permintaan user dengan nama "+nama+" ?",  
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
        $('#studentrequest').DataTable({
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
    @if(session('accepted'))
    <script>
        toastr.success("Permintaan berhasil disetujui!", "Berhasil", {
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
    @if(session('rejected'))
    <script>
        toastr.success("Permintaan berhasil ditolak!", "Berhasil", {
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
        toastr.success("Permintaan berhasil dihapus!", "Berhasil", {
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