<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Show;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\ShowsExport;

class ShowExportController extends Controller
{
      /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new ShowsExport, 'test-show.xlsx');
    }
}
