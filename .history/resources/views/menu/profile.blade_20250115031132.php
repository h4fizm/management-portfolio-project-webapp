@extends('MainPage')
@section('title', 'User Profile')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <!-- Bagian Kiri: Foto dan Nama -->
        <div class="col-lg-6">
            <div class="bg-light rounded h-100 p-4 text-center">
                <h6 class="mb-4">User Profile</h6>
                <div class="testimonial-item">
                    <img class="img-fluid rounded-circle mx-auto mb-4" 
                         src="{{ asset('DashPage/img/testimonial-1.jpg') }}" 
                         style="width: 150px; height: 150px;">
                    <h5 class="mb-1">Name</h5>
                    <p class="mb-0">Aku Manusia Super</p>
                </div>
            </div>
        </div>

        <!-- Bagian Kanan: Formulir -->
        <div class="col-lg-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Basic Form</h6>
                <form>
                    <!-- Input Nama -->
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Enter your name">
                    </div>
                    
                    <!-- Input Email -->
                    <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="exampleInputEmail" name="email" placeholder="Enter your email">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    
                    <!-- Input Password -->
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    
                    <!-- Input File untuk Resume -->
                    <div class="mb-3">
                        <label for="formFileResume" class="form-label">Upload Your Resume</label>
                        <input class="form-control" type="file" id="formFileResume" name="resume" accept=".pdf,.doc,.docx">
                        <div id="fileHelp" class="form-text">Allowed formats: PDF, DOC, DOCX.</div>
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-warning">Edit Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
