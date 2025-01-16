@extends('MainPage')
@section('title', 'Manage Skill')
@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">List All Skills</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Skill Name</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Contoh data tabel --}}
                    <tr>
                        <td>1</td>
                        <td>Web Development</td>
                        <td class="text-center">
                            <button class="btn btn-primary btn-sm" onclick="editSkill(1)">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete(1)">Delete</button>
                            <form id="delete-form-1" action="{{ route('skills.destroy', 1) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Graphic Design</td>
                        <td class="text-center">
                            <button class="btn btn-primary btn-sm" onclick="editSkill(2)">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete(2)">Delete</button>
                            <form id="delete-form-2" action="{{ route('skills.destroy', 2) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Data Analysis</td>
                        <td class="text-center">
                            <button class="btn btn-primary btn-sm" onclick="editSkill(3)">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete(3)">Delete</button>
                            <form id="delete-form-3" action="{{ route('skills.destroy', 3) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-3">
            {{ $skills->links('pagination::bootstrap-4') }}
        </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Fungsi untuk konfirmasi penghapusan
    function confirmDelete(skillId) {
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
                // Menyubmit form penghapusan skill yang sesuai dengan ID
                document.getElementById('delete-form-' + skillId).submit();
            }
        });
    }

    // Fungsi untuk edit skill (contoh)
    function editSkill(skillId) {
        window.location.href = `/skills/${skillId}/edit`;
    }
</script>
@endsection
