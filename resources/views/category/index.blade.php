{{-- Home se ke thua view master --}}
@extends('layout.master')

{{-- section se thay doi
    phan yield trong master
    voi ten tuong ung --}}
@section('title', 'Category page')

@section('content-title', 'Category page')

@section('content')
    <div>
        <a href="{{route('categories.create')}}">
            <button class="btn btn-primary">Create</button>
        </a>
    </div>
    <table class="table table-hover">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Actions</th>
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
                    <td>
                        <form
                            action="{{route('categories.delete', $category->id)}}"
                            method="POST"
                        >
                            @method('DELETE')
                            {{-- <input type="text" name="_method" value="DELETE"> --}}
                            @csrf
                            {{-- <input type="text" name="csrf_token" value="asdadasd"> --}}
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
@endsection
