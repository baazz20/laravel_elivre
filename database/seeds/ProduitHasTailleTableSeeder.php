<?php

use Illuminate\Database\Seeder;

class ProduitHasTailleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('produit_has_taille')->delete();
        
        
        
    }
}