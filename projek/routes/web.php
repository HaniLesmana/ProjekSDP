<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/',[HomeController::class,"home"]);

Route::post('/checkLogin', [HomeController::class, "checkLogin"]);
Route::post('/register', [HomeController::class, "register"]);
Route::get('/listRequest', [HomeController::class, "listRequest"]);
Route::get('/listWithdraw', [HomeController::class, "listWithdraw"]);



Route::prefix("home")->group(function(){
    Route::get("/user", [HomeController::class, "home_user"]);
    Route::get("/pegawai", [HomeController::class, "home_pegawai"]);
    Route::get("/admin", [HomeController::class, "home_admin"]);
    Route::get("/ajax/{jasa}", [HomeController::class, "ajax"]);
    // Route::get("/ajax",function ()
    // {
    //     return view('script');
    // });
});
Route::prefix("admin")->group(function(){
    //Route::get("/listpegawai",function ()
    //{
        //return view('admin.listPegawai_Admin');
        //Route::get("/listPegawai_Admin", [HomeController::class, "home_list_pegawai"]);
    //});

    Route::get("/listpegawai", [HomeController::class, "home_list_pegawai"]);
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
    Route::get('/EditPegawai/{id}', [HomeController::class, "EditPegawai"]);
    Route::post('/prosesAddPegawai', [HomeController::class, "prosesAddPegawai"]);
    Route::post('/prosesEditPegawai/{id}', [HomeController::class, "prosesEditPegawai"]);
    Route::any('/prosesDeletePegawai/{id}', [HomeController::class, "prosesDeletePegawai"]);
    Route::get("/detailTopUp/{id}",function ()
    {
        return view('admin.detailTopUp');
    });
});

Route::prefix("pegawai")->group(function(){
    Route::get('/pesanan', [HomeController::class, "pegawaiOrder"]);
    Route::get('/history', [HomeController::class, "history"]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
