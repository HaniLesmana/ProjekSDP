<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        return view("home_pegawai");
    }

    function home_admin(){
        return view("home_admin");
    }

    function checkLogin(Request $request){

        $validatedData = $request->validate([
            'user_login_email' => 'required|email',
            'user_login_pass' => 'required',
        ],[
            'username.email'=> "Email atau password salah",
            'password.required' => "Email atau password salah",
        ]);

        $email = $request->input("user_login_email");
        $password = $request->input("user_login_pass");
        $users = DB::select("select * from user where user_status = 1 and user_email = '$email'", [1]);


        if (!empty($users)) {
            if ($password == data_get($users,'0.user_password')) {
                $request->session()->put("loggedInUser", $validatedData["user_login_email"]);
                $request->session()->flash("welcomeUser", "Selamat datang ".data_get($users,'0.user_nama'));
                return redirect("/home/user");
            }
            else{
                echo "<script>alert('Username atau password salah')</script>";
            }
        }
        else{
            echo "<script>alert('Username atau password salah')</script>";
        }


    }

}
