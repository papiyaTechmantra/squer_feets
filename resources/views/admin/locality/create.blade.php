@extends('admin.layout.app')
@section('content')

<h1 style="color: black">Add Locality</h1>

<div>
    <form action="{{ route('admin.locality.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="text" class="form-control" name="locality_title" id="locality_title" placeholder="Locality Title" value="{{ old('locality_title') }}">
        @error('locality_title')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="locality_lat" id="locality_lat" placeholder="Locality Lat Address" value="{{ old('locality_lat') }}" aria-describedby="emailHelp">
        @error('locality_lat')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="locality_lng" id="locality_lng" placeholder="Locality Lng Address" value="{{ old('locality_lng') }}" aria-describedby="emailHelp">
        @error('locality_lng')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="file" class="form-control" name="image" id="image">
        @error('image')
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