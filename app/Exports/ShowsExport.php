<?php

namespace App\Exports;

use App\Show;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Http\Controllers\Controller;

class ShowsExport implements FromCollection
{
    public function collection()
    {
        return Show::all();
    }
}
