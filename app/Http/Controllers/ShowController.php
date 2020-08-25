<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Show;
use DataTables;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = Show::paginate(5);
        return view ('show.index', [
                    'shows'=> $shows,
                    'resource'=> 'spectacle',
                    ]);                 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('show.create', [
            ]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //      'slug', 'title', 'description', 'poster_url', 'location_id', 'bookable','price',
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Show::find($id);
        // Retrieve all artist from show and group by type
        $collaborateurs = [];

        foreach( $show->artistType as $at){
            $collaborateurs[$at->type->type][] = $at->artist;
        
        }
        
       // dd($collaborateurs);
    

        return view('show.show',[
            'show' => $show,
            'collaborateurs'=> $collaborateurs,
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

    
    public function indexAjax(){

        $shows = Show::select('title', 'description', 'price', 'bookable' );
        return Datatables::of($shows)->make(true);
    }
}
