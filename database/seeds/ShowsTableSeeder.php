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
         
        DB::statement('SET FOREIGN_KEY_CHECKS =0');
        Show::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

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
               'author'=>'createur du show',
           ],
           [
            'slug'=>null,
            'title'=> 'Ceci nest pas un chanteur belge',
            'description'=> 'non peut-etre ?',
            'poster_url'=>'cloclo.jpg',
            'location_slug'=>null,
            'bookable'=> false,
            'price'=> 5.50,
            'author'=>'createur du show',
            ],
            [
            'slug'=>null,
            'title'=> 'Maneken ...',
            'description'=> 'lorem ipsum maneken .... Sed uit',
            'poster_url'=>'maneken.jpg',
            'location_slug'=>'dexia-art-center',
            'bookable'=> true,
            'price'=> 10.50,
            'author'=>'createur du show',
            ],
            [
            'slug'=>null,
            'title'=> 'la potiche',
            'description'=> 'lorem ipsum maneken .... Sed uit',
            'poster_url'=>'lapotiche.jpg',
            'location_slug'=>'dexia-art-center',
            'bookable'=> true,
            'price'=> 10.50,
            'author'=>'createur du show',
            ],
            [
            'slug'=>null,
            'title'=> 'les rois mages mais pas sage',
            'description'=> 'lorem ipsum maneken .... Sed uit',
            'poster_url'=>'roimage.jpg',
            'location_slug'=>'dexia-art-center',
            'bookable'=> true,
            'price'=> 10.50,
            'author'=>'createur du show',
            ],    
            [
            'slug'=>null,
            'title'=> 'le vrais moliere',
            'description'=> 'lorem ipsum maneken .... Sed uit',
            'poster_url'=>'moliere.jpg',
            'location_slug'=>'dexia-art-center',
            'bookable'=> true,
            'price'=> 10.50,
            'author'=>'createur du show',
            ], 
            [
            'slug'=>'le-mariage-de-figaro',
            'title'=> 'Le mariage de Figaro',
            'description'=> 'lorem ipsum maneken .... Sed uit',
            'poster_url'=>'lapotiche.jpg',
            'location_slug'=>'dexia-art-center',
            'bookable'=> true,
            'price'=> 10.50,
            'author'=>'createur du show',
            ],
            [
            'slug'=>null,
            'title'=> 'Halmet',
            'description'=> 'lorem ipsum maneken .... Sed uit',
            'poster_url'=>'roimage.jpg',
            'location_slug'=>'dexia-art-center',
            'bookable'=> true,
            'price'=> 10.50,
            'author'=>'createur du show',
            ],    
            [
            'slug'=>null,
            'title'=> 'Don Juan',
            'description'=> 'lorem ipsum maneken .... Sed uit',
            'poster_url'=>'moliere.jpg',
            'location_slug'=>'dexia-art-center',
            'bookable'=> true,
            'price'=> 10.50,
            'author'=>'createur du show',
            ],    
            [
             'slug'=>null,
            'title'=> 'le chant des albatros',
            'description'=> 'lorem ipsum maneken .... Sed uit',
            'poster_url'=>'moliere.jpg',
            'location_slug'=>'dexia-art-center',
            'bookable'=> true,
            'price'=> 10.50,
            'author'=>'createur du show',
            ],    
            [
            'slug'=>'',
            'title'=> 'lLes fleurs de Jerusalem',
            'description'=> 'lorem ipsum maneken .... Sed uit',
            'poster_url'=>'moliere.jpg',
            'location_slug'=>'dexia-art-center',
            'bookable'=> true,
            'price'=> 10.50,
            'author'=>'createur du show',
            ],    
            [
            'slug'=>'',
            'title'=> 'halmet le vrais',
            'description'=> 'lorem ipsum maneken .... Sed uit',
            'poster_url'=>'moliere.jpg',
            'location_slug'=>'dexia-art-center',
            'bookable'=> true,
            'price'=> 10.50,
            'author'=>'createur du show',
            ], 
            
            [
            'slug'=>null,
            'title'=> 'Le Cid',
            'description'=> 'lorem ipsum maneken .... Sed uit',
            'poster_url'=>'moliere.jpg',
            'location_slug'=>'dexia-art-center',
            'bookable'=> true,
            'price'=> 10.50,
            'author'=>'createur du show',
            ],    
            [
            'slug'=>'',
            'title'=> 'Cyrano de Bergerac',
            'description'=> 'lorem ipsum maneken .... Sed uit',
            'poster_url'=>'moliere.jpg',
            'location_slug'=>'dexia-art-center',
            'bookable'=> true,
            'price'=> 10.50,
            'author'=>'createur du show',
            ],    
            [
            'slug'=>'',
            'title'=> 'Antigone',
            'description'=> 'lorem ipsum maneken .... Sed uit',
            'poster_url'=>'moliere.jpg',
            'location_slug'=>'dexia-art-center',
            'bookable'=> true,
            'price'=> 10.50,
            'author'=>'createur du show',
            ], 
            [
            'slug'=>'',
            'title'=> 'Romeo et Juliette',
            'description'=> 'lorem ipsum maneken .... Sed uit',
            'poster_url'=>'moliere.jpg',
            'location_slug'=>'dexia-art-center',
            'bookable'=> true,
            'price'=> 10.50,
            'author'=>'createur du show',
            ],       
            [
            'slug'=>'',
            'title'=> 'Caligula',
            'description'=> 'lorem ipsum maneken .... Sed uit',
            'poster_url'=>'moliere.jpg',
            'location_slug'=>'dexia-art-center',
            'bookable'=> true,
            'price'=> 10.50,
            'author'=>'createur du show',
            ],  
            [
            'slug'=>'',
            'title'=> 'Le Misanthrope',
            'description'=> 'lorem ipsum maneken .... Sed uit',
            'poster_url'=>'moliere.jpg',
            'location_slug'=>'dexia-art-center',
            'bookable'=> true,
            'price'=> 10.50,
            'author'=>'createur du show',
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
                'author'=> $data['author'],
        ]);
    }
    }
}
