<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostJobController;
use App\Http\Controllers\JobController;

/*
|--------------------------------------------------------------------------
| Homepage
|--------------------------------------------------------------------------
*/

Route::view('/', 'welcome');


/*
|--------------------------------------------------------------------------
| Jobs
|--------------------------------------------------------------------------
*/

Route::prefix('jobs')->group(function () {
    Route::get('/', fn() => view('jobs'));
    Route::get('/{slug}', [JobController::class, 'detail'])
        ->where('slug', '[A-Za-z0-9\-]+');
});


/*
|--------------------------------------------------------------------------
| Post a Job
|--------------------------------------------------------------------------
*/

Route::controller(PostJobController::class)->group(function () {
    Route::get('/post-job', 'show');
    Route::post('/post-job', 'store');
});


/*
|--------------------------------------------------------------------------
| Regional Pages (Scranton, Bengaluru, Gdansk, etc.)
|--------------------------------------------------------------------------
*/

Route::prefix('pa')->group(function () {
    Route::view('/scrantonpa', 'pa.scrantonpa');
});

Route::prefix('in')->group(function () {
    Route::view('/bengaluru', 'in.bengaluru');
});

Route::prefix('pl')->group(function () {
    Route::view('/gdansk', 'pl.gdansk');
});


/*
|--------------------------------------------------------------------------
| Static Pages Catch‑All
|--------------------------------------------------------------------------
| Any request like /about → resources/views/about.blade.php
| /scrantonguide → resources/views/scrantonguide.blade.php
| /thisguy → resources/views/thisguy.blade.php
|
| This MUST stay at the bottom so it doesn't swallow real routes.
|--------------------------------------------------------------------------
*/

Route::get('/{view}', function ($view) {
    // Only allow simple filenames (no slashes, no dots)
    if (!preg_match('/^[A-Za-z0-9_\-]+$/', $view)) {
        abort(404);
    }

    if (view()->exists($view)) {
        return view($view);
    }

    abort(404);
});
