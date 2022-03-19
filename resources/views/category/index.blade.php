{{-- Home se ke thua view master --}}
@extends('layout.master')

{{-- section se thay doi
    phan yield trong master
    voi ten tuong ung --}}
@section('title', 'Category page')

@section('content-title', 'Category page')

@section('content')
    <table class="table table-hover">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Created at</th>
            <th>Updated at</th>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description ?: 'N/A' }}</td>
                        <td>{{ $category->slug ?: 'N/A' }}</td>
                        <td>{{ $category->status == 1 ? 'Active' : 'Deactive' }}</td>
                        <td>{{ $category->created_at ?: 'N/A' }}</td>
                        <td>{{ $category->updated_at ?: 'N/A' }}</td>
                    </tr>
            @endforeach
        </tbody>
    </table>
@endsection
