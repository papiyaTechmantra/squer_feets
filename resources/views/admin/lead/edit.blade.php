@extends('admin.layout.app')
@section('content')

<h1 style="color: black">Update Lead</h1>

<div>
    <form action="{{ route('admin.lead.update') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $Lead_list->id }}">

        @php
        $LeadId = explode(",", $Lead_list->interested_in_bhk);
        // dd($amenityId);
        @endphp

        <select class="form-select form-select-lg mb-3" name="property_id" id="property_id" aria-label=".form-select-lg example">
            <option value="">Select Property</option>
            @foreach ($Property_list as $Property)
            <option value="{{ $Property->id }}" {{$Property->id==$Lead_list->property_id ? 'selected' : '' }}>{{ $Property->title }}</option>
            @endforeach
        </select>
        @error('property_id')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        
        <label class="form-check-label" for="flexCheckDefault">
            I AM INTERESTED IN
        </label>
        <input {{ in_array('1 BHK',$LeadId) ? 'checked' : '' }} class="form-check-input" type="checkbox" value="1 BHK" name="bhk[]" id="bhk">
        <label class="form-check-label" for="flexCheckDefault">
            1 BHK
        </label>
        <input {{ in_array('2 BHK',$LeadId) ? 'checked' : '' }} class="form-check-input" type="checkbox" value="2 BHK" name="bhk[]" id="bhk">
        <label class="form-check-label" for="flexCheckDefault">
            2 BHK
        </label>
        <input {{ in_array('3 BHK',$LeadId) ? 'checked' : '' }} class="form-check-input" type="checkbox" value="3 BHK" name="bhk[]" id="bhk">
        <label class="form-check-label" for="flexCheckDefault">
            3 BHK
        </label>
        <input {{ in_array('4 BHK',$LeadId) ? 'checked' : '' }} class="form-check-input" type="checkbox" value="4 BHK" name="bhk[]" id="bhk">
        <label class="form-check-label" for="flexCheckDefault">
            4 BHK
        </label>
        <input {{ in_array('5 BHK',$LeadId) ? 'checked' : '' }} class="form-check-input" type="checkbox" value="5 BHK" name="bhk[]" id="bhk">
        <label class="form-check-label" for="flexCheckDefault">
            5 BHK
        </label>
        {{-- @error('bhk')
            <p class="small text-danger">{{ $message }}</p>
        @enderror --}}

        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $Lead_list->name }}">
        @error('name')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="number" class="form-control" name="phone_no" id="phone_no" placeholder="Phone No" value="{{ $Lead_list->phone_no }}" aria-describedby="emailHelp">
        @error('phone_no')
            <p class="small text-danger">{{ $message }}</p>
        @enderror
        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="{{ $Lead_list->email }}" aria-describedby="emailHelp">
        @error('locality_lng')
            <p class="small text-danger">{{ $message }}</p>
        @enderror

        <input type="text" class="form-control" name="message" id="message" placeholder="Enter Message" value="{{ $Lead_list->message }}">
        @error('message')
            <p class="small text-danger">{{ $message }}</p>
        @enderror

        <input {{ $Lead_list->interested_in_loan == 1 ? 'checked' : '' }} class="form-check-input" type="checkbox" value="1" name="interested_in_loan" id="interested_in_loan">
        <label class="form-check-label" for="flexCheckDefault">
            I would also like to know about Home Loans
        </label>

        <button type="submit" class="btn btn-primary rounded-pill m-2">Submit</button>

    </form>
</div>

@endsection

@push('scripts')
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