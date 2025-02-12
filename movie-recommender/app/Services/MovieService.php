<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MovieService
{
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = env('TMDB_API_KEY');
    }

    public function getGenres()
    {
        $response = Http::get("https://api.themoviedb.org/3/genre/movie/list", [
            'api_key' => $this->apiKey,
            'language' => 'en-US',
        ]);

        return $response->json()['genres'] ?? [];
    }

    public function getPopularMovies($genreId = null)
    {
        $response = Http::get("https://api.themoviedb.org/3/discover/movie", [
            'api_key' => $this->apiKey,
            'language' => 'en-US',
            'sort_by' => 'popularity.desc',
            'with_genres' => $genreId, // Filter by genre if provided
            'page' => 1
        ]);

        return $response->json()['results'] ?? [];
    }
}
