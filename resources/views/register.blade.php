@extends('layout.master')

@section('title', 'Đăng ký thông tin')

@section('content')
    <form action="{{route('register-success')}}" method="GET">
        <div class="form-group">
            <label for="">Tên</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-success">Đăng ký</button>
        </div>
    </form>
@endsection
