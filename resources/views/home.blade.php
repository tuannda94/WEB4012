{{-- Home se ke thua view master --}}
@extends('layout.master')

{{-- section se thay doi
    phan yield trong master
    voi ten tuong ung --}}
@section('title', 'Home page')

@section('content-title', 'Home page')

@section('content')
    <table class="table table-hover">
        <thead>
            <th>Tên</th>
            <th>Tuổi</th>
            <th>Lớp</th>
            <th>MSV</th>
            <th>Ảnh đại diện</th>
        </thead>
        <tbody>
            @foreach ($students as $student)
                @if ($student['id'] == 1)
                    <tr>
                        <td>{{ $student['name'] }}</td>
                        <td>{{ $student['age'] }}</td>
                        <td>{{ $student['class'] }}</td>
                        <td>{{ $student['id'] }}</td>
                        <td><img height="200" src="{{ $student['avatar'] }}" alt=""></td>
                    </tr>
                @else
                    <tr>
                        <td>{{ $student['name'] }} ELSE</td>
                        <td>{{ $student['age'] }}</td>
                        <td>{{ $student['class'] }}</td>
                        <td>{{ $student['id'] }}</td>
                        <td><img height="200" src="{{ $student['avatar'] }}" alt=""></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
