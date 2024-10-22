<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Models\Amenity;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->term)) {
        
            $Amenity_list = Amenity::where([['name', 'LIKE', '%' . $request->term . '%']])->get();
        
        } else {
            $Amenity_list=Amenity::all();
        }

        return view('admin.amenity.index', ['Amenity_list'=>$Amenity_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Amenity_list = Amenity::all();
        return view('admin.amenity.create', ['Amenity_list'=>$Amenity_list]);
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
            "image" => 'required|mimes:jpg,jpeg,png|max:2048',
            "status" => ['required'],
        ]);

        if($request->hasFile('image')){

            $file = $request->File('image');
            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $location = 'uploads/admin/amenity_image';
            // Upload file
            $file->move($location, $filename);
            // File path
            $amenity_image_filepath = ($location . "/" . $filename);
        }


        $Amenity = new Amenity;
        $Amenity->name = $request->name;
        $Amenity->image = $amenity_image_filepath;
        $Amenity->status = $request->status;
        $Amenity->save();

        if (!$Amenity) {
            return $this->responseRedirectBack('Error occurred while creating Amenity.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.amenity');
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
        $Amenity_list = Amenity::find($id);
        return view('admin.amenity.details', ['Amenity_list'=>$Amenity_list]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Amenity_list = Amenity::find($id);
        return view('admin.amenity.edit', ['Amenity_list'=>$Amenity_list]);
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
            "image" => 'nullable|mimes:jpg,jpeg,png|max:2048',
            "status" => ['required'],
        ]);

        if($request->hasFile('image')){

            $file = $request->File('image');
            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $location = 'uploads/admin/amenity_image';
            // Upload file
            $file->move($location, $filename);
            // File path
            $amenity_image_filepath = ($location . "/" . $filename);
        }


        $Amenity = Amenity::find($request->id);
        $Amenity->name = $request->name;
        if($request->image){
            $Amenity->image = $amenity_image_filepath;
            }
        $Amenity->status = $request->status;
        $Amenity->save();

        if (!$Amenity) {
            return $this->responseRedirectBack('Error occurred while creating Amenity.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.amenity');
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
        $Amenity = Amenity::find($id);
        $Amenity->delete();

        if (!$Amenity) {
            return $this->responseRedirectBack('Error occurred while creating Amenity.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.amenity');
        // return $this->responseRedirect('admin.options', 'Payout has been created successfully', 'success', false, false);
    }
}
