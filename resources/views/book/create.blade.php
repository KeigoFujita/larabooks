@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            Add Book
        </div>
        <div class="card-body">

            <form action="/books/store" method="POST">
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
                    <label for="category">Category</label>
                    <select name="category" class="form-control">
                        <option value="">Fiction</option>
                        <option value="">Horror</option>
                        <option value="">Fantasy</option>
                        <option value="">Romance</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="category">Author</label>
                    <select name="category" class="form-control" multiple>
                        <option value="">Kaithlyn Ramos</option>
                        <option value="">Amanda James</option>
                        <option value="">Oprah Miley</option>
                        <option value="">Jilley Jones</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success mt-3">Add Book</button>
            </form>

        </div>
    </div>
</div>

@endsection
