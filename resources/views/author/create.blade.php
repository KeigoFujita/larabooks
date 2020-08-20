@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            Add Author
        </div>
        <div class="card-body">

            <form action="/authors/store" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Author Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <button type="submit" class="btn btn-success mt-3">Add Author</button>
            </form>

        </div>
    </div>
</div>

@endsection
