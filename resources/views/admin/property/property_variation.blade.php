@extends('admin.layout.app')
@section('content')

<a href="{{ route('admin.property.variation.add',$id) }}"><button type="button"
    class="btn btn-primary rounded-pill">Add Property Variation</button></a>

<div class="table-sec mt-4">
    <h6 class="mb-4">Property Table</h6>
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
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
            </tr>
        </thead>
        <tbody>

            @foreach ($Property_variation as $key => $Images)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $Images->Property->title }}</td>
                <td>{{ $Images->property_type }}</td>
                <td>{{ $Images->build_up_area }}</td>
                <td>{{ $Images->selling_price }}</td>
                <td>{{ $Images->booking_amt }}</td>
                <td>{{ $Images->created_at }}</td>
                @if (Auth::user()->id == 1)
                <td>
                    <div class="btn-group" role="group" aria-label="Second group">
                        
                        <a href="{{ route('admin.property.variation.delete', $Images['id']) }}"
                            class="sa-remove btn btn-sm btn-danger edit-btn" onclick="return confirm('Are you sure to delete?')"><i
                                class="fa fa-trash"></i></a>
                        <a href="{{ route('admin.property.variation.edit', $Images['id']) }}"
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
</div>

@endsection

@push('scripts')

<!-- JavaScript Libraries -->
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