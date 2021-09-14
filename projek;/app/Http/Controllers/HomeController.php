<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
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


}
