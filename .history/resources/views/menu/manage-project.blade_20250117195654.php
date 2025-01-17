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
                   
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-3">
            {{ $services->links('pagination::bootstrap-4') }}
        </div>
    </div>
  </div>
</div>

<!-- Modal Add Service -->

@endsection
