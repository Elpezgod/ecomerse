<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'Hombres', 'estatus' => true],
            ['name' => 'Mujeres', 'estatus' => true],
            ['name' => 'Niños', 'estatus' => true],
            ['name' => 'Niñas', 'estatus' => true],
            ['name' => 'Accesorios', 'estatus' => true],
            ['name' => 'Zapatos', 'estatus' => true],
            ['name' => 'Deportes', 'estatus' => true],
            ['name' => 'Ropa Interior', 'estatus' => true],
            ['name' => 'Ropa de Dormir', 'estatus' => true],
            ['name' => 'Ropa de Temporada', 'estatus' => true],
        ];

        DB::table('departaments')->insert($departments);
    }
}
