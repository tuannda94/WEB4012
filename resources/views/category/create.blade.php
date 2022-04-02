{{-- Neu edit thi se co bien $category truyen vao --}}
@extends('layout.master')

@section('title', 'Category page')

@section(
    'content-title',
    isset($category) ? 'Category Edit' : 'Category Create'
)

@section('content')
    <form
        action="{{isset($category)
            ? route('categories.update', $category->id)
            : route('categories.store')}}"
        class="form"
        method="POST"
    >
        {{-- Neu co du lieu $category thi se là update, ép kiểu method
            về PUT --}}
        @if (isset($category))
            @method('PUT')
        @endif
        {{-- Bat buoc trong form se phai co token bang @csrf --}}
        @csrf

        {{-- Sau khi validate co loi, redirect kem $errors
            Kiem tra neu co loi bang ->any()
            Lay ra danh sach loi ->all() va foreach de hien thi
        --}}
        @if ($errors->any())
            <ul class="text-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            <input
                name="name"
                class="form-control"
                id="name"
                value="{{isset($category) ? $category->name : ''}}"
            />
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input
                name="description"
                class="form-control"
                id="description"
                value="{{isset($category) ? $category->description : ''}}"
            />
        </div>
        <div class="form-group">
            <input
                type="radio"
                name="status"
                id="status"
                value="0"
                {{isset($category) && $category->status == 0 ? 'checked' : ''}}
            >
            <label for="status">Deactive</label>
        </div>
        <div class="form-group">
            <input
                type="radio"
                name="status"
                id="status"
                value="1"
                {{isset($category) && $category->status == 1 ? 'checked' : ''}}
            >
            <label for="status">Active</label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Sumit</button>
            <a href="{{route('categories.index')}}" class="btn btn-warning">
                Cancel
            </a>
        </div>
    </form>

    <div>
        <table>
            <thead>
                <tr><th>Product Name</th></tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr><td>{{$product->name}}</td></tr>
                @endforeach
            </tbody>
        </table>
        {{$products->links()}}
    </div>

@endsection
