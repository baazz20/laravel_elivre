<?php

use Illuminate\Database\Seeder;

class DetailcommandesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('detailcommandes')->delete();
        
        \DB::table('detailcommandes')->insert(array (
            0 => 
            array (
                'id' => 9,
                'id_commande' => 8,
                'code_prod' => 'sandales-zara-en-cuire-a-double-bride',
               
                'quantite' => 1,
                'prix_vente' => 33000,
                'prix_achat' => 40000,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}