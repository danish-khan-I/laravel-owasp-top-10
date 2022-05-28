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
    // phpinfo();
    // dd(extension_loaded('json'));
    // dd(get_loaded_extensions());
    $payload = array(
        "data" => [
            "name" => "ZiHang Gao",
            "admin" => true
        ],
        "iss" => "http://example.org",
        "sub" => "1234567890",
    );
    $token = jwt_encode($payload,'null','none');
    dd($token);
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

Route::get('/services', AuthController::class . '@services')->name('servics');

Route::get('contact', function () {
    return view('contact');
});


Route::get('about', function () {
    return view('about');
});

Route::get('login', AuthController::class . '@showPage')->name('login');
Route::get('logs', function () {
    if (in_array($_SERVER["REMOTE_ADDR"], ['localhost', '127.0.0.1'])) {
        // return view('logs');
        return response(file_get_contents(public_path('../logs.txt')))->header('Content-Type', 'text/plain');
    }
    return abort(403, "Action not allowed");
});
Route::get('info', function () {
    if (in_array($_SERVER["REMOTE_ADDR"], ['localhost', '127.0.0.1'])) {
        return view('info');
    }
    return abort(403, "Action not allowed");
});
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
    Route::get('/login', AdminController::class . '@showPage');
    Route::post('/login', AdminController::class . '@login')->name('admin.login');
});
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        if (auth()->check()) {
            return redirect()->to('admin/dashboard');
        }
        return redirect()->to('/admin/login');
    });

    Route::get('/dashboard', AdminController::class . '@dashboard');
    Route::get('/users', AdminController::class . '@users')->name('admin.users');
    Route::get('/maps', AdminController::class . '@getMapPage')->name('maps');
    Route::get('/maps/create', AdminController::class . '@createMap')->name('maps.create');
    Route::post('/maps/create', AdminController::class . '@postMap');
    Route::get('/maps/export', AdminController::class . '@export')->name('admin.generatePdf');
    Route::get('/maps/{id}', AdminController::class . '@viewMap')->name('maps.view');
});
