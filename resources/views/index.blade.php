<!DOCTYPE html>
<html lang="en">

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
    <title>MyDoctor:App Konsultasi Dokter Online</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('/') }}images/Logo1.png">
    <link href="{{ asset('/') }}vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="{{ asset('/') }}css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    {{-- <div id="preloader">
        <div class="waviy">
            <span style="--i:1">K</span>
            <span style="--i:2">E</span>
            <span style="--i:3">L</span>
            <span style="--i:4">O</span>
            <span style="--i:5">M</span>
            <span style="--i:6">P</span>
            <span style="--i:7">O</span>
            <span style="--i:8">K</span>
            <span style="--i:9">.</span>
            <span style="--i:10">6</span>
        </div>
    </div> --}}
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        @include('template.navbar')
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Chat box start
        ***********************************-->
        @include('template.chatbox')
        <!--**********************************
            Chat box End
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('template.header')

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('template.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>RPL3 &amp; Developed by <a href="" target="_blank">Kelompok 6</a> Since 2023
                </p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('/') }}vendor/global/global.min.js"></script>
    <script src="{{ asset('/') }}vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('/') }}js/custom.min.js"></script>
    <script src="{{ asset('/') }}js/dlabnav-init.js"></script>
    <script src="{{ asset('/') }}js/demo.js"></script>
    {{-- <script src="{{ asset('/') }}js/styleSwitcher.js"></script> --}}
    @stack('script')
    @include('sweetalert::alert')
</body>

</html>
