@extends('user.base-layout')
<!-- Navbar -->
@section('header')
    @include('user.navbarUser')
@endsection
<!-- Akhir Navbar -->
@section('main')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .hideScrollbar::-webkit-scrollbar {
            display: none;
        }

            /* Hide scrollbar for IE, Edge and Firefox */
        .hideScrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>

    <div class="container">
        <div class="shadow-lg" style="height: 100px;width:100%;padding:10px;">
            <div style="float:left;">
                <div style="">
                    @if ($pegawai->pegawai_jasa=="Cleaning")
                        <img src="{{asset('img/img2.png')}}" class="card-img-top rounded" style="height:80px;width:80px;border-radius: 50%;object-fit: cover;" alt="...">
                    @else
                        <img src="{{asset('img/img1.png')}}" class="card-img-top rounded" style="height:80px;width:80px;border-radius: 50%;" alt="...">
                    @endif
                </div>
            </div>
            <div style="float:left;padding:8px 0px 0px 30px;font-size:18px;width:140px;">
                <b>{{$pegawai->pegawai_jasa}}</b><br>
                <label class="lab" style="line-height:20px;margin-top:10px;">{{$pegawai->pegawai_nama}}</label><br>

            </div>
        </div>
        <br>

        <!-- CHAT AJAX -->
        <div class="shadow rounded hideScrollbar" id="chattext" style="height:452px;margin-right:-20px;padding:20px;overflow: auto;">


        </div>

        {{-- <form action="{{url('/user/chat_ajax')}}" method="post">
            @csrf --}}
            <div class="input-group mb-3" style="margin-right:-20px;position:fixed;bottom:0px;width:1160px;background-color:white">
                <input type="text" class="form-control" id="inputchattext" placeholder="Tulis pesan...">
                <input type="hidden" id="idpegawai" name="idpegawai" value="{{ $pegawai->id }}">
                <button class="btn btn-outline-success" type="submit" id="btnsend">Send</button>
            </div>
        {{-- <input type="text" name="txtchat" id="" class="form-control"> --}}
        {{-- </form> --}}
    </div>

    <script>


        $(document).ready(function() {
            // alert("berhasil");
            loadChatAjax2();

            $("#btnsend").click(function(){
                //alert($("#inputchattext").val());
                // data.order = order.positions;
                loadChatAjax();
            });
        });

        function loadChatAjax() {
            var inputchattext=$("#inputchattext").val()+"";
            var idpegawai = $('#idpegawai').val();
            $.ajax({
                type: 'post',
                url: '/user/chat_ajax/',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    datachat:inputchattext,
                    // _token:$('input[name=_token]').val(),
                    idpegawai:idpegawai,
                    _token: '{{csrf_token()}}'
                },
                success: function(data) {
                    //alert("berhasil");
                    // loadChatAjax2();
                }
            });
        }
        setInterval(()=>{
            loadChatAjax2();
        },500);

        function loadChatAjax2() {
            // var inputchattext=$("#inputchattext").val()+"";
            var idpegawai = $('#idpegawai').val();
            $.ajax({
                type: 'post',
                url: '/user/chat_ajax2',
                // headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                // },
                data:{
                    idpegawai:idpegawai,
                    _token: '{{csrf_token()}}'
                },
                success: function(data) {
                    $("#chattext").empty();
                    $("#chattext").append(data);
                    var objDiv = document.getElementById("chattext");
                    objDiv.scrollTop = objDiv.scrollHeight;
                }
            });
        }



    </script>
@endsection
