@extends('admin.layout.app')
@section('content')

<h1 style="color: black">Blog</h1>

<div class="bg-light rounded h-100 p-5">
    

    <div class="row align-items-center justify-content-between">
        <div class="col-12 col-md-8">


            <a href="{{ route('admin.blog.add') }}"><button type="button"
                    class="btn btn-primary rounded-pill">Add Blog</button></a>
        </div>

        <div class="col-12 col-md-4">
            <div class="search text-end">
                
                <form action="{{ route('admin.blog') }}">
                    <a type="button" href="{{ route('admin.blog') }}">
                        <i class="fa fa-times"></i>
                    </a>
                    <input type="text" name="term" id="term" placeholder="searching....">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="table-sec mt-4">
    <h6 class="mb-4">Blog Table</h6>
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Sr No.</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Sub Title</th>
                <th scope="col">Discription</th>
                <th scope="col">Status</th>
                <th scope="col">Created At</th>
                @if (Auth::user()->id == 1)
                <th scope="col">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>

            @foreach ($Blog_list as $key => $Blogs)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td><img src="{{ asset($Blogs->image) }}" style="width: 100px;" alt=""></td>
                <td>{{ $Blogs->title }}</td>
                <td>{{ $Blogs->sub_title }}</td>
                <td>{{ isset($Blogs->discription) ? Illuminate\Support\Str::limit($Blogs->discription, 200) : "-- Not Available --" }}</td>
                <td>{{ $Blogs->status == 1 ? 'Active' : 'In-active' }}</td>
                <td>{{ $Blogs->created_at }}</td>
                @if (Auth::user()->id == 1)
                <td>
                    <div class="btn-group" role="group" aria-label="Second group">
                        <a href="{{ route('admin.blog.edit', $Blogs['id']) }}"
                            class="btn btn-sm btn-primary edit-btn"><i
                                class="fa fa-edit"></i></a>

                        <a href="{{ route('admin.blog.show', $Blogs['id']) }}"
                            class="btn btn-sm btn-success details-btn"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                        
                        <a href="{{ route('admin.blog.delete', $Blogs['id']) }}"
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