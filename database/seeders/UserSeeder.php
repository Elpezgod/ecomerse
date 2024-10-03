<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' =>'administrador',
            'email' => 'diegodominguezaceves@gmail.com',
            'password' => Hash::make("dominguez"),
        ])->assignRole('Administrador');;
        

        User::create([
            'name' =>'Trabajador',
            'email' => 'trabajador@gmail.com',
            'password' => Hash::make("123456789"),
        ])->assignRole('Trabajador');

        User::create([
            'name' =>'Daniel',
            'email' => 'trabajador1@gmail.com',
            'password' => Hash::make("123456789"),
        ])->assignRole('Trabajador');

        User::create([
            'name' =>'Fernanda',
            'email' => 'trabajador2@gmail.com',
            'password' => Hash::make("123456789"),
        ])->assignRole('Trabajador');

        User::create([
            'name' =>'cliente',
            'email' => 'cliente@gmail.com',
            'password' => Hash::make("123456780"),
        ])->assignRole('Cliente');

        User::factory(40)->create()->each(function($user) {
            $user->assignRole('Cliente');
        });        
        User::factory(20)->create()->each(function ($user) {
            $user->assignRole('Trabajador');
        });
    }
}
