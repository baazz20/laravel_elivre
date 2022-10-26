<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VillesTableSeeder::class);
        $this->call(CommunesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(ProduitsTableSeeder::class);

        $this->call(CategoriesTableSeeder::class);
        // $this->call(SouscategoriesTableSeeder::class);
        // $this->call(MarquesTableSeeder::class);
        // $this->call(TailleproduitsTableSeeder::class);
        // $this->call(CouleursTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        //$this->call(ProduitHasCouleursTableSeeder::class);
        // $this->call(ProduitHasTailleTableSeeder::class);
        $this->call(AdressesTableSeeder::class);
        $this->call(CommandesTableSeeder::class);
        // $this->call(DetailcommandesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(BonReductionsTableSeeder::class);
        $this->call(FailedJobsTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        // $this->call(WishlistsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(SectionsTableSeeder::class);

        $this->call(SouscriptionsTableSeeder::class);
    }
}
