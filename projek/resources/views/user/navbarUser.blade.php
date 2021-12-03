<style>
body{
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
}

</style>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(255,255,255,0.9);  background-image: linear-gradient( rgba(0,0,0,0.1),rgba(220,220,220,0),rgba(225,225,225,0));">
        <div class="container">
            <a class="navbar-brand" id="logo" href="#"></a>
            <button class="navbar-toggler" type="button"
            data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto" style="padding-top:20px;float:right;">

                    <form action="{{ url('/home/user')}}" method="get">
                        <a class="nav-item nav-link" style="padding-left:0px;padding-right:0px;">
                            <input class="btn" type="submit" value="HOME">
                            {{-- <a class="nav-item nav-link active" href="#">HOME <span class="sr-only">(current)</span></a> --}}
                        </a>
                    </form>
                    <form action="{{ url('/user/profile')}}" method="get">
                        <a class="nav-item nav-link" style="padding-left:0px;padding-right:0px;">
                            <input class="btn" type="submit" value="PROFILE">
                        </a>
                        {{-- <a class="nav-item nav-link" href="#">PROFILE</a> --}}
                    </form>
                    <form action="{{ url('/home/transaksi_sewa')}}" method="get">
                        <a class="nav-item nav-link" style="padding-left:0px;padding-right:0px;">
                            <input class="btn" type="submit" value="CART">
                        </a>
                        {{-- <a class="nav-item nav-link" id="tes">CART</a> --}}
                    </form>
                    <form action="{{ url('/home/history')}}" method="get">
                        <a class="nav-item nav-link" style="padding-left:0px;padding-right:0px;">
                            <input class="btn" type="submit" value="HISTORY">
                        </a>
                        {{-- <a class="nav-item nav-link" href="#About">HISTORY</a> --}}
                    </form>
                    <form action="{{ url('/home/ongoingtrans')}}" method="get">
                        <a class="nav-item nav-link" style="padding-left:0px;padding-right:0px;">
                            <input class="btn" type="submit" value="ONGOING">
                        </a>
                        {{-- <a class="nav-item nav-link" href="#About">VOUCHER</a> --}}
                    </form>
                    <form action="{{ url('/user/voucher')}}" method="get">
                        <a class="nav-item nav-link" style="padding-left:0px;padding-right:0px;">
                            <input class="btn" type="submit" value="VOUCHER">
                        </a>
                        {{-- <a class="nav-item nav-link" href="#About">VOUCHER</a> --}}
                    </form>
                    <form action="{{url('/logout')}}" method="get" style="padding-top:7px;">
                        <button type ="submit" class="btn btn-warning tombolSignOut" style="color:white;">Sign Out</button>
                    </form>
                </div>
            </div>
        </div>
</nav>
