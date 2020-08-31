<?php

namespace App\Exports;

use App\Show;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Http\Controllers\Controller;

class ShowsExport implements FromCollection
{
    public function collection()
    {
        $showAll = Show::all();

        foreach($showAll as $show){
                //
                //
                // $authors = join
                $show['as'] = "";
                // foreach authors
                    // $shox['authors] = $ +  $author->first . ' '
        }

        return Show::all();
    }
}
