<?php

use Illuminate\Database\Seeder;

class CouleursTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('couleurs')->delete();
        
        \DB::table('couleurs')->insert(array (
            0 => 
            array (
                'code' => '#000',
                'nom' => 'noir',
                'deleted_at' => NULL,
                'created_at' => '2020-11-10 17:15:37',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'code' => '#4900FF',
                'nom' => 'bleu',
                'deleted_at' => NULL,
                'created_at' => '2020-11-10 17:43:35',
                'updated_at' => '2020-11-10 17:43:35',
            ),
            2 => 
            array (
                'code' => '#E1F902',
                'nom' => 'jaune clair',
                'deleted_at' => NULL,
                'created_at' => '2020-11-10 17:43:52',
                'updated_at' => '2020-11-10 17:43:52',
            ),
            3 => 
            array (
                'code' => '#fff',
                'nom' => 'blanche',
                'deleted_at' => NULL,
                'created_at' => '2020-11-10 17:15:32',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'code' => '#1F4D27',
                'nom' => 'Vert',
                'deleted_at' => NULL,
                'created_at' => '2020-11-25 14:39:30',
                'updated_at' => '2020-11-25 14:39:30',
            ),
            5 => 
            array (
                'code' => '#0D7D7D',
                'nom' => 'Multicolore',
                'deleted_at' => NULL,
                'created_at' => '2020-11-28 12:52:19',
                'updated_at' => '2020-11-28 12:52:19',
            ),
            6 => 
            array (
                'code' => '#000000',
                'nom' => 'Holographic',
                'deleted_at' => NULL,
                'created_at' => '2020-11-28 12:52:50',
                'updated_at' => '2020-11-28 12:52:50',
            ),
        ));
        
        
    }
}