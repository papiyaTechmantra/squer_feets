@extends('admin.layout.app')
@section('content')


<h1 style="color: black">Lead</h1>

<div class="bg-light rounded h-100 p-5">

<div>Interested In BHK : {{ $Lead_list->interested_in_bhk }}</div>
<div>Name : {{ $Lead_list->name }}</div>
<div>Phone No : {{ $Lead_list->phone_no }}</div>
<div>Email : {{ $Lead_list->email }}</div>
<div>Message : {{ $Lead_list->message }}</div>
<div>Interested In Loan : {{ $Lead_list->interested_in_loan == 1 ? 'Yes' : 'No' }}</div>
<div>Created At : {{ $Lead_list->created_at }}</div>


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