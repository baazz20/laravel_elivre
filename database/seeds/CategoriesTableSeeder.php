<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'code' => 'la-femme-et-dieu',
                'nom' => 'La femme et Dieu',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-03 15:00:02',
                'updated_at' => '2021-06-08 04:26:41',
            ),
            1 => 
            array (
                'code' => 'la-femme-et-elle-meme',
                'nom' => 'La Femme et Elle Même',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-06-08 04:28:44',
                'updated_at' => '2021-06-08 04:28:44',
            ),
            2 => 
            array (
                'code' => 'la-femme-et-la-communaute',
                'nom' => 'La Femme et la Communauté',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-06-08 04:29:00',
                'updated_at' => '2021-06-08 04:29:00',
            ),
            3 => 
            array (
                'code' => 'la-femme-et-sa-maison',
                'nom' => 'La Femme et sa Maison',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-06-08 04:28:16',
                'updated_at' => '2021-06-08 04:28:16',
            ),
            4 => 
            array (
                'code' => 'la-femme-et-ses-enfants',
                'nom' => 'La Femme et ses Enfants',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-03 15:01:19',
                'updated_at' => '2021-06-08 04:28:06',
            ),
            5 => 
            array (
                'code' => 'la-femme-et-son-epoux',
                'nom' => 'La Femme et son Epoux',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-03 15:00:38',
                'updated_at' => '2021-06-08 04:27:39',
            ),
            6 => 
            array (
                'code' => 'la-femme-et-son-travail',
                'nom' => 'La Femme et son Travail',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-06-08 04:28:25',
                'updated_at' => '2021-06-08 04:28:25',
            ),
        ));
        
        
    }
}