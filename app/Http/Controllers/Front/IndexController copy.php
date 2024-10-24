<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Property;
use App\Models\Property_image;
use App\Models\Property_variation;
use App\Models\Amenity;
use App\Models\Locality;
use App\Models\News;
use App\Models\Blog;
use App\Models\Lead;
use App\Models\Review;
use App\Models\Subscribers;
use App\Models\Banner;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$Property_list=Property::with('PropertyVariation')->get();
        $Villas_Property=Property::where('category', 'villas')->get();
        $Apartments_Property=Property::where('category', 'apartments')->get();
        $Deplux_Property=Property::where('category', 'deplux')->get();
        $Banner=Banner::all()->take(1);
        $Locality=Locality::all();
        $News=News::all()->take(4);
        $Review=Review::all();
        $Blog=Blog::all()->take(3);
        return view('index', ['Villas_Property'=>$Villas_Property,'Banner'=>$Banner,'News'=>$News,'Locality'=>$Locality, 'Review'=>$Review, 'Blog'=>$Blog,'Apartments_Property'=>$Apartments_Property,'Deplux_Property'=>$Deplux_Property]);
    }

    public function subscribers_store(Request $request)
    {
        
        // dd($request->all());
        $request->validate([
            "email" => 'required|email',
        ]);


        $Subscribers = new Subscribers;
        $Subscribers->email = $request->email;
        $Subscribers->save();

        if (!$Subscribers) {
            return $this->responseRedirectBack('Error occurred while creating Subscribers.', 'error', true, true);
        }

        return redirect()->back();
        // return $this->responseRedirect('admin.options', 'Payout has been created successfully', 'success', false, false);
    }

    public function contact_us(){
        return view('contact-us');
    }

    public function why_us(){
        return view('why-us');
    }

    public function sectors(){
        return view('sectors');
    }

    public function property_buying(){
        return view('property-buying');
    }

    public function property_selling(){
        return view('property-selling');
    }

    public function property_leasing(){
        return view('property-leasing');
    }
    
    public function privacy_policy(){
        return view('privacy_policy');
    }
    
    public function terms_conditions(){
        return view('term_condition');
    }

    public function about_us(){
        return view('about-us');
    }

    // public function property_listing(Request $request){

    //     // dd($request->all());
        
    //     if (!empty($request->new_arrival) || !empty($request->most_popular) || !empty($request->recent_venue) || !empty($request->upcoming_property)) {
    //         $Property_listing = Property::orwhere('new_arrival', $request->new_arrival )->orwhere('most_popular', $request->most_popular )
    //         ->orwhere('recent_venue', $request->recent_venue )->orwhere('upcoming_property', $request->upcoming_property )->get();
    //         $Locality=Locality::all();
    //     }
    //     elseif (!empty($request->collection)) {
    //         $Property_listing = Property::orwhere('new_arrival', $request->collection )
    //         ->orWhere('most_popular', $request->collection )->orWhere('recent_venue', $request->collection )
    //         ->orWhere('upcoming_property', $request->collection )->get();
    //         $Locality=Locality::all();
    //     }
    //     // elseif (!empty($request->category) && empty($request->location) && empty($request->configurations)) {
    //     //     $Property_listing = Property::where([['category', $request->category ]])->get();
    //     //     $Locality=Locality::all();
    //     // }
    //     // elseif (!empty($request->category) && !empty($request->location) && empty($request->configurations)) {
    //     //     $Property_listing = Property::where([['category', 'LIKE',  $request->category ]])
    //     //     ->Where('location', 'LIKE', $request->location )->get();
    //     //     $Locality=Locality::all();
    //     // }
    //     elseif (!empty($request->location)) {
    //         $Property_listing = Property::Where('location', 'LIKE', $request->location )->get();
    //         $Locality=Locality::all();
    //     }
    //     else {
    //         $Property_listing=Property::all();
    //         $Locality=Locality::all();
    //     }

    //     return view('property_listing', ['Property_listing'=>$Property_listing,'Locality'=>$Locality]);
    // }

    public function property_listing(Request $request)
    {
        $query = Property::query();

        // Filter by location
        if (!empty($request->location)) {
            $query->where('location', 'LIKE', '%' . $request->location . '%');
        }

        // Filter by bedrooms
        if (!empty($request->bedrooms)) {
            $query->where('No_of_bedroom', $request->bedrooms);
        }

        // Filter by kitchens
        if (!empty($request->kitchens)) {
            $query->where('No_of_kitchen', $request->kitchens);
        }

        // Filter by price range
        if (!empty($request->min_price) && !empty($request->max_price)) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        // Filter by area (square feet)
        if (!empty($request->min_area) && !empty($request->max_area)) {
            $query->whereBetween('property_Area', [$request->min_area, $request->max_area]);
        }

        // Filter by property attributes (new_arrival, most_popular, recent_venue, upcoming_property)
        if (!empty($request->new_arrival) || !empty($request->most_popular) || !empty($request->recent_venue) || !empty($request->upcoming_property)) {
            $query->orWhere(function ($q) use ($request) {
                $q->orWhere('new_arrival', $request->new_arrival)
                ->orWhere('most_popular', $request->most_popular)
                ->orWhere('recent_venue', $request->recent_venue)
                ->orWhere('upcoming_property', $request->upcoming_property);
            });
        }

        // Filter by collection
        if (!empty($request->collection)) {
            $query->orWhere(function ($q) use ($request) {
                $q->orWhere('new_arrival', $request->collection)
                ->orWhere('most_popular', $request->collection)
                ->orWhere('recent_venue', $request->collection)
                ->orWhere('upcoming_property', $request->collection);
            });
        }

        // Execute the query and get the results
        $Property_listing = $query->get();

        // Fetch all localities
        $Locality = Locality::all();

        // Return the view with the filtered results
        return view('property_listing', compact('Property_listing', 'Locality'));
    }


    public function property_listing_city(Request $request,$city){
        if (!empty($request->filter)) {
            $Property_listing = Property::where('category', $request->filter )->where('location', $city)->get();
            $Locality=Locality::all();
        } else {
            $Property_listing = Property::where('location', $city)->get();
            $Locality=Locality::all();
        }
        return view('property_listing', ['Property_listing'=>$Property_listing,'Locality'=>$Locality]);
    }

    public function property_details($slug, $uid) {
        dd($slug, $uid);
        $Property_details = Property::where('slug', $slug)->where('uid', $uid)->firstOrFail();
    
        $Property_variation = Property_variation::where('property_id', $Property_details->id)->get();
        $Property_Images = Property_image::where('property_id', $Property_details->id)->get();
        $Locality = Locality::all();
    
        return view('property_details', [
            'Property_details' => $Property_details,
            'Property_variation' => $Property_variation,
            'Property_Images' => $Property_Images,
            'Locality' => $Locality
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_lead(Request $request)
    {
        // dd($request->all());

        $request->validate([
            "name" => ['required'],
            "phone_no" => ['required'],
            "email" => ['required']
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
        $Lead->interested_in_loan = $request->interested_in_loan;
        $Lead->save();

        if (!$Lead) {
            return $this->responseRedirectBack('Error occurred while creating Lead.', 'error', true, true);
        }
        // return redirect('/options');
        Session::flash('success', "Thank You, Your request submited.");
        return redirect()->back();
    }

    public function blog_list(){
        $Blog=Blog::all();
        $Locality=Locality::all();
        return view('blog', ['Blog'=>$Blog,'Locality'=>$Locality]);
    }

    public function blog_details($id){
        $Blog=Blog::find($id);
        $Locality=Locality::all();
        return view('blog-details', ['Blog'=>$Blog,'Locality'=>$Locality]);
    }

    public function news_list(){
        $News=News::all();
        $Locality=Locality::all();
        return view('news', ['News'=>$News,'Locality'=>$Locality]);
    }

    public function news_details($id){
        $News=News::find($id);
        $Locality=Locality::all();
        return view('news-details', ['News'=>$News,'Locality'=>$Locality]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
