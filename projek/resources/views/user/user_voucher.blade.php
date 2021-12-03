@extends('user.base-layout')
<!-- Navbar -->
@section('header')
    @include('user.navbarUser')
@endsection

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
.table-title {
    padding-bottom: 15px;
    background: #299be4;
    color: #fff;
    padding: 16px 30px;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
}
.table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
}
.table-title .btn {
    color: #566787;
    float: right;
    font-size: 13px;
    background: #fff;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 10px;
}
.table-title .btn:hover, .table-title .btn:focus {
    color: #566787;
    background: #f2f2f2;
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
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
}
table.table tr th:first-child {
    width: 60px;
}
table.table tr th:last-child {
    width: 100px;
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
table.table td:last-child i {
    opacity: 0.9;
    font-size: 22px;
    margin: 0 5px;
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
table.table td a.settings {
    color: #2196F3;
}
table.table td a.delete {
    color: #F44336;
}
table.table td i {
    font-size: 19px;
}
table.table .avatar {
    border-radius: 50%;
    vertical-align: middle;
    margin-right: 10px;
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
.pagination li.active a, .pagination li.active a.page-link {
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
.imgAdd{
    margin-top:-1px;
    margin-left:-5.9px;
    width:23px;
    height:23px;
}
.imgMinus{
    margin-top:-1px;
    margin-left:-5.9px;
    width:23px;
    height:23px;
}
.btnPlus{
    background:#03A9F4;
    border-radius :100px;
    width:23px;
    height:23px;
    background:#03A9F4;
    border:none;
}
.btnPlus:focus{
    outline: none;
}
.btnMinus{
    background:#03A9F4;
    border-radius :100px;
    width:23px;
    height:23px;
    border:none;
}
.btnMinus:focus{
    outline: none;
}
.plusMinus{
    margin:auto;text-align:center;margin-top:10px;
}
</style>
<!-- <script>
 $(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
 });
</script> -->
<form method="post" action="{{url('/user/dotransvoucher')}}">
@csrf
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>List <b>Voucher</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <!-- <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
                        <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i> <span>Export to Excel</span></a> -->
                    </div>
                </div>
            </div>

            <table class="table table-striped table-hover">
                {{-- <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date Created</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead> --}}
                <tbody>
                    @foreach($datavoucher as $key => $voucher)
                        <tr>
                            <td>{{ $voucher->voucher_nama }}</td>
                            <td>Dapatkan potongan harga sebesar Rp {{$voucher->voucher_potongan}},- untuk transaksi sewamu.</td>
                            <td>Rp {{ $voucher->voucher_harga }},-</td>
                            <td>
                                <button class="btnMinus" type="button" id="btnmin{{$voucher->id}}" ><img class="imgMinus" src="{{ url('img/minus.png') }}" onclick="btnmin(''+{{$voucher->id}},{{$voucher->voucher_harga}})"  alt=""></button>
                                <input type="text" name="jumlah[]" id="jumlah{{$voucher->id}}" value="0" onclick="jumlah(''+{{$voucher->id}})" style="width:40px;text-align:center;color:black;background:transparent;border:2px solid black;border-radius :5px;">
                                <button class="btnPlus" type="button" id="btnplus{{$voucher->id}}"><img class="imgAdd" onclick="btnplus(''+{{$voucher->id}},{{$voucher->voucher_harga}})" src="{{ url('img/add.png') }}" alt=""></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div>
                <h4>Total : <label id="total">0</label></h4>
                <input type="hidden" name="totalHidden" id="totalHidden" value="0">
                <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#exampleModal" style="color:white;">Checkout</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                Are you sure?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-warning">Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
</form>
<script>
    $( document ).ready(function() {

    });
    // function btnclick(id,ya){
    //     alert(id);
    // }
    function btnmin(id,harga){
        let jum = parseInt($('#jumlah'+id).val());
        if(jum>0){
            let hargaint = parseInt(harga);
            let newjum = jum-1;
            let jum2 = parseInt(newjum);
            let total = hargaint*jum2;
            $('#jumlah'+id).val(newjum);
            $('#total').html(total);
            $('#totalHidden').val(total);
        }
    }

    function btnplus(id,harga){
        let jum = parseInt($('#jumlah'+id).val());
        let newjum = jum+1;
        let hargaint = parseInt(harga);
        let total = parseInt(hargaint*newjum);
        $('#jumlah'+id).val(newjum);
        $('#total').html(total);
        $('#totalHidden').val(total);
    }

</script>

@endsection
