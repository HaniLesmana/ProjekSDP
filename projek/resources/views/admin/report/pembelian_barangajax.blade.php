@extends('admin.base-layout')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-11"><h2>Laporan Transaksi Barang</h2></div>
        <div class="col-md-12" style="margin:10px 0 10px 0;">
            <form action="transaksi_barangPDF" method="GET">
                <button type="submit" class="btn btn-primary"> Print PDF <i class="fas fa-file-pdf"></i></button>
            </form>
        </div>
    </div>
    <form action="{{ url('/report/reportpembelianbarang_ajax/')}}" method="get">
    <div class="table-filter">
        <div class="row">
            <div class="col-sm-12">
                <div class="filter-group">
                    <label>From Date</label>
                    <input type="date" class="form-control" name="search1" id="search1" value="{{$search_1}}">
                </div>
                <div class="filter-group">
                    <label>To Date</label>
                    <input type="date" class="form-control" name="search2" id="search2" value="{{$search_2}}">
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-warning">Search</button>
    </form>
  <div class="table-responsive" id="contentss">
  <table class="table table-striped" id="myTable">
    <thead style="background-color:#E8D0B3;">
      <tr>
        <th>ID</th>
        <th>User Nama</th>
        <th>Pegawai Nama </th>
        <th>Total</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="listReport">
        @foreach ($dtranssewa as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->htranssewa->user->user_nama}}</td>
            <td>{{$d->pegawai->pegawai_nama}}</td>
            <td>Rp.{{$d->htranssewa->hSewa_total}},-</td>
            <td>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$d->id}}" style="text-decoration: none; border:none; text-align:center;">
                    Detail
                </button>
            </td>
        </tr>
        {{-- modal detail --}}
        <div class="modal fade" id="exampleModal{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Detail Transaksi</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                                <div style="background-color: #F5EEDC; padding:5px 5px 5px 5px; border-radius:5px; margin-bottom:7px;">
                                    <div>Dtrans ID :{{$d->id}}</div>
                                    <div>Barang: {{$d->dtransbarang->barang_id}},{{$d->dtransbarang->barang->barang_nama}}</div>
                                    <div>Jumlah :{{$d->dtransbarang->barang_jumlah}}</div>
                                </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
  </table>
  </div>
</div>
<script>
// $(document).ready(function() {
//     $("#search1").change(function(){
//         if ($("#search1").val()==""||$("#search2").val()==""){
//             alert("tanggal masih ada yang kosong");
//         }
//         else{
//             filter();
//         }
//     });
//     $("#search2").on('change',function(){
//         //alert(this.value);
//         if ($("#search1").val()==""||$("#search2").val()==""){
//             alert("tanggal masih ada yang kosong");
//         }
//         else{
//             filter();
//         }
//     });
// });
// function filter(){
//     if ($("#search1").val()!=""&&$("#search2").val()!=""){
//         $.ajax({
//             type: 'get',
//             url: '/report/reportpembelianbarang_ajax/'+$("#search1").val()+"/"+$("#search2").val(),
//             success: function(data) {
//                 // alert('testif($("#listReport").){
//                 if($("#contentss").is(':empty')){
//                     $("#contentss").append(data);
//                 }
//                 else{
//                     $("#contentss").empty();
//                     $("#contentss").append(data);
//                 }

//             }
//         });
//     }
// }
// </script>
@endsection
