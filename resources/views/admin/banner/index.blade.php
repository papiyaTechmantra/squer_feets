@extends('admin.layout.app')
@section('content')


<h1 style="color: black">Banner</h1>

<div class="bg-light rounded h-100 p-5">
    

    <div class="row align-items-center justify-content-between">
        <div class="col-12 col-md-8">


            <a href="{{ route('admin.banner.add') }}"><button type="button"
                    class="btn btn-primary rounded-pill">Add Banner</button></a>
        </div>

        <div class="col-12 col-md-4">
            <div class="search text-end">
                
                <form action="{{ route('admin.banner') }}">
                    <a type="button" href="{{ route('admin.banner') }}">
                        <i class="fa fa-times"></i>
                    </a>
                    <input type="text" name="term" id="term" placeholder="searching....">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="table-sec mt-4">
    <h6 class="mb-4">Banner Table</h6>
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Sr No.</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Discription</th>
                <th scope="col">Redirect link</th>
                <th scope="col">Status</th>
                <th scope="col">Created At</th>
                @if (Auth::user()->id == 1)
                <th scope="col">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>

            @foreach ($Banner_list as $key => $Banners)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td><img src="{{ asset($Banners->image) }}" style="width: 100px;" alt=""></td>
                <td>{{ $Banners->title }}</td>
                <td>{{ isset($Banners->description) ? $Banners->description : "-- Not Available --" }}</td>
                <td>{{ $Banners->redirect_link }}</td>
                <td>{{ $Banners->status == 1 ? 'Active' : 'In-active' }}</td>
                <td>{{ $Banners->created_at }}</td>
                @if (Auth::user()->id == 1)
                <td>
                    <div class="btn-group" role="group" aria-label="Second group">
                        <a href="{{ route('admin.banner.edit', $Banners['id']) }}"
                            class="btn btn-sm btn-primary edit-btn"><i
                                class="fa fa-edit"></i></a>

                        <a href="{{ route('admin.banner.show', $Banners['id']) }}"
                            class="btn btn-sm btn-primary show-btn"><i
                                class="fa fa-eye"></i></a>
                        
                        <a href="{{ route('admin.banner.delete', $Banners['id']) }}"
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