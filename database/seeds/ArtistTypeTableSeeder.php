<?php

use Illuminate\Database\Seeder;
use App\ArtistType;
use App\Artist;
use App\Type;

class ArtistTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
              // reset the table frst
              DB::statement('SET FOREIGN_KEY_CHECKS = 0');
              DB::table('artist_type')->truncate();
              
              DB::statement('SET FOREIGN_KEY_CHECKS = 1');

              // Define Data
              $artistTypes = [
                  [
                      'artist_firstname'=> 'Daniel',
                      'artist_lastname'=> 'Marcelin',
                      'type'=> 'auteur',
                  ],
                  [
                    'artist_firstname'=> 'Phillipe',
                    'artist_lastname'=> 'Laurent',
                    'type'=> 'auteur',
                ],
                [
                    'artist_firstname'=> 'Daniel',
                    'artist_lastname'=> 'Marcelin',
                    'type'=> 'scenographe',
                ],  
                [
                    'artist_firstname'=> 'Phillipe',
                    'artist_lastname'=> 'Laurent',
                    'type'=> 'scenographe',
                ],
                [
                    'artist_firstname'=> 'Daniel',
                    'artist_lastname'=> 'Marcelin',
                    'type'=> 'comedien',
                ],
                [
                    'artist_firstname'=> 'Marius',
                    'artist_lastname'=> 'Von May',
                    'type'=> 'auteur',
                ],
                [
                    'artist_firstname'=> 'Olivier',
                    'artist_lastname'=> 'Boudon',
                    'type'=> 'auteur',
                ],
                [
                    'artist_firstname'=> 'Anne Marie',
                    'artist_lastname'=> 'Manon',
                    'type'=> 'comedien',
                ],
              ];

              // insert data in the table
              foreach($artistTypes as $data){
                $artist = Artist::where([
                    ['firstname','=',$data['artist_firstname'] ],
                    ['lastname','=',$data['artist_lastname']],
                ])->first();

                $type = Type::firstWhere('type',$data['type']);

              //  dd($artist->id);

                DB::table('artist_type')->insert([
                     'artist_id'=> $artist->id,
                     'type_id'=> $type->id,   

                ]);
              }
    }
}
