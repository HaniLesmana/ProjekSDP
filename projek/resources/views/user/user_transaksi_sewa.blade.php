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
        <h2>Transaction Page</h2>
        <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <form  method="get" action="{{ url('home/do_transaksi_sewa') }}">
            <h5>Alamat</h5>
            <hr>
            {{-- <input type="text" name="txtalamat" id="" value="{{}}"> --}}
            <label name="txtalamat1">{{$datauser->user_alamat}}</label><label style="font-size:0.5em;color:#03AC0E;background-color:#D6FFDE;margin-left:5px;">Utama</label><br>
            <input type="hidden" name="txtalamat2" value="{{$datauser->user_alamat}}">
            <a href="" data-target="#pilihalamat" data-toggle="modal"><button class="btn btn-warning btnTrans" data-target="#pilihalamat" data-toggle="modal">Pilih alamat lain</button></a>
            {{-- <button class="btn btn-warning btnTrans" data-target="#pilihalamat" data-toggle="modal">Pilih alamat lain</button> --}}

            <hr style="margin-top:30px;">
            <div id="contItems">

                @foreach ($datacart as $key =>$cart)
                    <div class="contItem" style="display:flex;">

                        @foreach ($datapegawai as $keyj=> $peg)
                            @if($cart->pegawai_id==$peg->pegawai_id)
                                <div style="float:left;">
                                    <div class="" style="width: 13rem;">
                                        @if ($peg->pegawai_jasa=="Cleaning")
                                            <img src="{{asset('img/img2.png')}}" class="card-img-top rounded" style="height:11rem;" alt="...">
                                        @else
                                            <img src="{{asset('img/img1.png')}}" class="card-img-top rounded" style="height:11rem;" alt="...">
                                        @endif
                                    </div>
                                </div>
                                <div style="float:left;padding:0px 10px 0px 30px;font-size:18px;">
                                    <b>{{$peg->pegawai_jasa}}</b><br>
                                    <!-- <label for="" class="">Jenis jasa</label><br> -->
                                    <label class="lab">Nama</label><br>
                                    <label class="lab">Alamat</label><br>
                                    <label class="lab">Biaya</label><br>
                                </div>
                                <div style="float:left;padding:0px 10px 0px 30px;font-size:18px;width:30%;">
                                    <!-- <label for="" >: </label><br> --> <br>
                                    <label class="lab">: {{$peg->pegawai_nama}}</label><br>
                                    <label class="lab">: {{$peg->pegawai_alamat}}</label><br>
                                    <label class="lab">: Rp. 50.000,--</label><br>
                                </div>

                                <div class="scroll" style="float:right;padding:0;height:200px;" >
                                    <table class="table" style="padding:0px;margin:0px;">
                                        <thead class="">
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Jumlah</th>
                                            </tr>
                                        </thead>
                                        @foreach ($databarang as $i =>$barang)
                                            <tr>
                                                <td style="height:10px;"><input type="checkbox" id="C{{$key+1}}p{{$i+1}}" name="arr[]" onclick="keclicks({{$key+1}}+'p'+{{$i+1}})" value="{{$i}}pas{{$key+1}}"></td>
                                                {{-- <td style="height:10px;"><input type="checkbox" id="C{{$i+1}}" name="arr[]" onclick="keclicks({{$i+1}})" value="{{$i}}"></td> --}}
                                                {{-- <td style="height:10px;"><input type="checkbox" id="C{{$i+1}}" name="arr[]" onclick="keclicks({{$i+1}})" value="{{$i}}"></td> --}}
                                                <td style="height:10px;">{{$barang->barang_nama}}</td>
                                                <td style="height:10px;"><label id="R{{$key+1}}p{{$i+1}}">{{$barang->barang_harga}}</label></td>
                                                <td id="txthidden"><input type="number" style="display:none;width:70px;" id="H{{$key+1}}p{{$i+1}}" class="form-control-sm" name="jumlah[]" onchange="changeJumlah({{$key+1}}+'p'+{{$i+1}})" min=1></td>
                                                {{-- <td id="txthidden"><input type="number" style="display:none;height:10px;" id="H{{$i+1}}" class="form-control-sm" name="jumlah[]"></td> --}}

                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            @endif
                        @endforeach

                    </div>
                    <hr>
                @endforeach
            </div>


                <label style="color:grey;font-weight:semibold;font-size:20px;" id="txttotal">Total :  {{$total}}</label>
                <input type="hidden" name="txttotalhidden" id="txttotalhidden" value="{{$total}}">
                <input type="hidden" name="txttotalhidden1" id="txttotalhidden1" value="{{$total}}">
                {{-- <input type="hidden" name="" id="txttotalhidden" value="{{$total}}"> --}}
                <input type="hidden" name="dtranskey[]" id="temp">
                <input type="hidden" name="temparr[]" id="temp">
                <input type="hidden" name="tempjumlah[]" id="tempjumlah">

                <button type="submit" class="btn btn-warning" onclick="btncheckout()">Checkout</button>
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
