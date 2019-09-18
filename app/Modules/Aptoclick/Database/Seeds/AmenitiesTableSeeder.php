<?php

namespace Raffles\Modules\Aptoclick\Database\Seeds;

use Raffles\Modules\Aptoclick\Models\Amenity;

use Illuminate\Database\Seeder;

class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amenities = [
            ['name' => 'Kitchen', 'slug' => 'kitchen'],
            ['name' => 'Calefacción' ,'slug' => 'calefaccion'],
            ['name' => 'Aire acondicionado', 'slug' => 'aire-acondicionado'],
        ];

        foreach ($amenities as $amenity) { Amenity::create($amenity);
        }
    }
}
