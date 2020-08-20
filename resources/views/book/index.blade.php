@extends('layouts.app')

@section('content')

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
                    <tr>
                        <td>Book 1</td>
                        <td>1234</td>
                        <td>July 12, 2020</td>
                        <td>July 12, 2020</td>
                        <td>
                            <a href="/books/show" class="btn btn-sm btn-primary">View</a>
                            <a href="/books/edit" class="btn btn-sm btn-success">Edit</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Book 2</td>
                        <td>1234</td>
                        <td>July 12, 2020</td>
                        <td>July 12, 2020</td>
                        <td>
                            <a href="/books/show" class="btn btn-sm btn-primary">View</a>
                            <a href="/books/edit" class="btn btn-sm btn-success">Edit</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Book 3</td>
                        <td>1234</td>
                        <td>July 12, 2020</td>
                        <td>July 12, 2020</td>
                        <td>
                            <a href="/books/show" class="btn btn-sm btn-primary">View</a>
                            <a href="/books/edit" class="btn btn-sm btn-success">Edit</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
