<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    
    public function index(Book $book)
    {
        // Eager load the user for each review and paginate
        return ReviewResource::collection(
            $book->reviews()->with('user')->paginate(15)
        );
    }

    /**
     * Store a new review for a specific book.
     */
    public function store(StoreReviewRequest $request, Book $book)
    {
        $review = $book->reviews()->create([
            'user_id'     => Auth::id(),
            'rating'      => $request->rating,
            'review_text' => $request->review_text,
        ]);

        return new ReviewResource($review);
    }
}
