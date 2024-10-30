@extends('admin.layout.app')
@section('content')


<h1 style="color: black">Property Details</h1>

<div class="bg-light rounded h-100 p-5">

<div>Title : {{ $Property_list->title }}</div>
<div>Property Group   : {{ $Property_list->propertygroup?$Property_list->propertygroup->name:"NA"  }}</div>
<div>Discription : {!! isset($Property_list->discriprion) ? substr($Property_list->discriprion,0, 50) : "-- Not Available --" !!}</div>
<div>property Area : {{ $Property_list->property_Area }}</div>
<div>Property Type : {{ $Property_list->property_Type }}</div>
<div>Property Status : {{ $Property_list->property_Status }}</div>
<div>Configurations : {{ $Property_list->Configurations }}</div>
<div>
    Amenities : 
    @php
        $amenityId = explode(",", $Property_list->ameniti_id);
        $totalAmenities = count($amenityId); // Get the total number of amenities
    @endphp

    @foreach ($amenityId as $key => $amenityData)
        @php
            $Amenity = App\Models\Amenity::where('id', $amenityData)->first();
        @endphp

        {{ $Amenity->name }}@if($key != $totalAmenities - 1), @endif
    @endforeach
</div>

<div>
    Parking : 
    @php
        $parkingId = explode(",", $Property_list->parking_id);
        $totalParking = count($parkingId); // Get the total number of items
    @endphp

    @foreach ($parkingId as $key => $parkingData)
        @php
            $parking = App\Models\Parking::where('id', $parkingData)->first();
        @endphp

        {{ $parking->name }}@if($key != $totalParking - 1), @endif
    @endforeach
</div>

<div>Added by : {{ $Property_list->added_by }}</div>
<div>Status : {{ $Property_list->status == 1 ? 'Active' : 'In-active' }}</div>


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