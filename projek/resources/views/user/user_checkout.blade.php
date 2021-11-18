@extends('user.base-layout')
    <!-- Navbar -->
    @section('header')
        @include('user.navbarUser')
    @endsection

    <!-- Akhir Navbar -->
    @section('main')
    <div class="container" style="margin-top : 20px;">
        <h2>Total : Rp {{ $total }}</h2>
        <div class="card">
            <div class="card-body"  style="font-size: 15px;">
                Berikut Total yang harus dibayarkan, mohon transfer ke <br>
                rekening BCA 7880067997 atas nama PT. Babowe Indonesia <br>
                dengan berita "top up : {{ $email }}"
            </div>
            <form action="/home/user" method="get">
            <button type="submit" style="border:0px;border-radius:2px;text-align:center;margin-left : 18px;font-size:15px;float:left;color:white;outline:none;box-shadow:none;width:250px;background-color:#d9a73d">
                Selesai
            </button>
            </form>
          </div>
    </div>

    <!-- <script type="text/javascript" src="/js/functions.js"></script> -->
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
