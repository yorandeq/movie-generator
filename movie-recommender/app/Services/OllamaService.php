<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OllamaService
{
    public function getRandomMovie($prompt)
    {
        $response = Http::post(env('DEEPSEEK_SERVER_URL') . '/api/generate', [
            'model' => 'deepseek-r1',
            // "role"   =>    "assistant",
            'prompt' => $prompt,
            "stream" => false,
        ]);

        // Ensure the response is decoded correctly
        $data = $response->json();

        return $data['response'] ?? 'No response received';
    }
}
