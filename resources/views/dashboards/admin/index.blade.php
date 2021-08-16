@extends('layouts.master')

@section('header')
<title>Manajemen User</title>
@endsection

@section('header-title')
    Manajemen User
@endsection

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Dasbor</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="row">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card avtivity-card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="activity-icon bgl-success mr-md-4 mr-3">
                                        <i class="flaticon-381-user-9" style="color:#27BC48; font-size:35px;"></i>
                                    </span>
                                    <div class="media-body">
                                        <p class="fs-14 mb-2">Total Users</p>
                                        <span class="title text-black font-w600">{{ $users->count() }}</span>
                                    </div>
                                </div>
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar bg-success" style="width: 100%; height:5px;" role="progressbar">
                                    </div>
                                </div>
                            </div>
                            <div class="effect bg-success"></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card avtivity-card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="activity-icon bgl-secondary  mr-md-4 mr-3">
                                        <i class="flaticon-381-user-3" style="color:#A02CFA; font-size:40px;"></i>
                                    </span>
                                    <div class="media-body">
                                        <p class="fs-14 mb-2">Total Mahasiswa</p>
                                        <span class="title text-black font-w600">{{ $activestudent }}</span>
                                    </div>
                                </div>
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar bg-secondary" style="width: 100%; height:5px;" role="progressbar">
                                    </div>
                                </div>
                            </div>
                            <div class="effect bg-secondary"></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card avtivity-card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="activity-icon bgl-danger mr-md-4 mr-3">
                                        <i class="flaticon-381-user-2" style="color:#FF3282; font-size:40px;"></i>
                                    </span>
                                    <div class="media-body">
                                        <p class="fs-14 mb-2">Total Alumni</p>
                                        <span class="title text-black font-w600">{{ $inactivestudent }}</span>
                                    </div>
                                </div>
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar bg-danger" style="width: 100%; height:5px;" role="progressbar">
                                    </div>
                                </div>
                            </div>
                            <div class="effect bg-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card avtivity-card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="activity-icon bgl-warning  mr-md-4 mr-3">
                                        <i class="flaticon-381-send" style="color:#FFBC11; font-size:35px;"></i>
                                    </span>
                                    <div class="media-body">
                                        <p class="fs-14 mb-2">Permintaan Database</p>
                                        <span class="title text-black font-w600">{{ $requests }}</span>
                                    </div>
                                </div>
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar bg-warning" style="width: 100%; height:5px;" role="progressbar">
                                    </div>
                                </div>
                            </div>
                            <div class="effect bg-warning"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Manajemen User</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="users" class="display min-w850" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Role</th>
                                        <th>NPM</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Dibuat Di</th>
                                        <th>Status</th>
                                        <th>Terakhir Online</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            @if($user->role=='Admin')
                                                <span class="badge light badge-info">Admin</span>
                                            @elseif($user->role=='A')
                                                <span class="badge light badge-secondary">Alumni</span>
                                            @else
                                                <span class="badge light badge-success">Mahasiswa</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->npm }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            @if(Cache::has('is_online' . $user->id))
                                                <span class="badge light badge-success">Online</span>
                                            @else
                                                <span class="badge light badge-dark">Offline</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($user->last_seen)->locale('id')->diffForHumans() }}</td>
                                        <td>
                                            <div class="dropleft">
                                                @if($user->role == 'Admin')
                                                <button type="button" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="false" disabled>
                                                @else
                                                <button type="button" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="false">
                                                @endif
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </button>
                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                                    @if($user->role == 'M')
                                                    <a class="dropdown-item switch-alumni" href="javascript:void(0);" user-id="{{ $user->id }}" user-name="{{ $user->name }}">Ubah Menjadi Alumni</a>
                                                    @else
                                                    <a class="dropdown-item switch-student" href="javascript:void(0);" user-id="{{ $user->id }}" user-name="{{ $user->name }}">Ubah Menjadi Mahasiswa</a>
                                                    @endif
                                                    @if(is_null($user->email_verified_at))
                                                    <a class="dropdown-item" href="{{ route('admin.verification', ['user'=>$user->id]) }}">Verifikasi</a>
                                                    @endif
                                                    <a class="dropdown-item delete-user" href="javascript:void(0);" user-id="{{ $user->id }}" user-name="{{ $user->name }}">Hapus</a>
                                                </div>
                                            </div>
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
    $('.switch-alumni').click(function(){
        var user_id = $(this).attr('user-id');
        var user_name = $(this).attr('user-name');
        var url = "{{route('admin.switch.alumni', '')}}"+"/"+user_id;
        swal({   
            title: "Yakin ?",   
            text: "Ubah role user dengan nama "+user_name+" menjadi alumni?",   
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
    $('.switch-student').click(function(){
        var user_id = $(this).attr('user-id');
        var user_name = $(this).attr('user-name');
        var url = "{{route('admin.switch.student', '')}}"+"/"+user_id;
        swal({   
            title: "Yakin ?",   
            text: "Ubah role user dengan nama "+user_name+" menjadi mahasiswa?",   
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
    $('.delete-user').click(function(){
        var user_id = $(this).attr('user-id');
        var user_name = $(this).attr('user-name');
        var url = "{{route('admin.delete', '')}}"+"/"+user_id;
        swal({   
            title: "Yakin ?",   
            text: "Hapus user dengan nama "+user_name+"?",   
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
    $('#users').DataTable({
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
@if(session('verif'))
    <script>
        toastr.success("User berhasil diverifikasi!", "Berhasil", {
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
        toastr.success("User berhasil dihapus!", "Berhasil", {
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
@if(session('switched'))
    <script>
        toastr.success("Berhasil mengganti role user!", "Berhasil", {
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