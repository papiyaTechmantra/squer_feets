@extends('admin.layout.app')
@section('content')


<h1 style="color: black">Floor Plan Details</h1>

<div class="bg-light rounded h-100 p-5">
    <h2>{{ $floor_plan_list->name }}</h2>
    
    <div class="mb-3">
        <strong>Status:</strong>
        <span>{{ $floor_plan_list->status == 1 ? 'Active' : 'In-active' }}</span>
    </div>

    <div class="mb-3">
        <strong>Property ID:</strong>
        <span>{{ $floor_plan_list->property_id }}</span>
    </div>

    <div class="mb-3">
        <strong>Built-up Area:</strong>
        <span>{{ $floor_plan_list->builtup_area }} sq ft</span>
    </div>

    <div class="mb-3">
        <strong>Base Selling Price:</strong>
        <span>${{ number_format($floor_plan_list->base_selling_price, 2) }}</span>
    </div>

    <div class="mb-3">
        <strong>Image:</strong>
        @if($floor_plan_list->image)
            <img src="{{ asset($floor_plan_list->image) }}" alt="Floor Plan Image" class="img-fluid" style="max-width: 100%; height: auto;">
        @else
            <span>No image available</span>
        @endif
    </div>

    <a href="{{ route('admin.floorplan') }}" class="btn btn-secondary">Back to Floor Plans</a>
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