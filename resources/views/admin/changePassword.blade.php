@extends('admin.layout.app')
@section('content')

<h1 style="color: black">Change Password</h1>

<div>
    <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="text" class="form-control" name="current_password" id="current_password" placeholder="Enter Current Password" value="{{ old('current_password') }}">
        @error('current_password')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password" value="{{ old('new_password') }}">
        @error('new_password')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="confirm_password" id="confirm_password" placeholder="Re-Enter New Password" value="{{ old('confirm_password') }}">
        @error('confirm_password')
            <p class="small text-danger">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-primary rounded-pill m-2">Submit</button>

    </form>
</div>

@endsection

@push('scripts')

<!-- JavaScript Libraries -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.0.1/ckeditor.js"></script>
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

@endpush