<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="admin, dashboard">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dompet : Payment Admin Template">
    <meta property="og:title" content="Dompet : Payment Admin Template">
    <meta property="og:description" content="Dompet : Payment Admin Template">
    <meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Bad Request</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ url('images/warning.png') }}">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-7">
                    <div class="form-input-content text-center error-page">
                        <h1 class="error-text fw-bold">404</h1>
                        <h4><i class="fa fa-exclamation-triangle text-warning"></i> Halaman yang Anda cari tidak
                            ditemukan!</h4>
                        <p>Anda mungkin salah mengetik alamat atau halaman mungkin telah dipindahkan..</p>
                        <div>
                            <a class="btn btn-primary" href="{{ url()->previous() }}">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
 Scripts
***********************************-->
    <!-- Required vendors -->
    {{-- <script src="vendor/global/global.min.js"></script> --}}
    {{-- <script src="js/custom.min.js"></script> --}}
    {{-- <script src="js/dlabnav-init.js"></script> --}}
    {{-- <script src="js/styleSwitcher.js"></script> --}}
</body>

</html>
