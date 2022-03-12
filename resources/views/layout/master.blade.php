<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @yield: dinh nghia phan co the thay doi --}}
    <title>Laravel app - @yield('title')</title>
</head>
<body>
    {{-- HEADER BEGIN --}}
    <div>
        @include('layout.header')
    </div>
    {{-- END HEADER --}}

    <div>
        @yield('content')
    </div>

    {{-- FOOTER BEGIN --}}
    <div>
        @include('layout.footer')
    </div>
    {{-- FOOTER END --}}
</body>
</html>
