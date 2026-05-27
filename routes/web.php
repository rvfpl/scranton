<?php
use App\Models\Job;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostJobController;
use App\Http\Controllers\JobController;
 
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Homepage
|--------------------------------------------------------------------------
*/

Route::view('/', 'welcome');


/*
|--------------------------------------------------------------------------
| Jobs (GLOBAL)
|--------------------------------------------------------------------------
*/

Route::prefix('jobs')->group(function () {

    // Jobs index (optional)
    Route::get('/', fn() => view('jobs'))->name('jobs.index');

    // Job detail page
    Route::get('/{slug}', [JobController::class, 'detail'])
        ->where('slug', '[A-Za-z0-9\-]+')
        ->name('jobs.show');   // ← REQUIRED FOR route('jobs.show')
});


Route::get('/poznan', function () {
    $jobs = Job::active()->featuredFirst()->latest()->get();
    return view('poznan', ['jobs' => $jobs]);
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
| Regional Pages (Scranton, Silicon Valley, etc.)
|--------------------------------------------------------------------------
*/

Route::prefix('pa')->name('pa.')->group(function () {

    Route::view('/scranton', 'pa.scranton')->name('scranton');
    Route::view('/chi', 'pa.chi')->name('chi');

    // Silicon Valley page with jobs
    Route::get('/sv', function () {
        $jobs = Job::latest()->get();   // ← Pass jobs to Blade
        return view('pa.sv', compact('jobs'));
    })->name('sv');

    Route::view('/hockey', 'pa.hockey')->name('hockey');
    Route::view('/angielski', 'pa.angielski')->name('angielski');
});


Route::get('/im', function () {
    return view('im.index');
});

Route::get('/im/{handle}', function ($handle) {
    $members = [
        'bobby' => [
            'number'   => '001',
            'handle'  => 'bobby',
            'name'     => "Rob 'Bobby' Fantana",
       'aliases'     => "Native, Fanta, Fantana, Robbo, ElBoberino, Bober, Gandalf the Wiseguy, &lt;redacted&gt;, Yo Bobbbbaaayy, MC BO!", 
            
            'date'     => 'May 2026',
            'badge'    => 'Vetted',
            'stack'    => 'LAMP / XAMPP / PHP / VB6 / Obj-C',
            'location' => 'Toronto, CA // NiagaraFalls, NY // Tricity, PL', 
        'created'     => 'Scranton.dev',
        'created_url' => '/', 
        'image'       => '/img/sc6.jpg',
        'quote'       => "My code? 60% of the time it works Everytime!", 
        'im_url'      => '/im/bobby', 
        'method'      => 'Old Code, Low Code, Break Shit, Eat Stuff, Refactor. Quabity Ashuance, Repeat. Always Repeat.',
        'real_method' => 'RTD, KISS, Coffee, The Office Reruns',
         'github'   => 'https://github.com/rvfpl',
            'site'     => 'https://scranton.dev',
            'promoted' => 'Scranton.dev',
            'promoted_url' => 'http://scranton-dev.test/'
        ],
    ];

    abort_if(!isset($members[$handle]), 404);

    return view('im.show', ['member' => $members[$handle]]);
});
/*
|--------------------------------------------------------------------------
| India Pages
|--------------------------------------------------------------------------
*/

Route::prefix('in')->group(function () {
    Route::view('/bengaluru', 'in.bengaluru');
});


/*
|--------------------------------------------------------------------------
| Poland Pages
|--------------------------------------------------------------------------
*/

Route::prefix('pl')->group(function () {
    Route::view('/gdansk', 'pl.gdansk');
});


/*
|--------------------------------------------------------------------------
| Static Pages Catch‑All
|--------------------------------------------------------------------------
*/

Route::get('/{view}', function ($view) {

    if (!preg_match('/^[A-Za-z0-9_\-]+$/', $view)) {
        abort(404);
    }

    if (view()->exists($view)) {
        return view($view);
    }

    abort(404);
});
