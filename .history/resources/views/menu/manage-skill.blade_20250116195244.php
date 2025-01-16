@extends('MainPage')
@section('title', 'Manage Skill')
@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">List All Skill's</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center">Preview Resume</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
            {{-- tambahkan disini konten formnya  --}}

        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-3">
            {{ $users->links('pagination::bootstrap-4') }}
        </div>

    </div>
  </div>
</div>

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

