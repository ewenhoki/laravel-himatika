@extends('layouts.master')

@section('header')
<title>Permintaan Database Mahasiswa</title>
@endsection

@section('header-title')
    Permintaan Database Mahasiswa
@endsection

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Permintaan Database</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.student.request') }}">Mahasiswa</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Permintaan Database Mahasiswa</h4>
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
                                        <th style="width:20%">Keperluan</th>
                                        <th>Angkatan</th>
                                        <th style="width:18%">Data yang Diminta</th>
                                        <th>Waktu Request</th>
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
                                            @if ($request->boarding_address==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Alamat Kost</a> 
                                            @endif
                                            @if ($request->line==1)
                                            <a class="btn btn-warning light btn-xs mb-1">ID Line</a> 
                                            @endif
                                            @if ($request->interest==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Bidang Minat</a> 
                                            @endif
                                            @if ($request->father_name==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Nama Ayah</a> 
                                            @endif
                                            @if ($request->father_job==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Pekerjaan Ayah</a> 
                                            @endif
                                            @if ($request->father_phone==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Telepon Ayah</a> 
                                            @endif
                                            @if ($request->mother_name==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Nama Ibu</a> 
                                            @endif
                                            @if ($request->mother_job==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Pekerjaan Ibu</a> 
                                            @endif
                                            @if ($request->mother_phone==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Telepon Ibu</a> 
                                            @endif
                                            @if ($request->income==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Penghasilan</a> 
                                            @endif
                                            @if ($request->organization==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Organisasi</a> 
                                            @endif
                                            @if ($request->committee==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Kepanitiaan</a> 
                                            @endif
                                            @if ($request->seminar==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Pelatihan/Seminar</a> 
                                            @endif
                                            @if ($request->achievment==1)
                                            <a class="btn btn-warning light btn-xs mb-1">Prestasi</a> 
                                            @endif
                                        </td>
                                        <td>{{ $request->created_at }}</td>
                                        <td>
                                            <a href="javascript:void(0)" title="Kirim" nama="Nama Panjang" class="btn btn-success shadow btn-xs sharp accept"><i class="fa fa-check"></i></a>
                                            <a href="javascript:void(0)" title="Tolak" nama="Nama Panjang" class="btn btn-danger shadow btn-xs sharp reject"><i class="fa fa-times"></i></a>
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
@endsection