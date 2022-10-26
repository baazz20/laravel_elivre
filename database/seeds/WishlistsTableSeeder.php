<?php

use Illuminate\Database\Seeder;

class WishlistsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('wishlists')->delete();
        
        \DB::table('wishlists')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_client' => 1,
                'code_produit' => 'bottes-surpiquees',
                'created_at' => '2020-11-26 21:55:06',
                'updated_at' => '2020-11-26 21:55:06',
            ),
            1 => 
            array (
                'id' => 2,
                'id_client' => 5,
                'code_produit' => 'bottes-surpiquees',
                'created_at' => '2020-11-27 17:44:01',
                'updated_at' => '2020-11-27 17:44:01',
            ),
            2 => 
            array (
                'id' => 3,
                'id_client' => 6,
                'code_produit' => 'air-force-1-blanche',
                'created_at' => '2020-11-29 10:28:03',
                'updated_at' => '2020-11-29 10:28:03',
            ),
        ));
        
        
    }
}