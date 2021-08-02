<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset_dashboard/images/LOGO-HIMATIKA-FMIPA-UNPAD.png') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('asset_dashboard/vendor/toastr/css/toastr.min.css') }}">
    <!-- Datatable -->
    <link href="{{ asset('asset_dashboard/vendor/datatables/css/jquery.dataTables.min.cs') }}s" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('asset_dashboard/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
	<link href="{{ asset('asset_dashboard/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_dashboard/css/style.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('asset_dashboard/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_dashboard/vendor/pickadate/themes/default.date.css') }}">
    @yield('header')
</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        @include('layouts.includes._navbar')

        @include('layouts.includes._sidebar')

        <!--**********************************
            Content body start
        ***********************************-->
        @yield('content')
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Website ini dibuat oleh Himatika FMIPA Unpad 2021 bersama dengan Ewen Hokijuliandy(2019)</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
        
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('asset_dashboard/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('asset_dashboard/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('asset_dashboard/js/custom.min.js') }}"></script>
	<script src="{{ asset('asset_dashboard/js/deznav-init.js') }}"></script>
    <script src="{{ asset('asset_dashboard/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('asset_dashboard/vendor/pickadate/picker.date.j') }}s"></script>
    <!-- Jquery Validation -->
    <script src="{{ asset('asset_dashboard/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <!-- Sweet Alert -->
    <script src="{{ asset('asset_dashboard/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <!-- Datatable -->
    <script src="{{ asset('asset_dashboard/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
	<script src="{{ asset('asset_dashboard/js/master-init.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('asset_dashboard/vendor/toastr/js/toastr.min.js') }}"></script>
	@yield('footer')
</body>

</html>