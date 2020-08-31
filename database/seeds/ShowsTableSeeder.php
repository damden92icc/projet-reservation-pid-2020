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
               'poster_url'=>'fake.jpg',
               'location_slug'=>'espace-delvaux-la-venerie',
               'bookable'=> true,
               'price'=> 9.00,
               'author'=>'createur du show',
           ],
           [
            'slug'=>'le-cid',
            'title'=> 'Le Cid',
            'description'=> 'Le Cid est une pièce de théâtre tragi-comique en vers de Pierre Corneille dont la première représentation eut lieu le 7 janvier 1637 au théâtre du Marais.',
            'poster_url'=>'fake.jpg',
            'location_slug'=>'espace-delvaux-la-venerie',
            'bookable'=> true,
            'price'=> 9.00,
            'author'=>'Pierre Corneille',
            ],
            [
            'slug'=>null,
            'title'=> 'Antigone',
            'description'=> 'Antigone est une tragédie grecque de Sophocle dont la date de création se situe en 441 av. J.-C. Elle appartient au cycle des pièces thébaines, avec Œdipe roi et Œdipe à Colone, décrivant le sort tragique d\'Œdipe et de ses descendants.',
            'poster_url'=>'fake.jpg',
            'location_slug'=>'espace-delvaux-la-venerie',
            'bookable'=> true,
            'price'=> 9.00,
            'author'=>'Sophocle',
            ],
            [
            'slug'=>null,
            'title'=> 'Caligula',
            'description'=> 'Caligula est une pièce de théâtre en 4 actes écrite par Albert Camus, entamée en 1938, et publiée pour la première fois en mai 1944 aux éditions Gallimard. La pièce fera par la suite l\'objet de nombreuses retouches',
            'poster_url'=>'fake.jpg',
            'location_slug'=>'espace-delvaux-la-venerie',
            'bookable'=> true,
            'price'=> 9.00,
            'author'=>'Albert Camus',
            ],
            [
            'slug'=>null,
            'title'=> 'Hamlet',
            'description'=> 'La Tragique histoire d\'Hamlet, prince de Danemark, plus couramment désigné sous le titre abrégé Hamlet, est la plus longue et l\'une des plus célèbres pièces de William Shakespeare',
            'poster_url'=>'fake.jpg',
            'location_slug'=>'espace-delvaux-la-venerie',
            'bookable'=> true,
            'price'=> 9.00,
            'author'=>'William Shakespeare',
            ],
            [
            'slug'=>null,
            'title'=> 'Le Mariage de Figaro',
            'description'=> 'La Folle Journée, ou le Mariage de Figaro est une comédie en cinq actes de Pierre-Augustin Caron de Beaumarchais écrite à 46 ans en 1778, lue à la Comédie-Française en 1781',
            'poster_url'=>'fake.jpg',
            'location_slug'=>'espace-delvaux-la-venerie',
            'bookable'=> true,
            'price'=> 9.00,
            'author'=>'Pierre-Augustin Caron de Beaumarchais',
            ],
            [
            'slug'=>null,
            'title'=> 'L\'Avare',
            'description'=> 'L\'Avare est une comédie de Molière en cinq actes et en prose, adaptée de La Marmite de Plaute et représentée pour la première fois sur la scène du Palais-Royal le 9 septembre 1668.',
            'poster_url'=>'fake.jpg',
            'location_slug'=>'espace-delvaux-la-venerie',
            'bookable'=> true,
            'price'=> 9.00,
            'author'=>'Molière',
            ],
            [
            'slug'=>null,
            'title'=> 'Le Malade imaginaire',
            'description'=> 'Le Malade imaginaire, dernière œuvre dramatique écrite par Molière, est une comédie-ballet en trois actes et en prose, créée le 10 février 1673 par la Troupe du Roi sur la scène du Palais-Royal à Paris, avec une musique de scène composée par Marc-Antoine Charpentier et des ballets réglés par Pierre Beauchamp.',
            'poster_url'=>'fake.jpg',
            'location_slug'=>'espace-delvaux-la-venerie',
            'bookable'=> true,
            'price'=> 9.00,
            'author'=>'Molière',
            ],
            [
            'slug'=>null,
            'title'=> 'Le Bourgeois gentilhomme',
            'description'=> 'Le Bourgeois gentilhomme est une comédie-ballet de Molière, en trois puis cinq actes en prose, représentée pour la première fois le 14 octobre 1670, devant la cour de Louis XIV, au château de Chambord par la troupe de Molière',
            'poster_url'=>'fake.jpg',
            'location_slug'=>'espace-delvaux-la-venerie',
            'bookable'=> true,
            'price'=> 9.00,
            'author'=>'Molière',
            ],
            [
            'slug'=>null,
            'title'=> 'Horace',
            'description'=> 'Horace est une pièce de théâtre tragique de Pierre Corneille inspirée du combat entre les Horaces et les Curiaces. Elle fut jouée pour la première fois en mars 1640. ',
            'poster_url'=>'fake.jpg',
            'location_slug'=>'espace-delvaux-la-venerie',
            'bookable'=> true,
            'price'=> 9.00,
            'author'=>'Pierre Corneille',
            ],
            [
            'slug'=>null,
            'title'=> 'Cinna',
            'description'=> 'Cinna est une tragédie de Pierre Corneille créée au Théâtre du Marais en 1641 et publiée en 1643 chez Toussaint Quinet.',
            'poster_url'=>'fake.jpg',
            'location_slug'=>'espace-delvaux-la-venerie',
            'bookable'=> true,
            'price'=> 9.00,
            'author'=>'Pierre Corneille',
            ],
            [
            'slug'=>null,
            'title'=> 'Le Menteur',
            'description'=> 'Le Menteur est la dernière comédie baroque de Corneille, représentée en 1644 au théâtre du Marais. Elle eut un très grand succès. Évoquant le mensonge et le libertinage de mœurs, elle contient quelques passages parodiant Le Cid.',
            'poster_url'=>'fake.jpg',
            'location_slug'=>'espace-delvaux-la-venerie',
            'bookable'=> true,
            'price'=> 9.00,
            'author'=>'Pierre Corneille',
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
