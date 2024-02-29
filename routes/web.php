<?php


use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "Hello Word";
});

Route::get('/home', function () {
    return view ("home", [
        "title"=> "Home",
    ]);
});

Route::get('/about', function () {
    return view ("about", [
        "title"=> "About",
        "nama"=> "Muhammad Abid Fadhlullah Maajid",
        "kelas"=> "11 PPLG 2",
        "foto"=> "img/bbb.jpg",
    ]);
});


Route::group(["prefix"=>"/student"],function(){
    Route::get('/all', [StudentsController::class, 'index']);
    Route::get('/detail/{student}', [StudentsController::class, 'show']);
    Route::get('/create', [StudentsController::class, 'create']);
    Route::post('/store', [StudentsController::class, 'store']);
    Route::delete('/delete/{student}', [StudentsController::class, 'destroy']);
    Route::get('/edit/{student}', [StudentsController::class, 'edit']);
    Route::post('/update/{student}', [StudentsController::class, 'update']);
});

Route::group(["prefix"=>"/kelas"],function(){
    Route::get('/all', [KelasController::class, 'index']);
    Route::get('/detail/{kelas}', [KelasController::class, 'show']);
    Route::get('/create', [KelasController::class, 'create']);
    Route::post('/store', [KelasController::class, 'store']);
    Route::delete('/delete/{kelas}', [KelasController::class, 'destroy']);
    Route::get('/edit/{kelas}', [KelasController::class, 'edit']);
    Route::post('/update/{kelas}', [KelasController::class, 'update']);
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => '/dashboard'], function () {
    Route::group(['prefix' => '/all'], function () {
        Route::get('/all', [DashboardController::class, 'all'])->name('dashboard.all.all');
        Route::get('/dashboard/student/search', [DashboardController::class, 'studentSearch'])->name('dashboard.student.search');
    });
    Route::group(['prefix' => '/student'], function () {
        Route::get('/all', [DashboardController::class, 'studentAll'])->name('dashboard.student.all');
        Route::get('/detail/{student}', [DashboardController::class, 'studentShow']);
        Route::get('/create', [DashboardController::class, 'studentCreate']);
        Route::post('/add', [DashboardController::class, 'studentAdd']);
        Route::delete('/delete/{student}', [DashboardController::class, 'studentDestroy']);
        Route::get('/edit/{student}', [DashboardController::class, 'studentEdit']);
        Route::post('/update/{student}', [DashboardController::class, 'studentUpdate']);
    });
    Route::group(['prefix' => '/kelas'], function () {
        Route::get('/all', [DashboardController::class, 'kelasAll'])->name('dashboard.kelas.all');
        Route::get('/detail/{kelas}', [DashboardController::class, 'kelasShow']);
        Route::get('/create', [DashboardController::class, 'kelasCreate']);
        Route::post('/add', [DashboardController::class, 'kelasAdd']);
        Route::delete('/delete/{kelas}', [DashboardController::class, 'kelasDestroy']);
        Route::get('/edit/{kelas}', [DashboardController::class, 'kelasEdit']);
        Route::post('/update/{kelas}', [DashboardController::class, 'kelasUpdate']);
    });
}); 

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');   
});