<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Serie;

class SerieFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Serie::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'author_id' => \App\Models\User::factory(),
            'title' => $this->faker->title,
            'content' => $this->faker->text,
            'acteurs' => $this->faker->text,
            'url' => $this->faker->url,
            'tags' => $this->faker->text,
            'date' => $this->faker->dateTime(),
            'status' => $this->faker->word,
        ];
    }
}
