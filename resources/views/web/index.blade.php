<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tracking Order</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/@icon/icofont/icofont.css">
</head>

<body>
<div id="ebazar-layout" class="theme-blue">
    @include('web.partials.side-bar')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->
        @include('web.partials.header')

        <!-- Body: Body -->
        @include('web.partials.search')

        <!-- Modal Custom Settings-->
        @include('web.partials.tracking_details')
    </div>

</div>
</body>

<script src="assets/js/index.js"></script>
<script src="assets/js/libscripts.bundle.js"></script>
<script src="assets/js/template.js"></script>
</html>
