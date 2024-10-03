<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horarios = [
            [
                'trabajador_id' => 1,
                'dia' => 'Lunes',
                'hora_inicio' => '09:00:00',
                'hora_fin' => '17:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'trabajador_id' => 1,
                'dia' => 'Martes',
                'hora_inicio' => '09:00:00',
                'hora_fin' => '17:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'trabajador_id' => 2,
                'dia' => 'Miércoles',
                'hora_inicio' => '10:00:00',
                'hora_fin' => '18:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'trabajador_id' => 3,
                'dia' => 'Viernes',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '16:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('horarios')->insert($horarios);
    }
}