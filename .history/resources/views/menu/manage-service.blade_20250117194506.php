@extends('MainPage')
@section('title', 'Manage Service')
@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h6>List All Service's</h6>
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addServiceModal">+ Add service</button>
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
                  @foreach($services as $key => $services)
                    <tr>
                        <td>{{ $services->firstItem() + $key }}</td>
                        <td>{{ $service->service_name }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <form id="delete-form-{{ $service->id }}" action="{{ route('delete-service', $service->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $service->id }})">Delete</button>
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

<!-- Modal Add Service -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addServiceModalLabel">Add New Service</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addServiceForm" action="{{ route('add-service') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="serviceName" class="form-label">Service Name</label>
                <input type="text" class="form-control" id="serviceName" name="service_name" placeholder="Enter service name" required>
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
                console.log('Submitting form for service ID:', serviceId);  // Menambahkan log untuk memastikan ID
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
