@extends('admin.layout.app')
@section('content')

<h1 style="color: black">Add Product Images</h1>

<div>
    <form action="{{ route('admin.property.image.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">

        <input type="file" class="form-control" name="image" id="image" required>
        @error('image')
            <p class="small text-danger">{{ $message }}</p>
        @enderror

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


<div class="table-sec mt-4">
    <h6 class="mb-4">Property Table</h6>
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Sr No.</th>
                <th scope="col">Image</th>
                <th scope="col">Property Name</th>
                <th scope="col">Status</th>
                <th scope="col">Created At</th>
                @if (Auth::user()->id == 1)
                <th scope="col">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>

            @foreach ($ProductImage as $key => $Images)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td><img src="{{ asset($Images->images) }}" style="width: 100px;" alt=""></td>
                <td>{{ $Images->Property->title }}</td>
                <td>{{ $Images->status == 1 ? 'Active' : 'In-active' }}</td>
                <td>{{ $Images->created_at }}</td>
                @if (Auth::user()->id == 1)
                <td>
                    <div class="btn-group" role="group" aria-label="Second group">
                        
                        <a href="{{ route('admin.property.image.delete', $Images['id']) }}"
                            class="sa-remove btn btn-sm btn-danger edit-btn" onclick="return confirm('Are you sure to delete?')"><i
                                class="fa fa-trash"></i></a>
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