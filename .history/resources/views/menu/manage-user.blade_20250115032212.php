@extends('MainPage')
@section('title', 'Manage User')
@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">List All User's</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data Contoh 1 -->
                    <tr>
                        <th scope="row">1</th>
                        <td>John Doe</td>
                        <td>john.doe@email.com</td>
                        <td>
                            <button class="btn btn-sm btn-primary me-2">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <!-- Data Contoh 2 -->
                    <tr>
                        <th scope="row">2</th>
                        <td>Jane Smith</td>
                        <td>jane.smith@email.com</td>
                        <td>
                            <button class="btn btn-sm btn-primary me-2">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <!-- Data Contoh 3 -->
                    <tr>
                        <th scope="row">3</th>
                        <td>Robert Brown</td>
                        <td>robert.brown@email.com</td>
                        <td>
                            <button class="btn btn-sm btn-primary me-2">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>
@endsection
