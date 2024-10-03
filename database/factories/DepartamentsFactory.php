<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

use function Pest\Laravel\options;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departaments>
 */
class DepartamentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $options = [
            'Marketing',
            'Ventas',
            'Compras',
            'Almacen',
            'Diseño',
        ];
        return [
            'name' => Arr::random($options),
        ];
    }
}
