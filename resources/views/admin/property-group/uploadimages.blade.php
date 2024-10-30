@extends('admin.layout.app')
@section('content')

<h1 style="color: black">Add Projects</h1>

<div>
    <form action="{{ route('admin.projectimage.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <select class="form-select form-select-lg mb-3" name="project_id" id="project_id" aria-label=".form-select-lg example">
            <option selected>Select Project</option>
            @foreach ($Projects_list as $key => $Projects)
            <option value="{{ $Projects->id }}">{{ $Projects->title }}</option>
            @endforeach
        </select>

        <input type="file" class="form-control" name="project_images[]" multiple id="project_images" placeholder="Upload project images">
        @error('project_images')
            <p class="small text-danger">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-primary rounded-pill m-2">Submit</button>

    </form>
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