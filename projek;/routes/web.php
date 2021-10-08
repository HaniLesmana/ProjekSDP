<?php

use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,"home"]);

Route::post('/checkLogin', [HomeController::class, "checkLogin"]);
Route::get('/register', [HomeController::class, "register"]);

Route::prefix("home")->group(function(){
    Route::get("/user", [HomeController::class, "home_user"]);
    Route::get("/pegawai", [HomeController::class, "home_pegawai"]);
    Route::get("/admin", [HomeController::class, "home_admin"]);
});
Route::prefix("admin")->group(function(){
    Route::get("/listpegawai",function ()
    {
        return view('admin.listPegawai_Admin');
    });
    Route::get("/listbarang",function ()
    {
        return view('admin.listBarang_Admin');
    });
    Route::get("/addBarang",function ()
    {
        return view('admin.addBarang_Admin');
    });
    Route::get("/editBarang",function ()
    {
        return view('admin.editBarang_Admin');
    });
    Route::get("/addPegawai",function ()
    {
        return view('admin.addPegawai_Admin');
    });
    Route::get("/editPegawai",function ()
    {
        return view('admin.editPegawai_Admin');
    });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
