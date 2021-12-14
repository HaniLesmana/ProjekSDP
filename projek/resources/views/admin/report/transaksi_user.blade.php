@extends('admin.base-layout')
@section('main')
<style>
    .table-filter {
	padding: 5px 0 15px;
	border-bottom: 1px solid #e9e9e9;
	margin-bottom: 5px;
}
.table-filter .btn {
	height: 34px;
}
.table-filter label {
	font-weight: normal;
	margin-left: 10px;
}
.table-filter select, .table-filter input {
	display: inline-block;
	margin-left: 5px;
}
.table-filter input {
	width: 200px;
	display: inline-block;
}
.filter-group select.form-control {
	width: 110px;
}
.filter-icon {
	float: right;
	margin-top: 7px;
}
.filter-icon i {
	font-size: 18px;
	opacity: 0.7;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-11"><h2>Laporan Transaksi User</h2></div>
        <div class="col-md-12" style="margin:10px 0 10px 0;">
            <form action="transaksi_userPDF" method="GET">
                <button type="submit" class="btn btn-primary"> Print PDF <i class="fas fa-file-pdf"></i></button>
            </form>
        </div>
    </div>
    <form action="{{ url('/report/reportsewa_ajax/')}}" method="get">
    <div class="table-filter">
        <div class="row">
            <div class="col-sm-12">
                <div class="filter-group">
                    <label>From Date</label>
                    <input type="date" class="form-control" id="search1" name="search1">
                </div>
                <div class="filter-group">
                    <label>To Date</label>
                    <input type="date" class="form-control" id="search2" name="search2">
                </div>
                <button type="submit" class="btn btn-warning">Search</button>
            </div>
        </div>
    </div>
    </form>
  <div class="table-responsive" id="contentss">
  <table class="table table-striped" id="myTable">
    <thead style="background-color:#E8D0B3;">
      <tr>
        <th>ID</th>
        <th>User ID</th>
        <th>Voucher ID </th>
        <th>Total</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="reportSewa">
    @foreach ($htranssewa as $i => $p)
        <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->user_id}}</td>
            @if ($p->voucher_id == null)
                <td>-</td>
            @else
                <td>{{$p->voucher_id}}</td>
            @endif
            <td>Rp.{{$p->hSewa_total}},-</td>
            <td>
                <button type="button" class="btn btn-warning"" data-toggle="modal" data-target="#exampleModal{{$p->id}}" style="text-decoration: none; border:none; text-align:center;">
                    Detail
                </button>
            </td>
        </tr>
        {{-- modal detail --}}
        <div class="modal fade" id="exampleModal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Detail Transaksi</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        @foreach ($dtranssewa as $y => $x)
                            @if ($x->hSewa_id == $p->id)
                                <div style="background-color: #F5EEDC; padding:5px 5px 5px 5px; border-radius:5px; margin-bottom:7px;">
                                    <div>Dtrans ID :{{$x->id}}</div>
                                    <div>Pegawai ID :{{$x->pegawai_id}}</div>
                                    <div>Tanggal sewa :{{$x->dSewa_tanggal}}</div>
                                    <div>Harga sewa : Rp.{{$x->dSewa_harga}},-</div>
                                    <div>Alamat :{{$x->dSewa_alamat}}</div>
                                    <div>Status :{{$x->dSewa_status_accpegawai}}</div>
                                </div>
                            @endif
                        @endforeach
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
    //         //alert($("#search1").val());
    //         //filter();
    //         if ($("#search1").val()==""||$("#search2").val()==""){
    //             alert("tanggal masih ada yang kosong");
    //         }
    //         else{
    //             // alert("ok");
    //             filter();
    //         }
    //     });
    //     $("#search2").on('change',function(){
    //         //alert(this.value);
    //         if ($("#search1").val()==""||$("#search2").val()==""){
    //             alert("tanggal masih ada yang kosong");
    //         }
    //         else{
    //              //alert($("#search2").val());
    //             filter();
    //         }
    //     });
    // });
    // function filter(){
    //     if ($("#search1").val()!=""&&$("#search2").val()!=""){
    //         $.ajax({
    //             type: 'get',
    //             url: '/report/reportsewa_ajax/'+$("#search1").val()+"/"+$("#search2").val(),
    //             success: function(data) {
    //                 $("#reportSewa").empty();
    //                 $("#reportSewa").append(data);
    //             }
    //         });
    //     }
    // }
    </script>
@endsection
