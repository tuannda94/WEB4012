@extends('layout.master')

@section('title', 'Category page')

@section('content-title', 'Category Create')

@section('content')
    <form action="{{route('categories.store')}}" class="form" method="POST">
        {{-- Bat buoc trong form se phai co token bang @csrf --}}
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input
                name="name"
                class="form-control"
                id="name"
            />
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input
                name="description"
                class="form-control"
                id="description"
            />
        </div>
        <div class="form-group">
            <input type="radio" name="status" id="status" value="0">
            <label for="status">Deactive</label>
        </div>
        <div class="form-group">
            <input type="radio" name="status" id="status" value="1">
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
