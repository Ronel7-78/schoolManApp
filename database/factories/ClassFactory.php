<?php

namespace Database\Factories;

use App\Models\Classes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classes>
 */
class ClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Classes::class;
    public function definition()
    {
        return [
            'codeCl' => $this->faker->unique()->lexify('???'), // Génère une chaîne de 3 lett
            'nomCl' => $this->faker->sentence(3), // Exemple de génération d'un nom de classe
        ];
    }
}
