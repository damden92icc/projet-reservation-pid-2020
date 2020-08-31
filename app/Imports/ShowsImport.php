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

        $show = Show::where('slug', $row[2])->first();
        if (!$show){
            $show = new Show([
                'title'     => $row['title'],
                'slug'    => $row['slug'] ?? str_replace(' ', '-', trim(row['title']) ) , 
                ''
             ]);
        }

        return $show;
        
        
    }
}
