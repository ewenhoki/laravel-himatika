<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Error 500</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset_dashboard/images/LOGO-HIMATIKA-FMIPA-UNPAD.png') }}">
    <link href="{{ asset('asset_dashboard/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-8">
                    <div class="form-input-content text-center error-page">
                        <h1 class="error-text font-weight-bold">500</h1>
                        <h4><i class="fa fa-exclamation-triangle text-warning"></i> Web dalam kondisi terkunci!</h4>
                        <p>Web mungkin dalam tahap perbaikan atau pembaharuan data. Hubungi Admin jika terdapat keperluan mendesak.</p>
						<div>
                            <a class="btn btn-secondary light" href="{{ route('login') }}">Kembali ke Beranda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('asset_dashboard/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('asset_dashboard/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('asset_dashboard/js/custom.min.js') }}"></script>
<script src="{{ asset('asset_dashboard/js/deznav-init.js') }}"></script>

</html>