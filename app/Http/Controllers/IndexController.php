<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

/**
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'timestamp' => time()
        ]);
    }
}
