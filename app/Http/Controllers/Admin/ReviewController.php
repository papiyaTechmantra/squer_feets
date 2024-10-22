<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->term)) {
        
            $Review_list = Review::where([['name', 'LIKE', '%' . $request->term . '%']])->get();
        
        } else {
            $Review_list=Review::all();
        }

        return view('admin.review.index', ['Review_list'=>$Review_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.review.create');
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
            "message" => ['required'],
            "image" => 'required|mimes:jpg,jpeg,png|max:2048',
            "status" => ['required'],
        ]);


        if($request->hasFile('image')){

            $file = $request->File('image');
            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $location = 'uploads/admin/eeview';
            // Upload file
            $file->move($location, $filename);
            // File path
            $Review_image_filepath = ($location . "/" . $filename);
        }


        $Review = new Review;
        $Review->name = $request->name;
        $Review->message = $request->message;
        $Review->image = $Review_image_filepath;
        $Review->status = $request->status;
        $Review->save();

        if (!$Review) {
            return $this->responseRedirectBack('Error occurred while creating Review.', 'error', true, true);
        }

        return redirect()->route('admin.review');
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
        $Review_list = News::find($id);
        return view('admin.review.details', ['Review_list'=>$Review_list]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Review_list = Review::find($id);
        return view('admin.review.edit', ['Review_list'=>$Review_list]);
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
            
            // "id" => ['required'],
            "name" => ['required'],
            "message" => ['required'],
            "status" => ['required'],
            "image" => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);


        if($request->hasFile('image')){

            $file = $request->File('image');
            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $location = 'uploads/admin/review';
            // Upload file
            $file->move($location, $filename);
            // File path
            $Review_image_filepath = ($location . "/" . $filename);
        }


        $Review = Review::find($request->id);
        $Review->name = $request->name;
        $Review->message = $request->message;
        $Review->status = $request->status;
        if($request->image){
            $Review->image = $Review_image_filepath;
        }
        $Review->save();

        if (!$Review) {
            return $this->responseRedirectBack('Error occurred while creating Review.', 'error', true, true);
        }

        return redirect()->route('admin.review');
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
        $Review = Review::find($id);
        $Review->delete();

        if (!$Review) {
            return $this->responseRedirectBack('Error occurred while creating Review.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.review');
        // return $this->responseRedirect('admin.options', 'Payout has been created successfully', 'success', false, false);
    }
}
