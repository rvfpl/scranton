<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

/*
|--------------------------------------------------------------------------
| API Routes
| These are automatically prefixed with /api by Laravel's RouteServiceProvider.
| e.g. Route::get('/jobs') is reachable at /api/jobs
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {

    Route::get('/jobs', [JobController::class, 'index']);
    Route::get('/jobs/{job}', [JobController::class, 'show']);

});
