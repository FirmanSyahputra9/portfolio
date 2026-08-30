<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PortfolioService;

class PortfolioController extends Controller
{
    public function __construct(
        protected PortfolioService $portfolioService
    ) {}

    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => $this->portfolioService->getPortfolioData(),
        ]);
    }
}
