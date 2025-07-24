<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 users and store them
        $users = User::factory(10)->create();

        // Create 50 books
        Book::factory(50)->create()->each(function ($book) use ($users) {
            // For each book, create between 1 and 5 reviews from random users
            Review::factory(rand(1, 5))->make()->each(function ($review) use ($book, $users) {
                $review->book_id = $book->id;
                $review->user_id = $users->random()->id;
                $review->save();
            });
        });
    }
}
