<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\htransTopup;
use App\Rules\cek_password;
use App\Rules\cek_uniq;
use App\Rules\ConfirmPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $users = DB::table('user')->get();

        return view('user.index', ['users' => $users]);
    }
    function home(){
        return view("index");
    }

    function home_user(Request $request){
        $user=DB::table('user')->where('user_id',session('loggedIn'))->get();
        return view("home_user",['saldo' => data_get($user,'0.user_saldo')]);
    }

    function home_pegawai(){
        return view("pegawai.home_pegawai");
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
        $kategori = DB::table('kategori')->get();
        return view('admin.kategori.listKategori_Admin',['kategori'=>$kategori]);
    }
    public function editKategori($id){
        $kategori = DB::table('kategori')->where('kategori_id',$id)->get();
        return view('admin.kategori.editKategori_Admin',['id'=>$id],['kategori'=>$kategori]);
    }
    public function prosesAddKategori(Request $request)
    {
        $rules = [
            'nama' => 'required'
        ];
        $message = [
            'required'=>':attribute harus diisi'
        ];
        $request->validate($rules, $message);

        $ambil_kode = DB::table('kategori')->select("kategori_id")->get();
        $ctr = 0;
        for ($i = 0 ; $i < sizeof($ambil_kode) ; $i++){
            $kodeb = (int)substr($ambil_kode,3);
            if($ctr <= $kodeb){
                $ctr++;
            }
        }
        $urutan = str_pad($ctr,4,'0',STR_PAD_LEFT);
        $kodeconcate = "K".$urutan;
        try {
            DB::table('kategori')->insert(
                [
                    'kategori_id' => $kodeconcate,
                    'kategori_nama' => $request->nama,
                    'kategori_status'=>1
                ]
            );
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

        return $this->listKategori();

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
            $status=1;
        }else{
            $status=0;
        }
        try {
            DB::table('kategori')->where('kategori_id',$id)->update(
                [
                    'kategori_nama' => $request->nama,
                    'kategori_status'=>$status
                ]
            );
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

        return $this->listKategori();
    }
    public function prosesDeleteKategori($id)
    {
        $cekada = false;
        $kat = DB::table('kategori')->where('kategori_id',$id)->first();
        $barang = DB::table('barang')->get();
        foreach($barang as $i =>$item){
            if($item->barang_kategori == $kat->kategori_nama){
                $cekada=true;
            }
        }
        if($cekada){
            return back()->with('msg',"gagal delete! kategori sedang digunakan!");
        }else if(!$cekada){
            DB::table('kategori')->where('kategori_id',$id)->delete();
            return redirect('/admin/listKategori');
        }
    }

    // MASTER KATEGORI


    // MASTER BARANG
    function listBarang(){
        $barang = DB::select('select * from barang b
                            left join kategori k
                            on b.barang_kategori=k.kategori_id
                            where b.barang_status != 0');
        return view('admin.listBarang_Admin',['barang'=>$barang]);
    }
    public function addBarang(){
        $kat = DB::select('select * from kategori');
        return view('admin.addBarang_Admin',['kategori'=>$kat]);
    }
    public function prosesAddBarang(Request $request){
        $barang = DB::table('barang')->get();
        $id = "";
        $max = 0;
        $cek = false;
        foreach ($barang as $b) {
            if((int)substr($b->barang_id,1,11) >= $max && strtoupper(substr($b->barang_id,0,1)) == strtoupper(substr($request->nama,0,1))){
                $max = (int)substr($b->barang_id,1,11) + 1;
                $cek = true;
            }
        }
        if($cek){
            $id = strtoupper(substr($request->nama,0,1)).str_pad($max, 11, "0", STR_PAD_LEFT);
        }
        else{
            $id = strtoupper(substr($request->nama,0,1))."00000000000";
        }
        $rules = $request->validate([
			'nama' => 'required|string|min:3|max:30',
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
        DB::table('barang')->insert(
            ['barang_id' => $id, 'barang_kategori' => $request->kategori, 'barang_nama' => $request->nama, 'barang_harga' => $request->harga, 'barang_stok' => $request->stok, 'barang_status' => 1]
        );
        return redirect('/admin/listbarang');
    }
    public function EditBarang($id){
        $barang = DB::table('barang')->where('barang_id',$id)->get();
        return view("admin.editBarang_Admin",['id'=>$id],['barang'=>$barang]);
    }
    public function prosesEditBarang(Request $request,$id){
        // $id=$request->id;
        $nama=$request->nama;
        $harga=$request->harga;
        $stok=$request->stok;
        $statusbarang=$request->statusBarang;
        $kategori=$request->kategori;
        $rules = $request->validate([
			'nama' => 'required|string|min:3|max:30',
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
        DB::table('barang')->where('barang_id', $id)->update(['barang_nama'=>$nama,'barang_harga'=>$harga,'barang_stok'=>$stok,'barang_status'=>$statusbarang,'barang_kategori'=>$kategori]);
        return $this->listBarang();
    }

    public function hasilCari($nama, Request $req){
        //dd($nama);
        if($nama !=""){
            $pegawai = DB::table('pegawai')->where('pegawai_status',1)->where('nama','like','%'.$nama.'%')->get();
        }
        else{
            $pegawai = DB::table('pegawai')->where('pegawai_status',1)->get();
        }
        return view('admin.hasilCari',['pegawai'=>$pegawai]);

    }

    public function prosesDeleteBarang($id){
        DB::table('barang')->where('barang_id', $id)->update(['barang_status'=>0]);
        $barang = DB::table('barang')->where('barang_status','1')->get();
        return view("admin.listBarang_Admin",['barang' => $barang]);
    }
    // MASTER BARANG


    //MASTER PEGAWAI
    public function home_list_pegawai(){
        $pegawai = DB::table('pegawai')->where('pegawai_status','1')->get();
        return view("admin.listPegawai_Admin",['pegawai' => $pegawai]);
    }

    function EditPegawai($id,Request $request){
        $pegawai=DB::table('pegawai')->where('pegawai_id',$id)->get();
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

        DB::table('pegawai')->where('pegawai_id', $id)->update(['pegawai_nik'=>$nik,'pegawai_email'=>$email,'pegawai_nama'=>$nama,'pegawai_telepon'=>$telepon,'pegawai_alamat'=>$alamat,'pegawai_password'=>$password,'pegawai_jasa' => $jenis]);
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

        $user = DB::select("select * from user where user_status = 1 and user_email = '$email'");
        $pegawai = DB::select("select * from pegawai where pegawai_status = 1 and pegawai_email = '$email'");
        $admin = DB::select("select * from admin where admin_status = 1 and admin_email = '$email'");

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

        $pegawai = DB::table('pegawai')->get();
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

        DB::table('pegawai')->insert(array(
            'pegawai_id' => $id,
            'pegawai_nik' => $nik,
            'pegawai_email' => $email,
            'pegawai_nama' => $nama,
            'pegawai_telepon' => $telepon,
            'pegawai_alamat' => $alamat,
            'pegawai_password' => $password,
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

        $user = DB::select("select * from user where user_status = 1 and user_email = '$email'");
        $pegawai = DB::select("select * from pegawai where pegawai_status = 1 and pegawai_email = '$email'");
        $admin = DB::select("select * from admin where admin_status = 1 and admin_email = '$email'");




        if (!empty($user) || !empty($pegawai) || !empty($admin)) {
            if(!empty($user)){
                $validatedData = $request->validate([
                    'user_login_email' => ['required','email'],
                    'user_login_pass' => ['required',new cek_password($user,$email,"user")],
                ],[
                    'username.email'=> "Email atau password salah",
                    'password.required' => "Email atau password salah",
                ]);
                $request->session()->put("loggedIn", data_get($user,'0.user_id'));
                $request->session()->flash("welcomeUser", "Selamat datang ".data_get($user,'0.user_nama'));
                return redirect("/home/user");
            }
            else if(!empty($pegawai)){
                $validatedData = $request->validate([
                    'user_login_email' => 'required|email',
                    'user_login_pass' => ['required',new cek_password($pegawai,$email,"pegawai")],
                ],[
                    'username.email'=> "Email atau password salah",
                    'password.required' => "Email atau password salah",
                ]);
                $request->session()->put("loggedIn", data_get($pegawai,'0.pegawai_id'));
                $request->session()->flash("welcomeUser", "Selamat datang ".data_get($pegawai,'0.pegawai_nama'));
                return redirect("/home/pegawai");
            }
            else if(!empty($admin)){
                $validatedData = $request->validate([
                    'user_login_email' => 'required|email',
                    'user_login_pass' => ['required',new cek_password($admin,$email,"admin")]
                ],[
                    'username.email'=> "Email atau password salah",
                    'password.required' => "Email atau password salah",
                ]);
                $request->session()->put("loggedIn", data_get($admin,'0.admin_id'));
                $request->session()->flash("welcomeUser", "Selamat datang ".data_get($admin,'0.admin_nama'));
                return redirect("/home/admin");
            }
            else {
                return view('index',['error'=>'ERROR']);
            }
        }
        else{
            return view('index',['error'=>'Email not registered!']);
        }
    }

        function register(Request $request){

        $rules = $request->validate([
			'nama_user' => 'required|string|min:3|max:30',
            'telp_user' => 'required|numeric',
			'email_user' => 'required|email',
            'alamat_user'=>'required',
			'password_user' => 'required|min:8|required_with:confirm_password|same:confirm_password',
            'confirm_password'=> 'min:8',
		]);

        //dd($rules);//dd($rules);
        $email = $request->input("email_user");
        $users = DB::select("select * from user where user_status = 1 and user_email = '$email'");

        if (!empty($users)) {

            return view('index',['errorEmail'=>'Email telah terdaftar']);
        }
        else{
            $nama = $request ->input("nama_user");
            $password = $request ->input("password_user");
            $telp = $request ->input("telp_user");

            $user = DB::table('user')->get();

            $id = "";
            $max = 0;
            $cek = false;
            foreach ($user as $u) {
                if((int)substr($u->user_id,1,11) >= $max){
                    $max = (int)substr($u->user_id,1,11) + 1;
                    $cek = true;
                }
            }
            if($cek){
                $id = "U".str_pad($max, 11, "0", STR_PAD_LEFT);
            }
            else{
                $id = "U00000000000";
            }
            DB::table('user')->insert([
                'user_id' => $id,
                'user_email' => $email,
                'user_nama' => $nama,
                'user_telepon' => $telp,
                'user_alamat' => $request->input("alamat_user"),
                'user_password' => $password,
                'user_saldo' => 0,
                'user_poin' => 0,
                'user_status' => 1,
            ]);
            return view('index',['sukses'=>'Register berhasil!']);
            // return redirect('index',['sukses'=>'Register berhasil!']);
        }

    }
    function ajax($jasa){
        $pegawai = DB::table('pegawai')->where('pegawai_status','1')->where('pegawai_jasa',$jasa)->get();
        return view("script",['pegawai' => $pegawai],['jasa'=>$jasa]);
    }
    function ajax1($data){
        //dd($data);
        return view('user.user_cart');
    }
    function pegawaiOrder(){
        return view("pegawai/pesanan");
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

    function gotocheckout(Request $request){
        $data=json_decode($request->data);
        // $hid10k = $request->btn10k;
        // $hid20k= $request->btn20k;
        // $hid50k= $request->btn50k;
        // $hid75k= $request->btn75k;
        // $hid100k= $request->btn100k;
        // $hid125k= $request->btn125k;
        // $hid190k= $request->btn190k;
        // $hid250k= $request->btn250k;

        // $arr = array();
        // if($hid10k!=null){
        //     $temp =['nominal' => 10000,'jumlah' => $hid10k];
        //     array_push($arr,$temp);
        // }

        // if($hid20k!=null){
        //     $temp =['nominal' => 20000,'jumlah' => $hid20k];
        //     array_push($arr,$temp);
        // }
        // if($hid50k!=null){
        //     $temp = ['nominal' => 50000,'jumlah' => $hid50k];
        //     array_push($arr,$temp);
        // }
        // if($hid75k!=null){
        //     $temp = ['nominal' => 75000,'jumlah' => $hid75k];
        //     array_push($arr,$temp);
        // }
        // if($hid100k!=null){
        //     $temp = ['nominal' => 100000,'jumlah' => $hid100k];
        //     array_push($arr,$temp);
        // }
        // if($hid125k!=null){
        //     $temp = ['nominal' => 125000,'jumlah' => $hid125k];
        //     array_push($arr,$temp);
        // }
        // if($hid190k!=null){
        //     $temp = ['nominal' => 190000,'jumlah' => $hid190k];
        //     array_push($arr,$temp);
        // }
        // if($hid250k!=null){
        //     $temp = ['nominal' => 250000,'jumlah' => $hid250k];
        //     array_push($arr,$temp);
        // }

        $total = $request->total;
        // $rand = rand(0,100);
        $user = DB::table('user')->where('user_id',session('loggedIn'))->get();
        $email = data_get($user,'0.user_email');
        $id = data_get($user,'0.user_id');
        DB::table('htranstpwd')->insert([
            'user_id' => $id,
            'htranstpwd_tanggal' => date("Y/m/d"),
            'htranstpwd_total' => $total,
            'htranstpwd_tipe' => 'topup',
            'htranstpwd_status' => 2,
        ]);
         //status = 0:declined, 1:accepted, 2=pending
        //$mx = DB::select("select max(user_id) from user");
        $mx = DB::select("select * from htranstpwd");
        //$mx = DB::select("select max(htranstpwd_id) from htranstpwd");
        //$mxx = data_get($mx,'0.htranstpwd_id');
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

                // DB::table('dtranstpwd')->insert([
                //     'htranstpwd_id' => (int)$mx,
                //     'dtranstpwd_nominal' => (int)$nominal,
                //     'dtranstpwd_jumlah' => (int)$tes,
                // ]);
                DB::insert('insert into dtranstpwd (htranstpwd_id, dtranstpwd_nominal,dtranstpwd_jumlah) values (?, ?, ?)', [$max, (int)$nominal,(int)$tes]);
            }
        }
        return view('user.user_checkout',['total'=>$total, 'email'=>$email]);
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
            DB::table('Cart')->insert(
                [
                    'user_id' => $request->session()->get("loggedIn"),
                    'pegawai_id' =>$id,
                    'status'=>1
                ]
            );
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        return $this->list_cart($request);
    }
    function list_cart(Request $request){
        $datacart=DB::table('Cart')->where("user_id",$request->session()->get("loggedIn"))->where("status",1)->get();
        $param["datacart"]=$datacart;
        $datapegawai=DB::table('Pegawai')->get();
        $param["datapegawai"]=$datapegawai;
        return view("user.list_cart",$param);
    }
    function list_cart_cancel(Request $request,$id){
        DB::table('Cart')->where("user_id",$request->session()->get("loggedIn"))->where("id",$id)->delete();
        return $this->list_cart($request);
    }
    function transaksi_sewa(){
        $loggedin = session('loggedIn');
        // $datacart = DataCart::where("user_id",$loggedin)->get();
        $datacart = DB::table('Cart')->where("user_id",session('loggedIn'))->get();
        $datapegawai = DB::table('pegawai')->get();
        $datauser=DB::table('User')->where("user_id",session('loggedIn'))->first();
        $databarang=DB::table('barang')->get();
        $datakategori=DB::table('kategori')->get();
        $total=(count($datacart))*50000;
        return view("user.user_transaksi_sewa",['datacart'=>$datacart,'datauser'=>$datauser,"datapegawai"=>$datapegawai,"databarang"=>$databarang,"datakategori"=>$datakategori,"total"=>$total]);
    }
    function do_transaksi_sewa(Request $request){
        $arr=$request->post("arr");
        $jumlah=$request->post("jumlah");

        // dd($jumlah);

        $jmlCart = count(DB::table('Cart')->where("user_id",$request->session()->get("loggedIn"))->get());
        $jmlBarang = count(DB::table('Barang')->get());
        $jmlArr = $jmlCart * $jmlBarang;

        DB::table('htranssewa')->insert(
            [
                'user_id' => $request->session()->get("loggedIn"),
                'hSewa_tanggal' =>date("Y-m-d H:i:s"),
                'hSewa_total'=>$request->txttotalhidden,
                'hSewa_status'=>1,
                'voucher_id'=>"V001",
                'alamat'=> $request->txtalamat2,
            ]
        );
        $datahtrans = DB::table('htranssewa')->get();
        $htrans = $datahtrans[count($datahtrans)-1];

        $datacart = DB::table('Cart')->where("user_id",$request->session()->get("loggedIn"))->get();
        $arrid=[];
        foreach ($datacart as $key => $item) {
            DB::table('dtranssewa')->insert(
                [
                    'pegawai_id' => $item->pegawai_id,
                    'dSewa_durasi' =>8,
                    'dSewa_harga'=>50000,
                    'hSewa_id'=>$htrans->hSewa_id
                ]
            );
            $datadtrans=DB::table('dtranssewa')->get();
            array_push($arrid,$datadtrans[count($datadtrans)-1]->dSewa_id);
        }

        $ctr = 0;
        for ($i=0; $i < $jmlArr; $i++) {
            if($jumlah[$i] != null){
                $arrID = explode("pas", $arr[$ctr]);
                $idxB = $arrID[0];
                $idxC = $arrID[1];

                $databarang = DB::table('Barang')->get();
                $barang = [];
                foreach ($databarang as $key => $value) {
                    if($idxB == $key){
                        $barang = $value;
                    }
                }

                $datacart = DB::table('Cart')->where('user_id',$request->session()->get("loggedIn"))->get();
                $cart = [];
                foreach ($datacart as $key => $value) {
                    if($idxC == $key){
                        $cart = $value;
                    }
                }

                DB::table('dtransbarang')->insert(
                    [
                        'barang_id' => $barang->barang_id,
                        'barang_jumlah' =>$jumlah[$i],
                        'dSewa_id'=>$arrid[$idxC-1]
                    ]
                );

                $ctr++;
            }
        }
        return $this->home_user($request);
    }
}
