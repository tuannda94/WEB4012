<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
    <div class="container">
        {{-- Đưa 1 phần giao diện dùng chung là header: views/layout/header.blade.php --}}
        @include('layout.header')

        {{-- Phần nội dung thay đổi --}}
        @yield('content')

        {{-- Đưa 1 phần giao diện dùng chung là footer: views/layout/footer.blade.php --}}
        @include('layout.footer')
    </div>
</body>
</html>
