<?php

use Illuminate\Database\Seeder;

class CommandesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('commandes')->delete();
        
        
        
    }
}