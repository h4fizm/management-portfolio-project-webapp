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
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data Contoh 1 -->
                    <tr>
                        <th scope="row">1</th>
                        <td>John Doe</td>
                        <td>john.doe@email.com</td>
                        <td>
                            <button class="btn btn-sm btn-warning me-2">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <!-- Data Contoh 2 -->
                    <tr>
                        <th scope="row">2</th>
                        <td>Jane Smith</td>
                        <td>jane.smith@email.com</td>
                        <td>
                            <button class="btn btn-sm btn-warning me-2">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <!-- Data Contoh 3 -->
                    <tr>
                        <th scope="row">3</th>
                        <td>Robert Brown</td>
                        <td>robert.brown@email.com</td>
                        <td>
                            <button class="btn btn-sm btn-warning me-2">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
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
