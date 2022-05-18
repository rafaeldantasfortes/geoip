<!doctype html>
<html lang="en">
    <head>
        @php
        $time=time();
        @endphp
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="/resources/css/style.css?v=<?= $time; ?>">
        <title>Geoip Application</title>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark text-white">
            Geolocation <div class="relogio float-right"></div>
        </nav>
        <div class='container'>
            @yield('content')
        </div>
        <footer class="text-center text-white fixed-bottom" style="background-color: #21081a;">
            <div class="container p-4"></div>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © <?= date('Y'); ?> 
                <a class="text-white" href="javascript:;">godiswithus.com</a>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src='/resources/js/GeoIpClass.js?v=<?= $time; ?>'></script>
        @yield('aditionaljs')
    </body>
</html>