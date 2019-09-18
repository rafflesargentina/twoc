<?php

namespace Raffles\Modules\Aptoclick\Database\Seeds;

use Raffles\Modules\Aptoclick\Models\PropertyType;

use Illuminate\Database\Seeder;

class PropertyTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Casa sola', 'slug' => 'casa-sola'],
            ['name' => 'Casa en condominio', 'slug' => 'casa-en-condominio'],
            ['name' => 'Departamento en condominio', 'slug' => 'departamento-en-condominio'],
            ['name' => 'Casa múltiple', 'slug' => 'casa-multiple'],

        ];

        foreach ($types as $type) { PropertyType::create($type);
        }
    }
}
