<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Models\FlatSize;

class FlatSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->term)) {
        
            $flat_size_list = FlatSize::where([['name', 'LIKE', '%' . $request->term . '%']])->get();
        
        } else {
            $flat_size_list=FlatSize::all();
        }

        return view('admin.flat-size.index', ['flat_size_list'=>$flat_size_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flat_size_list = FlatSize::all();
        return view('admin.flat-size.create', ['flat_size_list'=>$flat_size_list]);
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

        //     $location = 'uploads/admin/flatSize_image';
        //     // Upload file
        //     $file->move($location, $filename);
        //     // File path
        //     $flatSize_image_filepath = ($location . "/" . $filename);
        // }


        $flatSize = new FlatSize;
        $flatSize->name = $request->name;
        // $flatSize->image = $flatSize_image_filepath;
        $flatSize->status = $request->status;
        $flatSize->save();

        if (!$flatSize) {
            return $this->responseRedirectBack('Error occurred while creating Flat size.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.flatsize');
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
        $flat_size_list = FlatSize::find($id);
        return view('admin.flat-size.details', ['flat_size_list'=>$flat_size_list]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flat_size_list = FlatSize::find($id);
        return view('admin.flat-size.edit', ['flat_size_list'=>$flat_size_list]);
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

        //     $location = 'uploads/admin/flatSize_image';
        //     // Upload file
        //     $file->move($location, $filename);
        //     // File path
        //     $flatSize_image_filepath = ($location . "/" . $filename);
        // }


        $flatSize = FlatSize::find($request->id);
        $flatSize->name = $request->name;
        // if($request->image){
        //     $flatSize->image = $flatSize_image_filepath;
        //     }
        $flatSize->status = $request->status;
        $flatSize->save();

        if (!$flatSize) {
            return $this->responseRedirectBack('Error occurred while creating flat size.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.flatsize');
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
        $flatSize = FlatSize::find($id);
        $flatSize->delete();

        if (!$flatSize) {
            return $this->responseRedirectBack('Error occurred while creating flatSize.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.flatsize');
        // return $this->responseRedirect('admin.options', 'Payout has been created successfully', 'success', false, false);
    }
}
