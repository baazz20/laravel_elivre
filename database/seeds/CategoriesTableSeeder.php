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
                'code' => 'formation',
                'nom' => 'Formation',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2022-10-26 10:08:04',
                'updated_at' => '2022-10-26 10:08:04',
            ),
            1 => 
            array (
                'code' => 'mission-dassistance',
                'nom' => 'Mission d\'Assistance',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2022-10-26 10:07:51',
                'updated_at' => '2022-10-26 10:07:51',
            ),
            2 => 
            array (
                'code' => 'outil',
                'nom' => 'Outil',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2022-10-26 10:07:34',
                'updated_at' => '2022-10-26 10:07:34',
            ),
            3 => 
            array (
                'code' => 'ouvrage',
                'nom' => 'Ouvrage',
                'enabled' => 1,
                'deleted_at' => NULL,
                'created_at' => '2022-10-26 10:07:13',
                'updated_at' => '2022-10-26 10:07:13',
            ),
        ));
        
        
    }
}