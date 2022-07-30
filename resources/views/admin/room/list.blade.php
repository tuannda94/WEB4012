@extends('layout.master')

@section('title', 'Phòng ban')

@section('content-tile', 'Phòng ban')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Tên phòng ban</th>
                <th>Nhân viên</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>
                        <ul>
                            @foreach($item->users as $user)
                                <li>{{$user->name}}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
