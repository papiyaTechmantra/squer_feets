@extends('admin.layout.app')
@section('content')


<h1 style="color: black">Locality</h1>

<div class="bg-light rounded h-100 p-5">

<div>Title : {{ $Locality_list->name }}</div>
<div><img src="{{ asset(isset($Locality_list->image) ? $Locality_list->image: "") }}" alt="{{ $Locality_list->image }}" style="width: 100px;"></div>
<div>Location Lat Address : {{ $Locality_list->location_lat }}</div>
<div>Location Lng Address : {{ $Locality_list->location_lng }}</div>


</div>


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