<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Models\Parking;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->term)) {
        
            $parking_list = Parking::where([['name', 'LIKE', '%' . $request->term . '%']])->get();
        
        } else {
            $parking_list=Parking::all();
        }

        return view('admin.parking.index', ['parking_list'=>$parking_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parking_list = Parking::all();
        return view('admin.parking.create', ['parking_list'=>$parking_list]);
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

        //     $location = 'uploads/admin/parking_image';
        //     // Upload file
        //     $file->move($location, $filename);
        //     // File path
        //     $parking_image_filepath = ($location . "/" . $filename);
        // }


        $parking = new Parking;
        $parking->name = $request->name;
        // $parking->image = $parking_image_filepath;
        $parking->status = $request->status;
        $parking->save();

        if (!$parking) {
            return $this->responseRedirectBack('Error occurred while creating Parking.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.parking');
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
        $parking_list = Parking::find($id);
        return view('admin.parking.details', ['parking_list'=>$parking_list]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parking_list = Parking::find($id);
        return view('admin.parking.edit', ['parking_list'=>$parking_list]);
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

        //     $location = 'uploads/admin/parking_image';
        //     // Upload file
        //     $file->move($location, $filename);
        //     // File path
        //     $parking_image_filepath = ($location . "/" . $filename);
        // }


        $parking = Parking::find($request->id);
        $parking->name = $request->name;
        // if($request->image){
        //     $parking->image = $parking_image_filepath;
        //     }
        $parking->status = $request->status;
        $parking->save();

        if (!$parking) {
            return $this->responseRedirectBack('Error occurred while creating parking.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.parking');
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
        $parking = Parking::find($id);
        $parking->delete();

        if (!$parking) {
            return $this->responseRedirectBack('Error occurred while creating parking.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.parking');
        // return $this->responseRedirect('admin.options', 'Payout has been created successfully', 'success', false, false);
    }
}
