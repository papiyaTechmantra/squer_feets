@extends('admin.layout.app')
@section('content')

<h1 style="color: black">Update Property</h1>

<div>
    <form action="{{ route('admin.property.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $Property_list->id }}">

        <select class="form-select form-select-lg mb-3" name="category" id="category" aria-label=".form-select-lg example">
            <option value="" selected>Select Category</option>
            <option value="villas" {{ $Property_list->category == "villas" ? 'selected' : '' }}>Villas</option>
            <option value="deplux" {{ $Property_list->category == "deplux" ? 'selected' : '' }}>Deplux</option>
            <option value="apartments" {{ $Property_list->category == "apartments" ? 'selected' : '' }}>Apartments</option>
        </select>
        @error('category')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ $Property_list->title }}">
        @error('title')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <select class="form-select form-select-lg mb-3" name="property_group_id" id="property_group_id" aria-label=".form-select-lg example">
            <option value="" selected>Select Property Group</option>
            @foreach($property_groups as $propertyGroup)
                <option value="{{ $propertyGroup->id }}" 
                    {{ $propertyGroup->id == $Property_list->property_group_id ? 'selected' : '' }}>
                    {{ $propertyGroup->name }}
                </option>
            @endforeach
        </select>
        @error('property_group_id')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <textarea class="form-control" name="discriprion" id="discriprion" placeholder="Discription" cols="30" rows="10">{{ $Property_list->discriprion }}</textarea>
        @error('discriprion')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="property_Area" id="property_Area" placeholder="Property Area" value="{{ $Property_list->property_Area }}">
        @error('property_Area')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <select class="form-select form-select-lg mb-3" name="location" id="location" aria-label=".form-select-lg example">
            <option value="" selected>Select Location</option>
            @foreach ($Locality_list as $Locality)
                <option value="{{ $Locality->name }}" {{ $Property_list->location === $Locality->name ? 'selected' : '' }} >{{ $Locality->name }}</option>
            @endforeach
        </select>
        @error('location')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="property_Type" id="property_Type" placeholder="Property Type" value="{{ $Property_list->property_Type }}">
        @error('property_Type')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="property_Status" id="property_Status" placeholder="Property Status" value="{{ $Property_list->property_Status }}">
        @error('property_Status')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="Configurations" id="Configurations" placeholder="Configurations" value="{{ $Property_list->Configurations }}">
        @error('Configurations')
            <p class="small text-danger">{{ $message }}</p>
        @enderror

        <label for="floor_plan_image">Upload Property image</label>
        <img src="{{ asset($Property_list->image) }}" alt="" style="width: 100px;">
        <input type="file" class="form-control" name="image" id="image">
        @error('image')
            <p class="small text-danger">{{ $message }}</p>
        @enderror

        <label for="brochure">Upload Property Brochure (PDF)</label>
            <a href="{{ asset($Property_list->brochure) }}" target="_blank">View Brochure</a>
        <input type="file" class="form-control" name="brochure" id="brochure" accept="application/pdf">
        @error('brochure')
            <p class="small text-danger">{{ $message }}</p>
        @enderror


        
       

        <input type="text" class="form-control" name="added_by" id="added_by" placeholder="Add By" value="{{$Property_list->added_by }}">
        @error('added_by')
            <p class="small text-danger">{{ $message }}</p>
        @enderror

        <label class="form-check-label" for="flexCheckDefault">
            Select Amenities
        </label>
        @php
        $amenityId = explode(",", $Property_list->ameniti_id);
        // dd($amenityId);
        @endphp
        @foreach ($Amenity_list as $Amenity)
        <input class="form-check-input" {{ in_array($Amenity->id,$amenityId) ? 'checked' : '' }} type="checkbox" value="{{ $Amenity->id }}" name="ameniti_id[]" id="ameniti_id">
        <label class="form-check-label" for="flexCheckDefault">
            {{ $Amenity->name }}
        </label>
        @endforeach

        @error('ameniti_id')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <div>
        <label class="form-check-label" for="flexCheckDefault">
            Select Parking
        </label>
        @php
        $parkingId = explode(",", $Property_list->parking_id);
        // dd($amenityId);
        @endphp
        @foreach ($parking_list as $parking)
        <input class="form-check-input" {{ in_array($parking->id,$parkingId) ? 'checked' : '' }} type="checkbox" value="{{ $parking->id }}" name="parking_id[]" id="parking_id">
        <label class="form-check-label" for="flexCheckDefault">
            {{ $parking->name }}
        </label>
        @endforeach

        @error('parking_id')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        </div>

        <div>
        <label class="form-check-label" for="flexCheckDefault">
            Select Flat Size
        </label>

        @foreach ($flat_size_list as $flatsize)
            <input class="form-check-input" 
                {{ in_array($flatsize->id, $selected_flat_size_ids) ? 'checked' : '' }} 
                type="checkbox" 
                value="{{ $flatsize->id }}" 
                name="flat_size_id[]" 
                id="flat_size_id_{{ $flatsize->id }}">

            <label class="form-check-label" for="flat_size_id_{{ $flatsize->id }}">
                {{ $flatsize->name }}
            </label>
        @endforeach

        @error('flat_size_id')
            <p class="small text-danger">{{ $message }}</p>
        @enderror

        </div>
    </br>

        <label class="form-check-label" for="flexCheckDefault">
            Select Filter
        </label>
        <div>
            <input {{ $Property_list->new_arrival == 1 ? 'checked' : '' }} class="form-check-input" type="checkbox" value="1" name="new_arrival" id="new_arrival">
            <label class="form-check-label" for="flexCheckDefault">
                New Arrival
            </label>
            <input {{ $Property_list->most_popular == 1 ? 'checked' : '' }} class="form-check-input" type="checkbox" value="1" name="most_popular" id="most_popular">
            <label class="form-check-label" for="flexCheckDefault">
                Most Popular
            </label>
            <input {{ $Property_list->recent_venue == 1 ? 'checked' : '' }} class="form-check-input" type="checkbox" value="1" name="recent_venue" id="recent_venue">
            <label class="form-check-label" for="flexCheckDefault">
                Recent Venue
            </label>
            <input {{ $Property_list->upcoming_property == 1 ? 'checked' : '' }} class="form-check-input" type="checkbox" value="1" name="upcoming_property" id="upcoming_property">
            <label class="form-check-label" for="flexCheckDefault">
                Upcoming Property
            </label>
        </div>

        <select class="form-select form-select-lg mb-3" name="status" id="status" aria-label=".form-select-lg example">
            <option value="" selected>Select Status</option>
            <option value="1" {{ $Property_list->status == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ $Property_list->status == 0 ? 'selected' : '' }}>In-Active</option>
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