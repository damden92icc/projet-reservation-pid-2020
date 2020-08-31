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
                'show_slug'=> 'le-cid',
                'when'=> '2012-10-12 20:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'le-cid',
                'when'=> '2012-10-12 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'antigone',
                'when'=> '2012-11-12 13:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=> 'antigone',
                'when'=> '2014-11-12 13:30',
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
