<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Property_image;
use App\Models\Property_variation;
use App\Models\Amenity;
use App\Models\Locality;
use Illuminate\Support\Str;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->term)) {
        
            $Property_list = Property::with('PropertyVariation')->where([['title', 'LIKE', '%' . $request->term . '%']])->get();
        
        } else {
            $Property_list=Property::with('PropertyVariation')->get();
        }
        return view('admin.property.index', ['Property_list'=>$Property_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Amenity_list=Amenity::all();
        $Locality_list=Locality::all();
        return view('admin.property.create', ['Amenity_list'=>$Amenity_list,'Locality_list'=>$Locality_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => ['required'],
            "category" => ['required'],
            "discriprion" => ['required'],
            "property_Area" => ['required'],
            "location" => ['required'],
            "property_Type" => ['required'],
            "property_Status" => ['required'],
            "Configurations" => ['required'],
            "ameniti_id" => ['required'],
            "status" => ['required'],
            "added_by" => ['required'],
            "image" => 'required|mimes:jpg,jpeg,png|max:2048',
            "floor_plan_image" => 'required|mimes:jpg,jpeg,png|max:2048',
            "brochure" => 'required|mimes:pdf|max:2048', 
        ]);
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $location = 'uploads/admin/property';
            $file->move($location, $filename);
            $property_image_filepath = $location . "/" . $filename;
        }
    
        if ($request->hasFile('floor_plan_image')) {
            $file = $request->file('floor_plan_image');
            $filename = $file->getClientOriginalName();
            $location = 'uploads/admin/floor_plan_image';
            $file->move($location, $filename);
            $floor_plan_image_filepath = $location . "/" . $filename;
        }
    
        if ($request->hasFile('brochure')) {
            $file = $request->file('brochure');
            $filename = $file->getClientOriginalName();
            $location = 'uploads/admin/brochures';
            $file->move($location, $filename);
            $brochure_filepath = $location . "/" . $filename;
        }
    
        $explodeval = implode(",", $request->ameniti_id);
        $uid = rand(1000, 9999);
        $slug = Str::slug($request->title . '-' . $request->location, '-');

        $Property = new Property;
        $Property->title = $request->title;
        $Property->slug = $slug;
        $Property->uid = $uid;
        $Property->image = $property_image_filepath;
        $Property->floor_plan_image = $floor_plan_image_filepath;
        $Property->brochure = $brochure_filepath; 
        $Property->discriprion = $request->discriprion;
        $Property->property_Area = $request->property_Area;
        $Property->location = $request->location;
        $Property->property_Type = $request->property_Type;
        $Property->property_Status = $request->property_Status;
        $Property->Configurations = $request->Configurations;
        $Property->ameniti_id = $explodeval;
        $Property->added_by = $request->added_by;
        $Property->new_arrival = $request->new_arrival;
        $Property->most_popular = $request->most_popular;
        $Property->recent_venue = $request->recent_venue;
        $Property->upcoming_property = $request->upcoming_property;
        $Property->status = $request->status;
        $Property->save();
    
        if (!$Property) {
            return $this->responseRedirectBack('Error occurred while creating Property.', 'error', true, true);
        }
    
        return redirect()->route('admin.property');
    }
    

    public function create_property_variation($id){
        return view('admin.property.add_variation', ['id'=>$id]);
    }

    public function property_variation($id){
        $Property_variation = Property_variation::where('property_id', $id)->get();
        // dd($Property_variation);
        return view('admin.property.property_variation', ['Property_variation'=>$Property_variation,'id'=>$id]);
    }

    public function property_variation_destroy($id){
        $Property_variation = Property_variation::find($id);
        $Property_variation->delete();

        if (!$Property_variation) {
            return $this->responseRedirectBack('Error occurred while deleting Product image.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.property');
    }

    public function property_variation_store(Request $request){

        // dd($request->all());

        $request->validate([
            "property_type" => ['required'],
            "build_up_area" => ['required'],
            "selling_price" => ['required'],
            "booking_amt" => ['required'],
        ]);

        if(empty($request->variation_id)){
        $ProductVariation = new Property_variation;
        $ProductVariation->property_id = $request->id;
        $ProductVariation->property_type = $request->property_type;
        $ProductVariation->build_up_area = $request->build_up_area;
        $ProductVariation->selling_price = $request->selling_price;
        $ProductVariation->booking_amt = $request->booking_amt;
        $ProductVariation->save();

        return redirect()->route('admin.property', $request->id);

        }else{
        
        $ProductVariation = Property_variation::find($request->variation_id);
        $ProductVariation->property_type = $request->property_type;
        $ProductVariation->build_up_area = $request->build_up_area;
        $ProductVariation->selling_price = $request->selling_price;
        $ProductVariation->booking_amt = $request->booking_amt;
        $ProductVariation->save();

        return redirect()->route('admin.property', $ProductVariation->property_id);

        }
    }

    public function property_variation_edit($id)
    {
        $Property_list = Property_variation::find($id);
        return view('admin.property.add_variation', ['Property_list'=>$Property_list]);
    }


    public function property_image($id){
        $ProductImage = Property_image::where('property_id', $id)->get();
        return view('admin.property.property_images', ['ProductImage'=>$ProductImage,'id'=>$id]);
    }

    public function property_image_destroy($id){
        $Product = Property_image::find($id);
        $Product->delete();

        if (!$Product) {
            return $this->responseRedirectBack('Error occurred while deleting Product image.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.property');
    }

    public function property_image_store(Request $request){

        // dd($request->all());

        $request->validate([
            "image" => 'required|mimes:jpg,jpeg,png|max:2048',
            "id" => ['required'],
            "status" => ['required'],
        ]);

        if($request->hasFile('image')){

            $file = $request->File('image');
            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $location = 'uploads/admin/property_image';
            // Upload file
            $file->move($location, $filename);
            // File path
            $property_image_filepath = ($location . "/" . $filename);
        }

        $ProductImage = new Property_image;
        $ProductImage->property_id = $request->id;
        $ProductImage->images = $property_image_filepath;
        $ProductImage->status = $request->status;
        $ProductImage->save();
        return redirect()->route('admin.property.image', $request->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Property_list = Property::find($id);
        return view('admin.property.details', ['Property_list'=>$Property_list]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Property_list = Property::find($id);
        $Amenity_list=Amenity::all();
        $Locality_list=Locality::all();
        return view('admin.property.edit', ['Property_list'=>$Property_list,'Amenity_list'=>$Amenity_list,'Locality_list'=>$Locality_list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            "title" => ['required'],
            "category" => ['required'],
            "discriprion" => ['required'],
            "property_Area" => ['required'],
            "location" => ['required'],
            "property_Type" => ['required'],
            "property_Status" => ['required'],
            "Configurations" => ['required'],
            "ameniti_id" => ['required'],
            "status"=> ['required'],
            "added_by"=> ['required'],
            "image" => 'nullable|mimes:jpg,jpeg,png|max:2048',
            "floor_plan_image" => 'nullable|mimes:jpg,jpeg,png|max:2048',
            "brochure" => 'nullable|mimes:pdf|max:2048' 
        ]);
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $location = 'uploads/admin/property';
            $file->move($location, $filename);
            $property_image_filepath = $location . "/" . $filename;
        }
    
        if ($request->hasFile('floor_plan_image')) {
            $file = $request->file('floor_plan_image');
            $filename = $file->getClientOriginalName();
            $location = 'uploads/admin/floor_plan_image';
            $file->move($location, $filename);
            $floor_plan_image_filepath = $location . "/" . $filename;
        }
    
        if ($request->hasFile('brochure')) {
            $file = $request->file('brochure');
            $filename = $file->getClientOriginalName();
            $location = 'uploads/admin/brochures'; 
            $file->move($location, $filename);
            $brochure_filepath = $location . "/" . $filename;
        }
    
        $explodeval = implode(",", $request->ameniti_id);
    
        $Property = Property::find($request->id);
        $Property->title = $request->title;
        
        if ($request->hasFile('image')) {
            $Property->image = $property_image_filepath;
        }
    
        if ($request->hasFile('floor_plan_image')) {
            $Property->floor_plan_image = $floor_plan_image_filepath;
        }
    
        if ($request->hasFile('brochure')) {
            $Property->brochure = $brochure_filepath;
        }
    
        $Property->discriprion = $request->discriprion;
        $Property->property_Area = $request->property_Area;
        $Property->location = $request->location;
        $Property->property_Type = $request->property_Type;
        $Property->property_Status = $request->property_Status;
        $Property->Configurations = $request->Configurations;
        $Property->ameniti_id = $explodeval;
        $Property->added_by = $request->added_by;
        $Property->new_arrival = $request->new_arrival;
        $Property->most_popular = $request->most_popular;
        $Property->recent_venue = $request->recent_venue;
        $Property->upcoming_property = $request->upcoming_property;
        $Property->status = $request->status;
        $Property->save();
    
        if (!$Property) {
            return $this->responseRedirectBack('Error occurred while updating Property.', 'error', true, true);
        }
    
        return redirect()->route('admin.property');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Property = Property::find($id);
        $Property->delete();

        if (!$Property) {
            return $this->responseRedirectBack('Error occurred while creating Property.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.property');
        // return $this->responseRedirect('admin.options', 'Payout has been created successfully', 'success', false, false);
    }
}
