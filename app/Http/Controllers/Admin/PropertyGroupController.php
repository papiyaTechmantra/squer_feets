<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Models\PropertyGroup;

class PropertyGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->term)) {
        
            $property_group_list = PropertyGroup::where([['name', 'LIKE', '%' . $request->term . '%']])->get();
        
        } else {
            $property_group_list=PropertyGroup::all();
        }

        return view('admin.property-group.index', ['property_group_list'=>$property_group_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $property_group_list = PropertyGroup::all();
        return view('admin.property-group.create', ['property_group_list'=>$property_group_list]);
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
            "name" => ['required'],
            // "image" => 'required|mimes:jpg,jpeg,png|max:2048',
            "status" => ['required'],
        ]);

        // if($request->hasFile('image')){

        //     $file = $request->File('image');
        //     // File Details
        //     $filename = $file->getClientOriginalName();
        //     $extension = $file->getClientOriginalExtension();

        //     $location = 'uploads/admin/propertyGroup_image';
        //     // Upload file
        //     $file->move($location, $filename);
        //     // File path
        //     $propertyGroup_image_filepath = ($location . "/" . $filename);
        // }


        $propertyGroup = new PropertyGroup;
        $propertyGroup->name = $request->name;
        // $propertyGroup->image = $propertyGroup_image_filepath;
        $propertyGroup->status = $request->status;
        $propertyGroup->save();

        if (!$propertyGroup) {
            return $this->responseRedirectBack('Error occurred while creating property group.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.propertygroup');
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
        $property_group_list = PropertyGroup::find($id);
        return view('admin.property-group.details', ['property_group_list'=>$property_group_list]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property_group_list = PropertyGroup::find($id);
        return view('admin.property-group.edit', ['property_group_list'=>$property_group_list]);
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
            "name" => ['required'],
            // "image" => 'nullable|mimes:jpg,jpeg,png|max:2048',
            "status" => ['required'],
        ]);

        // if($request->hasFile('image')){

        //     $file = $request->File('image');
        //     // File Details
        //     $filename = $file->getClientOriginalName();
        //     $extension = $file->getClientOriginalExtension();

        //     $location = 'uploads/admin/propertyGroup_image';
        //     // Upload file
        //     $file->move($location, $filename);
        //     // File path
        //     $propertyGroup_image_filepath = ($location . "/" . $filename);
        // }


        $propertyGroup = PropertyGroup::find($request->id);
        $propertyGroup->name = $request->name;
        // if($request->image){
        //     $propertyGroup->image = $propertyGroup_image_filepath;
        //     }
        $propertyGroup->status = $request->status;
        $propertyGroup->save();

        if (!$propertyGroup) {
            return $this->responseRedirectBack('Error occurred while creating property group.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.propertygroup');
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
        $propertyGroup = PropertyGroup::find($id);
        $propertyGroup->delete();

        if (!$propertyGroup) {
            return $this->responseRedirectBack('Error occurred while creating propertyGroup.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.propertygroup');
        // return $this->responseRedirect('admin.options', 'Payout has been created successfully', 'success', false, false);
    }
}
