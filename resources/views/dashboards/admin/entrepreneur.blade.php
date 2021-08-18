@extends('layouts.master')

@section('header')
<title>Database Entrepreneur</title>
@endsection

@section('header-title')
    Database Entrepreneur
@endsection

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Permintaan Database</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.entrepreneur.data') }}">Entrepreneur</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Database Entrepreneur</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="entrepreneur" class="display min-w850" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Usaha</th>
                                        <th>Jenis Usaha</th>
                                        <th>Pendapatan</th>
                                        <th>Instagram</th>
                                        <th>line</th>
                                        <th>Nama Pemilik</th>
                                        <th>NPM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entre as $key=>$en)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $en->name }}</td>
                                        <td>{{ $en->type }}</td>
                                        <td>{{ $en->income }}</td>
                                        <td>
                                            @if($en->instagram != NULL)
                                            {{ $en->instagram }}
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                            @if($en->line != NULL)
                                            {{ $en->line }}
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>{{ $en->activestudent->user->name }}</td>
                                        <td>{{ $en->activestudent->user->npm }}</td>
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
    $('#entrepreneur').DataTable({
        dom: 'Blfrtip',
        buttons: [
            'copyHtml5',
            {
                extend : 'csv',
                title : function() {
                    return "Database Entrepreneur";
                },
                titleAttr : 'CSV'
            },
            {
                extend : 'excel',
                title : function() {
                    return "Database Entrepreneur";
                },
                titleAttr : 'Excel'
            },
            {
                extend : 'pdf',
                title : function() {
                    return "Database Entrepreneur";
                },
                orientation : 'landscape',
                pageSize : 'A4',
                titleAttr : 'PDF'
            },
            {
                extend : 'print',
                title : function() {
                    return "Database Entrepreneur";
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