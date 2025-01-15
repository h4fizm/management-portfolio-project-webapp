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
                        <th scope="col">Preview Resume</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->upload_resume)
                            <a href="{{ asset('storage/resumes/' . $user->upload_resume) }}" target="_blank" class="btn btn-sm btn-primary">Preview Resume</a>
                            @else
                            <span class="text-muted">No Resume Uploaded</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('profile.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-warning me-2">Edit</a>

                            <!-- Tombol Delete dengan konfirmasi SweetAlert -->
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $user->id }})">Delete</button>
                            
                            <!-- Form untuk Delete (tersembunyi) -->
                            <form id="delete-form-{{ $user->id }}" action="{{ route('profile.delete', ['id' => $user->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-3">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
  </div>
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Fungsi untuk konfirmasi penghapusan
    function confirmDelete(userId) {
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
                // Menyubmit form penghapusan pengguna yang sesuai dengan ID
                document.getElementById('delete-form-' + userId).submit();
            }
        });
    }
</script>
@endsection

@endsection
