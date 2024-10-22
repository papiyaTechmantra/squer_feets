@extends('admin.layout.app')



@section('content')

<style>
    .fa-square-plus{
        font-size: 22px;
        color: #048520;
        cursor: pointer;
    }
    .table-flex {
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }
    .table-flex button {
        margin-left: 6px;
        border: none;
        margin-top: 3px;
    }
</style>
<h1 style="color: black">Property</h1>

<div class="bg-light rounded h-100 p-5">
    
    <div class="accordion" id="accordionExample">
        
      
           
        
       
      </div>

    <div class="row align-items-center justify-content-between">
        <div class="col-12 col-md-8">


            <a href="{{ route('admin.property.add') }}"><button type="button"
                    class="btn btn-primary rounded-pill">Add Property</button></a>
        </div>

        <div class="col-12 col-md-4">
            <div class="search text-end">
                
                <form action="{{ route('admin.property') }}">
                    <a type="button" href="{{ route('admin.property') }}">
                        <i class="fa fa-times"></i>
                    </a>
                    <input type="text" name="term" id="term" placeholder="searching....">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="table-sec mt-4">
    <h6 class="mb-4">Property Table</h6>
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Sr No.</th>
                <th scope="col">Title</th>
                <th scope="col">Discription</th>
                <th scope="col">Property Area</th>
                <th scope="col">Location</th>
                <th scope="col">Property Type</th>
                <th scope="col">Property Status</th>
                <th scope="col">Configurations</th>
                <th scope="col">Ameniti Id</th>
                <th scope="col">Added By</th>
                <th scope="col">Status</th>
                <th scope="col">Created At</th>
                @if (Auth::user()->id == 1)
                <th scope="col">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($Property_list as $key => $Property)
            <tr>
                <td scope="row">
                    <div class="table-flex">
                        {{ $key+1 }} 
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#demo{{ $Property->id }}"><i class="fa-solid fa-square-plus"></i></button>
                    </div>
                </td>
                <td>{{ $Property->title }}</td>
                <td>{{ isset($Property->discriprion) ? substr($Property->discriprion,0, 50) : "-- Not Available --" }}</td>
                <td>{{ $Property->property_Area }}</td>
                <td>{{ $Property->location }}</td>
                <td>{{ $Property->property_Type }}</td>
                <td>{{ $Property->property_Status }}</td>
                <td>{{ $Property->Configurations }}</td>
                <td>{{ $Property->added_by }}</td>
                <td>
                    @php
                        $amenityId = explode(",", $Property->ameniti_id);
                        foreach ($amenityId as $key => $amenityData) {
                            $Amenity = App\Models\Amenity::where('id', $amenityData)->first();
                            @endphp
                            {{ $Amenity->name }},

                            @php  }
                    @endphp
                </td>
                <td>{{ $Property->status == 1 ? 'Active' : 'In-active' }}</td>
                <td>{{ $Property->created_at }}</td>
                @if (Auth::user()->id == 1)
                <td>
                    <div class="btn-group" role="group" aria-label="Second group">
                        <a href="{{ route('admin.property.edit', $Property['id']) }}"
                            class="btn btn-sm btn-primary edit-btn"><i
                                class="fa fa-edit"></i></a>

                        <a href="{{ route('admin.property.show', $Property['id']) }}"
                            class="btn btn-sm btn-primary show-btn"><i
                                class="fa fa-eye"></i></a>

                        <a href="{{ route('admin.property.image', $Property['id']) }}"
                            class="btn btn-sm btn-primary show-btn"><i 
                                class="fa fa-file-image"></i></a>
                        
                        <a href="{{ route('admin.property.variation', $Property['id']) }}"
                            class="btn btn-sm btn-primary show-btn"><i 
                                class="fa fa-sitemap"></i></a>
                        
                        <a href="{{ route('admin.property.delete', $Property['id']) }}"
                            class="sa-remove btn btn-sm btn-danger edit-btn" onclick="return confirm('Are you sure to delete?')"><i
                                class="fa fa-trash"></i></a>
                    </div>
                </td>
                @endif
            </tr>
            <tr>
                <td colspan="12">
                    <div id="demo{{ $Property->id }}" class="collapse">

                        <a href="{{ route('admin.property.variation.add',$Property->id) }}"><button type="button"
                            class="btn btn-primary rounded-pill">Add Property Variation</button></a>

                        <table class="table table-striped">
                            <thead>
                                <th scope="col">Sr No.</th>
                                <th scope="col">Property Name</th>
                                <th scope="col">Property Type</th>
                                <th scope="col">Build Up Area</th>
                                <th scope="col">Selling Price</th>
                                <th scope="col">Booking Amt</th>
                                <th scope="col">Created At</th>
                                @if (Auth::user()->id == 1)
                                <th scope="col">Action</th>
                                @endif
                            </thead>

                            <tbody>
                                @foreach ($Property->PropertyVariation as $key => $Variation)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $Variation->Property->title }}</td>
                                        <td>{{ $Variation->property_type }}</td>
                                        <td>{{ $Variation->build_up_area }}</td>
                                        <td>{{ $Variation->selling_price }}</td>
                                        <td>{{ $Variation->booking_amt }}</td>
                                        <td>{{ $Variation->created_at }}</td>
                                        @if (Auth::user()->id == 1)
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Second group">
                                                
                                                <a href="{{ route('admin.property.variation.delete', $Variation['id']) }}"
                                                    class="sa-remove btn btn-sm btn-danger edit-btn" onclick="return confirm('Are you sure to delete?')"><i
                                                        class="fa fa-trash"></i></a>
                                                <a href="{{ route('admin.property.variation.edit', $Variation['id']) }}"
                                                    class="btn btn-sm btn-primary edit-btn"><i
                                                        class="fa fa-edit"></i></a>
                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            {{-- <tr>
                <td colspan="12">
                    <div class="accordian-body collapse" id="demo{{ $key+1 }}">
                        <table class="table table-striped">
                            <thead>
                                <th scope="col">Sr No.</th>
                                <th scope="col">Property Id</th>
                                <th scope="col">Property Type</th>
                                <th scope="col">Build Up Area</th>
                                <th scope="col">Selling Price</th>
                                <th scope="col">Booking Amt</th>
                                <th scope="col">Created At</th>
                                @if (Auth::user()->id == 1)
                                <th scope="col">Action</th>
                                @endif
                            </thead>

                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </td>
                
            </tr>
            @foreach ($Property->PropertyVariation as $key => $Variation)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $Variation->Property->title }}</td>
                <td>{{ $Variation->property_type }}</td>
                <td>{{ $Variation->build_up_area }}</td>
                <td>{{ $Variation->selling_price }}</td>
                <td>{{ $Variation->booking_amt }}</td>
                <td>{{ $Variation->created_at }}</td>
                @if (Auth::user()->id == 1)
                <td>
                    <div class="btn-group" role="group" aria-label="Second group">
                        
                        <a href="{{ route('admin.property.variation.delete', $Variation['id']) }}"
                            class="sa-remove btn btn-sm btn-danger edit-btn" onclick="return confirm('Are you sure to delete?')"><i
                                class="fa fa-trash"></i></a>
                        <a href="{{ route('admin.property.variation.edit', $Variation['id']) }}"
                            class="btn btn-sm btn-primary edit-btn"><i
                                class="fa fa-edit"></i></a>
                    </div>
                </td>
                @endif
            </tr>
            @endforeach --}}
            {{-- {{  }} --}}
            @endforeach

        </tbody>
    </table>
</div>
</div>
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