<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'rating'      => $this->rating,
            'review_text' => $this->review_text,
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,
            'user'        => new UserResource($this->whenLoaded('user')),
        ];
    }
}
