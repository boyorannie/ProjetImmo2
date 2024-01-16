<?php

namespace Database\Factories;

use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word,
            'description' => $this->faker->sentence,
            'image' => UploadedFile::fake()->create('document.png'),
            'type' => $this->faker->randomElement(['maison', 'appartement', 'duplex']),
            'statut' => $this->faker->randomElement(['occupe', 'libre']),
            'nombreToilette' => $this->faker->numberBetween(0, 5),
            'dimension' => $this->faker->randomFloat(2, 50, 200),
            'nombreBalcon' => $this->faker->numberBetween(0, 3),
            'espaceVert' => $this->faker->randomElement(['disponible', 'indisponible']),
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
        ];
    }
}
