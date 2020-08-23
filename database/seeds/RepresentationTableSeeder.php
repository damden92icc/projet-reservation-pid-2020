<?php

use Illuminate\Database\Seeder;
use App\Representation;
use App\Location;
use App\Show;


class RepresentationTableSeeder extends Seeder
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
        Representation::truncate();
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        // Define data

        $representations = [
            [
                'location_slug'=>'espace-delvaux-la-venerie',
                'show_slug'=> 'ayiti',
                'when'=> '2012-10-12 13:30',
            ],
            [
                'location_slug'=>'dexia-art-center',
                'show_slug'=> 'ayiti',
                'when'=> '2012-10-12 20:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'maneken',
                'when'=> '2012-10-12 20:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'ceci-nest-pas-un-chanteur-belge',
                'when'=> '2012-10-12 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'ceci-nest-pas-un-chanteur-belge',
                'when'=> '2012-12-12 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'ceci-nest-pas-un-chanteur-belge',
                'when'=> '2012-12-09 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'le-mariage-de-figaro',
                'when'=> '2012-12-12 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'le-mariage-de-figaro',
                'when'=> '2012-11-12 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'le-mariage-de-figaro',
                'when'=> '2012-02-12 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'le-mariage-de-figaro',
                'when'=> '2012-11-12 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'don-juan',
                'when'=> '2012-11-12 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'don-juan',
                'when'=> '2012-05-12 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'don-juan',
                'when'=> '2012-08-12 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'don-juan',
                'when'=> '2012-11-10 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'don-juan',
                'when'=> '2012-11-10 23:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'don-juan',
                'when'=> '2012-11-11 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'halmet',
                'when'=> '2012-11-11 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'halmet',
                'when'=> '2012-11-11 13:30',
            ],
            
            [
                'location_slug'=>null,
                'show_slug'=> 'le-chant-des-albatros',
                'when'=> '2012-11-11 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'halmet-le-vrais',
                'when'=> '2012-11-11 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'cyrano-de-bergerac',
                'when'=> '2012-11-11 13:30',
            ],
            
            [
                'location_slug'=>null,
                'show_slug'=> 'antigone',
                'when'=> '2012-11-11 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'le-cid',
                'when'=> '2012-11-11 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'le-misanthrope',
                'when'=> '2012-11-11 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'caligula',
                'when'=> '2012-11-11 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'romeo-et-juliette',
                'when'=> '2012-11-11 13:30',
            ],
        ];

             // Insert data into the table
             foreach($representations as $data){

                $location = Location::firstWhere('slug',$data['location_slug']);
                $show = Show::firstWhere('slug', $data['show_slug']);

                DB::table('representations')->insert([
                    'location_id' => $location->id ?? null,
                    'show_id' =>$show->id,
                    'when' => $data['when'],
                ]);
            }
    }
}
