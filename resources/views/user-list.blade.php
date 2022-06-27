<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>USER LIST</title>
</head>
<body>
    <div class="container">
        <div>Tên lớp: {{$class_name}}</div>
        {{-- {{var_dump($user_list)}} --}}
        {{-- {{dd($user_list)}} --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Tuổi</th>
                    <th>Địa chỉ</th>
                    <th>SĐT</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                {{-- bắt đầu với ký tự @ --}}
                @foreach ($user_list as $item)
                    <tr>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['age']}}</td>
                        <td>{{$item['address']}}</td>
                        <td>{{$item['phone']}}</td>
                        <td>{{$item['email']}}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>
</html>
