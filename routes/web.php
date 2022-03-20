<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/price', function () {
    return view('price');
});

Route::get('/team', function () {
    return view('team');
});

Route::get('faqs', function () {
    return view('faqs');
});

Route::get('/services/{title}', function ($title) {

    return view('serviceDetail', ['title' => $title]);
});

Route::get('/services', function () {
    return view('services');
});

Route::get('contact', function () {
    return view('contact');
});


Route::get('about', function () {
    return view('about');
});

Route::get('login', AuthController::class . '@showPage')->name('login');
Route::post('login', AuthController::class . '@login');
Route::get('logout', AuthController::class . '@logout');
Route::get('/profile', function () {

    if (auth()->check()) {
        return redirect()->route('profile', auth()->id());
    } else {
        abort(404);
    }
});
Route::get('/profile/{id}', AuthController::class . '@profile')->name('profile')->middleware('auth');
Route::post('/profile', AuthController::class . '@profileUpdate');
Route::prefix('admin')->group(function () {
    Route::get('/', AdminController::class . '@dashboard');
    Route::get('/login', AdminController::class . '@showPage');
    Route::post('/login', AdminController::class . '@login')->name('admin.login');
    Route::get('/dashboard', AdminController::class . '@dashboard');
});
