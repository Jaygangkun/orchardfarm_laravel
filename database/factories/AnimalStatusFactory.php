<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\AnimalStatus;

class AnimalStatusFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = AnimalStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tag' => $this->faker->text(),
            'name' => $this->faker->name,
            'reason' => $this->faker->realText(),
            'date' => $this->faker->date(),
            'weight' => $this->faker->randomFloat(),
            'sales_price' => $this->faker->randomFloat(),
            'comments' => $this->faker->realText(),
        ];
    }
}
