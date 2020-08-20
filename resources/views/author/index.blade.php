@extends('layouts.app')

@section('content')

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
                    <tr>
                        <td>Melinda Gates</td>
                        <td>123</td>
                        <td>July 12, 2020</td>
                        <td>July 12, 2020</td>
                        <td>
                            <a href="/authors/edit" class="btn btn-sm btn-success">Edit</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Bill Gates</td>
                        <td>123</td>
                        <td>July 12, 2020</td>
                        <td>July 12, 2020</td>
                        <td>
                            <a href="/authors/edit" class="btn btn-sm btn-success">Edit</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>James Wizard</td>
                        <td>123</td>
                        <td>July 12, 2020</td>
                        <td>July 12, 2020</td>
                        <td>
                            <a href="/authors/edit" class="btn btn-sm btn-success">Edit</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
