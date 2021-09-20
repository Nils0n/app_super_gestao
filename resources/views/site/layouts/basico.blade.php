<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Super Gestão - @yield('title')</title>
</head>
<body>
    @include('site.layouts.partials.header')
    @yield('content')
</body>
</html>