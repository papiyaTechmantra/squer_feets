<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscribers;

class SubscribersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->term)) {
        
            $Subscribers_list = Subscribers::where([['email', 'LIKE', '%' . $request->term . '%']])->get();
        
        } else {
            $Subscribers_list=Subscribers::all();
        }

        return view('admin.subscribers.index', ['Subscribers_list'=>$Subscribers_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subscribers.create');
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
            "email" => ['required'],
        ]);


        $Subscribers = new Subscribers;
        $Subscribers->email = $request->email;
        $Subscribers->save();

        if (!$Subscribers) {
            return $this->responseRedirectBack('Error occurred while creating Subscribers.', 'error', true, true);
        }

        return redirect()->route('admin.subscribers');
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
        $Subscribers_list = Subscribers::find($id);
        return view('admin.subscribers.details', ['Subscribers_list'=>$Subscribers_list]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Subscribers_list = Subscribers::find($id);
        return view('admin.subscribers.edit', ['Subscribers_list'=>$Subscribers_list]);
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
            "email" => ['required'],
        ]);


        $Subscribers = Subscribers::find($request->id);
        $Subscribers->email = $request->email;
        $Subscribers->save();

        if (!$Subscribers) {
            return $this->responseRedirectBack('Error occurred while creating Subscribers.', 'error', true, true);
        }

        return redirect()->route('admin.subscribers');
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
        $Subscribers = Subscribers::find($id);
        $Subscribers->delete();

        if (!$Subscribers) {
            return $this->responseRedirectBack('Error occurred while creating Subscribers.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.subscribers');
        // return $this->responseRedirect('admin.options', 'Payout has been created successfully', 'success', false, false);
    }
}
