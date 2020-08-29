<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Representation;
use Carbon\Carbon;
use Illuminate\SUpport\Facades\Validator;

class RepresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $representations = Representation::all();

        return view('representation.index',[
            'representations' => $representations,
            'resource' => 'représentations',
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
    public function store(Request $request)
    {
        $messages = [
            'requiered' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'location_id'=>'required',
            'show_id'=> 'required',
            'when'=> 'required',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        $representation = new Representation();

        $representation->location_id = $request->input('location_id');
        $representation->show_id = $request->input('show_id');
        $representation->when = $request->input('when');
        
        $representation->save();
        return response()->json($representation, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $representation = Representation::find($id);
        $date = Carbon::parse($representation->when)->format('d/m/Y');
        $heure  = Carbon::parse($representation->when)->format('G:i');

        return view('representation.show',[
            'representation'=> $representation,
            'date'=>$date,
            'heure'=> $heure,
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

