<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            // Mengenerate data random untuk kolom title
            'title' => $this->faker->sentence(mt_rand(2,8)),

            // Mengenerate data random untuk kolom slug
            'slug' => $this->faker->slug,

            // Mengenerate data random untuk kolom excerpt
            'excerpt' => $this->faker->paragraph(),
        
            // Mengenerate data random untuk kolom body dan dibungkus dengan tag <p>
            // 'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(5,10)) . '</p><p>'), 
            'body' => collect($this->faker->paragraphs(mt_rand(5,10)))->map(fn($p) => "<p>$p</p>")->implode(''),
            
            // Mengenerate data random untuk kolom user_id
            'user_id' => mt_rand(1,3),
            
            // Mengenerate data random untuk kolom category_id
            'category_id' => mt_rand(1,2)

        ];
    }
}
