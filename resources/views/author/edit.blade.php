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
            Edit Author
        </div>
        <div class="card-body">

            <form action="{{ route('authors.update',$author) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Author Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $author->name }}">
                </div>

                <button type="submit" class="btn btn-success mt-3">Update</button>
            </form>

        </div>
    </div>
</div>

@endsection