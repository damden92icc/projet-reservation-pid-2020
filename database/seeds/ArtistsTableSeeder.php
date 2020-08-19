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
        Artist::truncate();

        // Create temp data
        $artists = [
            ['firstname'=> 'Daniel', 'lastname'=>'Marcelin'],
            ['firstname'=> 'Phillipe', 'lastname'=>'Laurent'],
            ['firstname'=> 'Marius', 'lastname'=>'Marcelin'],
            ['firstname'=> 'Oliver', 'lastname'=>'Marcelin'],
            ['firstname'=> 'Anne Marie', 'lastname'=>'Marcelin'],
            ['firstname'=> 'Pietro', 'lastname'=>'Marcelin'],
            ['firstname'=> 'Laurent', 'lastname'=>'Marcelin'],
            ['firstname'=> 'Elena', 'lastname'=>'Marcelin'],
            ['firstname'=> 'Guillaume', 'lastname'=>'Marcelin'],
            ['firstname'=> 'Claude', 'lastname'=>'Marcelin'],
            ['firstname'=> 'Laurence', 'lastname'=>'Marcelin'],
            ['firstname'=> 'Pierre', 'lastname'=>'Marcelin'],
            ['firstname'=> 'Gwendoline', 'lastname'=>'Marcelin'],
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
