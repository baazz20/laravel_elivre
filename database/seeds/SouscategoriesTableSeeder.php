<?php

use Illuminate\Database\Seeder;

class SouscategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('souscategories')->delete();
        
        \DB::table('souscategories')->insert(array (
            0 => 
            array (
                'code' => 'accessoires',
                'code_cat' => 'mode-enfant',
                'position' => NULL,
                'nom' => 'Accessoires',
                'image' => NULL,
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-18 07:52:26',
                'updated_at' => '2020-11-18 07:52:26',
            ),
            1 => 
            array (
                'code' => 'chaussure',
                'code_cat' => 'mode-homme',
                'position' => NULL,
                'nom' => 'Chaussure',
                'image' => 'images/banner/e13f19f05c47cd8c520174465a1b71a0.jpg',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-18 07:52:05',
                'updated_at' => '2020-11-18 11:39:59',
            ),
            2 => 
            array (
                'code' => 'produits-beaute',
                'code_cat' => 'mode-femme',
                'position' => NULL,
                'nom' => 'Produits beauté',
                'image' => 'images/banner/bbf6a104fbbdc848bd7c8060e47cef76.jpg',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-18 07:52:49',
                'updated_at' => '2020-11-18 14:11:59',
            ),
            3 => 
            array (
                'code' => 'promos',
                'code_cat' => 'mode-homme',
                'position' => NULL,
                'nom' => 'Promos',
                'image' => 'images/banner/f396b47b8adf7bf5969df981c7a6e357.jpg',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-18 07:53:00',
                'updated_at' => '2020-11-18 11:30:00',
            ),
            4 => 
            array (
                'code' => 'sport',
                'code_cat' => 'mode-homme',
                'position' => NULL,
                'nom' => 'Sport',
                'image' => 'images/banner/583f6ae3fcbd4e9214b981f653ded166.jpg',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-18 07:52:17',
                'updated_at' => '2020-11-18 13:57:27',
            ),
            5 => 
            array (
                'code' => 'vetements',
                'code_cat' => 'mode-homme',
                'position' => NULL,
                'nom' => 'Vêtements',
                'image' => 'images/banner/e20dacd47e6785a391ef4a1298a87228.jpg',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-18 07:53:16',
                'updated_at' => '2020-11-18 14:38:01',
            ),
            6 => 
            array (
                'code' => 'chaussures',
                'code_cat' => 'mode-femme',
                'position' => NULL,
                'nom' => 'Chaussures',
                'image' => 'images/banner/c062c8f244645d6a6ced267a0119195a.jpg',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-18 11:16:46',
                'updated_at' => '2020-11-21 23:11:51',
            ),
            7 => 
            array (
                'code' => 'accessoires-1',
                'code_cat' => 'mode-homme',
                'position' => NULL,
                'nom' => 'Accessoires',
                'image' => 'images/banner/3bef4cad651010c5737c406dd73aa558.jpg',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-18 13:47:16',
                'updated_at' => '2020-11-30 11:30:31',
            ),
            8 => 
            array (
                'code' => 'vetements-1',
                'code_cat' => 'mode-femme',
                'position' => NULL,
                'nom' => 'Vêtements',
                'image' => 'images/banner/96526d3f3a6349df44357b04e9c8d913.jpg',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-18 13:52:27',
                'updated_at' => '2020-11-18 13:52:27',
            ),
            9 => 
            array (
                'code' => 'sport-1',
                'code_cat' => 'mode-femme',
                'position' => NULL,
                'nom' => 'Sport',
                'image' => 'images/banner/d7e54a4443f822da5979db2ce48471e6.jpg',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-18 14:30:12',
                'updated_at' => '2020-11-18 14:30:23',
            ),
            10 => 
            array (
                'code' => 'made-in-paris',
                'code_cat' => 'mode-homme',
                'position' => NULL,
                'nom' => 'Made in Paris',
                'image' => 'images/banner/3d4fdd36d63d0f0af2e90fef8703bb3c.jpg',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-28 12:35:10',
                'updated_at' => '2020-11-30 13:02:01',
            ),
            11 => 
            array (
                'code' => 'kids-1',
                'code_cat' => 'mode-homme',
                'position' => NULL,
                'nom' => 'Kids',
                'image' => NULL,
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-27 19:06:53',
                'updated_at' => '2020-11-27 19:06:53',
            ),
            12 => 
            array (
                'code' => 'accessoires-2',
                'code_cat' => 'mode-femme',
                'position' => NULL,
                'nom' => 'Accessoires',
                'image' => 'images/banner/76825418f6129c0f290969da090a0152.jpg',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-20 15:05:13',
                'updated_at' => '2020-11-20 15:05:13',
            ),
            13 => 
            array (
                'code' => 'kids',
                'code_cat' => 'mode-femme',
                'position' => NULL,
                'nom' => 'KIDS',
                'image' => NULL,
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-25 13:06:04',
                'updated_at' => '2020-11-25 13:06:04',
            ),
            14 => 
            array (
                'code' => 'made-in-paris-1',
                'code_cat' => 'mode-femme',
                'position' => NULL,
                'nom' => 'Made in paris',
                'image' => 'images/banner/8427b923f6a2cda57587cad3a25d2afa.jpg',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-28 12:35:29',
                'updated_at' => '2020-11-30 13:04:09',
            ),
            15 => 
            array (
                'code' => 'promos-1',
                'code_cat' => 'mode-femme',
                'position' => NULL,
                'nom' => 'Promos',
                'image' => 'images/banner/913511d364fc70d6d95b5c79c993cb00.jpg',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-30 11:04:09',
                'updated_at' => '2020-11-30 11:04:09',
            ),
        ));
        
        
    }
}