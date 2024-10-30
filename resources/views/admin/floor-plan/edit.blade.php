@extends('admin.layout.app')
@section('content')

<h1 style="color: black">Update Amenity</h1>

<div>
    <form action="{{ route('admin.floorplan.update') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $floorPlan->id }}">

        <div>
            <label for="property_id">Select Floor Plan</label>
            <select class="form-select form-select-lg mb-3" name="property_id" id="property_id" aria-label=".form-select-lg example">
                <option value="" disabled>Select Floor Plan</option>
                @foreach($properties as $property)
                    <option value="{{ $property->id }}" {{ $property->id == $floorPlan->property_id ? 'selected' : '' }}>
                        {{ $property->title }}
                    </option>
                @endforeach
            </select>
            @error('property_id')
                <p class="small text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="builtup_area">Built-up Area</label>
            <input type="text" class="form-control" name="builtup_area" id="builtup_area" value="{{ old('builtup_area', $floorPlan->builtup_area) }}">
            @error('builtup_area')
                <p class="small text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="base_selling_price">Base Selling Price</label>
            <input type="text" class="form-control" name="base_selling_price" id="base_selling_price" value="{{ old('base_selling_price', $floorPlan->base_selling_price) }}">
            @error('base_selling_price')
                <p class="small text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="image">Upload Floor Plan Images</label>
            <img src="{{ asset($floorPlan->image) }}" alt="" style="width: 100px;">
            <input type="file" class="form-control" name="image" id="image">
            @error('image.*')
                <p class="small text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="status">Status</label>
            <select class="form-select form-select-lg mb-3" name="status" id="status" aria-label=".form-select-lg example">
                <option value="" disabled>Select Status</option>
                <option value="1" {{ $floorPlan->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $floorPlan->status == 0 ? 'selected' : '' }}>In-Active</option>
            </select>
            @error('status')
                <p class="small text-danger">{{ $message }}</p>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary rounded-pill m-2">Submit</button>

    </form>
</div>

@endsection

@push('scripts')

<!-- JavaScript Libraries -->
<script>
    CKEDITOR.replace('banners_discription');
    // ClassicEditor
    //         .create( document.querySelector( '#projects_discription' ) )
    //         .then( editor => {
    //                 console.log( editor );
    //         } )
    //         .catch( error => {
    //                 console.error( error );
    //         } );
</script>
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