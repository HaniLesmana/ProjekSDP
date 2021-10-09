@extends('admin.base-layout')
@section('header')
    @include('admin.navbarAdmin')
@endsection
@section('main')
<style>
    .main{
        background-color:#DBD0C0;
        margin-top: -30px;
        padding: 3px;
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
            <h5 class="card-title mb-3" style="text-align: center;">Add Pegawai</h5>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <input class="form-control" type="number" name="id" placeholder="ID Employee"> </div>
                        {{-- @error('nik')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror --}}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" name="email" type="email" placeholder="Email"> </div>
                        {{-- @error('usern')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="text" name="nama" placeholder="Nama"> </div>
                        {{-- @error('pass')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="text" name="password" placeholder="Password"> </div>
                        {{-- @error('namaLengkap')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="number" name="noTelp" placeholder="No. Telp"> </div>
                        {{-- @error('alamat')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="text" name="jasa" placeholder="Jenis Jasa"> </div>
                        {{-- @error('nomorTelepon')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="number" name="saldo" placeholder="Saldo"> </div>
                        {{-- @error('nomorTelepon')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="text" name="status" placeholder="Status"> </div>
                        {{-- @error('nomorTelepon')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror --}}
                    </div>
                </div>
            </div>
            <button style="color:white; width: 375px;border-radius:3px;border:1px solid black; background-color:#FACE7F;text-align:center;">
            <a href="#" style="text-decoration: none;color:white">Add</a>
            </button>
            {{-- </form> --}}
        </div>
    </div>
</div>
@endsection
