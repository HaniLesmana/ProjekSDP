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
        <form action="{{ url('admin/prosesEditBarang/'.$id)}}" method="post">
            @csrf
            {{-- <input type="hidden" name="data_pegawai" value= "@if(isset($data_pegawai)){{$data_pegawai}}@endif">
            <input type="hidden" name="data_kategori" value="@if(isset($data_kategori)){{$data_kategori}}@endif">
            <input type="hidden" name="data_item" value= "@if(isset($data_item)){{$data_item}}@endif"> --}}
            <h5 class="card-title mb-3" style="text-align: center;">Edit Barang</h5>
            @foreach ($barang as $b)
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <input class="form-control" type="text" name="id" placeholder="ID Barang" value="{{old('id') ? old('id') : $b->barang_id}}" readonly> </div>
                        @error('id')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" name="nama" type="text" placeholder="Nama Barang" value="{{old('nama') ? old('nama') : $b->barang_nama}}"> </div>
                        @error('nama')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="number" name="harga" placeholder="Harga" value="{{old('harga') ? old('harga') : $b->barang_harga}}"> </div>
                        @error('harga')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="number" name="stok" placeholder="Stok" value="{{old('stok') ? old('stok') : $b->barang_stok}}"> </div>
                        @error('stok')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="text" name="statusBarang" placeholder="Status" value="{{old('statusBarang') ? old('statusBarang') : $b->barang_status}}"> </div>
                        @error('statusBarang')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="text" name="kategori" placeholder="Kategori" value="{{old('kategori') ? old('kategori') : $b->barang_kategori}}"> </div>
                        @error('kategori')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            @endforeach
            <button style="color:white; width: 375px;border-radius:3px;border:1px solid black; background-color:#FACE7F;text-align:center;">
            <a href="#" style="text-decoration: none;color:white">Edit</a>
            </button>
            {{-- </form> --}}
        </div>
    </div>
</div>
@endsection
