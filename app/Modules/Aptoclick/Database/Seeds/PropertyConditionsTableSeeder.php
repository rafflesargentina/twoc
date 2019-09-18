<?php

namespace Raffles\Modules\Aptoclick\Database\Seeds;

use Raffles\Modules\Aptoclick\Models\PropertyCondition;

use Illuminate\Database\Seeder;

class PropertyConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conditions = [
            ['name' => 'Bueno', 'slug' => 'bueno'],
            ['name' => 'Muy Bueno', 'slug' => 'muy-bueno'],
            ['name' => 'Regular', 'slug' => 'regular'],
            ['name' => 'Malo', 'slug' => 'malo'],
        ];

        foreach ($conditions as $condition) { PropertyCondition::create($condition);
        }
    }
}
