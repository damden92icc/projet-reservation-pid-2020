<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Locality;

class LocalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localities = Locality::all();
        return view ('locality.index', [
                    'localities'=> $localities,
                    'resource'=> 'localities',
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locality.create');
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
            'required' => 'Ce champs ne peut etre vide',
            'integer'=>'code postal invalide'
        ];

        $rules = [
            'postal_code'=>'required|integer',
            'locality'=> 'required|max:200',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        $newLocality = new Locality();

        $newLocality->postal_code = $request->input('postal_code');
        $newLocality->locality = $request->input('locality');

        $newLocality->save();


        return redirect()->intended('/locality/'. $newLocality->id);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locality = Locality::find($id);

        return view ('locality.show',[
            'locality' => $locality,
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

    public function selectJson(Request $request){
        return Locality::where('locality','like','%'.$request->input('search').'%')
        ->orWhere('postal_code', '=', $request->input('search'))->get();
    }
}
