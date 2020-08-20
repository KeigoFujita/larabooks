@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            Edit Category
        </div>
        <div class="card-body">

            <form action="/categories/store" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <button type="submit" class="btn btn-success mt-3">Update Category</button>
            </form>

        </div>
    </div>
</div>

@endsection
