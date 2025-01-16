@extends('MainPage')
@section('title', 'Manage Service')
@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h6>List All Service's</h6>
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addSkillModal">+ Add service</button>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Service Name</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                  {{-- Tampilkan isi datanya disini --}}
                  @foreach($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $service->service_name }}</td>
                         <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <form id="delete-form-{{ $skill->id }}" action="{{ route('delete-skill', $skill->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $skill->id }})">Delete</button>
                                </div>
                            </td>
                    </tr>
                  @endforeach
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

<!-- Modal Add Skill -->
<div class="modal fade" id="addSkillModal" tabindex="-1" aria-labelledby="addSkillModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSkillModalLabel">Add New Skill</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addSkillForm" action="{{ route('add-skill') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="skillName" class="form-label">Skill Name</label>
                <input type="text" class="form-control" id="skillName" name="skill_name" placeholder="Enter skill name" required>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Fungsi konfirmasi penghapusan
    function confirmDelete(serviceId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + serviceId).submit();
            }
        });
    }
    
    // SweetAlert untuk notifikasi sukses
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
