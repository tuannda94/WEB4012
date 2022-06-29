{{-- 1. Kiểm tra những phần có thể dùng chung --}}
{{-- 2. Nơi nào sẽ bị thay đổi --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
    <div class="container">
        {{-- Sẽ có phần header được nhúng vào master layout, views/layout/header.blade.php --}}
        @include('layout.header')

        {{-- Phần nội dung sẽ thay đổi --}}
        @yield('content')

        {{-- Sẽ có phần footer được nhúng vào master layout, views/layout/footer.blade.php --}}
        @include('layout.footer')
    </div>
</body>
</html>
