<?php

use Illuminate\Database\Seeder;

class CategoriesHasSouscategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories_has_souscategories')->delete();
        
        
        
    }
}