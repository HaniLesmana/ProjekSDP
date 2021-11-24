<!DOCTYPE html>
<html>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- My Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
{{-- fontawesome --}}
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<!-- My CSS -->
<link rel="stylesheet" href="{{asset('style.css')}}">
<style>
body {
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  color:teal;
}

.split {
  height: 100%;
  width: 85%;
  position: absolute;
  /* z-index: 1; */
  top: 0;
  overflow-x: auto;
  padding-top: 20px;
}
.splitMenu {
  height: 100%;
  width: 15%;
  position:fixed;
  /* z-index: 2; */
  top: 0;
  /* overflow-x: hidden; */
  padding-top: 20px;
}

.left {
  left: 0;
  background-color: #396EB0;
  font-size: 23px;
}
.dropdown-item{
    margin: 7px 0 7px 0px;
    color: white;
}
.right {
  right: 0;
  background-color: whitesmoke ;
}

/* .centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
} */

</style>
</head>
<body>

{{-- Menu navbar --}}
{{-- <div class="splitMenu left">
  <div class="centered">
    <a class="navbar-brand" id="gambar" href="#"></a>
    <a class="dropdown-item " href="#"><i class="fas fa-home"> Home</i></a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item " href="#"><i class="fas fa-dollar-sign"> Top Up</i></a>
    <a class="dropdown-item " href="#">Withdraw</a>
    <a class="dropdown-item " href="#"><i class="fas fa-users"> Pegawai</i></a>
    <a class="dropdown-item " href="#"><i class="fas fa-clipboard-list"> <span style="margin-left:10px;">Kategori</span></i></a>
    <a class="dropdown-item " href="#"><i class="fas fa-box-open"> Barang</i></a>
    <a class="dropdown-item " href="#">Voucher</a>
  </div>
</div> --}}

<div class="vertical-nav" id="sidebar" style="background-color:#396EB0;min-height:100vh">

    <ul class="nav flex-column mb-0">
        <a class="navbar-brand" id="gambar" href="#"></a>
      <li class="nav-item">
        <a href="/home/admin" class="nav-link font-italic dropdown-item"><i class="fas fa-home"> Home</i></a>
      </li>
      <li class="nav-item">
        <a href="/listRequest" class="nav-link font-italic dropdown-item">
            <i class="fas fa-dollar-sign"> Top Up</i>
        </a>
      </li>
      <li class="nav-item">
        <a href="/listWithdraw" class="nav-link font-italic dropdown-item">
                  Withdraw
              </a>
      </li>
      <li class="nav-item">
        <a href="/admin/listpegawai" class="nav-link font-italic dropdown-item">
                <i class="fas fa-users"> Pegawai</i>
              </a>
      </li>
      <li class="nav-item">
        <a href="/admin/listKategori" class="nav-link font-italic dropdown-item">
                <i class="fas fa-clipboard-list"> Kategori </i>
              </a>
      </li>
      <li class="nav-item">
        <a href="/admin/listbarang" class="nav-link font-italic dropdown-item">
                <i class="fas fa-box-open"> Barang</i>
              </a>
      </li>
      <li class="nav-item">
        <a href="/admin/listVoucher" class="nav-link font-italic dropdown-item">
                  Voucher
              </a>
      </li>
    </ul>
    <form action="{{url('/logout')}}" method="get">
        <button type ="submit" class="btn btn-warning tombol" style="position:absolute;bottom:30px;margin-left:25px"><a href="/" style="text-decoration:none;color:white;">Sign Out <i class="fas fa-sign-out-alt"></i> </a></button>
    </form>
  </div>
{{-- end navbar --}}

{{-- Tampilan--}}
<div class="split right">
  <div class="centered">
        @yield('main')
  </div>
</div>
{{--End Tampilan--}}

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
