@extends('admin.base-layout')
@section('header')
    @include('admin.navbarAdmin')
@endsection
@section('main')
<style>
    .main{
        background-color:#DBD0C0;
        margin-top: -30px;
        padding: 55px;
    }
</style>
<div class="container mt-5 mb-5 d-flex justify-content-center" style="padding-top:10px; padding-bottom:20px;background-color:#DBD0C0">
    <div class="card px-1 py-4">
        <div class="card-body" style="width:400px;padding:10px 25px 10px 25px;">
        {{-- <form action="/pegawai/insert" method="post">
            @csrf
            <input type="hidden" name="data_pegawai" value= "@if(isset($data_pegawai)){{$data_pegawai}}@endif">
            <input type="hidden" name="data_kategori" value="@if(isset($data_kategori)){{$data_kategori}}@endif">
            <input type="hidden" name="data_item" value= "@if(isset($data_item)){{$data_item}}@endif"> --}}
            <h4 class="card-title mb-3" style="text-align: center;">Detail</h4>
            <div class="row">
                {{-- FOTO BUKTI TF --}}
                Tanggal&nbsp;&nbsp;&nbsp;&nbsp;: {{ $dataheader->htranstpwd_tanggal }} <br>
                Tipe&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $dataheader->htranstpwd_tipe }} <br>
                Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$email}} <br> <br>
                <table class="table table-striped">
                    <thead style="background-color:#E8D0B3;">
                      <tr>
                        <th>Nominal</th>
                        <th>Jumlah</th>
                        {{-- <th>Jumlah Top Up</th> --}}
                        <th></th>
                      </tr>
                    </thead>
                    <?php
                        if(isset($datadetail)){
                            foreach ($datadetail as $data) {
                                echo '<tbody>';
                                    echo'<td>'.data_get($data,'dtranstpwd_nominal').'</td>';
                                    echo'<td>'.data_get($data,'dtranstpwd_jumlah').'</td>';
                                echo '</tbody>';
                            }
                        }
                    ?>
                    {{-- <tbody>
                        <td>1</td>
                        <td>Clarissa</td>
                        <td>10.000</td>
                        <td>
                        <button type="submit" style="border-radius:3px;border:1px solid black; background-color:#FACE7F;">
                            <a href="/admin/detailTopUp/{id}" style="text-decoration: :none; color:white;">
                                Lihat Detail
                            </a>
                        </button>
                        </td>
                    </tbody> --}}
                  </table>
            </div>
            <div style="margin-top: 20px">
                <form action="{{ url('admin/detailTopUp/actionAccept/'.$id)}}" method="post">
                    @csrf
                    <button style="color:white;height:35px;width:100%;border-radius:3px;border:1px solid black; background-color:#FACE7F;text-align:center;">
                    {{-- <a href="#" style="text-decoration: none;color:white">Accept</a> --}}
                    Accept
                    </button>
                </form>
                <form action="{{ url('admin/detailTopUp/actionDecline/'.$id)}}" method="post" style="margin-top: 10px">
                    @csrf
                    <button style="color:white;height: 35px;width:100%;border-radius:3px;border:1px solid black; background-color:Red;text-align:center;">
                    {{-- <a href="#" style="text-decoration: none;color:white">Decline</a> --}}
                    Decline
                    </button>
                </form>
            </div>

            {{-- </form> --}}
        </div>
    </div>
</div>
@endsection
