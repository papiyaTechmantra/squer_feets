@extends('admin.layout.app')
@section('content')
<link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


<h1 style="color: black">Leads</h1>

<div class="bg-light rounded h-100 p-5">
    

    <div class="row align-items-center justify-content-between">
            <div class="col-12 col-md-3">


                <a href="{{ route('admin.lead.add') }}"><button type="button" class="btn btn-primary rounded-pill">Add
                        Lead</button></a>
            </div>

            <div class="col-12 col-md-9">
                <div class="form-outer-flex">
                    <div class="form-flex">
                        <form action="{{ route('admin.lead') }}" method="get">
                            <div class="from-date filter-style">
                                <label for="">Start Date</label>
                                <div class="input-group date" id="datepicker">
                                   
                                    <input type="date" name="start_date" class="form-control">
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-light d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="to-date filter-style">
                                <label for="">End Date</label>
                                <div class="input-group date" id="datepicker2">
                                   
                                    <input type="date" name="end_date" class="form-control">
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-light d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="select filter-style">
                                <label for="">Select Property</label>
                                <div class="select-flex">
                                    <select name="Property" id="">
                                        <option value="">Select Property</option>
                                        @foreach ($Property_list as $Property)
                                        <option value="{{ $Property->id }}">{{ $Property->title }}</option>
                                        @endforeach
                                    </select>
                                    <iconify-icon icon="prime:angle-down"></iconify-icon>
                                </div>
                            </div>
                            <div class="submit-btn">
                                <label for=""></label>
                                <button type="submit"><iconify-icon icon="fontisto:paper-plane"></iconify-icon></button>
                            </div>
                        </form>
                    </div>
                    <div class="search lead-search text-end">
                        <label for=""></label>
                        <form action="{{ route('admin.lead') }}">
                            <a type="button" href="{{ route('admin.lead') }}">
                                <i class="fa fa-times"></i>
                            </a>
                            <input type="text" name="term" id="term" placeholder="Searching....">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <div class="table-sec mt-4">
    <h6 class="mb-4">Lead Table</h6>
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Sr No.</th>
                <th scope="col">Property Name</th>
                <th scope="col">Name</th>
                <th scope="col">Phone No</th>
                <th scope="col">Email</th>
                <th scope="col">Interested In BHK</th>
                <th scope="col">Message</th>
                <th scope="col">Interested In Loan</th>
                <th scope="col">Created At</th>
                @if (Auth::user()->id == 1)
                <th scope="col">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>

            @foreach ($Lead_list as $key => $Leads)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $Leads->Property->title }}</td>
                <td>{{ $Leads->name }}</td>
                <td>{{ $Leads->phone_no }}</td>
                <td>{{ $Leads->email }}</td>
                <td>{{ $Leads->interested_in_bhk }}</td>
                <td>{{ $Leads->message }}</td>
                <td>{{ $Leads->interested_in_loan === 1 ? "Yes" : "No" }}</td>
                <td>{{ date('d, M Y', strtotime($Leads->created_at)) }}</td>
                @if (Auth::user()->id == 1)
                <td>
                    <div class="btn-group" role="group" aria-label="Second group">
                        <a href="{{ route('admin.lead.edit', $Leads['id']) }}"
                            class="btn btn-sm btn-primary edit-btn"><i
                                class="fa fa-edit"></i></a>

                        <a href="{{ route('admin.lead.show', $Leads['id']) }}"
                            class="btn btn-sm btn-primary show-btn"><i
                                class="fa fa-eye"></i></a>
                        
                        <a href="{{ route('admin.lead.delete', $Leads['id']) }}"
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
<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>-->


<!-- Template Javascript -->
<!--<script src="js/main.js"></script>-->

<!--<script>-->
<!--    $(function() {-->
<!--        $('#datepicker').datepicker({-->
<!--            format: 'dd/mm/yyyy',-->
<!--        });-->
<!--    });-->

<!--    $(function() {-->
<!--        $('#datepicker2').datepicker({-->
<!--            format: 'dd/mm/yyyy',-->
<!--        });-->
<!--    });-->
<!--</script>-->

@endpush