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
                
            </div>
        </div>
    </div>
</div>
@endsection
