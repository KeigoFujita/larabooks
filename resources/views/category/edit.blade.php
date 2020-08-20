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
            Edit Category
        </div>
        <div class="card-body">

            <form action="{{ route('categories.update',$category) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                </div>

                <button type="submit" class="btn btn-success mt-3">Update Category</button>
            </form>

        </div>
    </div>
</div>

@endsection