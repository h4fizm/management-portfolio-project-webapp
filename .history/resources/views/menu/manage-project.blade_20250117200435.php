@extends('MainPage')
@section('title', 'Manage Project')
@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h6>List All Project's</h6>
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addServiceModal">+ Add service</button>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Service Name</th>
                        <th scope="col">Project Photo</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data Dummy 1 -->
                    <tr>
                        <th scope="row">1</th>
                        <td>Website E-Commerce</td>
                        <td>Web Development</td>
                        <td>
                            <img src="{{ asset('LandingPage/Assets/project1.svg')}}" alt="E-Commerce" style="width: 100px; height: auto; border-radius: 5px;">
                        </td>
                        <td class="text-center">
                            <button class="btn btn-primary btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    <!-- Data Dummy 2 -->
                    <tr>
                        <th scope="row">2</th>
                        <td>Mobile App</td>
                        <td>App Development</td>
                        <td>
                            <img src="{{ asset('LandingPage/Assets/project2.svg')}}" alt="Mobile App" style="width: 100px; height: auto; border-radius: 5px;">
                        </td>
                        <td class="text-center">
                            <button class="btn btn-primary btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-3">
            <!-- Add pagination here -->
        </div>
    </div>
  </div>
</div>

<!-- Modal Add Service -->

@endsection
