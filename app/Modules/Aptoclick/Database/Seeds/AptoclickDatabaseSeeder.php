<?php

namespace Raffles\Modules\Aptoclick\Database\Seeds;

use Illuminate\Database\Seeder;

class AptoclickDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AmenitiesTableSeeder::class);
        $this->call(FacilitiesTableSeeder::class);
        $this->call(PropertyConditionsTableSeeder::class);
        $this->call(PropertyTypesTableSeeder::class);
        $this->call(UsersAndPropertiesTableSeeder::class);
        $this->call(PropertyPhotosTableSeeder::class);
    }
}
