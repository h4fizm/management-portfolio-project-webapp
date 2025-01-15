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
                            <button class="btn btn-sm btn-danger">Delete</button>
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
@endsection
