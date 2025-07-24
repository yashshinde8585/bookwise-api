<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    protected $model = Review::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'book_id' => Book::factory(),   
            'user_id' => User::factory(),   
            'rating' => $this->faker->numberBetween(1, 5),
            'review_text' => $this->faker->paragraph(3),
        ];
    }
}
