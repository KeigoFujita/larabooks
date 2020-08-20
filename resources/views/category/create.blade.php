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
            Add Category
        </div>
        <div class="card-body">

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <button type="submit" class="btn btn-success mt-3">Add Category</button>
            </form>

        </div>
    </div>
</div>

@endsection