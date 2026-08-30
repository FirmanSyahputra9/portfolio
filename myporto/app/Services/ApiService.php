<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Throwable;

class ApiService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function get(string $endpoint)
    {
        return Http::withToken(env('API_KEY'))
            ->acceptJson()
            ->get(env('API_URL'). '/api' . $endpoint);
    }

    public function portfolio(): array
    {
        try {
            $response = $this->get('/portfolio');

            if ($response->failed()) {
                return [];
            }

            return $response->json('data') ?? [];
        } catch (Throwable $e) {
            return [];
        }
    }
}
