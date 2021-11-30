<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\voucherController;
use App\Http\Middleware\checkLogout;
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
Route::middleware(['is_login'])->group(function () {
    Route::get('/listRequest', [HomeController::class, "listRequest"]);
    Route::get('/listWithdraw', [HomeController::class, "listWithdraw"]);

    Route::prefix("home")->group(function(){
        Route::get("/user", [HomeController::class, "home_user"]);
        Route::get("/pegawai", [HomeController::class, "home_pegawai"]);
        Route::get("/admin", [HomeController::class, "home_admin"]);
        Route::get("/ajax/{jasa}", [HomeController::class, "ajax"]);
        Route::get("/add_cart/{id}", [HomeController::class, "add_cart"]);
        Route::get("/list_cart", [HomeController::class, "list_cart"]);
        Route::get("/transaksi_sewa", [HomeController::class, "transaksi_sewa"]);
        Route::get("/pembayaran", [HomeController::class, "pembayaran"]);
        Route::post("/do_pembayaran", [HomeController::class, "do_pembayaran"]);
        Route::get("/list_cart_cancel/{id}", [HomeController::class, "list_cart_cancel"]);
        Route::get("/do_transaksi_sewa", [HomeController::class, "do_transaksi_sewa"]);
        Route::get("/ongoingtrans", [UserController::class, "ongoingtrans"]);
    });
    Route::prefix("admin")->group(function(){
    //Route::get("/listpegawai",function ()
    //{
        //return view('admin.listPegawai_Admin');
        //Route::get("/listPegawai_Admin", [HomeController::class, "home_list_pegawai"]);
    //});


    //MASTER KATEGORI
    Route::get('/listKategori', [HomeController::class, "listKategori"]);
    Route::get("/addKategori",function ()
    {
        return view('admin.kategori.addKategori_Admin');
    });
    Route::get('/editKategori/{id}', [HomeController::class, "editKategori"]);
    Route::post('/prosesAddKategori', [HomeController::class, "prosesAddKategori"]);
    Route::post('/prosesEditKategori/{id}', [HomeController::class, "prosesEditKategori"]);
    Route::any('/prosesDeleteKategori/{id}', [HomeController::class, "prosesDeleteKategori"]);
    //MASTER KATEGORI


    //MASTER BARANG
    Route::get('/listbarang', [HomeController::class, "listBarang"]);
    Route::get('/addBarang', [HomeController::class, "addBarang"]);
    // Route::get("/editBarang/{id}",function ()
    // {
    //     return view('admin.editBarang_Admin');
    // });
    Route::get('/editBarang/{id}', [HomeController::class, "EditBarang"]);
    Route::post('/prosesAddBarang', [HomeController::class, "prosesAddBarang"]);
    Route::post('/prosesEditBarang/{id}', [HomeController::class, "prosesEditBarang"]);
    Route::any('/prosesDeleteBarang/{id}', [HomeController::class, "prosesDeleteBarang"]);
    Route::get('/prosesEditStock/{id}', [HomeController::class, "prosesEditStock"]);
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

    //MASTER VOUCHER
    Route::get("/listVoucher", [voucherController::class, "listVoucher"]);
    Route::get('/editVoucher/{id}', [voucherController::class, "editVoucher"]);
    Route::get("/addVoucher",function ()
    {
        return view('admin.voucher.addVoucher');
    });
    Route::post('/prosesAddVoucher', [voucherController::class, "prosesAddVoucher"]);
    Route::post('/prosesEditVoucher/{id}', [voucherController::class, "prosesEditVoucher"]);
    Route::any('/prosesDeleteVoucher/{id}', [voucherController::class, "prosesDeleteVoucher"]);
    //MASTER VOUCHER

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

    Route::get('/hasilCari/{nama}', [HomeController::class, "hasilCari"]);

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

        Route::get("/detailcart/{id}", [UserController::class, "detailcart"]);
        Route::get("/ajax/getbarang", [UserController::class, "ajaxgetbarang"]);
        Route::post("/dotambahaddon", [UserController::class, "dotambahaddon"]);
        Route::post("/doeditaddon", [UserController::class, "doeditaddon"]);
        Route::get("/doremoveaddon/{id}/{idpegawai}", [UserController::class, "doremoveaddon"]);

        Route::post("/dosavedetailcart", [UserController::class, "dosavedetailcart"]);
        Route::post("/detaileditcart/{id}", [UserController::class, "detaileditcart"]);

        Route::get("/detaileditcart/{id}", [UserController::class, "detaileditcart"]);
        Route::get("/dotambahaddonedit/{id}", [UserController::class, "dotambahaddonedit"]);
        Route::post("/doeditaddonedit", [UserController::class, "doeditaddonedit"]);
        Route::get("/doremoveaddonedit/{id}", [UserController::class, "doremoveaddonedit"]);
        Route::post("/doupdatedetailcart", [UserController::class, "doupdatedetailcart"]);

        Route::get("/doremovecart/{id}", [UserController::class, "doremovecart"]);

        Route::get("/detailongoing/{id}", [UserController::class, "detailongoing"]);

        Route::get("/chat/{id}", [UserController::class, "chat"]);
        Route::post("/chat_ajax", [UserController::class, "chat_ajax"]);

        Route::post("/chat_ajax2", [UserController::class, "chat_ajax2"]);
    });
    Route::prefix("pegawai")->group(function(){
        Route::get('/pesanan', [HomeController::class, "pegawaiOrder"]);
        Route::get('/history', [HomeController::class, "history"]);
        Route::get("/profile", [HomeController::class, "pegawaiProfile"]);
        Route::get("/chat", [HomeController::class, "pegawaiChat"]);
        Route::post("/chat_ajax_pegawai_insert", [HomeController::class, "chat_ajax_pegawai_insert"]);
        Route::post("/chat_ajax_pegawai", [HomeController::class, "chat_ajax_pegawai"]);
    });
});

Route::get('/',[HomeController::class,"home"])->middleware('is_logout');

Route::post('/checkLogin', [HomeController::class, "checkLogin"]);
Route::post('/register', [HomeController::class, "register"]);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('logout', [HomeController::class, "logout"]);

