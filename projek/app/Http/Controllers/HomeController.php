<?php

namespace App\Http\Controllers;

use App\Rules\cek_password;
use App\Rules\cek_uniq;
use App\Rules\cekPassword;
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

    function home_user(){
        return view("home_user");
    }

    function home_pegawai(){
        return view("pegawai.home_pegawai");
    }

    function home_admin(){
        return view("admin.home_admin");
    }
    public function listRequest()
    {
        return view("admin.listRequest");

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
            'nik' => 'required|max:16|min:16',
            'email' => 'required',
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
            //'nik' => ['required','max:16','min:16',new cek_uniq($pegawai,$user,$admin,"nik",$request->nik,"add")],
            'nik' => ['required','max:16','min:16'],
            //'email' => ['required','email',new cek_uniq($pegawai,$user,$admin,"email",$request->nik,"add")],
            'email' => ['required','email'],
            'nama' => 'required',
            'telepon' => 'required',
            'alamat' => 'required|max:255',
            'jenis' => 'required',
            'password' => 'required'
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
                $request->session()->put("loggedIn", $email);
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
                $request->session()->put("loggedIn", $email);
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
                $request->session()->put("loggedIn", $email);
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
			'password_user' => 'required|min:8|required_with:confirm_password|same:confirm_password',
            'confirm_password'=> 'min:8',
		]);

        $email = $request->input("email_user");
        $users = DB::select("select * from user where user_status = 1 and user_email = '$email'");
        if (!empty($users)) {
            return view('index',['errorEmail'=>'Email telah terdaftar']);
        }
        else{
            $nama = $request ->input("nama_user");
            $password = $request ->input("password_user");
            $telp = $request ->input("telp_user");
            DB::table('user')->insert([
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
        }

    }
    function ajax($jasa){
        $jasa=str_replace('{', '', $jasa);
        $jasa=str_replace('}', '', $jasa);
        $pegawai = DB::table('pegawai')->where('pegawai_status','1')->where('pegawai_jasa',$jasa)->get();
        return view("script",['pegawai' => $pegawai],['jasa'=>$jasa]);
    }
    function pegawaiOrder(){
        return view("pegawai/pesanan");
    }

    function history(){
        return view("pegawai/history");
    }
}
