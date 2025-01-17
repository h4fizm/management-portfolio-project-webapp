@extends('MainPage')
@section('title', 'Manage Project')
@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h6>List All Project's</h6>
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addProjectModal">+ Add Project</button>
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
                                <img src="{{ asset('LandingPage/Assets/not_found.png')}}" alt="Default" style="width: 100px; height: auto; border-radius: 5px;">
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

<!-- Modal Add Project -->
<div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProjectModalLabel">Add New Project</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addProjectForm" action="{{ route('store-project') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Project Name -->
            <div class="mb-3">
                <label for="projectName" class="form-label">Project Name</label>
                <input type="text" class="form-control" id="projectName" name="project_name" placeholder="Enter project name" required>
            </div>
            <!-- Project Description -->
            <div class="mb-3">
                <label for="projectDescription" class="form-label">Project Description</label>
                <textarea class="form-control" id="projectDescription" name="project_description" rows="3" placeholder="Enter project description" required></textarea>
            </div>
            <!-- Service Name Dropdown -->
            <div class="mb-3">
                <label for="serviceName" class="form-label">Service Name</label>
                <select class="form-select" id="serviceName" name="project_service" required>
                    <option value="" disabled selected>Select a service</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Project Photo -->
            <div class="mb-3">
                <label for="projectPhoto" class="form-label">Project Photo</label>
                <input type="file" class="form-control" id="projectPhoto" name="project_photo" accept="image/*" required>
                <div class="form-text">Upload a photo for the project. Recommended size: 100px x auto.</div>
            </div>
            <!-- Project Link -->
            <div class="mb-3">
                <label for="projectLink" class="form-label">Project Link</label>
                <input type="url" class="form-control" id="projectLink" name="project_link" placeholder="Enter project link">
            </div>
            <!-- Submit Button -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>

    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
    @endif

</script>
@endsection
