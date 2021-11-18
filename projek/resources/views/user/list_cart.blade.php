@extends('user.base-layout')
    <!-- Navbar -->
    @section('header')
        @include('user.navbarUser')
    @endsection

    <!-- Akhir Navbar -->
    @section('main')
    <div class="container" style="margin-top : 20px;">
        {{-- <h2>Total : Rp {{ $total }}</h2> --}}
        <div class="card">
            <div class="card-body">
                <table class="table table-light table-striped" style="margin-bottom: 50px;">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Pegawai Nama</th>
                        <th scope="col">Jasa</th>
                        <th scope="col">Cancel</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($datacart as $i=> $cart)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    @foreach ($datapegawai as $key =>$peg)
                                        @if ($peg->pegawai_id==$cart->pegawai_id)
                                            <td>{{$peg->pegawai_nama}}</td>
                                            <td>{{$peg->pegawai_jasa}}</td>
                                            <form action="{{ url('/home/list_cart_cancel/'.$cart->id)}}" method="get">
                                                <td><button type="submit" class="btn btn-danger">Cancel</button></td>
                                            </form>
                                        @endif
                                    @endforeach
                                </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="{{ url('/home/transaksi_sewa')}}" method="get">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
    </div>

    <!-- <script type="text/javascript" src="/js/functions.js"></script> -->
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
