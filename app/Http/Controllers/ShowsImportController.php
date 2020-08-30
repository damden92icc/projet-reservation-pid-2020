<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\ShowsImport;

class ShowsImportController extends Controller
{
    
    public function import(Request $request) 
    {
     //   ;




     $request->validate([

        'file' => 'required|mimes:pdf,xlx,csv,xlsx|max:2048',

    ]);


   
    $fileName = time().'.'.$request->file->extension();

   // dd($fileName);
    $request->file->move(public_path('uploads'), $fileName);


    
  //  Excel::import(new ShowsImport, request()->file($fileName));
    
  Excel::import(new SHowsImport, public_path('uploads/'.$fileName));
       // return redirect('/')->with('success', 'All good!');
    }
}
