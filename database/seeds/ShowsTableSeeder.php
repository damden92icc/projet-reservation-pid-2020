<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Location;
use App\Show;

class ShowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // reset the table frst
       Show::truncate();

       // Defining data
       $shows = [
           [
               'slug'=>null,
               'title'=> 'Ayiti',
               'description'=> 'lorem ipsum 1',
               'poster_url'=>'ayiti.jpg',
               'location_slug'=>'espace-delvaux-la-venerie',
               'bookable'=> true,
               'price'=> 9.00,
           ],
           [
            'slug'=>null,
            'title'=> 'Ceci nest pas un chanteur belge',
            'description'=> 'non peut-etre ?',
            'poster_url'=>'cloclo.jpg',
            'location_slug'=>null,
            'bookable'=> false,
            'price'=> 5.50,
            ],
            [
            'slug'=>null,
            'title'=> 'Maneken ...',
            'description'=> 'lorem ipsum maneken .... Sed uit',
            'poster_url'=>'maneken.jpg',
            'location_slug'=>'dexia-art-center',
            'bookable'=> true,
            'price'=> 10.50,
            ],
            ];


       // Insert data into the table
            foreach($shows as $data){
            $location = Location::firstWhere('slug',$data['location_slug']);

            DB::table('shows')->insert([
            
                'slug'=> Str::slug($data['title'],'-'),
                'title'=> $data['title'],
                'description'=> $data['description'],
                'poster_url'=> $data['poster_url'],
                'location_id'=> $location->id ?? null,
                'bookable'=> $data['bookable'],
                'price'=> $data['price'],
        ]);
    }
    }
}
