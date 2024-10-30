@extends('admin.layout.app')
@section('content')

<h1 style="color: black">Add Property</h1>

<div>
    <form action="{{ route('admin.property.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <select class="form-select form-select-lg mb-3" name="category" id="category" aria-label=".form-select-lg example">
            <option value="" selected>Select Category</option>
            <option value="villas">Villas</option>
            <option value="deplux">Deplux</option>
            <option value="apartments">Apartments</option>
        </select>
        @error('category')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
        @error('title')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <div>
        <select class="form-select form-select-lg mb-3" name="property_group_id" id="property_group_id" aria-label=".form-select-lg example">
            <option value="" selected>Select Property Group</option>
            @foreach($property_groups as $propertyGroup)
            <<option value="{{ $propertyGroup->id }}">{{ $propertyGroup->name }}</option>
            @endforeach
        </select>
        @error('property_group_id')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        </div>
        <textarea class="form-control" name="discriprion" id="discriprion" placeholder="Discription" cols="30" rows="10"></textarea>
        @error('discriprion')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="property_Area" id="property_Area" placeholder="Property Area" value="{{ old('property_Area') }}">
        @error('property_Area')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <select class="form-select form-select-lg mb-3" name="location" id="location" aria-label=".form-select-lg example">
            <option value="" selected>Select Location</option>
            @foreach ($Locality_list as $Locality)
                <option value="{{ $Locality->name }}">{{ $Locality->name }}</option>
            @endforeach
        </select>
        @error('location')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="property_Type" id="property_Type" placeholder="Property Type" value="{{ old('property_Type') }}">
        @error('property_Type')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="property_Status" id="property_Status" placeholder="Property Status" value="{{ old('property_Status') }}">
        @error('property_Status')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="Configurations" id="Configurations" placeholder="Configurations" value="{{ old('Configurations') }}">
        @error('Configurations')
            <p class="small text-danger">{{ $message }}</p>
        @enderror

        <label for="floor_plan_image">Upload Property image</label>
        <input type="file" class="form-control" name="image" id="image">
        @error('image')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        


        <label for="brochure">Upload Brochure</label>
        <input type="file" class="form-control" name="brochure" id="brochure">
        @error('brochure')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        
        <label class="form-check-label" for="flexCheckDefault">
            Select Amenities
        </label>
        @foreach ($Amenity_list as $Amenity)
        <input class="form-check-input" type="checkbox" value="{{ $Amenity->id }}" name="ameniti_id[]" id="ameniti_id">
        <label class="form-check-label" for="flexCheckDefault">
            <img src="{{ Asset($Amenity->image) }}" style="width: 30px;" alt="">{{ $Amenity->name }}
        </label>
        @endforeach
        <div>
        <label class="form-check-label" for="flexCheckDefault">
            Select Parking Type
        </label>
        @foreach ($parking_list as $parking)
        <input class="form-check-input" type="checkbox" value="{{ $parking->id }}" name="parking_id[]" id="parking_id">
        {{ $parking->name }}
        @endforeach
        </div>

        <div>
        <label class="form-check-label" for="flexCheckDefault">
            Select Flat Size Type
        </label>
        @foreach ($flat_size_list as $flatsize)
        <input class="form-check-input" type="checkbox" value="{{ $flatsize->id }}" name="flat_size_id[]" id="flat_size_id">
        {{ $flatsize->name }}
        @endforeach
        </div>

        <input type="text" class="form-control" name="added_by" id="added_by" placeholder="Add By" value="{{ old('added_by') }}">
        @error('added_by')
            <p class="small text-danger">{{ $message }}</p>
        @enderror

        <div>
            <input class="form-check-input" type="checkbox" value="1" name="new_arrival" id="new_arrival">
            <label class="form-check-label" for="flexCheckDefault">
                New Arrival
            </label>
            <input class="form-check-input" type="checkbox" value="1" name="most_popular" id="most_popular">
            <label class="form-check-label" for="flexCheckDefault">
                Most Popular
            </label>
            <input class="form-check-input" type="checkbox" value="1" name="recent_venue" id="recent_venue">
            <label class="form-check-label" for="flexCheckDefault">
                Recent Venue
            </label>
            <input class="form-check-input" type="checkbox" value="1" name="upcoming_property" id="upcoming_property">
            <label class="form-check-label" for="flexCheckDefault">
                Upcoming Property
            </label>
        </div>

        <select class="form-select form-select-lg mb-3" name="status" id="status" aria-label=".form-select-lg example">
            <option value="" selected>Select Status</option>
            <option value="1">Active</option>
            <option value="0">In-Active</option>
        </select>
        @error('status')
            <p class="small text-danger">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-primary rounded-pill m-2">Submit</button>

    </form>
</div>

@endsection

@push('scripts')

<!-- JavaScript Libraries -->
<script>
    CKEDITOR.replace('discriprion');
    // ClassicEditor
    //         .create( document.querySelector( '#banners_discription' ) )
    //         .then( editor => {
    //                 console.log( editor );
    //         } )
    //         .catch( error => {
    //                 console.error( error );
    //         } );
</script>
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