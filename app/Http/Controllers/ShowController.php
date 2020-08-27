<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Show;
use App\Location;
use App\ArtistType;
use App\Type;
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
    
        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'title'=>'required',
            'slug'=> ['required', 'unique:shows', 'max:255'],
            'description'=>'required',       
        ];

        $validtaro = Validator::make($request->all(), $rules, $messages);

        if($validtaro->fails()){
            return response()->json($validtaro->errors(), 422);
        }


        $newShow = new Show();

        $newShow->title = $request->input('title');
        $newShow->slug = $request->input('slug');
        $newShow->description = $request->input('description');
        $newShow->poster_url = $request->input('poster_url');

        $newShow->location()->associate(Location::find($request->input('location_id')));

        $newShow->bookable = $request->input('bookable');
        $newShow->price = $request->input('price');

        $newShow->save();
        

        if( ($request->input('authors')) != null) {
            foreach($request->input('authors') as $artistID){
                $this->linkShowArtist($artistID , 'auteur', $newShow);
            }
        }
        
        if(($request->input('scenographe')) != null) {
            foreach($request->input('scenographes') as $artistID){
                $this->linkShowArtist($artistID , 'scenographe', $newShow);
            }
        }
        
        if(($request->input('comediens')) != null) {
            foreach($request->input('comediens') as $artistID){
            $this->linkShowArtist($artistID, 'comedien', $newShow);
            }
        }
      
       return response()->json($newShow, 201);  
    }


    private function linkShowArtist($artistID, $type, $show){
        $t = Type::where('type', $type)->first();
        $artist_type = ArtistType::where('artist_id' , $artistID)->where('type_id', $t->id)->first();
        if(!$artist_type){
            $artist_type = new ArtistType();
            $artist_type->artist_id = $artistID;
            $artist_type->type_id = $t->id;
            $artist_type->save();
        }
        $show->artistType()->attach($artist_type);
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

        if(!isset($show->artistType)){

        }

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

}
