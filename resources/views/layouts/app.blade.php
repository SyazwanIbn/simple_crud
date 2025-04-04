<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Default Title')</title> <!-- Set Default Title -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Link to CSS file -->
</head>
<body>
    <nav>
    <!-- Navigation bar can be added here -->

    </nav>

    <div class="container">
        @yield('content') <!-- This is where the content of each page will be injected -->
    </div>
</body>
</html>
