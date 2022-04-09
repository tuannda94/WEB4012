{{-- Neu edit thi se co bien $product truyen vao --}}
@extends('layout.master')

@section('title', 'Product page')

@section(
    'content-title',
    isset($product) ? 'Product Edit' : 'Product Create'
)

@section('content')
    <form
        action="{{isset($product)
            ? route('products.update', $product->id)
            : route('products.store')}}"
        class="form"
        method="POST"
        {{-- Nếu trong form có file --}}
        enctype="multipart/form-data"
    >
        {{-- Neu co du lieu $product thi se là update, ép kiểu method
            về PUT --}}
        @if (isset($product))
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
                value="{{isset($product) ? $product->name : ''}}"
            />
        </div>
        <div class="form-group">
            <label for="description">Short Description</label>
            <input
                name="short_description"
                class="form-control"
                id="short_description"
                value="{{isset($product) ? $product->short_description : ''}}"
            />
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input
                name="description"
                class="form-control"
                id="description"
                value="{{isset($product) ? $product->description : ''}}"
            />
        </div>
        <div class="form-group">
            <label for="description">Price</label>
            <input
                name="price"
                class="form-control"
                id="price"
                value="{{isset($product) ? $product->price : ''}}"
            />
        </div>
        <div class="form-group">
            <label for="description">Quantity</label>
            <input
                name="quantity"
                class="form-control"
                id="quantity"
                value="{{isset($product) ? $product->quantity : ''}}"
            />
        </div>
        <div class="form-group">
            <label for="description">Thumbnail</label>
            <input
                type="file"
                name="thumbnail_url"
                class="form-control"
                id="thumbnail_url"
                value="{{isset($product) ? $product->thumbnail_url : ''}}"
            />
        </div>
        <div class="form-group">
            <label for="description">Category</label>
            <input
                name="category_id"
                class="form-control"
                id="category_id"
                value="{{isset($product) ? $product->category_id : ''}}"
            />
        </div>
        <div class="form-group">
            <input
                type="radio"
                name="status"
                id="status"
                value="0"
                {{isset($product) && $product->status == 0 ? 'checked' : ''}}
            >
            <label for="status">Deactive</label>
        </div>
        <div class="form-group">
            <input
                type="radio"
                name="status"
                id="status"
                value="1"
                {{isset($product) && $product->status == 1 ? 'checked' : ''}}
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

@endsection
