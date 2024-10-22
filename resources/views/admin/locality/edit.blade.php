@extends('admin.layout.app')
@section('content')

<h1 style="color: black">Update Banner</h1>

<div>
    <form action="{{ route('admin.locality.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $Locality_list->id }}">

        <input type="text" class="form-control" name="locality_title" id="locality_title" placeholder="Locality Title" value="{{ $Locality_list->name }}">
        @error('locality_title')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="locality_lat" id="locality_lat" placeholder="Locality Lat Address" value="{{ $Locality_list->location_lat }}">
        @error('locality_lat')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="locality_lng" id="locality_lng" placeholder="Locality Lng Address" value="{{ $Locality_list->location_lng }}">
        @error('locality_lng')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <img src="{{ asset(isset($Locality_list->image) ? $Locality_list->image: "") }}" alt="{{ $Locality_list->image }}" style="width: 100px;">
        <input type="file" class="form-control" name="image" id="image">
        @error('image')
            <p class="small text-danger">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-primary rounded-pill m-2">Submit</button>

    </form>
</div>

@endsection

@push('scripts')
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