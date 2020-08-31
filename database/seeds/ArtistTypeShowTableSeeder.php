<?php

use Illuminate\Database\Seeder;
use App\Artist;
use App\Type;
use App\ArtistType;
use App\Show;

class ArtistTypeShowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // reset the table frst
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('artist_type_show')->truncate();
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');


        // Define data

        $artistTypeShows = [
            [
                'artist_firstname'=> 'Daniel',
                'artist_lastname'=>'Marcelin',
                'type'=> 'auteur',
                'show_slug'=> 'ayiti',
            ],
            [
                'artist_firstname'=> 'Phillipe',
                'artist_lastname'=>'Laurent',
                'type'=> 'auteur',
                'show_slug'=> 'ayiti',
            ],
            [
                'artist_firstname'=> 'Daniel',
                'artist_lastname'=>'Marcelin',
                'type'=> 'scenographe',
                'show_slug'=> 'ayiti',
            ],
            [
                'artist_firstname'=> 'Phillipe',
                'artist_lastname'=>'Laurent',
                'type'=> 'scenographe',
                'show_slug'=> 'ayiti',
            ],
            [
                'artist_firstname'=> 'Daniel',
                'artist_lastname'=>'Marcelin',
                'type'=> 'comedien',
                'show_slug'=> 'ayiti',
            ],
            [
                'artist_firstname'=> 'Marius',
                'artist_lastname'=>'Von May',
                'type'=> 'auteur',
                'show_slug'=> 'le-cid',
            ],
            [
                'artist_firstname'=> 'Marius',
                'artist_lastname'=>'Von May',
                'type'=> 'scenographe',
                'show_slug'=> 'le-cid',
            ],
            [
                'artist_firstname'=> 'Marius',
                'artist_lastname'=>'Von May',
                'type'=> 'comedien',
                'show_slug'=> 'le-cid',
            ],
         
            [
                'artist_firstname'=> 'Olivier',
                'artist_lastname'=>'Boudon',
                'type'=> 'comedien',
                'show_slug'=> 'le-cid',
            ],
            [
                'artist_firstname'=> 'Olivier',
                'artist_lastname'=>'Boudon',
                'type'=> 'comedien',
                'show_slug'=> 'antigone',
            ],
            [
                'artist_firstname'=> 'Olivier',
                'artist_lastname'=>'Boudon',
                'type'=> 'auteur',
                'show_slug'=> 'le-cid',
            ],
            [
                'artist_firstname'=> 'Anne Marie',
                'artist_lastname'=>'Manon',
                'type'=> 'scenographe',
                'show_slug'=> 'le-cid',
            ],
       
        ];

  


        foreach($artistTypeShows as $data){
            // search forst artist
            $artist = Artist::where([
                ['firstname','=',$data['artist_firstname']],
                ['lastname','=',$data['artist_lastname']]
            ])->first();

            $type = Type::firstWhere('type',$data['type']);
            
            // search for artist type
            $artistType = ArtistType::where([
                ['artist_id','=',$artist->id],
                ['type_id','=',$type->id]
            ])->first();

            // search for show slog
            $show = Show::firstWhere('slug',$data['show_slug']);

            // insert data into table
            DB::table('artist_type_show')->insert([
                'artist_type_id'=>$artistType->id,
                'show_id'=>$show->id,
            ]);
        }
        
    }
}
