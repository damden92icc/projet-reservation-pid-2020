<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Representation;

class RepresentationUserTableSeeder extends Seeder
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
          DB::table('representation_user')->truncate();
          
          DB::statement('SET FOREIGN_KEY_CHECKS = 1');
  
  
          $representationUsers = [
              [
                  'when'=>'2012-10-12 13:30:00',
                  'login'=>'superoot',
                  'places'=> 324,
              ],
              [
               'when'=>'2012-10-12 13:30:00',
               'login'=>'lion',
               'places'=> 54,
           ],
           [
               'when'=>'2012-10-12 13:30:00',
               'login'=>'wiz',
               'places'=> 300,
           ],
          ];

          foreach($representationUsers as $data){
           // search for user
           $user = User::firstWhere('login',$data['login']);
          
           // search for representation
           $representation = Representation::firstWhere('when',$data['when']); 
      

           // insert data into table
           DB::table('representation_user')->insert([
               'representation_id'=> $representation->id,
               'user_id'=>$user->id,
               'places'=> $data['places'],
           ]);
    
}
    }
}
