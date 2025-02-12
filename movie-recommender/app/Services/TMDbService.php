<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TMDbService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        // Defines the API keys
        $this->apiKey = env('TMDB_API_KEY');
        $this->baseUrl = env('TMDB_BASE_URL');
    }

    // Retrieves the movies based on the rating
    public function getMoviesByRating($rating)
    {
        $response = Http::withOptions([
            'verify' => false // This disables SSL verification
        ])->get("{$this->baseUrl}/discover/movie", [
            'api_key' => $this->apiKey,
            'vote_average.gte' => $rating,
            'sort_by' => 'vote_average.desc',
            'language' => 'en-US'
        ]);
    
        return $response->json();
    }
}
