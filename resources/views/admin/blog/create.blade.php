@extends('admin.layout.app')
@section('content')

<h1 style="color: black">Add Blog</h1>

<div>
    <form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <input type="text" class="form-control" name="blog_title" id="blog_title" value="{{ old('blog_title') }}" placeholder="blog Title" aria-describedby="emailHelp">
        @error('blog_title')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <textarea class="form-control" name="blog_discription" id="blog_discription" placeholder="blog Discription" cols="30" rows="10"></textarea>
        @error('blog_discription')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="text" class="form-control" name="blog_sub_title" id="blog_sub_title" value="{{ old('blog_sub_title') }}" placeholder="blog sub title" aria-describedby="emailHelp">
        @error('blog_sub_title')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="file" class="form-control" name="blog_image" id="blog_image" value="{{ old('blog_image') }}" aria-describedby="emailHelp">
        @error('blog_image')
            <p class="small text-danger">{{ $message }}</p>
        @enderror

        <select class="form-select form-select-lg mb-3" name="blog_status" id="blog_status" aria-label=".form-select-lg example">
            <option value="" selected>Select Status</option>
            <option value="1">Active</option>
            <option value="0">In-Active</option>
        </select>
        @error('blog_status')
            <p class="small text-danger">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-primary rounded-pill m-2">Submit</button>

    </form>
</div>

@endsection

@push('scripts')

<!-- JavaScript Libraries -->
<script>
    CKEDITOR.replace('blog_discription');
    // ClassicEditor
    //         .create( document.querySelector( '#blog_discription' ) )
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