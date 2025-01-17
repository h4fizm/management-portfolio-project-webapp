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
                    @foreach($projects as $key => $project)
                    <tr>
                        <th scope="row">{{ $projects->firstItem() + $key }}</th>
                        <td>{{ $project->project_name }}</td>
                        <td>{{ $project->service->service_name ?? 'N/A' }}</td>
                        <td>
                            @if($project->project_photo)
                                <img src="{{ asset($project->project_photo) }}" alt="{{ $project->project_name }}" style="width: 100px; height: auto; border-radius: 5px;">
                            @else
                                <img src="{{ asset('.png') }}" alt="Default" style="width: 100px; height: auto; border-radius: 5px;">
                            @endif
                        </td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-3">
            {{ $projects->links() }}
        </div>
    </div>
  </div>
</div>

<!-- Modal Add Service -->

@endsection
