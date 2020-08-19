<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // reset the table frst
       Type::truncate();

       // Create temp data
       $types = [
           ['type'=> 'comedien'],
           ['type'=> 'scenographe'],
           ['type'=> 'auteur'],
       ];

       // Insert data into the table
       foreach($types as $data){
           DB::table('types')->insert([
               'type' => $data['type'],
           ]);
       }
    }
    
}
