<?php

use Illuminate\Database\Seeder;
use App\Locality;
use App\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            // reset the table frst
            Location::truncate();
     
            // Create temp data
            $locations = [
                [  
                 'slug'=>null,
                'designation'=> ' Espace Delvaux / La venerie',
                'address' => '3 Rue de Grates',
                'locality_postal_code'=>'1000',
                'website' => 'https://www.lavenerie.be',
                'phone'=> '+32 (0)2/222.22.22',
                ],
                [  
                 'slug'=>null,
                'designation'=> ' Dexia Art Center',
                'address' => '50 rue du chevalier',
                'locality_postal_code'=>'1000',
                'website' => null,
                'phone'=> null,
                ],
                [   
                'slug'=>null,
                'designation'=> ' La samaritaine',
                'address' => '16 Rue de la Samaritaine',
                'locality_postal_code'=>'1000',
                'website' => 'https://www.lasamaritiaine.be',
                'phone'=> null,
                ],
                [
                'slug'=>null,
                'designation'=> ' Espace Magh',
                'address' => '17 Rue du Poincon',
                'locality_postal_code'=>'1200',
                'website' => 'https://www.espacemagh.be',
                'phone'=> '+32 (0)2/333.76.22',
                ],
            ];
     
            // Insert data into the table
            foreach($locations as $data){
                // retrieve localities
                $locality = Locality::firstWhere('postal_code',$data['locality_postal_code']);
        
                // seed locations

                DB::table('locations')->insert([
                    'slug' => Str::slug($data['designation'],'-'),
                    'designation'=> $data['designation'],
                    'address' => $data['address'],
                    'locality_id' => $locality->id, // Ref to localities table
                    'website'=> $data['website'],
                    'phone'=>$data['phone'], 
                ]);
            }
         
    }
}
