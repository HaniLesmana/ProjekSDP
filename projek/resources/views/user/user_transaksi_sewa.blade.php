@extends('user.base-layout')
    <!-- Navbar -->
    @section('header')
        @include('user.navbarUser')
    @endsection

    @section('main')
    <style>
        .btnTrans{
            color:white;
        }
        .contItem{
            height:200px;
        }
        .lab{
            height: 20px;
        }
        div.scroll {
            width: 50%;
            height: 150px;
            overflow-x: hidden;
            overflow-y: auto;
            text-align: center;
            padding: 20px;
        }
        /* HIDE SCROLLBAR */
        .example::-webkit-scrollbar {
            display: none;
        }
        .example {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        /* HIDE SCROLLBAR */
    </style>
    <div class="container">

        <div class="shadow-lg p-3 mb-5 bg-white rounded">

        <h2>Cart</h2>
        <hr style="margin-top:20px;">

        <div id="contItems">

            @foreach ($datacart as $key =>$cart)
                <div class="contItem" style="display:flex;margin-bottom:40px;">

                    @foreach ($datapegawai as $keyj=> $peg)
                        @if($cart->pegawai_id==$peg->id)
                            <div style="float:left;">
                                <div class="" style="width: 13rem;">

                                    @if ($peg->pegawai_photo=="" || $peg->pegawai_photo==null)
                                        <img src="{{asset('/img/profile.png')}}" class="card-img-top rounded" style="height:11rem;" alt="...">
                                    @else
                                        <img src="{{asset('/storage/photos/'.$peg->pegawai_photo)}}" class="card-img-top rounded" style="height:11rem;" alt="...">
                                    @endif

                                </div>
                            </div>
                            <div style="float:left;padding:0px 0px 0px 30px;font-size:18px;width:140px;">
                                <b>{{$peg->pegawai_jasa}}</b><br>
                                <label class="lab" style="line-height:20px;margin-top:10px;">Nama</label><br>
                                <label class="lab" style="line-height:20px;">Biaya</label><br>
                                <label class="lab" style="line-height:20px;">Alamat</label><br>
                                <label class="lab" style="line-height:20px;">Tanggal sewa</label><br>
                                <a href="{{ url('user/detaileditcart/'.$peg->id) }}"><button class="btn btn-warning" style="color:white;width:100%;margin-top:20px;">Edit</button></a>

                            </div>
                            <div style="float:left;padding:0px 10px 0px 30px;font-size:18px;width:30%;">
                                <!-- <label for="" >: </label><br> --> <br>
                                <label class="lab" style="line-height:20px;margin-top:10px;">: {{$peg->pegawai_nama}}</label><br>
                                <label class="lab" style="line-height:20px;">: Rp. 50.000,--</label><br>
                                <label class="lab" style="line-height:20px;">: {{$cart->alamat}}</label><br>
                                <label class="lab" style="line-height:20px;">: {{date("d-m-Y", strtotime($cart->tanggal_sewa)) }}</label><br>
                                <a href="{{ url('user/doremovecart/'.$cart->id) }}"> <button class="btn btn-danger" style="color:white;width:40%;margin-top:20px;">Remove</button></a>
                            </div>

                            <div class="scroll" style="float:right;padding:0;height:200px;width:40%;" >
                                <table class="table" style="padding:0px;margin:0px;">
                                    <thead class="">
                                        <tr>
                                            <th scope="col" style="width:500px;">Nama</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Jumlah</th>
                                        </tr>
                                    </thead>
                                    @foreach ($dataaddon as $j =>$addon)
                                        @foreach ($databarang as $i =>$barang)
                                        @if ($addon->id_pegawai==$cart->pegawai_id)
                                            @if ($addon->id_barang==$barang->id)
                                            <tr>
                                                <td style="height:10px;text-align:left;">{{$barang->barang_nama}}</td>
                                                <td style="height:10px;"><label id="R{{$key+1}}p{{$i+1}}">{{$barang->barang_harga}}</label></td>
                                                {{-- <td id="txthidden"><input type="number" style="display:none;width:70px;" id="H{{$key+1}}p{{$i+1}}" class="form-control-sm" name="jumlah[]" onchange="changeJumlah({{$key+1}}+'p'+{{$i+1}})" min=1></td> --}}
                                                <td id="txthidden"><input type="number" style="width:70px;" value="{{$addon->jumlah}}" class="form-control-sm" min=1 readonly></td>
                                            </tr>
                                            @endif
                                        @endif
                                        @endforeach
                                    @endforeach
                                </table>
                            </div>
                        @endif
                    @endforeach
                </div>
                <hr>
            @endforeach
        </div>
        <form  method="get" action="{{ url('home/pembayaran') }}">

            <div style="float:right;">
                <label style="color:grey;font-weight:semibold;font-size:20px;" id="txttotal">Total :  {{$total}}</label>
                <input type="hidden" name="txttotalhidden" id="txttotalhidden" value="{{$total}}">
                <input type="hidden" name="txttotalhidden1" id="txttotalhidden1" value="{{$total}}">
                {{-- <input type="hidden" name="" id="txttotalhidden" value="{{$total}}"> --}}
                <input type="hidden" name="dtranskey[]" id="temp">
                <input type="hidden" name="temparr[]" id="temp">
                <input type="hidden" name="tempjumlah[]" id="tempjumlah">

                <button type="submit" class="btn btn-warning" style="color:white;margin-left:10px;margin-top:-5px;" onclick="btncheckout()">Checkout</button>
            </div>
            <div style="clear:both"></div>
        </form>
        </div>
    </div>


{{--
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        Launch demo modal
      </button> --}}

      <!-- Modal -->
      <div class="modal fade" id="pilihalamat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Pilih alamat lain</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                <div class="container" id="map" style="height:500px;"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </div>

    <footer>

    </footer>

    <!-- <script type="text/javascript" src="/js/functions.js"></script> -->
    {{-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=places&sensor=false"></script> --}}
    {{-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script> --}}
    {{-- <script
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&v=weekly"
    async >
</script> --}}
<script>
    //   let map;
    // function initMap() {
    //     map = new google.maps.Map(document.getElementById("map"), {
    //     center: { lat: -34.397, lng: 150.644 },
    //     zoom: 8,
    //     });
    // }
    // let map: google.maps.Map;

    // function initMap(): void {
    // map = new google.maps.Map(document.getElementById("map") as HTMLElement, {
    //     center: { lat: -34.397, lng: 150.644 },
    //     zoom: 8,
    // });
    // }
        function keclicks(id){
            if ($('#C'+id).is(':checked')){
                $("#H"+id).css('display',"block");
            }
            else{
                // var total = $('#txttotalhidden').val();
                // var harga = $('#R'+id).html();
                // var jumlah = $('#H'+id).val();

                // var newTotal = parseInt(total) - (parseInt(harga)*parseInt(jumlah));
                // $('#txttotal').html("Total : "+newTotal);
                // $('#txttotalhidden').val(newTotal+"");

                $("#H"+id).css('display',"none");
            }
        }
        function btncheckout(){

        }

        function changeJumlah(id) {
            //alert($("#tes").html());
            var total = $('#txttotalhidden1').val();
            var harga = $('#R'+id).html();
            var jumlah = $('#H'+id).val();

            var newTotal = parseInt(total) + parseInt(harga)*parseInt(jumlah);

            $('#txttotal').html("Total : "+newTotal);
            $('#txttotalhidden').val(newTotal+"");
        }
    </script>
    @endsection
