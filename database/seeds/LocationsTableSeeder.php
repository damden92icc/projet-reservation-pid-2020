<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            Location::truncate();
            
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        
     
            // Create temp data
            $locations = [
                [  
                 'slug'=>null,
                'designation'=> 'Le Belvédère',
                'address' => 'Rue Braemt, 64-70',
                'locality_postal_code'=>'1170',
                'website' => 'https://www.lepublic.be',
                'phone'=> '+32 (0)2/222.22.22',
                ],
                [  
                 'slug'=>null,
                'designation'=> 'Dexia Art Center',
                'address' => '50 rue du chevalier',
                'locality_postal_code'=>'1040',
                'website' => null,
                'phone'=> null,
                ],
                [   
                'slug'=>'la-samaritaine',
                'designation'=> 'La samaritaine',
                'address' => '16 Rue de la Samaritaine',
                'locality_postal_code'=>'1000',
                'website' => 'https://www.lasamaritiaine.be',
                'phone'=> null,
                ],
                [
                'slug'=>null,
                'designation'=> ' Espace Magh',
                'address' => '17 Rue du Poincon',
                'locality_postal_code'=>'1000',
                'website' => 'https://www.espacemagh.be',
                'phone'=> '+32 (0)2/333.76.22',
                ],
                [
                'slug'=>null,
                'designation'=> 'ALL.',
                'address' => 'Square Sainctelette, 19',
                'locality_postal_code'=>'1000',
                'website' => 'www.kaaitheater.be',
                'phone'=> '+32 (0)2/333.76.22',
                ],
                [
                'slug'=>null,
                'designation'=> 'Cirque Royal',
                'address' => 'Rue de l\'Enseignement, 81',
                'locality_postal_code'=>'1000',
                'website' => 'https://www.cirque-royal-bruxelles.be/',
                'phone'=> '+32 (0)2/333.76.22',
                ],  
                [
                'slug'=>null,
                'designation'=> 'Ancienne Belgique',
                'address' => 'Boulevard Anspach 110',
                'locality_postal_code'=>'1000',
                'website' => 'https://www.ancienne-belgique.be/',
                'phone'=> '+32 (0)2/333.76.22',
                ],
                [
                'slug'=>null,
                'designation'=> 'La Bellone',
                'address' => 'Rue de Flandre 46',
                'locality_postal_code'=>'1000',
                'website' => 'https://www.cirque-royal-bruxelles.be/',
                'phone'=> '+32 (0)2/333.76.22',
                ], 
                [
                'slug'=>null,
                'designation'=> 'Les es Brigittines',
                'address' => 'Petite Rue des Brigittines 1',
                'locality_postal_code'=>'1000',
                'website' => 'http://www.brigittines.be/fr/',
                'phone'=> '+32 (0)2/333.76.22',
                ],
                [
                'slug'=>null,
                'designation'=> 'La Monnaie De Munt',
                'address' => 'Place de la Monnaie',
                'locality_postal_code'=>'1000',
                'website' => 'https://www.lamonnaie.be/fr',
                'phone'=> '+32 (0)2/333.76.22',
                ],
                [
                'slug'=>null,
                'designation'=> 'Théâtre de Poche',
                'address' => 'Chemin du Gymnase 1',
                'locality_postal_code'=>'1000',
                'website' => 'https://www.poche.be/',
                'phone'=> '+32 (0)2/333.76.22',
                ],
            ];
     
            // Insert data into the table
            foreach($locations as $data){
                // retrieve localities
                $locality = Locality::firstWhere('postal_code',$data['locality_postal_code']);

               // dd($data);
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
