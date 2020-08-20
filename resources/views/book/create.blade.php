@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    {{ $error }}
    @endforeach
</div>
@endif
<div class="container">
    <div class="card">
        <div class="card-header">
            Add Book
        </div>
        <div class="card-body">

            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>

                <div class="form-group">
                    <label for="no_of_pages">No of Pages</label>
                    <input type="number" class="form-control" name="no_of_pages" min="1" value="1">
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="authors">Author</label>
                    <select name="authors[]" class="form-control" multiple>
                        @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success mt-3">Add Book</button>
            </form>

        </div>
    </div>
</div>

@endsection