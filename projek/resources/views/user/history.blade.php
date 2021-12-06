@extends('user.base-layout')
<!-- Navbar -->
@section('header')
    @include('user.navbarUser')
@endsection

<!-- Akhir Navbar -->
@section('main')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-wrapper .btn {
	float: right;
	color: #333;
	background-color: #fff;
	border-radius: 3px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-wrapper .btn:hover {
	color: #333;
	background: #f2f2f2;
}
.table-wrapper .btn.btn-primary {
	color: #fff;
	background: #03A9F4;
}
.table-wrapper .btn.btn-primary:hover {
	background: #03a3e7;
}
.table-title .btn {
	font-size: 13px;
	border: none;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
.table-title {
	color: #fff;
	background: #4b5366;
	padding: 16px 25px;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.show-entries select.form-control {
	width: 60px;
	margin: 0 5px;
}
.table-filter .filter-group {
	float: right;
	margin-left: 15px;
}
.table-filter input, .table-filter select {
	height: 34px;
	border-radius: 3px;
	border-color: #ddd;
	box-shadow: none;
}
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
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 80px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.view {
	width: 30px;
	height: 30px;
	color: #2196F3;
	border: 2px solid;
	border-radius: 30px;
	text-align: center;
}
table.table td a.view i {
	font-size: 22px;
	margin: 2px 0 0 1px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
    height:50px;
    width:50px;
}
.status {
	font-size: 30px;
	margin: 2px 2px 0 0;
	display: inline-block;
	vertical-align: middle;
	line-height: 10px;
}
.text-success {
	color: #10c469;
}
.text-info {
	color: #62c9e8;
}
.text-warning {
	color: #FFC107;
}
.text-danger {
	color: #ff5b5b;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}
.pagination li.active a {
	background: #03A9F4;
}
.pagination li.active a:hover {
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Order <b>History</b></h2>
                    </div>
                    <div class="col-sm-8">
                        {{-- <a href="#" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></a>
                        <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i> <span>Export to Excel</span></a> --}}
                    </div>
                </div>
            </div>
            <div class="table-filter">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="show-entries">
                            <span>Show</span>
                            <select class="form-control">
                                <option>5</option>
                                <option>10</option>
                                <option>15</option>
                                <option>20</option>
                            </select>
                            <span>entries</span>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        {{-- <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button> --}}
                        <div class="filter-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="search">
                        </div>
                        {{-- <div class="filter-group">
                            <label>Location</label>
                            <select class="form-control">
                                <option>All</option>
                                <option>Berlin</option>
                                <option>London</option>
                                <option>Madrid</option>
                                <option>New York</option>
                                <option>Paris</option>
                            </select>
                        </div> --}}
                        <div class="filter-group">
                            <label>Status</label>
                            <select class="form-control" id="filterstatus">
                                <option>Any</option>
                                <option>Cancel</option>
                                <option>Accept</option>
                                <option>Pending</option>
                                <option>Finish</option>
                            </select>
                        </div>
                        <span class="filter-icon"><i class="fa fa-filter"></i></span>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pegawai</th>
                        <th>Location</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Net Amount</th>
                        <th>Detail</th>
                        <th>Review</th>
                    </tr>
                </thead>
                <tbody id="listhistory">
                    @isset($dtransewa)
                        @foreach ($dtransewa as $i =>$dt)
                        <tr>
                            <td>{{$i+1}}</td>
                            @if($dt->pegawai->pegawai_photo=="" || $dt->pegawai->pegawai_photo==null)
                                <td><a href="#"><img src="{{asset('/img/profile.png')}}" class="avatar" alt="Avatar" style="height:50px;"> {{$dt->pegawai->pegawai_nama}}</a></td>
                            @else
                                <td><a href="#"><img src="{{asset('/storage/photos/'.$dt->pegawai->pegawai_photo)}}" class="avatar" alt="Avatar"> {{$dt->pegawai->pegawai_nama}}</a></td>
                            @endif

                            <td>{{$dt->dSewa_alamat}}</td>
                            <td>{{$dt->dSewa_tanggal}}</td>
                            @if ($dt->dSewa_status_accpegawai==0)
                                <td><span class="status text-danger">&bull;</span>Cancel</td>
                            @elseif ($dt->dSewa_status_accpegawai==1)
                                <td><span class="status text-info">&bull;</span>Accept</td>
                            @elseif ($dt->dSewa_status_accpegawai==2)
                                <td><span class="status text-warning">&bull;</span>Pending</td>
                            @elseif ($dt->dSewa_status_accpegawai==3)
                                <td><span class="status text-success">&bull;</span>Finish</td>
                            @endif

                            <td>Rp. {{$dt->dSewa_harga}}</td>
                            {{-- <form action="{{url('/user/detailongoing/'.$dt->id)}}" method="get"> --}}
                                <td>
                                    {{-- <button type="submit" >
                                        <a class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a>
                                    </button> --}}
                                    <a href="{{url('/user/detailongoing/'.$dt->id)}}" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a>
                                </td>
                                <td>
                                    <a href="{{url('/user/rating/'.$dt->pegawai_id)}}" class="view" title="View Details" data-toggle="tooltip">
                                        {{-- <span class="material-icons-outlined">
                                            reviews
                                        </span> --}}
                                        <i class="fa">&#xf005;</i>
                                    </a>
                                </td>
                            {{-- </form> --}}
                            {{-- <td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td> --}}
                        </tr>
                        @endforeach
                        {{-- {{ $dtransewa->links() }} --}}
                    @endisset

                    {{-- <tr>
                        <td>1</td>
                        <td><a href="#"><img src="/examples/images/avatar/1.jpg" class="avatar" alt="Avatar"> Michael Holz</a></td>
                        <td>London</td>
                        <td>Jun 15, 2017</td>
                        <td><span class="status text-success">&bull;</span> Delivered</td>
                        <td>$254</td>
                        <td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><a href="#"><img src="/examples/images/avatar/2.jpg" class="avatar" alt="Avatar"> Paula Wilson</a></td>
                        <td>Madrid</td>
                        <td>Jun 21, 2017</td>
                        <td><span class="status text-info">&bull;</span> Shipped</td>
                        <td>$1,260</td>
                        <td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><a href="#"><img src="/examples/images/avatar/3.jpg" class="avatar" alt="Avatar"> Antonio Moreno</a></td>
                        <td>Berlin</td>
                        <td>Jul 04, 2017</td>
                        <td><span class="status text-danger">&bull;</span> Cancelled</td>
                        <td>$350</td>
                        <td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><a href="#"><img src="/examples/images/avatar/4.jpg" class="avatar" alt="Avatar"> Mary Saveley</a></td>
                        <td>New York</td>
                        <td>Jul 16, 2017</td>
                        <td><span class="status text-warning">&bull;</span> Pending</td>
                        <td>$1,572</td>
                        <td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><a href="#"><img src="/examples/images/avatar/5.jpg" class="avatar" alt="Avatar"> Martin Sommer</a></td>
                        <td>Paris</td>
                        <td>Aug 04, 2017</td>
                        <td><span class="status text-success">&bull;</span> Delivered</td>
                        <td>$580</td>
                        <td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
                    </tr> --}}
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    {{-- <li class="page-item">
                        <a href="{{$dtransewa->previousPageUrl() }}" class="page-link">1</a>
                    </li> --}}
                    {{-- <li class="page-item"><a href="{{$dtransewa->nextPageUrl()}}" class="page-link">2</a></li> --}}
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item active"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">6</a></li>
                    <li class="page-item"><a href="#" class="page-link">7</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
<script>
$(document).ready(function() {
    $("#search").keyup(function(){
        filter();
    });
    $("#filterstatus").on('change',function(){
        filter();
    });
});
function filter(){
    if ($("#search").val()!=""){
        if($("#filterstatus").val()=="Any"){
            $.ajax({
                type: 'get',
                url: '/home/history_filter_pegawai/'+$("#search").val()+"/"+$("#filterstatus").val(),
                success: function(data) {
                    $("#listhistory").empty();
                    $("#listhistory").append(data);
                }
            });
        }
        else if($("#filterstatus").val()=="Cancel"){
            $.ajax({
                type: 'get',
                url: '/home/history_filter_pegawai/'+$("#search").val()+"/0",
                success: function(data) {
                    $("#listhistory").empty();
                    $("#listhistory").append(data);
                }
            });
        }
        else if($("#filterstatus").val()=="Accept"){
            $.ajax({
                type: 'get',
                url: '/home/history_filter_pegawai/'+$("#search").val()+"/1",
                success: function(data) {
                    $("#listhistory").empty();
                    $("#listhistory").append(data);
                }
            });
        }
        else if($("#filterstatus").val()=="Pending"){
            $.ajax({
                type: 'get',
                url: '/home/history_filter_pegawai/'+$("#search").val()+"/2",
                success: function(data) {
                    $("#listhistory").empty();
                    $("#listhistory").append(data);
                }
            });
        }
        else if($("#filterstatus").val()=="Finish"){
            $.ajax({
                type: 'get',
                url: '/home/history_filter_pegawai/'+$("#search").val()+"/3",
                success: function(data) {
                    $("#listhistory").empty();
                    $("#listhistory").append(data);
                }
            });
        }
    }
    else{
        if($("#filterstatus").val()=="Any"){
            $.ajax({
                type: 'get',
                url: '/home/history_filter_pegawai_status/'+$("#filterstatus").val(),
                success: function(data) {
                    $("#listhistory").empty();
                    $("#listhistory").append(data);
                }
            });
        }
        else if($("#filterstatus").val()=="Cancel"){
            $.ajax({
                type: 'get',
                url: '/home/history_filter_pegawai_status/0',
                success: function(data) {
                    $("#listhistory").empty();
                    $("#listhistory").append(data);
                }
            });
        }
        else if($("#filterstatus").val()=="Accept"){
            $.ajax({
                type: 'get',
                url: '/home/history_filter_pegawai_status/1',
                success: function(data) {
                    $("#listhistory").empty();
                    $("#listhistory").append(data);
                }
            });
        }
        else if($("#filterstatus").val()=="Pending"){
            $.ajax({
                type: 'get',
                url: '/home/history_filter_pegawai_status/2',
                success: function(data) {
                    $("#listhistory").empty();
                    $("#listhistory").append(data);
                }
            });
        }
        else if($("#filterstatus").val()=="Finish"){
            $.ajax({
                type: 'get',
                url: '/home/history_filter_pegawai_status/3',
                success: function(data) {
                    $("#listhistory").empty();
                    $("#listhistory").append(data);
                }
            });
        }
    }
}
</script>
@endsection
