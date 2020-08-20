@extends('layouts.app')

@section('content')
@if (session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
<div class="container">
    <div class="card">
        <div class="card-header">
            Authors

            <a href="authors/create" class="float-right btn btn-sm btn-success">
                Add Author
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
                    @forelse ($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->books->count() }}</td>
                        <td>{{ $author->updated_at->format('M d, Y') }}</td>
                        <td>{{ $author->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('authors.edit',$author) }}" class="btn btn-sm btn-success">Edit</a>
                            <form action="{{ route('authors.destroy',$author) }}" method="POST" class="d-inline">
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