<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Property;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->term)) {
        
            $Lead_list = Lead::where([['name', 'LIKE', '%' . $request->term . '%']])->get();
            $Property_list=Property::all();
        
        }
        elseif (!empty($request->start_date) && !empty($request->end_date)) {
        
            $Lead_list = Lead::where('created_at','>=', date($request->start_date).' 00:00:00')->where('created_at','<=', date($request->end_date).' 23:59:59')
            ->orWhere('property_id', $request->Property)->get();
            $Property_list=Property::all();
        
        }
        elseif(!empty($request->Property)){
            $Lead_list = Lead::Where('property_id', $request->Property)->get();
            $Property_list=Property::all();
        }
        else {
            $Lead_list=Lead::all();
            $Property_list=Property::all();
        }

        return view('admin.lead.index', ['Lead_list'=>$Lead_list,'Property_list'=>$Property_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Property_list=Property::all();
        return view('admin.lead.create', ['Property_list'=>$Property_list]);
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
            // "bhk" => ['required'],
            "name" => ['required'],
            "phone_no" => ['required'],
            "email" => ['required'],
            // "interested_in_loan" => ['required']
        ]);

        if($request->bhk){
            $bhk_eval = implode(",", $request->bhk);
        }

        $Lead = new Lead;
        if($request->bhk){
        $Lead->interested_in_bhk = $bhk_eval;
        }
        $Lead->name = $request->name;
        $Lead->property_id = $request->property_id;
        $Lead->phone_no = $request->phone_no;
        $Lead->email = $request->email;
        $Lead->message = $request->message;
        if($request->interested_in_loan){
        $Lead->interested_in_loan = $request->interested_in_loan;
        }
        $Lead->save();

        if (!$Lead) {
            return $this->responseRedirectBack('Error occurred while creating Lead.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.lead');
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
        $Lead_list = Lead::find($id);
        return view('admin.lead.details', ['Lead_list'=>$Lead_list]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Lead_list = Lead::find($id);
        $Property_list=Property::all();
        return view('admin.lead.edit', ['Lead_list'=>$Lead_list,'Property_list'=>$Property_list]);
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
            // "bhk" => ['required'],
            "name" => ['required'],
            "phone_no" => ['required'],
            "email" => ['required'],
            // "interested_in_loan" => ['required']
        ]);

        if($request->bhk){
            $bhk_eval = implode(",", $request->bhk);
        }

        $Lead = Lead::find($request->id);
        if($request->bhk){
        $Lead->interested_in_bhk = $bhk_eval;
        }
        $Lead->name = $request->name;
        $Lead->property_id = $request->property_id;
        $Lead->phone_no = $request->phone_no;
        $Lead->email = $request->email;
        $Lead->message = $request->message;
        $Lead->interested_in_loan = $request->interested_in_loan;
        $Lead->save();

        if (!$Lead) {
            return $this->responseRedirectBack('Error occurred while creating Lead.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.lead');
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
        $Lead = Lead::find($id);
        $Lead->delete();

        if (!$Lead) {
            return $this->responseRedirectBack('Error occurred while creating Lead.', 'error', true, true);
        }
        // return redirect('/options');
        return redirect()->route('admin.lead');
        // return $this->responseRedirect('admin.options', 'Payout has been created successfully', 'success', false, false);
    }
}
