<?php

use Illuminate\Database\Seeder;

class ProduitHasCouleursTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('produit_has_couleurs')->delete();
        
        \DB::table('produit_has_couleurs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code_prod' => 'ch_fme',
                'code_couleur' => '#fff',
                'deleted_at' => NULL,
                'created_at' => '2020-11-10 19:28:14',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'code_prod' => 'p001',
                'code_couleur' => '#000',
                'deleted_at' => NULL,
                'created_at' => '2020-11-10 19:28:40',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'code_prod' => 'p003',
                'code_couleur' => '#E1F902',
                'deleted_at' => NULL,
                'created_at' => '2020-11-10 19:29:05',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'code_prod' => 'p003',
                'code_couleur' => '#fff',
                'deleted_at' => NULL,
                'created_at' => '2020-11-10 19:29:46',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'code_prod' => 'air-force-1-blanche',
                'code_couleur' => '#000',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'code_prod' => 'air-force-1-blanche',
                'code_couleur' => '#fff',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'code_prod' => 't-shirt-puma-noir',
                'code_couleur' => '#000',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'code_prod' => 'bottes-surpiquees',
                'code_couleur' => '#000',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'code_prod' => 'bottes-surpiquees',
                'code_couleur' => '#1F4D27',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 12,
                'code_prod' => 'shein-robe-holographique',
                'code_couleur' => '#000000',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'code_prod' => 'shein-robe-bustier',
                'code_couleur' => '#000',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 13,
                'code_prod' => 'baskets-noires-gravees',
                'code_couleur' => '#4900FF',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 14,
                'code_prod' => 'sandales-en-cuire-a-double-bride',
                'code_couleur' => '#000',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 15,
                'code_prod' => 'sandales-en-cuire-a-double-bride',
                'code_couleur' => '#4900FF',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 16,
                'code_prod' => 'sandales-en-cuire-a-double-bride',
                'code_couleur' => '#1F4D27',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 17,
                'code_prod' => 'sandales-zara-en-cuire-a-double-bride',
                'code_couleur' => '#000',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 18,
                'code_prod' => 'sandales-zara-en-cuire-a-double-bride',
                'code_couleur' => '#4900FF',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 19,
                'code_prod' => 'sandales-zara-en-cuire-a-double-bride',
                'code_couleur' => '#E1F902',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 20,
                'code_prod' => 'sandales-zara-en-cuire-a-double-bride',
                'code_couleur' => '#1F4D27',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 21,
                'code_prod' => 'sandales-zara-a-double-bride',
                'code_couleur' => '#000',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 22,
                'code_prod' => 'sandales-zara-a-double-bride',
                'code_couleur' => '#4900FF',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 23,
                'code_prod' => 'sandales-zara-a-double-bride',
                'code_couleur' => '#E1F902',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 24,
                'code_prod' => 'sandales-zara-a-double-bride',
                'code_couleur' => '#1F4D27',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}