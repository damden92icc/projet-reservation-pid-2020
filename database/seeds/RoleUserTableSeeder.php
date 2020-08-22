<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS =0');
        DB::table('role_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $roleUsers = [
            [
                'role'=>'admin',
                'user_login'=> 'lion',
                
            ],
            [
                'role'=>'affiliate',
                'user_login'=> 'lion',
                
            ],
            [
                'role'=>'admin',
                'user_login'=> 'simpson',
                
            ],
            [
                'role'=>'admin',
                'user_login'=> 'wiz',
                
            ],
        ];

     
            // Insert data into the table
            foreach(  $roleUsers as $data){
                // Looking for role obj
                $role = Role::firstWhere('role',$data['role']);
                // looking for user obj
                $user = User::firstWhere('login',$data['user_login']);
                
             
    
                DB::table('role_user')->insert([
                    'role_id'=> $role->id,
                    'user_id'=> $user->id,
            ]);


    
    }
}
}
