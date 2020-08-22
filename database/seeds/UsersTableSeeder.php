<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS =0');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');


        $Users = [
            [
                'login'=>'superoot',
                'email'=> 'demo@demo.com',
                'password'=> '123',
                'firstname'=>'Charles',
                'lastname'=> 'Julien',
                'langue' => 'FR',
            ],
            [
                'login'=>'user-1',
                'email'=> 'user@demo.com',
                'password'=> '123',
                'firstname'=>'Richou',
                'lastname'=> 'Marcel',
                'langue' => 'FR',
            ],
            [
                'login'=>'wiz',
                'email'=> 'demo-wiz@demo.com',
                'password'=> '123',
                'firstname'=>'Manfred',
                'lastname'=> 'Jaguar',
                'langue' => 'FR',
            ],
            [
                'login'=>'lion',
                'email'=> 'demo-lion@demo.com',
                'password'=> '123',
                'firstname'=>'Petter',
                'lastname'=> 'Greffin',
                'langue' => 'FR',
            ],
            [
                'login'=>'simpson',
                'email'=> 'demo-marge@demo.com',
                'password'=> '123',
                'firstname'=>'Marge',
                'lastname'=> 'Simpson',
                'langue' => 'FR',
            ],
        ];

          
            // Insert data into the table
            foreach($Users as $data){
         
                DB::table('users')->insert([
                    'login'=>$data['login'],
                    'email'=> $data['email'],
                    'password'=> $data['password'],
                    'firstname'=>$data['firstname'],
                    'lastname'=> $data['lastname'],
                    'langue' => $data['langue'],
                 
            ]);
    }
}
}
