@extends('layout.master')

@section('title', 'Tạo mới người dùng')

@section('content-title', 'Tạo mới người dùng')

@section('content')
    <form
        action="{{route('users.store')}}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        <div class='form-group'>
            <label for="">Tên</label>
            <input type="text" name='name' class='form-control' value="{{isset($user) ? $user->name : ''}}">
        </div>
        <div class='form-group'>
            <label for="">Email</label>
            <input type="email" name='email' class='form-control'>
        </div>
        <div class='form-group'>
            <label for="">Mật khẩu</label>
            <input type="password" name='password' class='form-control'>
        </div>
        <div class='form-group'>
            <label for="">Mã sinh viên</label>
            <input type="text" name='code' class='form-control'>
        </div>
        <div class='form-group'>
            <label for="">Mã tài khoản</label>
            <input type="text" name='username' class='form-control'>
        </div>
        <div class='form-group'>
            <label for="">Ảnh đại diện</label>
            <input type="file" name='avatar' class='form-control'>
        </div>
        <div class='form-group'>
            <label for="">Phân quyền</label>
            <input type="radio" name='role' value="1"> GV
            <input type="radio" name='role' value="0"> SV
        </div>
        <div class='form-group'>
            <label for="">Trạng thái</label>
            <input type="radio" name='status' value="1"> Kích hoạt
            <input type="radio" name='status' value="0"> K kích hoạt
        </div>
        <div>
            <button class='btn btn-primary'>Tạo mới</button>
            <button type="reset" class='btn btn-warning'>Nhập lại</button>
        </div>
    </form>
@endsection

<!-- Lab 3: Hoàn thiện form chỉnh sửa, có hiển thị ảnh cũ và lưu dữ liệu chỉnh sửa -->
<!-- method PUT, sử dụng ->update() -->
