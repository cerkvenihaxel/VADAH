<?php

namespace Database\Factories;

use App\Models\ObraSocial;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ObraSocialFactory extends Factory
{
    protected $model = ObraSocial::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->company,
            'codigo_unico' => (string) Str::uuid(),
        ];
    }
}
