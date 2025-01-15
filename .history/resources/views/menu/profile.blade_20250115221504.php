@extends('MainPage')
@section('title', 'User Profile')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <!-- Bagian Kiri: Foto dan Nama -->
        <div class="col-lg-6">
            <div class="bg-light rounded h-100 p-4 text-center">
                <h3 class="mb-4">User Profile</h3>
                <div class="testimonial-item">
                    <img class="img-fluid rounded-circle mx-auto mb-4" 
                         src="{{ asset('DashPage/img/user.jpg') }}" 
                         style="width: 150px; height: 150px;">
                    <h5 class="mb-1">{{ $user->name }}</h5>
                    <p class="mb-0">{{ $user->email }}</p>
                </div>
            </div>
        </div>

        <!-- Bagian Kanan: Formulir -->
        <div class="col-lg-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Basic Form</h6>
                <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <!-- Input Nama -->
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Edit Profile Name</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" value="{{ $user->name }}" required>
                    </div>
                    
                    <!-- Input Email -->
                    <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">Edit Email Address</label>
                        <input type="email" class="form-control" id="exampleInputEmail" name="email" value="{{ $user->email }}" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    
                    <!-- Input Password -->
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Edit Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        <div id="passwordHelp" class="form-text">Leave blank if you don't want to change your password.</div>
                    </div>

                    <!-- Input Password Confirmation -->
                    <div class="mb-3">
                        <label for="exampleInputPasswordConfirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPasswordConfirmation" name="password_confirmation">
                    </div>
                    
                    <!-- File Upload with Dropzone -->
                    <div class="mb-3">
                        <label for="formFileResume" class="form-label">Upload Your Resume</label>
                        <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" class="dropzone" id="resumeDropzone" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="fallback">
                                <input name="resume" type="file" accept=".pdf,.doc,.docx" />
                            </div>
                        </form>
                        <div id="fileHelp" class="form-text">Allowed formats: PDF, DOC, DOCX.</div>
                    </div>

                    <!-- Tombol Submit di Pojok Kanan Bawah -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-warning">Edit Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Dropzone JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

<script>
    // Dropzone configuration
    Dropzone.options.resumeDropzone = {
        maxFilesize: 2, // Maximum file size in MB
        acceptedFiles: '.pdf,.doc,.docx', // Allowed file formats
        maxFiles: 1, // Limit to one file
        dictDefaultMessage: "Drag and drop your resume here or click to select",
        success: function(file, response) {
            // You can handle file upload success here, like showing a message
            console.log('File uploaded successfully', response);
        },
        error: function(file, errorMessage) {
            // Handle errors if file doesn't meet the criteria
            console.log('Error:', errorMessage);
        }
    };
</script>
@endsection
