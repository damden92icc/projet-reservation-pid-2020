<?php

use Illuminate\Database\Seeder;
use App\Locality;

class LocalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            // reset the table frst
            Locality::truncate();
     
            // Create temp data
            $localities = [
                ['postal_code'=> '1200', 'locality'=>'WSL'],
                ['postal_code'=> '1000', 'locality'=>'Brussels'],
                ['postal_code'=> '1030', 'locality'=>'Schaarbeak'],
                ['postal_code'=> '1040', 'locality'=>'Etterbeek'],
                ['postal_code'=> '1050', 'locality'=>'Ixelles'],

            ];
     
            // Insert data into the table
            foreach($localities as $data){
                DB::table('localities')->insert([
                    'postal_code' => $data['postal_code'],
                    'locality' => $data['locality'],
                ]);
            }
         }
    }
}
