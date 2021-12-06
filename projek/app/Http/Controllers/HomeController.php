<?php

namespace App\Http\Controllers;

use App\Models\addon;
use App\Models\barang;
use App\Models\Cart;
use App\Models\htransTopup;
use App\Models\kategori;
use App\Models\user;
use App\Models\pegawai;
use App\Models\admin;
use App\Models\chat;
use App\Models\logstok;
use App\Models\dtransbarang;
use App\Models\dtransbayar;
use App\Models\dtranssewa;
use App\Models\dtranstpwd;
use App\Models\htransbayar;
use App\Models\htranssewa;
use App\Models\logsaldo;
use App\Models\user_voucher;
use App\Models\voucher;
use App\Rules\cek_password;
use App\Rules\cek_uniq;
use App\Rules\ConfirmPassword;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $users = user::get();
        return view('user.index', ['users' => $users]);
    }
    function home(){
        return view("index");
    }

    function home_user(Request $request){
        $user=user::where('id',session('loggedIn'))->get();
        return view("home_user",['saldo' => data_get($user,'0.user_saldo')]);
    }

    function home_pegawai(){
        $dtranssewa=dtranssewa::where("pegawai_id",session("loggedIn"))->get();
        $totaldtranssewa=count($dtranssewa);
        $dtranssewa1=dtranssewa::where("pegawai_id",session("loggedIn"))->where("dSewa_status_accpegawai",2)->get();
        $totalnewdtranssewa=count($dtranssewa1);
        $chat=chat::where("chat_destination",session("loggedIn"))->get();
        $arr=array();
        foreach ($chat as $i => $c) {
            if (count($arr)==0){
                array_push($arr,$c);
            }else{
                $ada=false;
                foreach ($arr as $j => $a) {
                    if($a->chat_sender==$c->chat_sender){
                        $ada=true;
                    }
                }
                if(!$ada){
                    array_push($arr,$c);
                }

            }
        }
        $totalchat=count($arr);
        $dtranssewa2 = dtranssewa::where(
            'dSewa_tanggal', '>', Carbon::now()->subMonth()->toDateString()
        )
        ->where("pegawai_id",session("loggedIn"))
        ->get();
        $pendapatan_pegawai_per_bulan=0;
        foreach ($dtranssewa2 as $key => $dt) {
           $pendapatan_pegawai_per_bulan=$pendapatan_pegawai_per_bulan+$dt->dSewa_harga;
        }
        $pendapatan_pegawai=0;
        foreach ($dtranssewa as $key => $dt) {
            $pendapatan_pegawai=$pendapatan_pegawai+$dt->dSewa_harga;
        }

        $ctr = 0;
        foreach ($arr as $key => $ar) {
            if($ar->read == 0){
                $ctr++;
            }
        }

        return view("pegawai.home_pegawai",["totaldtranssewa"=>$totaldtranssewa,"totalnewdtranssewa"=>$totalnewdtranssewa,"totalchat"=>$totalchat,"newchat"=>$ctr,"arr"=>$chat,"pendapatan_pegawai"=>$pendapatan_pegawai,"pendapatan_pegawai_per_bulan"=>$pendapatan_pegawai_per_bulan]);
    }

    function home_admin(){
        return view("admin.home_admin");
    }
    public function listRequest()
    {
        $data = DB::select("select * from htranstpwd where htranstpwd_status = 2");
        $data = json_encode($data);
        // dd($data);
        return view("admin.listRequest",['data'=> $data]);

    }
    public function listWithdraw()
    {
        return view("admin.listWithdraw");
    }


    // MASTER KATEGORI
    public function listKategori()
    {
        $kategori = kategori::withTrashed()->get();
        return view('admin.kategori.listKategori_Admin',['kategori'=>$kategori]);
    }
    public function editKategori($id){
        $kategori = kategori::where('id',$id)->withTrashed()->get();
        return view('admin.kategori.editKategori_Admin',['id'=>$id],['kategori'=>$kategori]);
    }
    public function prosesAddKategori(Request $request)
    {
        // $rules = [
        //     'nama' => 'required'
        // ];
        // $message = [
        //     'required'=>':attribute harus diisi'
        // ];
        // $request->validate($rules, $message);

        // $ambil_kode = kategori::select("id")->get();
        // $ctr = 0;
        // for ($i = 0 ; $i < sizeof($ambil_kode) ; $i++){
        //     $kodeb = (int)substr($ambil_kode,3);
        //     if($ctr <= $kodeb){
        //         $ctr++;
        //     }
        // }
        // $urutan = str_pad($ctr,4,'0',STR_PAD_LEFT);
        // $kodeconcate = "K".$urutan;
        try {
            kategori::insert(
                [
                    //'id' => $kodeconcate,
                    'kategori_nama' => $request->nama
                ]
            );
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

        return $this->listKategori();

    }

    public function editProfile(Request $request)
    {
        $rules = [
			"nama" => 'required|string|min:3|max:30',
         "telp" => 'required|numeric',
			"email" => 'required|email',
         "alamat" =>'required'
        ];
        $message = [
            'required'=>':attribute harus diisi'
        ];
        $request->validate($rules, $message);
        $email = $request->email;
        $nama = $request->nama;
        $telp = $request->telp;
        $id = user::where("id",session('loggedIn'))->first()->id;

        //dd($email." ".$nama." ".$telp.$id);
        // $id = user::max("id");
        // $idd = $id+1;
        // $photo="";
        // // dd($idd);
        // if($request->hasFile("user_photo")){
        //     Storage::putFileAs("/public/photos",$request->file('user_photo'),"User".$idd.'.'.$request->file('user_photo')->getClientOriginalExtension());
        //     $photo ="User".$idd.".".$request->file('user_photo')->getClientOriginalExtension();
        // }
        //dd($id);
        try {
            user::where('id',$id)->update(
                [
                    'user_email' => $request->email,
                    'user_nama' => $request->nama,
                    'user_telepon' => $request->telp,
                    'user_alamat' => $request->alamat
                ]
            );
            // dd(user::where('id',$id)->get());
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        // return $this->home($request);
        return $this->profileUser($request);
    }
    public function editProfilePegawai(Request $request)
    {
        $rules = [
            "nama" => 'required|string|min:3|max:30',
            "telp" => 'required|numeric',
            "email" => 'required|email',
            "alamat" =>'required'
        ];
        $message = [
            'required'=>':attribute harus diisi'
        ];
        $request->validate($rules, $message);
        $id = pegawai::where("id",session('loggedIn'))->first()->id;
        try {
            pegawai::where('id',$id)->update(
                [
                    'pegawai_email' => $request->email,
                    'pegawai_nama' => $request->nama,
                    'pegawai_telepon' => $request->telp,
                    'pegawai_alamat' => $request->alamat
                ]
            );
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        // return $this->home($request);
        return $this->pegawaiProfile($request);
    }
    public function updatePhotoPegawai(Request $request)
    {
        $id = pegawai::where("id",session('loggedIn'))->first()->id;
        $photou = pegawai::where("id",session('loggedIn'))->first()->pegawai_photo;
        //dd($request->hasFile("photo_user"));
        if($photou == "" || $photou==null){
            if($request->hasFile("pegawai_photo")){
                Storage::putFileAs("/public/photos",$request->file('pegawai_photo'),"Pegawai".$id.'.'.$request->file('pegawai_photo')->getClientOriginalExtension());
                $photo ="Pegawai".$id.".".$request->file('pegawai_photo')->getClientOriginalExtension();
                try {
                    pegawai::where('id',$id)->update(
                        [
                            'pegawai_photo' => $photo
                        ]
                    );
                } catch (\Exception $e) {
                    return response()->json($e->getMessage());
                }
            }
        }else{
            if($request->hasFile("pegawai_photo")){
                Storage::delete("/public/photos","User".$id.'.'.$request->file('pegawai_photo')->getClientOriginalExtension());
                Storage::putFileAs("/public/photos",$request->file('pegawai_photo'),"Pegawai".$id.'.'.$request->file('pegawai_photo')->getClientOriginalExtension());

            }
        }
        // return $this->home($request);
        return $this->pegawaiProfile($request);
    }
    public function updatePhoto(Request $request)
    {
        $id = user::where("id",session('loggedIn'))->first()->id;
        $photou = user::where("id",session('loggedIn'))->first()->user_photo;
        //dd($request->hasFile("photo_user"));
        if($photou == "" || $photou==null){
            if($request->hasFile("photo_user")){
                Storage::putFileAs("/public/photos",$request->file('photo_user'),"User".$id.'.'.$request->file('user_photo')->getClientOriginalExtension());
                $photo ="User".$id.".".$request->file('photo_user')->getClientOriginalExtension();
                try {
                    user::where('id',$id)->update(
                        [
                            'user_photo' => $photo
                        ]
                    );
                    // dd(user::where('id',$id)->get());
                } catch (\Exception $e) {
                    return response()->json($e->getMessage());
                }
            }
        }else{
            if($request->hasFile("photo_user")){
                Storage::delete("/public/photos","User".$id.'.'.$request->file('photo_user')->getClientOriginalExtension());
                Storage::putFileAs("/public/photos",$request->file('photo_user'),"User".$id.'.'.$request->file('photo_user')->getClientOriginalExtension());
            }
        }
        // return $this->home($request);
        return $this->profileUser($request);
    }
    public function prosesEditKategori(Request $request, $id)
    {
        $rules = [
            'nama' => 'required'
        ];
        $message = [
            'required'=>':attribute harus diisi'
        ];
        $request->validate($rules, $message);
        if($request->status=='Active'){
            kategori::withTrashed()->find($id)->restore();
        }else{
            kategori::where('id',$id)->delete();
        }
        try {
            kategori::where('id',$id)->update(
                [
                    'kategori_nama' => $request->nama
                ]
            );
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

        return $this->listKategori();
    }
    public function prosesDeleteKategori($id)
    {
        //dd($id);
        //$idkategori=kategori::where("id",$id)->first()->id;
        if(barang::where("barang_kategori",$id)->exists()){
            //echo "<script>alert('masih ada barang dengan kategori ini')</script>";
            //return redirect('/admin/listKategori');
        echo "<script>
            alert('masih ada barang dengan kategori ini');
            window.location.href='/admin/listKategori';
        </script>";
        }
        else{
            $cekada = false;
            $kat = kategori::where('id',$id)->first();
            $barang = barang::get();
            foreach($barang as $i =>$item){
                if($item->barang_kategori == $kat->kategori_nama){
                    $cekada=true;
                }
            }
            if($cekada){
                return back()->with('msg',"gagal delete! kategori sedang digunakan!");
            }else if(!$cekada){
                kategori::where('id',$id)->delete();
                return redirect('/admin/listKategori');
            }
        }
    }

    // MASTER KATEGORI


    // MASTER BARANG
    function listBarang(){
        $barang = barang::all();
        return view('admin.listBarang_Admin',['barang'=>$barang]);
    }
    public function addBarang(){
        // $kat = DB::select('select * from kategori');
        $kat=kategori::all();
        return view('admin.addBarang_Admin',['kategori'=>$kat]);
    }
    public function prosesAddBarang(Request $request){
        //dd($request->kategori);
        barang::create(
            ['barang_kategori' => $request->kategori, 'barang_nama' => $request->nama, 'barang_harga' => $request->harga, 'barang_stok' => $request->stok]
        );
        return redirect('/admin/listbarang');
    }
    public function EditBarang($id){
        $barang = barang::where('id',$id)->get();
        $kategori = kategori::get();
        return view("admin.editBarang_Admin",['id'=>$id,'barang'=>$barang,'kategori'=>$kategori]);
    }
    public function prosesEditBarang(Request $request,$id){
        // $id=$request->id;
        $nama=$request->nama;
        $harga=$request->harga;
        $stok=$request->stok;
        $statusbarang=$request->statusBarang;
        $kategori=$request->kategori;
        $rules = $request->validate([
			'nama' => 'required|string|min:3|max:255',
            'harga' => 'required|numeric',
			'stok' => 'required|numeric',
            'kategori'=>'required',
		],
        [
            'required' => ':attribute harus diisi',
            'min' => ':attribute harus 3 karakter',
            'max' => ':attribute maksimal 30 karakter',
            'numeric' => ':attribute harus berupa angka',
        ]);
        barang::where('id', $id)->update(['barang_nama'=>$nama,'barang_harga'=>$harga,'barang_stok'=>$stok,'barang_kategori'=>$kategori]);
        return $this->listBarang();
    }

    public function hasilCari($nama, Request $req){
        //dd($nama);
        if($nama !=""){
            $pegawai = DB::table('pegawai')->where('nama','like','%'.$nama.'%')->get();
        }
        else{
            $pegawai = DB::table('pegawai')->get();
        }
        return view('admin.hasilCari',['pegawai'=>$pegawai]);

    }

    public function prosesDeleteBarang($id){
        barang::where('id', $id)->delete();
        return redirect("/admin/listbarang");
    }
    // MASTER BARANG


    //MASTER PEGAWAI
    public function home_list_pegawai(){
        $pegawai = pegawai::get();
        return view("admin.listPegawai_Admin",['pegawai' => $pegawai]);
    }

    function EditPegawai($id,Request $request){
        $pegawai=pegawai::where('id',$id)->get();
        return view("admin.editPegawai_Admin",['id'=>$id],['pegawai' => $pegawai]);
    }

    function prosesDeletePegawai(Request $request){
        $id = $request->id;
        DB::table('pegawai')->where('pegawai_id', $id)->update(['pegawai_status'=>0]);
        $pegawai = DB::table('pegawai')->where('pegawai_status','1')->get();
        return view("admin.listPegawai_Admin",['pegawai' => $pegawai]);
    }

    function prosesEditPegawai($id,Request $request){
        // $id = $request->id;
        // DB::table('pegawai')->where('pegawai_id', $id)->update(['pegawai_status'=>0]);
        // $pegawai = DB::table('pegawai')->where('pegawai_status','1')->get();
        // return view("admin.listPegawai_Admin",['pegawai' => $pegawai]);
        $nik = $request->nik;
        $email = $request->email;
        $nama = $request->nama;
        $telepon = $request->telepon;
        $alamat = $request->alamat;
        $password = $request->password;
        $jenis = $request->jenis;
        // $confirm = $request->confirm;
        // $saldo = $request->saldo;
        // $status = $request->status;

        $rules = [
            'nik' => ['required','max:16','min:16',new cek_uniq($nik,'nik')],
            'email' => ['required','max:16'],
            'nama' => 'required',
            'telepon' => 'required',
            'alamat' => 'required|max:255',
            'jenis' => 'required',
            'password' => 'required',
            // 'saldo' => 'required',
            // 'status' => 'required'
        ];
        $message = [
            'required' => ':attribute harus diisi',
            // 'nik.required' => 'NIK harus diisi',
            'nik.min' => 'NIK harus 16 karakter',
            'nik.max' => 'NIK harus 16 karakter',
            // 'email.required' => 'Email harus diisi',
            // 'nama.required' => 'Nama harus diisi',
            // 'telepon.required' => 'Telepon harus diisi',
            // 'alamat.required' => 'Alamat harus diisi',
            'alamat.max' => 'Alamat maximal 255 karakter',
            'jenis.required' => 'Pilih salah satu jenis!',
            // 'password.required' => 'Password harus diisi',
        ];
        $request->validate($rules, $message);

        pegawai::where('pegawai_id', $id)->update([
            'pegawai_nik'=>$nik,
            'pegawai_email'=>$email,
            'pegawai_nama'=>$nama,
            'pegawai_telepon'=>$telepon,
            'pegawai_alamat'=>$alamat,
            'password'=>$password,
            'pegawai_jasa' => $jenis
        ]);
        // $pegawai = DB::table('pegawai')->where('pegawai_status','1')->get();
        // return view("admin.listPegawai_Admin",['pegawai' => $pegawai]);
        return $this->home_list_pegawai();
    }

    function prosesAddPegawai(Request $request){
        $nik = $request->nik;
        $email = $request->email;
        $nama = $request->nama;
        $telepon = $request->telepon;
        $alamat = $request->alamat;
        $jenis = $request->jenis;
        $password = $request->password;
        $confirm = $request->confirm;

        // $user = DB::select("select * from user where user_status = 1 and user_email = '$email'");
        // $pegawai = DB::select("select * from pegawai where pegawai_status = 1 and pegawai_email = '$email'");
        // $admin = DB::select("select * from admin where admin_status = 1 and admin_email = '$email'");

        $rules = [
            'nik' => ['required','max:16','min:16',new cek_uniq('nik')],
            //'nik' => ['required','max:16','min:16'],
            'email' => ['required','email',new cek_uniq('email')],
            //'email' => ['required','email'],
            'nama' => 'required',
            'telepon' => ['required','max:15'],
            'alamat' => 'required|max:255',
            'jenis' => 'required',
            'password' => ['required','confirmed']
        ];
        $message = [
            'nik.required' => 'NIK harus diisi',
            'nik.min' => 'NIK harus 16 karakter',
            'nik.max' => 'NIK harus 16 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email salah',
            'nama.required' => 'Nama harus diisi',
            'telepon.required' => 'Telepon harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.max' => 'Alamat maximal 255 karakter',
            'jenis.required' => 'Pilih salah satu jenis!',
            'password.required' => 'Password harus diisi',
        ];
        $request->validate($rules, $message);

        $pegawai = pegawai::all();
        $id = "";
        $max = 0;
        $cek = false;
        foreach ($pegawai as $peg) {
            if((int)substr($peg->pegawai_id,1,11) >= $max){
                $max = (int)substr($peg->pegawai_id,1,11) + 1;
                $cek = true;
            }
        }
        if($cek){
            $id = "P".str_pad($max, 11, "0", STR_PAD_LEFT);
        }
        else{
            $id = "P00000000000";
        }

        pegawai::create(array(
            'pegawai_id' => $id,
            'pegawai_nik' => $nik,
            'pegawai_email' => $email,
            'pegawai_nama' => $nama,
            'pegawai_telepon' => $telepon,
            'pegawai_alamat' => $alamat,
            'password' => bcrypt($password),
            'pegawai_jasa' => $jenis,
            'pegawai_saldo' => 0,
            'pegawai_status' => 1
        ));
        return $this->home_list_pegawai();
        //return $this->home_list_pegawai();
        // $pegawai = DB::table('pegawai')->where('pegawai_status','1')->get();
        // return view("admin.listPegawai_Admin",['pegawai' => $pegawai]);
        //return redirect("/listpegawai");
    }
    //MASTER PEGAWAI

    function checkLogin(Request $request){
        $email = $request->input("user_login_email");
        $password = $request->input("user_login_pass");

        if (user::where('user_email',$email)->exists() || pegawai::where('pegawai_email',$email)->exists() || admin::where('admin_email',$email)->exists()) {
            if(user::where('user_email',$email)->first() !=null){
                $request->validate([
                    'user_login_email' => ['required','email'],
                    'user_login_pass' => ['required'],
                ],[
                    'username.email'=> "Email atau password salah",
                    'password.required' => "Email atau password salah",
                ]);

                // AUTH START
                $data = [
                    'user_email' => $request->input("user_login_email"),
                    'password' => $request->input("user_login_pass"),
                ];
                // if(Auth::guard('web_user')->attempt($data)){
                //     $request->session()->regenerate();
                //     $request->session()->put("loggedIn", user::where('user_email',$email)->first()->id);
                //     $request->session()->flash("welcomeUser", "Selamat datang ".user::where('user_email',$email)->first()->user_nama);
                //     return redirect("/home/user");
                // }
                // else{
                //     return view('index',['error'=>'ERROR']);
                // }
                // AUTH END

                $request->session()->put("loggedIn", user::where('user_email',$email)->first()->id);
                $request->session()->flash("welcomeUser", "Selamat datang ".user::where('user_email',$email)->first()->user_nama);
                return redirect("/home/user");

            }
            else if(pegawai::where('pegawai_email',$email)->first() != null){
                $request->validate([
                    'user_login_email' => 'required|email',
                    'user_login_pass' => ['required'],
                ],[
                    'username.email'=> "Email atau password salah",
                    'password.required' => "Email atau password salah",
                ]);

                // AUTH START
                // $data = [
                //     'pegawai_email' => $request->input("user_login_email"),
                //     'password' => $request->input("user_login_pass"),
                // ];
                // if(Auth::guard('web_pegawai')->attempt($data)){
                //     $request->session()->regenerate();
                //     $request->session()->put("loggedIn", pegawai::where('pegawai_email',$email)->first()->id);
                //     $request->session()->flash("welcomeUser", "Selamat datang ".pegawai::where('pegawai_email',$email)->first()->pegawai_nama);
                //     // dd(session()->all());
                //     return redirect("/home/pegawai");
                // }
                // else{
                //     return view('index',['error'=>'ERROR']);
                // }
                // AUTH END

                $request->session()->put("loggedIn", pegawai::where('pegawai_email',$email)->first()->id);
                $request->session()->flash("welcomeUser", "Selamat datang ".pegawai::where('pegawai_email',$email)->first()->pegawai_nama);
                return redirect("/home/pegawai");
            }
            else if(admin::where('admin_email',$email)->first()!=null){
                $request->validate([
                    'user_login_email' => 'required|email',
                    'user_login_pass' => ['required']
                ],[
                    'username.email'=> "Email atau password salah",
                    'password.required' => "Email atau password salah",
                ]);

                //AUTH START
                // $data = [
                //     'admin_email' => $request->input("user_login_email"),
                //     'password' => $request->input("user_login_pass"),
                // ];
                // if(Auth::guard('web_admin')->attempt($data)){
                //     $request->session()->regenerate();
                //     $request->session()->put("loggedIn", admin::where('admin_email',$email)->first()->id);
                //     $request->session()->flash("welcomeUser", "Selamat datang ".admin::where('admin_email',$email)->first()->admin_nama);
                //     return redirect("/home/admin");
                // }
                // else{
                //     return view('index',['error'=>'ERROR']);
                // }
                //AUTH END

                $request->session()->put("loggedIn", admin::where('admin_email',$email)->first()->id);
                $request->session()->flash("welcomeUser", "Selamat datang ".admin::where('admin_email',$email)->first()->admin_nama);
                return redirect("/home/admin");
            }
            else {
                return view('index',['error'=>'ERROR']);
            }
        }
        else{
            //return view('index',['error'=>'Email not registered!']);
            return back()->with(['eror'=>'Email not registered!']);
        }
    }

    function register(Request $request){
        $request->validate([
			'nama_user' => 'required|string|min:3|max:30',
            'telp_user' => 'required|numeric',
			'email_user' => 'required|email',
            'alamat_user'=>'required',
			'password_user' => 'required|min:8|required_with:confirm_password|same:confirm_password',
            'confirm_password'=> 'min:8',
		]);

        $email = $request->input("email_user");

        if (user::where('user_email',$email)->exists()) {

            return view('index',['errorEmail'=>'Email telah terdaftar']);
        }
        else{
            $nama = $request ->input("nama_user");
            $password = $request ->input("password_user");
            $telp = $request ->input("telp_user");
            $id = user::max("id");
            $idd = $id+1;
            $photo="";
            // dd($idd);
            if($request->hasFile("user_photo")){
                Storage::putFileAs("/public/photos",$request->file('user_photo'),"User".$idd.'.'.$request->file('user_photo')->getClientOriginalExtension());
                $photo ="User".$idd.".".$request->file('user_photo')->getClientOriginalExtension();
            }


            $user = new user;
            $user->user_email = $email;
            $user->user_nama = $nama;
            $user->user_telepon = $telp;
            $user->user_alamat = $request->input("alamat_user");
            $user->password = bcrypt($password);
            $user->user_saldo = 0;
            $user->user_poin = 0;
            $user->user_photo = $photo;
            $user->save();

            //return $this->home();
            return view('index',['sukses'=>'Register berhasil!']);
        }

    }
    function ajax($jasa){
        $cart=cart::where("user_id",session('loggedIn'))->get();
        $peg = pegawai::where('pegawai_jasa',$jasa)->get();
        $pegawai=array();
        foreach ($peg as $key => $p) {
            $ada=false;
            foreach ($cart as $key => $c) {
                if($c->pegawai_id==$p->id){
                    $ada=true;
                }
            }
            if ($ada==false){
                $new = pegawai::where('pegawai_jasa',$jasa)->where('id',$p->id)->first();
                array_push($pegawai,$new);
            }
        }
        //$pegawai = pegawai::where('pegawai_jasa',$jasa)->get();
        return view("script",['pegawai' => $pegawai],['jasa'=>$jasa]);
    }
    function ajax1($data){
        //dd($data);
        return view('user.user_cart');
    }
    function pegawaiOrder(){
        //$dtranssewa=dtranssewa::where("pegawai_id",session('loggedIn'))->where("dSewa_status_accpegawai",2)->get();
        $dtranssewa=dtranssewa::where(function ($query) {
             $query->where('pegawai_id', '=', session('loggedIn'))
                   ->where('dSewa_status_accpegawai', '=', 2);
        })->orWhere(function ($query) {
             $query->where('pegawai_id', '=', session('loggedIn'))
                   ->where('dSewa_status_accpegawai', '=', 1);
        })->get();
        return view("pegawai/pesanan",["dtranssewa"=>$dtranssewa]);
    }
    public function pegawaiOrderacc($id){
        dtranssewa::where("id",$id)->update([
            "dSewa_status_accpegawai"=>1
        ]);
        return redirect("/pegawai/pesanan");
    }
    public function pegawaiOrdercancel($id){
        dtranssewa::where("id",$id)->update([
            "dSewa_status_accpegawai"=>0
        ]);
        $dt=dtranssewa::where("id",$id)->first();
        //chat::where("chat_sender",$dt->htranssewa->user_id)->where("chat_destination",$dt->pegawai_id)->delete();
        return redirect("/pegawai/pesanan");
    }
    function history(){
        return view("pegawai/history");
    }
    function gotocart(Request $request){
        $hid10k=array('nama' => 'Rp10.000', 'jumlah' => $request->hid10k,'id'=>'btn10');
        $hid20k=array('nama' => 'Rp20.000', 'jumlah' => $request->hid20k,'id'=>'btn20');
        $hid50k=array('nama' => 'Rp50.000', 'jumlah' => $request->hid50k,'id'=>'btn50');
        $hid75k=array('nama' => 'Rp75.000', 'jumlah' => $request->hid75k,'id'=>'btn75');
        $hid100k=array('nama' => 'Rp100.000', 'jumlah' => $request->hid100k,'id'=>'btn100');
        $hid125k=array('nama' => 'Rp125.000', 'jumlah' => $request->hid125k,'id'=>'btn125');
        $hid190k=array('nama' => 'Rp190.000', 'jumlah' => $request->hid190k,'id'=>'btn190');
        $hid250k=array('nama' => 'Rp250.000', 'jumlah' => $request->hid250k,'id'=>'btn250');
        $arr=array();
        array_push($arr,$hid10k);
        array_push($arr,$hid20k);
        array_push($arr,$hid50k);
        array_push($arr,$hid75k);
        array_push($arr,$hid100k);
        array_push($arr,$hid125k);
        array_push($arr,$hid190k);
        array_push($arr,$hid250k);
        $total=(10000*$request->hid10k)+(20000*$request->hid20k)+(50000*$request->hid50k)+(75000*$request->hid75k)+(100000*$request->hid100k)+(125000*$request->hid125k)+(190000*$request->hid190k)+(250000*$request->hid250k);
        return view('user.user_cart',['data'=>json_encode($arr)],['total'=>$total]);
    }
    function withdraw(Request $request)
    {
        $user = user::where('id',session('loggedIn'))->first();
        $saldo = $user->user_saldo;
        return view('user.user_withdraw',['saldo'=>$saldo]);
    }
    function gotocheckout(Request $request){
        $data=json_decode($request->data);
        $total = $request->total;
        $user = user::where('id',session('loggedIn'))->first();
        $email = $user->user_email;
        $id = $user->id;
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $params = array(
            'transaction_details' => array(
                'order_id' => 4,
                'gross_amount' => $total,
            ),
            'customer_details' => array(
                'first_name' => $user->user_nama,
                'email' => $user->user_email,
                'phone' => $user->user_telepon,
            ),
            'expiry' => array(
                'start_time'=> date('Y-m-d H:i:s T'),
                'unit' => 'days',
                'duration'=>2,
            )
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);
        htransTopup::create([
            'user_id' => $id,
            'htranstpwd_tanggal' => date("Y/m/d"),
            'htranstpwd_total' => $total,
            'htranstpwd_tipe' => 'topup',
            'htranstpwd_status' => 2,
            'token_payment' => $snapToken,
            'status_payment'=>"Kosong" ,
        ]);

        $mx = htransTopup::all();

        $max=0;
        foreach ($mx as $key => $value) {
            if((int)$value->htranstpwd_id>=$max){
                $max=(int)$value->htranstpwd_id;
            }
        }
        foreach ($data as $ar) {
            if($ar->jumlah!=0){
                // dd($mx);
                $tes=$ar->nama;
                $nominal=str_replace('Rp','',$tes);
                $nominal=str_replace('.','',$nominal);
                $tes=$ar->jumlah;

                dtranstpwd::create([
                    'htranstpwd_id' => $max,
                    'htranstpwd_nominal' => (int)$nominal,
                    'htranstpwd_jumlah' => (int)$tes,
                ]);

                //DB::insert('insert into dtranstpwd (htranstpwd_id, dtranstpwd_nominal,dtranstpwd_jumlah) values (?, ?, ?)', [$max, (int)$nominal,(int)$tes]);
            }
        }
        return view('user.user_cart',["bayar"=>$snapToken,"data"=>json_encode($data), "total"=>$total]);
        // return view('user.user_checkout',['total'=>$total, 'email'=>$email]);
    }
    function prosesAcc($id){
        $htranstpwd = DB::select("select * from htranstpwd where htranstpwd_id = '$id'");
        $total = (int)data_get($htranstpwd,'0.htranstpwd_total');
        $status = DB::update('update htranstpwd set htranstpwd_status = 1 where htranstpwd_id = ?', [$id]);

        $userID = data_get($htranstpwd,'0.user_id');
        $users = DB::select("select * from user where user_id = '$userID'");
        $saldo = (int)data_get($users,'0.user_saldo');

        $saldo = $saldo + $total;
        $status = DB::update("update user set user_saldo = '$saldo' where user_id = '$userID'");
        return view('admin.home_admin');
    }
    function prosesDecline($id){
        $status = DB::update('update htranstpwd set htranstpwd_status = 0 where htranstpwd_id = ?', [$id]);
        return view('admin.home_admin');
    }
    function add_cart($id,Request $request){
        try {
            Cart::create(
                [
                    'user_id' => $request->session()->get("loggedIn"),
                    'pegawai_id' =>$id,
                ]
            );
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        return $this->list_cart($request);
    }
    function list_cart(Request $request){
        $datacart=cart::where("user_id",$request->session()->get("loggedIn"))->get();
        $param["datacart"]=$datacart;
        $datapegawai=Pegawai::get();
        $param["datapegawai"]=$datapegawai;
        return view("user.list_cart",$param);
    }
    function list_cart_cancel(Request $request,$id){
        cart::where("user_id",$request->session()->get("loggedIn"))->where("id",$id)->delete();
        return $this->list_cart($request);
    }
    function transaksi_sewa(){
        $loggedin = session('loggedIn');
        // $datacart = DataCart::where("user_id",$loggedin)->get();
        $datacart = cart::where("user_id",session('loggedIn'))->get();
        $dataaddon=addon::where("id_user",session('loggedIn'))->get();
        $datapegawai = pegawai::get();
        $datauser=User::where("id",session('loggedIn'))->first();
        $databarang=barang::get();
        $datakategori=kategori::get();
        $total=0;
        foreach ($datacart as $key => $dc) {
            if($dc->pegawai->pegawai_jasa=="Cleaning"){
                $total=$total+150000;
            }
            else if($dc->pegawai->pegawai_jasa=="Painting"){
                $total=$total+200000;
            }
            else if($dc->pegawai->pegawai_jasa=="Plumbing"){
                $total=$total+300000;
            }
            else if($dc->pegawai->pegawai_jasa=="Electrical"){
                $total=$total+500000;
            }
            else if($dc->pegawai->pegawai_jasa=="Repair"){
                $total=$total+400000;
            }
        }
        //$total=(count($datacart))*50000;
        return view("user.user_transaksi_sewa",['datacart'=>$datacart,'datauser'=>$datauser,"datapegawai"=>$datapegawai,"databarang"=>$databarang,"datakategori"=>$datakategori,"total"=>$total,"dataaddon"=>$dataaddon]);
    }
    function pembayaran(){
        $datacart = cart::where("user_id",session('loggedIn'))->get();
        $dataaddon=addon::where("id_user",session('loggedIn'))->get();
        //$total=(count($datacart))*50000;
        $total=0;
        foreach ($datacart as $key => $dc) {
            if($dc->pegawai->pegawai_jasa=="Cleaning"){
                $total=$total+150000;
            }
            else if($dc->pegawai->pegawai_jasa=="Painting"){
                $total=$total+200000;
            }
            else if($dc->pegawai->pegawai_jasa=="Plumbing"){
                $total=$total+300000;
            }
            else if($dc->pegawai->pegawai_jasa=="Electrical"){
                $total=$total+500000;
            }
            else if($dc->pegawai->pegawai_jasa=="Repair"){
                $total=$total+400000;
            }
        }
        foreach ($dataaddon as $key => $da) {
            $total=$total+($da->barang->barang_harga*$da->jumlah);
        }
        $datavoucher=voucher::all();
        $user_voucher=user_voucher::where("user_id",session("loggedIn"))->get();
        return view("user.pembayaran",["total"=>$total,"datavoucher"=>$datavoucher,"user_voucher"=>$user_voucher]);
    }
    function do_pembayaran(Request $request){
        $user=user::where("id",session("loggedIn"))->first();
        if($request->totalhidden>$user->user_saldo){
            echo "<script>
            alert('Saldo tidak mencukupi');
            window.location.href='/home/user';
            </script>";
            //return redirect("/home/user");
        }
        else{
            $dc=Cart::all();
            $dt=dtranssewa::all();
            $sama=false;
            foreach ($dc as $key => $c) {
                foreach ($dt as $key => $t) {
                    if($c->pegawai_id==$t->pegawai_id){
                        if($c->tanggal_sewa==$t->dSewa_tanggal){
                            $sama=true;
                        }
                    }
                }
            }
            $dataaddon=addon::all();
            $stokkurang=false;
            foreach ($dataaddon as $key => $da) {
                if($da->jumlah>$da->barang->barang_stok){
                    $stokkurang=true;
                }
            }
            if($sama){
                echo "<script>
                alert('Tanggal pegawai pemesanan pegawai ada yang sama');
                window.location.href='/home/user';
                </script>";
            }
            else if($stokkurang){
                echo "<script>
                alert('Stok barang ada yang kurang');
                window.location.href='/home/user';
                </script>";
            }
            else{
                $dataaddon=addon::where("id_user",session("loggedIn"))->get();
                $datacart=cart::where("user_id",session("loggedIn"))->get();

                $htsewa = new htranssewa;
                $htsewa->user_id = $request->session()->get("loggedIn");
                $htsewa->hSewa_total = $request->totalhidden;
                if ($request->datavoucher==-1){
                    $htsewa->voucher_id=NULL;
                }else{
                    $htsewa->voucher_id = $request->datavoucher;
                }
                //$htsewa->hSewa_status = 2;
                //$htsewa->alamat = "alamat";
                $htsewa->save();
                foreach($datacart as $i => $cart){
                    if($cart->pegawai->pegawai_jasa=="Cleaning"){
                        dtranssewa::create([
                            "pegawai_id"=>$cart->pegawai_id,
                            "dSewa_tanggal"=>$cart->tanggal_sewa,
                            "dSewa_harga"=>150000,
                            "dSewa_alamat"=>$cart->alamat,
                            "dSewa_status_accpegawai"=>2,
                            "hSewa_id"=>htranssewa::latest("id")->first()->id,
                        ]);
                        foreach ($dataaddon as $key => $addon) {
                            if($addon->id_pegawai==$cart->pegawai_id){
                                dtransbarang::create(
                                    [
                                        'barang_id' => $addon->id_barang,
                                        'barang_jumlah' =>$addon->jumlah,
                                        'dSewa_id'=>dtranssewa::latest("id")->first()->id
                                    ]
                                );
                                $st=(barang::where("id",$addon->id_barang)->first()->barang_stok)-($addon->jumlah);
                                barang::where("id",$addon->id_barang)->update([
                                    "barang_stok"=>$st
                                ]);
                            }
                        }
                    }
                    else if($cart->pegawai->pegawai_jasa=="Painting"){
                        dtranssewa::create([
                            "pegawai_id"=>$cart->pegawai_id,
                            "dSewa_tanggal"=>$cart->tanggal_sewa,
                            "dSewa_harga"=>200000,
                            "dSewa_alamat"=>$cart->alamat,
                            "dSewa_status_accpegawai"=>2,
                            "hSewa_id"=>htranssewa::latest("id")->first(),
                        ]);
                        foreach ($dataaddon as $key => $addon) {
                            if($addon->id_pegawai==$cart->pegawai_id){
                                dtransbarang::create(
                                    [
                                        'barang_id' => $addon->id_barang,
                                        'barang_jumlah' =>$addon->jumlah,
                                        'dSewa_id'=>dtranssewa::latest("id")->first()
                                    ]
                                );
                                $st=(barang::where("id",$addon->id_barang)->first()->barang_stok)-($addon->jumlah);
                                barang::where("id",$addon->id_barang)->update([
                                    "barang_stok"=>$st
                                ]);
                            }
                        }
                    }
                    else if($cart->pegawai->pegawai_jasa=="Plumbing"){
                        dtranssewa::create([
                            "pegawai_id"=>$cart->pegawai_id,
                            "dSewa_tanggal"=>$cart->tanggal_sewa,
                            "dSewa_harga"=>300000,
                            "dSewa_alamat"=>$cart->alamat,
                            "dSewa_status_accpegawai"=>2,
                            "hSewa_id"=>htranssewa::latest("id")->first(),
                        ]);
                        foreach ($dataaddon as $key => $addon) {
                            if($addon->id_pegawai==$cart->pegawai_id){
                                dtransbarang::create(
                                    [
                                        'barang_id' => $addon->id_barang,
                                        'barang_jumlah' =>$addon->jumlah,
                                        'dSewa_id'=>dtranssewa::latest("id")->first()
                                    ]
                                );
                                $st=(barang::where("id",$addon->id_barang)->first()->barang_stok)-($addon->jumlah);
                                barang::where("id",$addon->id_barang)->update([
                                    "barang_stok"=>$st
                                ]);
                            }
                        }
                    }
                    else if($cart->pegawai->pegawai_jasa=="Electrical"){
                        dtranssewa::create([
                            "pegawai_id"=>$cart->pegawai_id,
                            "dSewa_tanggal"=>$cart->tanggal_sewa,
                            "dSewa_harga"=>500000,
                            "dSewa_alamat"=>$cart->alamat,
                            "dSewa_status_accpegawai"=>2,
                            "hSewa_id"=>htranssewa::latest("id")->first(),
                        ]);
                        foreach ($dataaddon as $key => $addon) {
                            if($addon->id_pegawai==$cart->pegawai_id){
                                dtransbarang::create(
                                    [
                                        'barang_id' => $addon->id_barang,
                                        'barang_jumlah' =>$addon->jumlah,
                                        'dSewa_id'=>dtranssewa::latest("id")->first()
                                    ]
                                );
                                $st=(barang::where("id",$addon->id_barang)->first()->barang_stok)-($addon->jumlah);
                                barang::where("id",$addon->id_barang)->update([
                                    "barang_stok"=>$st
                                ]);
                            }
                        }
                    }
                    else if($cart->pegawai->pegawai_jasa=="Repair"){
                        dtranssewa::create([
                            "pegawai_id"=>$cart->pegawai_id,
                            "dSewa_tanggal"=>$cart->tanggal_sewa,
                            "dSewa_harga"=>400000,
                            "dSewa_alamat"=>$cart->alamat,
                            "dSewa_status_accpegawai"=>2,
                            "hSewa_id"=>htranssewa::latest("id")->first(),
                        ]);
                        foreach ($dataaddon as $key => $addon) {
                            if($addon->id_pegawai==$cart->pegawai_id){
                                dtransbarang::create(
                                    [
                                        'barang_id' => $addon->id_barang,
                                        'barang_jumlah' =>$addon->jumlah,
                                        'dSewa_id'=>dtranssewa::latest("id")->first()
                                    ]
                                );
                                $st=(barang::where("id",$addon->id_barang)->first()->barang_stok)-($addon->jumlah);
                                barang::where("id",$addon->id_barang)->update([
                                    "barang_stok"=>$st
                                ]);
                            }
                        }

                    }
                    user::where("id",session("loggedIn"))->update([
                        "user_saldo"=>$user->user_saldo-$request->totalhidden
                    ]);
                    $dataaddon=addon::where("id_user",session("loggedIn"))->delete();
                    $datacart=cart::where("user_id",session("loggedIn"))->delete();
                    if ($request->datavoucher==-1){

                    }else{
                        user_voucher::where("user_id",session("loggedIn"))->where("voucher_id",$request->datavoucher)->delete();
                        // user_voucher::where("user_id",session("loggedIn"))->where("voucher_id",$request->datavoucher)->update(
                        //     [
                        //         'jumlah'=
                        //     ]
                        // );
                    }
                    return redirect("/home/user");
                }
            }

        }

    }
    function do_transaksi_sewa(Request $request){
        $cek = true;

        DB::beginTransaction();

        $arr=$request->post("arr");
        $jumlah=$request->post("jumlah");

        $jmlCart = count(cart::where("user_id",$request->session()->get("loggedIn"))->get());
        $jmlBarang = count(barang::get());
        $jmlArr = $jmlCart * $jmlBarang;



        $ctr = 0;
        for ($i=0; $i < $jmlArr; $i++) {
            if($jumlah[$i] != null){
                $arrID = explode("pas", $arr[$ctr]);
                $idxB = $arrID[0];
                $idxC = $arrID[1];

                $databarang = barang::all();
                $barang = [];
                foreach ($databarang as $key => $value) {
                    if($idxB == $key){
                        $barang = $value;
                    }
                }

                if(barang::where("id",$barang->id)->first()->barang_stok>=$jumlah[$i]){

                }else{
                    $cek  = false;
                }
                $ctr++;
            }
        }
        //dd($cek);
        if($cek){
            cart::where('user_id',$request->session()->get('loggedIn'))->delete();
            DB::commit();

            $htsewa = new htranssewa;
            $htsewa->user_id = $request->session()->get("loggedIn");
            $htsewa->hSewa_total = $request->txttotalhidden;
            $htsewa->voucher_id = "V001";
            //$htsewa->hSewa_status = 2;
            $htsewa->alamat = "alamat";
            $htsewa->save();

            $htransID = count(htranssewa::get());

            $datacart = cart::where("user_id",$request->session()->get("loggedIn"))->get();
            $arrdtranssewa=[];
            $ctrid = 0;
                foreach ($datacart as $key => $item) {
                dtranssewa::create(
                    [
                        'pegawai_id' => $item->pegawai_id,
                        'dSewa_durasi' =>8,
                        'dSewa_harga'=>50000,
                        'hSewa_id'=>$htransID
                    ]
                );

                $datadtrans = ['id'=>count(dtranssewa::all())+$ctrid,'pegawai_id'=>$item->pegawai_id,'dSewa_durasi'=>8,'dSewa_harga'=>50000,'hSewa_id'=>$htransID];
                array_push($arrdtranssewa,$datadtrans);

                $ctrid++;
            }
            dd($arrdtranssewa);
            $ctr=0;
            for ($i=0; $i < $jmlArr; $i++) {
                if($jumlah[$i] != null){
                    $arrID = explode("pas", $arr[$ctr]);
                    $idxB = $arrID[0];
                    $idxC = $arrID[1];
                    $databarang = barang::all();
                $barang = [];
                foreach ($databarang as $key => $value) {
                    if($idxB == $key){
                        $barang = $value;
                    }
                }
                dtransbarang::create(
                    [
                        'barang_id' => $barang->id,
                        'barang_jumlah' =>$jumlah[$i],
                        'dSewa_id'=>$arrdtranssewa[$idxC-1]['id']
                    ]
                );
                $newStock = $barang->barang_stok - $jumlah[$i];

                barang::where('id',$barang->id)->update(
                        [
                            'barang_stok' => $newStock,
                        ]
                    );
                    $ctr++;
                }
            }




            return $this->home_user($request);
        }
        else{
            DB::rollback();

            return $this->transaksi_sewa($request);
        }
    }
    public function logout(Request $request){
        $request->session()->forget("loggedIn");
        return $this->home();
    }
    public function prosesEditStock(Request $request,$id){
        $status=-1;
        $barang = barang::where('id',$id)->first();
        if($request->txtstok=="Tambah"){
            $newStock =  $request->stok +$barang->barang_stok;
        }
        else{
            $newStock =  $barang->barang_stok - $request->stok;
        }
        logstok::insert([
            "barang_id"=>$id,
            "jumlah"=>$request->stok
        ]);
        barang::where('id',$id)->update([
            "barang_stok"=>$newStock
        ]);

        return redirect('/admin/editBarang/'.$id);
    }
    function profileUser(Request $request){
        $user=user::where("id",$request->session()->get('loggedIn'))->first();
         $param["user"]=$user;
         return view("user.profile",$param);
     }
    public function pegawaiProfile(Request $request){
        $pegawai=pegawai::where("id",$request->session()->get('loggedIn'))->first();
        $param["pegawai"]=$pegawai;
        return view("pegawai.pegawai_profile",$param);
    }
    public function listVoucher()
    {
        $voucher = voucher::get();
        $datavoucher=$voucher;
        $user = user::where('id',session('loggedIn'))->first();
        $saldo = $user->user_saldo;
        // return view("user.user_voucher",$datavoucher);
        return view("user.user_voucher",['datavoucher'=>$datavoucher, 'saldo'=>$saldo]);
    }
    public function pegawaiChat(Request $request){
        $pegawai=pegawai::where("id",$request->session()->get('loggedIn'))->first();
        $datachat=chat::where("chat_destination",session()->get('loggedIn'))->latest('id')->get();
        // $datachat=chat::where(function ($query) {
        //     $query->where('chat_sender', '=', session('loggedIn'))
        //           ->where('chat_from', '=', "pegawai");
        // })->orWhere(function ($query) {
        //     $query->where('chat_from', '=', "user")
        //           ->where('chat_destination', '=',  session('loggedIn'));
        // })->get();

        $arr=array();
        foreach ($datachat as $i => $c) {
            if (count($arr)==0){
                array_push($arr,$c);
            }else{
                $ada=false;
                foreach ($arr as $j => $a) {
                    if($a->chat_sender==$c->chat_sender){
                        $ada=true;
                    }
                }
                if(!$ada){
                    array_push($arr,$c);
                }
            }
        }
        return view("pegawai.chat",["datachat"=>$datachat,"arr"=>$arr,"pegawai"=>$pegawai]);
    }
    public function chat_ajax_pegawai(Request $request){
        $datachat=chat::where("chat_destination",session()->get('loggedIn'))->where("chat_sender",$request->iduser)->get();

        chat::where('chat_sender',$request->iduser)->where('chat_destination',session('loggedIn'))->update([
            "read"=>1
        ]);
        return view("pegawai.chat_ajax",["datachat"=>$datachat]);
    }
    public function chat_ajax_pegawai_insert(Request $request){
        $chat=$request->post("datachat");
        $iduser=$request->post("iduser");
        // dd((int)session('loggedIn'));
        chat::create([
            "chat_sender"=> (integer)$iduser,
            "chat_destination"=>(integer)session('loggedIn'),
            "chat_from"=>"pegawai",
            "chat_text"=>$chat,
        ]);
        //return $this->chat_ajax_pegawai($request);
    }

    public function finish_transaksi(){
        $datadtrans=dtranssewa::all();
        foreach ($datadtrans as $key => $dt) {
            $datetime = new DateTime($dt->dSewa_tanggal);
            $datetime->modify('+2 day');
            if($datetime->format('Y-m-d')<=Carbon::now()->format('Y-m-d')){
                if($dt->dSewa_status_accpegawai==1){
                    dtranssewa::where("id",$dt->id)->update([
                        "dSewa_status_accpegawai"=>3
                    ]);

                    // pegawai::where("id",$dt->pegawai_id)->update([
                    //     "pegawai_saldo"=>$saldo
                    // ]);
                    $dtransbarang=dtransbarang::where("dSewa_id",$dt->id)->get();
                    $total=0;
                    foreach ($dtransbarang as $key => $db) {
                        $total=$total+$db->barang->barang_harga;
                    }
                    $saldo=(pegawai::where("id",$dt->pegawai_id)->first()->pegawai_saldo)+$total;
                    logsaldo::create([
                        "dtrans_id"=>$dt->id,
                        "jumlah"=>$total,
                        "jenis"=>"0",//0 belum 1 sudah
                    ]);
                    admin::where("id",1)->update([
                        "admin_saldo"=>$saldo
                    ]);
                }
            }
        }


    }
    public function listpembayaranpegawai(){
        $datapegawai=pegawai::all();
        $datalogsaldo=logsaldo::all();
        $p=array();
        //if($p != null){
            foreach ($datalogsaldo as $key => $log) {
                if($log->dtranssewa->pegawai_id==1){
                    array_push($p,$log);
                }
            }
        //}

        return view("admin.listpembayaranpegawai",['datalogsaldo'=>$p]);
    }

    public function listpembayaranpegawaifiltered($idpeg){
        $datapegawai=pegawai::all();
        $datalogsaldo=logsaldo::where("jenis",0)->withTrashed()->get();
        dd(logsaldo::all());
        $temp=array();
        // foreach ($datalogsaldo as $key => $log){
        //     if(count($temp)==0){
        //         array_push($temp,$log);
        //     }
        //     else{
        //         foreach ($temp as $key => $t) {
        //             if($t->pegawai_id==$log->pegawai_id){

        //             }
        //         }
        //     }
        // }
        return view("admin.listpembayaranpegawai",['datalogsaldo'=>$datalogsaldo]);
    }
    public function accpembayaran($id,$id1){
        $saldo=(pegawai::where("id",$id1)->first()->pegawai_saldo)+logsaldo::where("id",$id)->first()->dtranssewa->dSewa_harga;
        pegawai::where("id",$id1)->update([
            "pegawai_saldo"=>$saldo
        ]);
        htransbayar::create([
            //'total'=>logsaldo::where("id",$id)->first()->jumlah
            'total'=>logsaldo::where("id",$id)->first()->dtranssewa->dSewa_harga
        ]);
        dtransbayar::create([
            "hBayar_id"=>htransbayar::latest("id")->first()->id,
            "subtotal"=>logsaldo::where("id",$id)->first()->dtranssewa->dSewa_harga,
            "dSewa_id"=>logsaldo::where("id",$id)->first()->dtrans_id,
        ]);
        logsaldo::where("id",$id)->delete();

        // logsaldo::where("id",$id)->update([
        //     'jenis'=>1
        // ]);
        return $this->listpembayaranpegawai();
    }
    public function accpembayaran_semua(){
        $datalog=logsaldo::all();
        $total=0;
        foreach ($datalog as $key => $dl) {
            $total=$total+$dl->dtranssewa->dSewa_harga;
        }
        htransbayar::create([
            'total'=>$total
        ]);
        foreach ($datalog as $key => $dl) {
            $saldo=(pegawai::where("id",$dl->dtranssewa->pegawai_id)->first()->pegawai_saldo)+logsaldo::where("id",$dl->id)->first()->dtranssewa->dSewa_harga;
            pegawai::where("id",$dl->dtranssewa->pegawai_id)->update([
                "pegawai_saldo"=>$saldo
            ]);
            dtransbayar::create([
                "hBayar_id"=>htransbayar::latest("id")->first()->id,
                "subtotal"=>logsaldo::where("id",$dl->id)->first()->dtranssewa->dSewa_harga,
                "dSewa_id"=>logsaldo::where("id",$dl->id)->first()->dtrans_id,
            ]);
            logsaldo::where("id",$dl->id)->delete();
        }
        return $this->listpembayaranpegawai();
    }
}
