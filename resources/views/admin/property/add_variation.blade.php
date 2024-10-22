@extends('admin.layout.app')
@section('content')

<h1 style="color: black">Add Property variation</h1>

<div>
    <form action="{{ route('admin.property.variation.store') }}" method="post">
        @csrf
            
        @if (isset($Property_list->id))
            <input type="hidden" name="variation_id" value="{{ $Property_list->id }}">
        @else
            <input type="hidden" name="id" value="{{ $id }}">
        @endif
        <input type="text" class="form-control" name="property_type" id="property_type" placeholder="Property Type" value="{{ isset($Property_list->property_type) ? $Property_list->property_type : old('property_type') }}">
        @error('property_type')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="build_up_area" id="build_up_area" placeholder="Build Up Area" value="{{ isset($Property_list->build_up_area) ? $Property_list->build_up_area : old('build_up_area') }}">
        @error('build_up_area')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="selling_price" id="selling_price" placeholder="Selling Price" value="{{ isset($Property_list->selling_price) ? $Property_list->selling_price : old('selling_price') }}">
        @error('selling_price')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="booking_amt" id="booking_amt" placeholder="Booking Amt" value="{{ isset($Property_list->booking_amt) ? $Property_list->booking_amt : old('booking_amt') }}">
        @error('booking_amt')
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