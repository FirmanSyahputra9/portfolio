<?php

use Illuminate\Support\Facades\Route;
use App\Services\ApiService;



Route::get('/myporto', function (ApiService $api) {
    $response = $api->get('/portfolio');

    return response()->json($response->json());
});
