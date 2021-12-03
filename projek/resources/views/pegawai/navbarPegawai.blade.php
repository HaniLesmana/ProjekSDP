<nav class="navbar navbar-expand-lg navbar navbar-light fixed-top"  style="background-color: rgba(255,255,255,0.9);  background-image: linear-gradient( rgba(0,0,0,0.1),rgba(220,220,220,0),rgba(225,225,225,0));">
    <div class="container">
        <a class="navbar-brand" id="gambar" href="#"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            {{-- <a class="nav-item nav-link active" href="/home/pegawai">Home</a> --}}
            <form action="{{ url('home/pegawai')}}" method="get">
                <a class="nav-item nav-link">
                    <input class="btn" type="submit" value="Home">
                </a>
                {{-- <a class="nav-item nav-link" id="tes">CART</a> --}}
            </form>
            {{-- <a class="nav-item nav-link" href="/pegawai/pesanan">Order</a> --}}
            <form action="{{ url('pegawai/pesanan')}}" method="get">
                <a class="nav-item nav-link">
                    <input class="btn" type="submit" value="Order">
                </a>
                {{-- <a class="nav-item nav-link" id="tes">CART</a> --}}
            </form>
            {{-- <a class="nav-item nav-link" href="/pegawai/history" >History</a> --}}
            <form action="{{ url('pegawai/history')}}" method="get">
                <a class="nav-item nav-link">
                    <input class="btn" type="submit" value="History">
                </a>
                {{-- <a class="nav-item nav-link" id="tes">CART</a> --}}
            </form>
            <form action="{{ url('pegawai/profile')}}" method="get">
                <a class="nav-item nav-link">
                    <input class="btn" type="submit" value="Profile">
                </a>
                {{-- <a class="nav-item nav-link" id="tes">CART</a> --}}
            </form>
            <form action="{{ url('pegawai/chat')}}" method="get">
                <a class="nav-item nav-link">
                    <input class="btn" type="submit" value="Chat">
                </a>
                {{-- <a class="nav-item nav-link" id="tes">CART</a> --}}
            </form>
            <form action="{{ url('/logout')}}" method="get">
                <a class="nav-item nav-link">
                    <input class="btn btn-danger" type="submit" value="Sign Out">
                </a>
            </form>
          {{-- <button type ="button" class="btn btn-primary tombol" style="align:right;"><a href="/" style="text-decoration:none;color:white;">Sign Out</a></button> --}}
        </div>
      </div>
    </div>
  </nav>
