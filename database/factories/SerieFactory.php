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
    public function definition() 
    {
        $title = implode(' ', $this->faker->words(rand(1, 3)));
        $url = str_replace(' ', '_', $title);
        return [
            'author_id' => \App\Models\User::factory(),
            'title' => $title,
            'content' => $this->faker->realText(1000),
            'acteurs' => implode(', ', $this->faker->words(rand(5, 10))),
            'url' => $url,
            'tags' => implode(', ', $this->faker->words(rand(0, 5))) ,
            'date' => $this->faker->dateTime,
            'status' => $this->faker->word,
        ];
    }
}
