<?php

namespace App\Http\Controllers;

use App\Models\htransTopup;
use App\Rules\cek_password;
use App\Rules\cek_uniq;
use App\Rules\ConfirmPassword;
use Illuminate\Http\Request;
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
        $data = htransTopup::all();
        $data = json_encode($data);
        // dd($data);
        return view("admin.listRequest",['data'=> $data]);

    }
    public function listWithdraw()
    {
        return view("admin.listWithdraw");

    }
    public function home_list_pegawai(){
        $pegawai = DB::table('pegawai')->where('pegawai_status','1')->get();
        return view("admin.listPegawai_Admin",['pegawai' => $pegawai]);
    }

    function prosesDeletePegawai(Request $request){
        $id = $request->id;
        DB::table('pegawai')->where('pegawai_id', $id)->update(['pegawai_status'=>0]);
        $pegawai = DB::table('pegawai')->where('pegawai_status','1')->get();
        return view("admin.listPegawai_Admin",['pegawai' => $pegawai]);
    }

    function EditPegawai($id,Request $request){
        $pegawai=DB::table('pegawai')->where('pegawai_id',$id)->get();
        return view("admin.editPegawai_Admin",['id'=>$id],['pegawai' => $pegawai]);
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
            'email' => ['required','max:16',new cek_uniq($email,'email')],
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
        $jasa=str_replace('{', '', $jasa);
        $jasa=str_replace('}', '', $jasa);
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
        $hid10k = $request->btn10k;
        $hid20k= $request->btn20k;
        $hid50k= $request->btn50k;
        $hid75k= $request->btn75k;
        $hid100k= $request->btn100k;
        $hid125k= $request->btn125k;
        $hid190k= $request->btn190k;
        $hid250k= $request->btn250k;

        $arr = array();
        if($hid10k!=null){
            $temp = ['nominal' => 10000,'jumlah' => $hid10k];
            array_push($arr,$temp);
        }
        if($hid20k!=null){
            $temp = ['nominal' => 20000,'jumlah' => $hid20k];
            array_push($arr,$temp);
        }
        if($hid50k!=null){
            $temp = ['nominal' => 50000,'jumlah' => $hid50k];
            array_push($arr,$temp);
        }
        if($hid75k!=null){
            $temp = ['nominal' => 75000,'jumlah' => $hid75k];
            array_push($arr,$temp);
        }
        if($hid100k!=null){
            $temp = ['nominal' => 100000,'jumlah' => $hid100k];
            array_push($arr,$temp);
        }
        if($hid125k!=null){
            $temp = ['nominal' => 125000,'jumlah' => $hid125k];
            array_push($arr,$temp);
        }
        if($hid190k!=null){
            $temp = ['nominal' => 190000,'jumlah' => $hid190k];
            array_push($arr,$temp);
        }
        if($hid250k!=null){
            $temp = ['nominal' => 250000,'jumlah' => $hid250k];
            array_push($arr,$temp);
        }
        $total = $request->total;
        $rand = rand(0,100);
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

        $mx = DB::select("select max(user_id) from user");
        foreach ($arr as $ar) {
            DB::table('dtranstpwd')->insert([
                'htranstpwd_id' => $mx,
                'dtranstpwd_nominal' => $ar['nominal'],
                'dtranstpwd_jumlah' => $ar['jumlah'],
            ]);
        }
        return view('user.user_checkout',['total'=>$total,'rand'=>$rand, 'email'=>$email]);
    }
}
