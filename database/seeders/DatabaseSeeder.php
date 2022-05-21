<?php

namespace Database\Seeders;

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
        $this->call([
            LicenseeSeeder::class,
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            RoleUserTableSeeder::class,
            RegionsTableSeeder::class,
            DistrictsTableSeeder::class,
            SpeciesSeeder::class,
            LandTypesSeeder::class,
            LogSizeSeeder::class,
            // PricesSeeder::class,
            RoyaltiesSeeder::class,
            PermitSeeder::class,
            PremiumsSeeder::class,

        ]);
        
}
}
