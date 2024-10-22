@extends('admin.layout.app')
@section('content')

<h1 style="color: black"><u>News Details</u></h1>

<div class="col-12 col-md-4">
    <img src="{{ asset($News_list->image) }}" style="width: 500px;" alt="">
    <div>Tile: <b>{{ $News_list->title }}</b></div>
    <div>Sub Tile: <b>{{ $News_list->sub_title }}</b></div>
    <div>Discription: {{ $News_list->discription }}</div>
    <div>Status: {{ $News_list->status == 1 ? 'Active' : 'In-active' }}</div>
    <div>Image: {{ $News_list->image }}</div>
</div>


<a href="{{ route('admin.news') }}"><button type="button"
    class="btn btn-primary rounded-pill">Back</button></a>

@endsection

@push('scripts')

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

@endpush