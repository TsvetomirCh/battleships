<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{{ csrf_token() }}}" />
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>
        Battleships :: @yield('title')
    </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')

</head>

<body>

<div class="container">
    <div class="header clearfix">
        @include('partials.nav')
        <h3 class="text-muted">Battleships</h3>
    </div>

    @yield('content')

    <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</div>

</body>
</html>