<?php

use Illuminate\Database\Seeder;

class TailleproduitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tailleproduits')->delete();
        
        \DB::table('tailleproduits')->insert(array (
            0 => 
            array (
                'code' => 'S',
                'nom' => 'S',
                'description' => 'taille s',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-03 20:44:38',
                'updated_at' => '2020-11-03 20:44:39',
            ),
            1 => 
            array (
                'code' => 'S/M',
                'nom' => 'S/M',
                'description' => 'taille S/M',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-03 20:46:05',
                'updated_at' => '2020-11-03 20:46:05',
            ),
            2 => 
            array (
                'code' => 'XL',
                'nom' => 'XL',
                'description' => 'taille XL',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-03 20:46:28',
                'updated_at' => '2020-11-03 20:46:30',
            ),
            3 => 
            array (
                'code' => 'xs',
                'nom' => 'XS',
                'description' => 'taille moyenne',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-03 20:44:21',
                'updated_at' => '2020-11-20 12:44:56',
            ),
            4 => 
            array (
                'code' => '41',
                'nom' => '41',
                'description' => 'Pointure 41',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-20 12:47:53',
                'updated_at' => '2020-11-20 12:47:53',
            ),
            5 => 
            array (
                'code' => '42',
                'nom' => '42',
                'description' => 'Pointure 42',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-20 12:48:34',
                'updated_at' => '2020-11-20 12:48:34',
            ),
            6 => 
            array (
                'code' => '43',
                'nom' => '43',
                'description' => 'Pointure 43',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-20 12:56:54',
                'updated_at' => '2020-11-20 12:56:54',
            ),
            7 => 
            array (
                'code' => '44',
                'nom' => '44',
                'description' => 'Pointure 44',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-20 12:54:06',
                'updated_at' => '2020-11-20 12:54:06',
            ),
            8 => 
            array (
                'code' => '45',
                'nom' => '45',
                'description' => 'Pointure 45',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-20 12:48:56',
                'updated_at' => '2020-11-20 12:48:56',
            ),
            9 => 
            array (
                'code' => '46',
                'nom' => '46',
                'description' => 'Pointure 46',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-20 12:48:14',
                'updated_at' => '2020-11-20 12:48:14',
            ),
            10 => 
            array (
                'code' => '37',
                'nom' => '37',
                'description' => 'Pointure 37',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-20 12:53:43',
                'updated_at' => '2020-11-20 12:53:43',
            ),
            11 => 
            array (
                'code' => '38',
                'nom' => '38',
                'description' => 'Pointure 38',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-20 12:56:14',
                'updated_at' => '2020-11-20 12:56:14',
            ),
            12 => 
            array (
                'code' => '39',
                'nom' => '39',
                'description' => 'Pointure 39',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-20 12:55:03',
                'updated_at' => '2020-11-20 12:55:03',
            ),
            13 => 
            array (
                'code' => 'M',
                'nom' => 'M',
                'description' => 'Taille M',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-20 12:47:01',
                'updated_at' => '2020-11-20 12:47:01',
            ),
            14 => 
            array (
                'code' => 'XXXL',
                'nom' => 'XXXL',
                'description' => 'Grande taille',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-20 12:44:25',
                'updated_at' => '2020-11-20 12:44:25',
            ),
            15 => 
            array (
                'code' => 'XXL',
                'nom' => 'XXL',
                'description' => 'Grande taille',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-20 12:46:34',
                'updated_at' => '2020-11-20 12:46:34',
            ),
            16 => 
            array (
                'code' => '40',
                'nom' => '40',
                'description' => 'Pointure 40',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-11-20 12:57:21',
                'updated_at' => '2020-11-20 12:57:21',
            ),
        ));
        
        
    }
}