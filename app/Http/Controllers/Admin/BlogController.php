<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->term)) {
        
            $Blog_list = Blog::where([['title', 'LIKE', '%' . $request->term . '%']])
            ->orWhere('discription', 'LIKE', '%' . $request->term . '%')->get();
        
        } else {
            $Blog_list=Blog::all();
        }

        return view('admin.blog.index', ['Blog_list'=>$Blog_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            "blog_title" => ['required'],
            "blog_sub_title" => ['required'],
            "blog_discription" => ['required'],
            "blog_status" => ['required'],
            
            "blog_image" => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);


        if($request->hasFile('blog_image')){

            $file = $request->File('blog_image');
            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $location = 'uploads/admin/blogs';
            // Upload file
            $file->move($location, $filename);
            // File path
            $blogs_image_filepath = ($location . "/" . $filename);
        }


        $Blog = new Blog;
        $Blog->title = $request->blog_title;
        $Blog->sub_title = $request->blog_sub_title;
        $Blog->discription = $request->blog_discription;
        $Blog->image = $blogs_image_filepath;
        $Blog->status = $request->blog_status;
        $Blog->save();

        if (!$Blog) {
            return $this->responseRedirectBack('Error occurred while creating Blog.', 'error', true, true);
        }

        return redirect()->route('admin.blog');
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
        $Blog_list = Blog::find($id);
        return view('admin.blog.details', ['Blog_list'=>$Blog_list]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Blog_list = Blog::find($id);
        return view('admin.blog.edit', ['Blog_list'=>$Blog_list]);
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
            "blog_title" => ['required'],
            "blog_sub_title" => ['required'],
            "blog_discription" => ['required'],
            "blog_status" => ['required'],
            
            "blog_image" => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);


        if($request->hasFile('blog_image')){

            $file = $request->File('blog_image');
            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $location = 'uploads/admin/blogs';
            // Upload file
            $file->move($location, $filename);
            // File path
            $blogs_image_filepath = ($location . "/" . $filename);
        }


        $Blog = Blog::find($request->id);
        $Blog->title = $request->blog_title;
        $Blog->sub_title = $request->blog_sub_title;
        $Blog->discription = $request->blog_discription;
        
        $Blog->status = $request->blog_status;
        if($request->blog_image){
            $Blog->image = $blogs_image_filepath;
        }
        $Blog->save();

        if (!$Blog) {
            return $this->responseRedirectBack('Error occurred while creating Blog.', 'error', true, true);
        }

        return redirect()->route('admin.blog');
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
        $Blog = Blog::find($id);
        $Blog->delete();

        if (!$Blog) {
            return $this->responseRedirectBack('Error occurred while creating Blog.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.blog');
        // return $this->responseRedirect('admin.options', 'Payout has been created successfully', 'success', false, false);
    }
}
