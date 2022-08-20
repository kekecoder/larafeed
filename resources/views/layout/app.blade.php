<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    @vite('resources/css/app.css')
    <title>All Feeds</title>
    <style>
        textarea{
            height: 10rem;
            resize: none;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>