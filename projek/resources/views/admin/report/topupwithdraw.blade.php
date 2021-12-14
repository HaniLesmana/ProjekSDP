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
        <div class="col-sm-11"><h2>Laporan Top Up Withdraw</h2></div>
        <div class="col-md-12" style="margin:10px 0 10px 0;">
            <form action="topupPDF" method="GET">
                <button type="submit" class="btn btn-primary"> Print PDF <i class="fas fa-file-pdf"></i></button>
            </form>
        </div>
    </div>
    <form action="{{ url('/report/reporttpwd_ajax/')}}" method="get">
    <div class="table-filter">
        <div class="row">
            <div class="col-sm-12">
                <div class="filter-group">
                    <label>From Date</label>
                    <input type="date" class="form-control" id="search1" name="search1" required>
                </div>
                <div class="filter-group">
                    <label>To Date</label>
                    <input type="date" class="form-control" id="search2" name="search2" required>
                </div>
                <div class="filter-group">
                    <label>Tipe</label>
                    <select class="form-control" id="filterTipe" name="filterTipe" style="height: 30px">
                        <option>All</option>
                        <option>Withdraw</option>
                        <option>Top Up</option>
                    </select>
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
        <th>Id Transaksi</th>
        <th>User ID</th>
        <th>Tanggal</th>
        <th>Total</th>
        <th>Tipe</th>
        <th>Status</th>
        <th>Token</th>
        <th>Payment Status</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="listReport">
    @foreach ($htranstpwd as $i => $p)
        <tr>
            <td>{{$p->htranstpwd_id}}</td>
            <td>{{$p->user_id}}</td>
            <td>{{$p->htranstpwd_tanggal}}</td>
            <td>{{ $p->htranstpwd_total }}</td>
            <td>{{ $p->htranstpwd_tipe }}</td>
            <td>{{ $p->htranstpwd_status }}</td>
            <td>{{ $p->token_payment }}</td>
            <td>{{ $p->status_payment }}</td>
            <td>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$p->htranstpwd_id}}" style="text-decoration: none; border:none; text-align:center;">
                    Detail
                </button>
            </td>
        </tr>
        {{-- modal detail --}}
        <div class="modal fade" id="exampleModal{{$p->htranstpwd_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        @if ($p->htranstpwd_tipe=="topup")
                        <h3 class="modal-title" id="exampleModalLabel">Detail TopUp</h3>
                        @else
                        <h3 class="modal-title" id="exampleModalLabel">Detail Withdraw</h3>
                        @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        @foreach ($dtranstpwd as $y => $x)
                            @if ($x->htranstpwd_id == $p->htranstpwd_id)
                                <div style="background-color: #F5EEDC; padding:5px 5px 5px 5px; border-radius:5px; margin-bottom:7px;">
                                    <div>Dtrans ID :{{$x->id}}</div>
                                    <div>Jumlah :{{$x->htranstpwd_jumlah}}</div>
                                    <div>Nominal :{{$x->htranstpwd_nominal}}</div>
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
//     $("#filterTipe").on('change',function(){
//         filter();
//     });
// });
// function filter(){
//     if ($("#search1").val()!=""&&$("#search2").val()!=""){
//         if($("#filterTipe").val()=="All")
//         $.ajax({
//             type: 'get',
//             url: '/report/reporttpwd_ajax/'+$("#search1").val()+"/"+$("#search2").val(),
//             success: function(data) {
//                 $("#listReport").empty();
//                 $("#listReport").append(data);
//             }
//         });
//     }
// }
</script>

@endsection
