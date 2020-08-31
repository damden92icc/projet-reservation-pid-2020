<?php

use Illuminate\Database\Seeder;
use App\Artist;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the table frst
           // reset the table frst
       DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Artist::truncate();
   // reset the table frst
   DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        // Create temp data
        $artists = [
            ['firstname'=> 'Daniel', 'lastname'=>'Marcelin'],
            ['firstname'=> 'Phillipe', 'lastname'=>'Laurent'],
            ['firstname'=> 'Marius', 'lastname'=>'Von May'],
            ['firstname'=> 'Oliver', 'lastname'=>'Von May'],
            ['firstname'=> 'Anne Marie', 'lastname'=>'Marcelin'],
            ['firstname'=> 'Pietro', 'lastname'=>'Nathan'],
            ['firstname'=> 'Laurent', 'lastname'=>'Raajh'],
            ['firstname'=> 'Elena', 'lastname'=>'Gomez'],
            ['firstname'=> 'Guillaume', 'lastname'=>'Anette'],
            ['firstname'=> 'Claude', 'lastname'=>'Perrez'],
            ['firstname'=> 'Laurence', 'lastname'=>'Marcelin'],
            ['firstname'=> 'Pierre', 'lastname'=>'Julon'],
            ['firstname'=> 'Gwendoline', 'lastname'=>'Goffin'],
            ['firstname'=> 'Anne Marie', 'lastname'=>'Manon'],
            ['firstname'=> 'Olivier', 'lastname'=>'Boudon'],


        ];

        // Insert data into the table
        foreach($artists as $data){
            DB::table('artists')->insert([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
            ]);
        }
    }
}
