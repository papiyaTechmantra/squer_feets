<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Locality;

class LocalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->term)) {
        
            $Locality_list = Locality::where([['name', 'LIKE', '%' . $request->term . '%']])->get();
        
        } else {
            $Locality_list=Locality::all();
        }

        return view('admin.locality.index', ['Locality_list'=>$Locality_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.locality.create');
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
            "locality_title" => ['required'],
            "locality_lat" => ['required'],
            "locality_lng" => ['required'],
            "image" => 'nullable|mimes:jpg,jpeg,png|max:2048'
        ]);


        $Locality = new Locality;
        $Locality->name = $request->locality_title;
        if($request->image){
        $Locality->image = $image_filepath;
        }
        $Locality->location_lat = $request->locality_lat;
        $Locality->location_lng = $request->locality_lng;
        $Locality->save();

        if (!$Locality) {
            return $this->responseRedirectBack('Error occurred while creating Locality.', 'error', true, true);
        }

        return redirect()->route('admin.locality');
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
        $Locality_list = Locality::find($id);
        return view('admin.locality.details', ['Locality_list'=>$Locality_list]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Locality_list = Locality::find($id);
        return view('admin.locality.edit', ['Locality_list'=>$Locality_list]);
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
        // dd($request->all());
        $request->validate([
            "locality_title" => ['required'],
            "locality_lat" => ['required'],
            "locality_lng" => ['required'],
            "image" => 'nullable|mimes:jpg,jpeg,png|max:2048'
        ]);

        if($request->hasFile('image')){

            $file = $request->File('image');
            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $location = 'uploads/admin/locality';
            // Upload file
            $file->move($location, $filename);
            // File path
            $image_filepath = ($location . "/" . $filename);
        }


        $Locality = Locality::find($request->id);
        $Locality->name = $request->locality_title;
        if($request->image){
        $Locality->image = $image_filepath;
        }
        $Locality->location_lat = $request->locality_lat;
        $Locality->location_lng = $request->locality_lng;
        $Locality->save();

        if (!$Locality) {
            return $this->responseRedirectBack('Error occurred while creating Locality.', 'error', true, true);
        }

        return redirect()->route('admin.locality');
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
        $Locality = Locality::find($id);
        $Locality->delete();

        if (!$Locality) {
            return $this->responseRedirectBack('Error occurred while creating Locality.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.locality');
        // return $this->responseRedirect('admin.options', 'Payout has been created successfully', 'success', false, false);
    }
}
