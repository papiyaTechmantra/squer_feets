<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" href="{{ asset('admin/img/testimonial-1.jpg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/img/user.jpg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/img/testimonial-2.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.min.css') }}" />

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/38.0.0/classic/ckeditor.js"></script> --}}
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" type="text/js" href="{{ asset('admin/js/main.js') }}" />
    {{-- <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    @yield('styles')
    @stack('styles')

</head>

<body class="app sidebar-mini rtl">
    
    @include('admin.partials.header')

    @include('admin.partials.sidebar')

    <main class="app-content" id="app">

        @yield('content')

    </main>

    @stack('scripts')
    


</body>
</html>