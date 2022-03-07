<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Http\Model\User;
use App\Http\Model\Serie;


class SerieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Serie::class;

    public function definition()
    {
        return [
        'author_id' => factory(User::class)->create()->id,
        'title' => $this->faker->sentence,
        'content' => implode($this->faker->paragraph(10)),
        'acteurs' => $this->faker->name(),
        'url' => $this->faker->url(),
        'tags' => $this->faker->text(),
        'date' => $this->faker->now(),
        'status' => $this->faker->word(),
            //
        ];
    }
}
