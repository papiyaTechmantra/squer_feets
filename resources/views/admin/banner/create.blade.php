@extends('admin.layout.app')
@section('content')

<h1 style="color: black">Add Banner</h1>

<div>
    <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="text" class="form-control" name="banners_title" id="banners_title" placeholder="Banner Title" value="{{ old('banners_title') }}" aria-describedby="emailHelp">
        @error('banners_title')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <textarea class="form-control" name="banners_discription" id="banners_discription" placeholder="Banner Discription" cols="30" rows="10"></textarea>
        @error('banners_discription')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="banners_redirect_link" id="banners_redirect_link" placeholder="Banners redirect link" value="{{ old('banners_title') }}" aria-describedby="emailHelp">
        @error('banners_redirect_link')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="file" class="form-control" name="banners_image" value="{{ old('banners_image') }}" id="banners_image">
        @error('banners_image')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <select class="form-select form-select-lg mb-3" name="banners_status" id="banners_status" aria-label=".form-select-lg example">
            <option value="" selected>Select Banner Status</option>
            <option value="1">Active</option>
            <option value="0">In-Active</option>
        </select>
        @error('banners_status')
            <p class="small text-danger">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-primary rounded-pill m-2">Submit</button>

    </form>
</div>

@endsection

@push('scripts')

<!-- JavaScript Libraries -->
<script>
    CKEDITOR.replace('banners_discription');
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