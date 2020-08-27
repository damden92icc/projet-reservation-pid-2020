<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

use App\Location;
use App\Locality;
use DataTables;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        return view ('location.index', [
                    'locations'=> $locations,
                    'resource'=> 'locations',
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
      
         $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [

            'designation'=>'required',
            'address'=>'required',
            'locality_id'=>'required',
            'slug'=> ['required', 'unique:locations', 'max:255'],
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        $newLocation = new Location();


        $newLocation->slug = $request->input('slug');
        $newLocation->designation = $request->input('designation');
        $newLocation->address = $request->input('address');
        $newLocation->locality()->associate(Locality::find($request->input('locality_id')));
        $newLocation->locality_id = $request->input('locality_id');
        $newLocation->website= $request->input('website') ?? 'none';
        $newLocation->phone = $request->input('phone') ?? 'none';
        
        $newLocation->save();

        return view('location.show',[
            'location' => $newLocation,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::find($id);

        return view('location.show',[
            'location' => $location,
        ]);
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

    

    
    
    public function datatableJson(){

        $locations = Location::select( 'designation', 'address', 'phone', 'website' );
        return Datatables::of($locations)->make(true);
    }

    public function selectJson(Request $request){
        return Location::where('designation','like','%'.$request->input('search').'%')
        ->orWhere('address', 'like', '%'. $request->input('search').'%')->get();
    }

}