<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login - SweetLime</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" href="{{ asset('admin/img/testimonial-1.jpg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/img/user.jpg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/img/testimonial-2.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" type="text/js" href="{{ asset('admin/js/main.js') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                    <form class="" action="{{ route('user.login.registration') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Dital Stamp</h3>
                            </a>
                            <h3>Sign Up</h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Name">
                            @error('name')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                            <label for="floatingInput">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="name@example.com">
                            @error('email')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" placeholder="Password">
                            @error('password')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                            <label for="Password">Password</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password">
                            @error('password_confirmation')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                            <label for="Password">Confirm Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}" placeholder="Address">
                            @error('address')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                            <label for="floatingInput">Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" name="image" id="image" placeholder="image">
                            @error('image')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                            <label for="floatingInput">Upload Image</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="phone_no" id="phone_no" value="{{ old('phone_no') }}" placeholder="Phone No">
                            @error('phone_no')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                            <label for="floatingInput">Phone No</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="pincode" id="pincode" value="{{ old('pincode') }}" placeholder="Pincode">
                            @error('pincode')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                            <label for="floatingInput">Pincode</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="city" id="city" value="{{ old('city') }}" placeholder="City">
                            @error('city')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                            <label for="floatingInput">City</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="state" id="state" value="{{ old('state') }}" placeholder="State">
                            @error('state')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                            <label for="floatingInput">State</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="country" id="country" value="{{ old('country') }}" placeholder="Country">
                            @error('country')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                            <label for="floatingInput">Country</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="hidden" name="status" value="1">
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        <p class="text-center mb-0">Don't have an Account? <a href="">Sign Up</a></p>
                    </div>
                </form>

                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>