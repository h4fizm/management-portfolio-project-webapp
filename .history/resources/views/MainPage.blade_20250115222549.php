<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('DashPage/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('DashPage/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('DashPage/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('DashPage/css/style.css')}}" rel="stylesheet">
    
    <!-- Dropzone CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" rel="stylesheet">

</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        @include('partials.sidebar')
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('partials.header')
            <!-- Navbar End -->

            <!-- Main Content -->
            @yield('content')
            <!-- End Main Content -->

            <!-- Footer Start -->
            @include('partials.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        {{-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> --}}
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('DashPage/lib/chart/chart.min.js')}}"></script>
    <script src="{{ asset('DashPage/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('DashPage/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('DashPage/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('DashPage/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{ asset('DashPage/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{ asset('DashPage/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('DashPage/js/main.js')}}"></script>

    <!-- Dropzone JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script>
        // Inisialisasi Dropzone setelah halaman selesai dimuat
        $(document).ready(function() {
            Dropzone.options.resumeDropzone = {
                paramName: "resume", // Nama parameter yang digunakan pada form (harus sesuai dengan yang ada di controller)
                maxFilesize: 2, // Max file size dalam MB
                acceptedFiles: ".pdf,.doc,.docx", // Format yang diterima
                init: function () {
                    this.on("success", function (file, response) {
                        // Menangani respon setelah file berhasil di-upload
                        alert("Resume uploaded successfully!");
                    });
                    this.on("error", function (file, errorMessage) {
                        // Menangani error jika file gagal di-upload
                        alert("Error uploading resume. Please try again.");
                    });
                }
            };
        });
    </script>
</body>

</html>
