@extends('admin.layout.app')
@section('content')


<h1 style="color: black">Banner</h1>

<div class="bg-light rounded h-100 p-5">

<div>Title : {{ $Banner_list->title }}</div>
<div>Discription : {{ $Banner_list->description }}</div>
<div>Redirect Link : {{ $Banner_list->redirect_link }}</div>
<div>Status : {{ $Banner_list->status == 1 ? 'Active' : 'In-active' }}</div>
<div>Image : <img src="{{ asset($Banner_list->image) }}" alt="" style="width: 100px;"></div>


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