<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->term)) {
        
            $Banner_list = Banner::where([['title', 'LIKE', '%' . $request->term . '%']])
            ->orWhere('description', 'LIKE', '%' . $request->term . '%')->get();
        
        } else {
            $Banner_list=Banner::all();
        }

        return view('admin.banner.index', ['Banner_list'=>$Banner_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Banner_list = Banner::all();
        return view('admin.banner.create', ['Banner_list'=>$Banner_list]);
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
            "banners_title" => ['required'],
            "banners_discription" => ['required'],
            "banners_redirect_link" => ['required'],
            "banners_image" => 'required|mimes:jpg,jpeg,png|max:2048',
            "banners_status" => ['required'],
        ]);

        if($request->hasFile('banners_image')){

            $file = $request->File('banners_image');
            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $location = 'uploads/admin/banners_image';
            // Upload file
            $file->move($location, $filename);
            // File path
            $Banner_image_filepath = ($location . "/" . $filename);
        }


        $Banner = new Banner;
        $Banner->title = $request->banners_title;
        $Banner->description = $request->banners_discription;
        $Banner->redirect_link = $request->banners_redirect_link;
        $Banner->status = $request->banners_status;
        $Banner->image = $Banner_image_filepath;
        $Banner->save();

        if (!$Banner) {
            return $this->responseRedirectBack('Error occurred while creating Banner.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.banner');
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
        $Banner_list = Banner::find($id);
        return view('admin.banner.details', ['Banner_list'=>$Banner_list]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Banner_list = Banner::find($id);
        return view('admin.banner.edit', ['Banner_list'=>$Banner_list]);
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
            "banners_title" => ['required'],
            "banners_discription" => ['required'],
            "banners_redirect_link" => ['required'],
            "banners_image" => 'nullable|mimes:jpg,jpeg,png|max:2048',
            "banners_status" => ['required'],
        ]);

        if($request->hasFile('banners_image')){

            $file = $request->File('banners_image');
            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $location = 'uploads/admin/banners_image';
            // Upload file
            $file->move($location, $filename);
            // File path
            $Banner_image_filepath = ($location . "/" . $filename);
        }


        $Banner = Banner::find($request->id);
        $Banner->title = $request->banners_title;
        $Banner->description = $request->banners_discription;
        $Banner->redirect_link = $request->banners_redirect_link;
        $Banner->status = $request->banners_status;
        if($request->banners_image){
        $Banner->image = $Banner_image_filepath;
        }
        $Banner->save();

        if (!$Banner) {
            return $this->responseRedirectBack('Error occurred while creating Banner.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.banner');
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
        $Banner = Banner::find($id);
        $Banner->delete();

        if (!$Banner) {
            return $this->responseRedirectBack('Error occurred while creating Banner.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.banner');
        // return $this->responseRedirect('admin.options', 'Payout has been created successfully', 'success', false, false);
    }
}
