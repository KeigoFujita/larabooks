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
            Books
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <th>Title</th>
                    <th>Pages</th>
                    <th>Updated At</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </thead>
                <tbody>

                    @forelse ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->no_of_pages }}</td>
                        <td>{{ $book->updated_at->format('M d, Y') }}</td>
                        <td>{{ $book->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('books.show',$book) }}" class="btn btn-sm btn-primary">Show</a>
                            <a href="{{ route('books.edit',$book) }}" class="btn btn-sm btn-success">Edit</a>
                            <form action="{{ route('books.destroy',$book) }}" method="POST" class="d-inline">
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