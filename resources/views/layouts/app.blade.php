<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cardify</title>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="{{asset('image/gif')}}" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    <style>
        body {
            background: whitesmoke;
            font-family: 'Open Sans', sans-serif;
        }

        .container {
            max-width: 960px;
            margin: 30px auto;
            padding: 20px;
        }

        h1 {
            font-size: 20px;
            text-align: center;
            margin: 20px 0 20px;
        }

        h1 small {
            display: block;
            font-size: 15px;
            padding-top: 8px;
            color: gray;
        }

        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        }

        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }

        .avatar-upload .avatar-edit input {
            display: none;
        }

        .avatar-upload .avatar-edit input+label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }

        .avatar-upload .avatar-edit input+label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }

        /* .avatar-upload .avatar-edit input:after {
            content: "\f040";
            font-family: 'FontAwesome';
            color: #757575;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        } */

        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .avatar-upload .avatar-preview>div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .avatar-edit {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;

        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.0.0.min.js')}}"></script>
    <script src="{{asset('js/plugin.js')}}"></script>
    <!-- sidebar -->
    <script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <!-- javascript -->
    <script src="{{asset('js/owl.carousel.js')}}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script type="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2//2.0.0-beta.2.4/owl.carousel.min.js"></script>
    <!-- Tweaks for older IEs-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"></script>

    <style>
        .flip-card {
            background-color: transparent;
            width: 100%;
            height: 330px;
            perspective: 1000px;


        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;

            transition: transform 0.6s;
            transform-style: preserve-3d;

            backface-visibility: hidden;
            -moz-backface-visibility: hidden;

        }

        .flip-card:focus {
            outline: 0;
        }

        .flip-card:hover .flip-card-inner,
        .flip-card:focus .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;

            border-radius: 30px;

        }

        .flip-card-front {
            background-color: red;
            color: black;
            z-index: 2;
            padding: 20px;


        }

        .flip-card-back {
            background: black;
            color: white;
            transform: rotateY(180deg);
            z-index: 1;



        }

        h3 {
            font-size: 20px;
            font-family: Verdana, sans-serif;
            font-weight: bold;
            color: #fff;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.0.0.min.js"></script>
    <script src="./js/plugin.js"></script>
    <!-- sidebar -->
    <script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="./js/custom.js"></script>
    <script type="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2//2.0.0-beta.2.4/owl.carousel.min.js"></script>
</body>

</html>