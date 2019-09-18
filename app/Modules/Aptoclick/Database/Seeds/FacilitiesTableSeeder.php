<?php

namespace Raffles\Modules\Aptoclick\Database\Seeds;

use Raffles\Modules\Aptoclick\Models\Facility;

use Illuminate\Database\Seeder;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facilities = [
            ['name' => 'Cochera de cortesía', 'slug' => 'cochera-de-cortesia'],
            ['name' => 'Gym' ,'slug' => 'gym'],
            ['name' => 'Sauna Húmedo', 'slug' => 'sauna-humedo'],
            ['name' => 'Sauna Seco', 'slug' => 'sauna-seco'],
        ];

        foreach ($facilities as $facility) { Facility::create($facility);
        }
    }
}
