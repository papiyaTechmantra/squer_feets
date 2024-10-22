<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->term)) {
        
            $News_list = News::where([['title', 'LIKE', '%' . $request->term . '%']])
            ->orWhere('discription', 'LIKE', '%' . $request->term . '%')->get();
        
        } else {
            $News_list=News::all();
        }

        return view('admin.news.index', ['News_list'=>$News_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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
            "news_title" => ['required'],
            "news_sub_title" => ['required'],
            "news_discription" => ['required'],
            "news_status" => ['required'],
            
            "news_image" => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);


        if($request->hasFile('news_image')){

            $file = $request->File('news_image');
            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $location = 'uploads/admin/news';
            // Upload file
            $file->move($location, $filename);
            // File path
            $News_image_filepath = ($location . "/" . $filename);
        }


        $News = new News;
        $News->title = $request->news_title;
        $News->sub_title = $request->news_sub_title;
        $News->discription = $request->news_discription;
        $News->image = $News_image_filepath;
        $News->status = $request->news_status;
        $News->save();

        if (!$News) {
            return $this->responseRedirectBack('Error occurred while creating News.', 'error', true, true);
        }

        return redirect()->route('admin.news');
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
        $News_list = News::find($id);
        return view('admin.news.details', ['News_list'=>$News_list]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $News_list = News::find($id);
        return view('admin.news.edit', ['News_list'=>$News_list]);
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
            "news_title" => ['required'],
            "news_sub_title" => ['required'],
            "news_discription" => ['required'],
            "news_status" => ['required'],
            
            "news_image" => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);


        if($request->hasFile('news_image')){

            $file = $request->File('news_image');
            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $location = 'uploads/admin/news';
            // Upload file
            $file->move($location, $filename);
            // File path
            $News_image_filepath = ($location . "/" . $filename);
        }


        $News = News::find($request->id);
        $News->title = $request->news_title;
        $News->sub_title = $request->news_sub_title;
        $News->discription = $request->news_discription;
        
        $News->status = $request->news_status;
        if($request->news_image){
            $News->image = $News_image_filepath;
        }
        $News->save();

        if (!$News) {
            return $this->responseRedirectBack('Error occurred while creating News.', 'error', true, true);
        }

        return redirect()->route('admin.news');
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
        $News = News::find($id);
        $News->delete();

        if (!$News) {
            return $this->responseRedirectBack('Error occurred while creating News.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.news');
        // return $this->responseRedirect('admin.options', 'Payout has been created successfully', 'success', false, false);
    }
}
