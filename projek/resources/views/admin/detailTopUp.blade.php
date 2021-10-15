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
<div class="container mt-5 mb-5 d-flex justify-content-center" style="padding-top:20px; padding-bottom:20px;background-color:#DBD0C0">
    <div class="card px-1 py-4">
        <div class="card-body" style="width:400px;padding-top:30px; padding-bottom:30px;">
        {{-- <form action="/pegawai/insert" method="post">
            @csrf
            <input type="hidden" name="data_pegawai" value= "@if(isset($data_pegawai)){{$data_pegawai}}@endif">
            <input type="hidden" name="data_kategori" value="@if(isset($data_kategori)){{$data_kategori}}@endif">
            <input type="hidden" name="data_item" value= "@if(isset($data_item)){{$data_item}}@endif"> --}}
            <h5 class="card-title mb-3" style="text-align: center;">Detail</h5>
            <div class="row">
                FOTO BUKTI TF
            </div>
            <form action="{{ url('/actionAccept/'.$id)}}" method="post">
                @csrf
                <button style="color:white; width: 185px;border-radius:3px;border:1px solid black; background-color:#FACE7F;text-align:center;">
                <a href="#" style="text-decoration: none;color:white">Accept</a>
                Accept
                </button>
            </form>
            <form action="{{ url('/actionDecline/'.$id)}}" method="post">
                @csrf
                <button style="color:white; width: 185px;border-radius:3px;border:1px solid black; background-color:Red;text-align:center;">
                <a href="#" style="text-decoration: none;color:white">Decline</a>
                </button>
            </form>
            {{-- </form> --}}
        </div>
    </div>
</div>
@endsection
