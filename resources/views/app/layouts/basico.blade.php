<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <title>Super Gestão - @yield('title')</title>
</head>

<body>
    @include('app.layouts.partials.header')
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                window.toastr.error('{{ $error }}');
                console.log('error')
            @endforeach
        </script>
    @endif
    @if (session('success'))
        <script>
            window.toastr.success('{{ session('success') }}');
        </script>
    @endif
</body>

</html>
