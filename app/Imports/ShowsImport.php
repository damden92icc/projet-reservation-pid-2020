<?php

namespace App\Imports;

use App\Show;
use Maatwebsite\Excel\Concerns\ToModel;

class ShowsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

  
        
        return new Show([
            'title'     => $row[1],
            'slug'    => $row[2], 
     
         ]);
        
    }
}
