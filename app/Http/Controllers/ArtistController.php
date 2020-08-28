<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\SUpport\Facades\Validator;
use App\Artist;
use DataTables;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::all();
        return view ('artist.index', [
                    'artists'=> $artists,
                    'resource'=> 'artistes',
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('artist.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $messages = [
            'requiered' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'firstname'=>'required|max:200',
            'lastname'=> 'required|max:200',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        $newArtist = new Artist;

        $newArtist->firstname = $request->input('firstname');
        $newArtist->lastname = $request->input('lastname');

        $newArtist->save();

        return redirect()->intended('/artist/'.$newArtist->id);
    }

    public function storeMany(request $request){

        $tabArtist = [] ;

        foreach($request->input('artists') as $artistFromAPI){
       
        $artist = Artist::where('firstname', $artistFromAPI['firstname'])->where('lastname', $artistFromAPI['lastname'])->first();

        if(!$artist){
           
            $artist = new Artist();

            $artist->firstname = $artistFromAPI['firstname'];
            $artist->lastname = $artistFromAPI['lastname'];
    
            $artist->save();
        }
        
             array_push($tabArtist, $artist->id);

        }

        return $tabArtist;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artist = Artist::find($id);

        return view ('artist.show',[
            'artist' => $artist,
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
        $artists = Artist::select('firstname', 'lastname' );
        return Datatables::of($artists)->make(true);
    }


    public function selectJson(Request $request){
        return Artist::where('firstname','like','%'.$request->input('search').'%')
        ->orWhere('lastname', 'like', '%'. $request->input('search').'%')->get();
    }

}
