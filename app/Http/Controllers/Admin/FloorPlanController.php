<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Models\FloorPlan;
use App\Models\Property;

class FloorPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->term)) {
        
            $floor_plan_list = FloorPlan::where([['name', 'LIKE', '%' . $request->term . '%']])->get();
        
        } else {
            $floor_plan_list=FloorPlan::all();
        }

        return view('admin.floor-plan.index', ['floor_plan_list'=>$floor_plan_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $properties=Property::Where('status' ,'=' ,'1')->get();
        $floor_plan_list = FloorPlan::all();
        return view('admin.floor-plan.create', ['floor_plan_list'=>$floor_plan_list,'properties'=>$properties]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            // "name" => ['required'],
            "property_id" => ['required'],
            // "image" => 'required|mimes:jpg,jpeg,png|max:2048',
            "builtup_area" => ['required'],
            "base_selling_price" => ['required'],
            "status" => ['required'],
            'image.*' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

       

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $location = 'uploads/admin/floor_plan';
            $file->move($location, $filename);
            $property_image_filepath = $location . "/" . $filename;
        }
        
        $floorPlan = new FloorPlan;
        
        // Assigning values to floorPlan
        // $floorPlan->name = $request->name;
        $floorPlan->property_id = $request->property_id;
        $floorPlan->builtup_area = $request->builtup_area;
        $floorPlan->base_selling_price = $request->base_selling_price;
        $floorPlan->status = $request->status;
        
      
        
        $floorPlan->image = $property_image_filepath;
        
        $floorPlan->save();
        

        if (!$floorPlan) {
            return $this->responseRedirectBack('Error occurred while creating floor plan.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.floorplan');
        // return $this->responseRedirect('admin.options', 'Payout has been created successfully', 'success', false, false);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $floor_plan_list = FloorPlan::find($id);
        return view('admin.floor-plan.details', ['floor_plan_list'=>$floor_plan_list]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $floorPlan = FloorPlan::find($id);
        $properties=Property::Where('status' ,'=' ,'1')->get();
        return view('admin.floor-plan.edit', ['floorPlan'=>$floorPlan,'properties'=>$properties]);
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
            "property_id" => ['required'],
            "builtup_area" => ['required'],
            "base_selling_price" => ['required'],
            "status" => ['required'],
            'image' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        // Find the existing FloorPlan record
        $floorPlan = FloorPlan::findOrFail($request->id);
    
        // Update fields with the request data
        $floorPlan->property_id = $request->property_id;
        $floorPlan->builtup_area = $request->builtup_area;
        $floorPlan->base_selling_price = $request->base_selling_price;
        $floorPlan->status = $request->status;
    
        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $location = 'uploads/admin/floor_plan';
            $file->move($location, $filename);
            $property_image_filepath = $location . "/" . $filename;
    
            // Update the image field
            $floorPlan->image = $property_image_filepath;
        }
    
        // Save the updated FloorPlan record
        $floorPlan->save();

        if (!$floorPlan) {
            return $this->responseRedirectBack('Error occurred while creating floor plan.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.floorplan');
        // return $this->responseRedirect('admin.options', 'Payout has been created successfully', 'success', false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $floorPlan = FloorPlan::find($id);
        $floorPlan->delete();

        if (!$floorPlan) {
            return $this->responseRedirectBack('Error occurred while creating floorPlan.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.floorplan');
        // return $this->responseRedirect('admin.options', 'Payout has been created successfully', 'success', false, false);
    }
}
