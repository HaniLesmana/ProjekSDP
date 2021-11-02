<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;
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

});
Route::prefix("admin")->group(function(){
    //Route::get("/listpegawai",function ()
    //{
        //return view('admin.listPegawai_Admin');
        //Route::get("/listPegawai_Admin", [HomeController::class, "home_list_pegawai"]);
    //});


    //MASTER KATEGORI
    Route::get('/listkategori', [HomeController::class, "listKategori"]);
    Route::get("/addKategori",function ()
    {
        return view('admin.addKategori_Admin');
    });
    Route::get("/editKategori",function ()
    {
        return view('admin.editKategori_Admin');
    });
    Route::post('/prosesAddKategori', [HomeController::class, "prosesAddKategori"]);
    Route::post('/prosesEditKategori/{id}', [HomeController::class, "prosesEditKategori"]);
    Route::post('/prosesDeleteKategori/{id}', [HomeController::class, "prosesDeleteKategori"]);
    //MASTER KATEGORI


    //MASTER BARANG
    Route::get('/listbarang', [HomeController::class, "listBarang"]);
    Route::get('/addBarang', [HomeController::class, "addBarang"]);
    Route::get("/editBarang",function ()
    {
        return view('admin.editBarang_Admin');
    });
    Route::post('/prosesAddBarang', [HomeController::class, "prosesAddBarang"]);
    Route::post('/prosesEditBarang/{id}', [HomeController::class, "prosesEditBarang"]);
    Route::post('/prosesDeleteBarang/{id}', [HomeController::class, "prosesDeleteBarang"]);
    //MASTER BARANG


    //MASTER PEGAWAI
    Route::get("/listpegawai", [HomeController::class, "home_list_pegawai"]);
    Route::get('/EditPegawai/{id}', [HomeController::class, "EditPegawai"]);
    Route::get("/addPegawai",function ()
    {
        return view('admin.addPegawai_Admin');
    });
    Route::post('/prosesAddPegawai', [HomeController::class, "prosesAddPegawai"]);
    Route::post('/prosesEditPegawai/{id}', [HomeController::class, "prosesEditPegawai"]);
    Route::any('/prosesDeletePegawai/{id}', [HomeController::class, "prosesDeletePegawai"]);
    //MASTER PEGAWAI

    //TRANSAKSI TOPUP WITHDRAW
    Route::get("/detailTopUp/{id}/{email}",function ($id,$email)
    {
        $htranstpwd = DB::select("select * from htranstpwd where htranstpwd_id = '$id'");
        $dtranstpwd = DB::select("select * from dtranstpwd where htranstpwd_id = '$id'");
        return view('admin.detailTopUp',['id'=>$id,'email'=>$email,'dataheader'=>$htranstpwd,'datadetail'=>$dtranstpwd]);
    });
    Route::post('/detailTopUp/actionAccept/{id}', [HomeController::class, "prosesAcc"]);
    Route::post('/detailTopUp/actionDecline/{id}', [HomeController::class, "prosesDecline"]);
    //TRANSAKSI TOPUP WITHDRAW


});
Route::prefix("user")->group(function(){
    Route::get("/topUp",function ()
    {
        return view('user.user_topup');
    });
    Route::get("/cart",function ()
    {
        return view('user.user_cart');
    });
    Route::get("/checkout",function ()
    {
        return view('user.user_checkout');
    });
    // Route::get("/ajax1", [HomeController::class, "ajax1"]);
    Route::post("/gotocart", [HomeController::class, "gotocart"]);
    Route::post("/gotocheckout", [HomeController::class, "gotocheckout"]);
});
Route::prefix("pegawai")->group(function(){
    Route::get('/pesanan', [HomeController::class, "pegawaiOrder"]);
    Route::get('/history', [HomeController::class, "history"]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
