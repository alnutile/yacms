<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PagesController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get("/about", function() {
    return Inertia::render('About/Show');
})->name("about");

Route::get('/posts', PagesController::class)->name('pages.index');

Route::get('/{slug}', PageController::class)->name('frontend');

Route::get('/', function () {
    return Inertia::render('Home/Show');
})->name("home");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
