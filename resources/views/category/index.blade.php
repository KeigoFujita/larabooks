@extends('layouts.app')

@section('content')

@if (session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

@if (session()->has('danger'))
<div class="alert alert-danger">
    {{ session()->get('danger') }}
</div>
@endif

<div class="container">
    <div class="card">
        <div class="card-header">
            Categories

            <a href="categories/create" class="float-right btn btn-sm btn-success">
                Add Category
            </a>

        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <th>Name</th>
                    <th>No of Books</th>
                    <th>Updated At</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->books->count() }}</td>
                        <td>{{ $category->updated_at->format('M d, Y') }}</td>
                        <td>{{ $category->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('categories.edit',$category) }}" class="btn btn-sm btn-success">Edit</a>
                            <form action="{{ route('categories.destroy',$category) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>

                    @empty
                    <tr class="">
                        <td colspan="5" align="center">No data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection