@extends('admin.layout.app')
@section('content')

<h1 style="color: black">Add Review</h1>

<div>
    <form action="{{ route('admin.review.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="text" class="form-control" name="name" id="name" placeholder="Locality Title" value="{{ old('name') }}">
        @error('name')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="message" id="message" placeholder="Locality Lat Address" value="{{ old('message') }}">
        @error('message')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="file" class="form-control" name="image" id="locality_lng" placeholder="Locality Lng Address" value="{{ old('locality_lng') }}">
        @error('locality_lng')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <select class="form-select form-select-lg mb-3" name="status" id="status" aria-label=".form-select-lg example">
            <option value="" selected>Select Status</option>
            <option value="1">Active</option>
            <option value="0">In-Active</option>
        </select>
        @error('status')
            <p class="small text-danger">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-primary rounded-pill m-2">Submit</button>

    </form>
</div>

@endsection

@push('scripts')
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