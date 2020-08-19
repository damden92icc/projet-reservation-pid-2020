<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the table frst
        Role::truncate();
 
        // Create temp data
        $roles = [
            ['role'=> 'admin'],
            ['role'=> 'member'],
            ['role'=> 'affiliate'],
        ];
 
        // Insert data into the table
        foreach($roles as $data){
            DB::table('roles')->insert([
                'role' => $data['role'],
            ]);
        }
     }
}
