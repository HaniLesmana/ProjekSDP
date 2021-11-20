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
                            <input class="form-control" type="text" name="id" placeholder="ID Barang" value="{{old('id') ? old('id') : $b->id}}" readonly> </div>
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
                            <div class="input-group"> <input class="form-control" type="number" name="stok" placeholder="Stok" value="{{old('stok') ? old('stok') : $b->barang_stok}}" readonly> </div>
                            @error('stok')
                                <span style='color: red'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group"> <input class="form-control" type="number" name="stok" placeholder="Stok" value="" min=0></div>
                            @error('stok')
                                <span style='color: red'>{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                </div> --}}
                {{-- <button data-target="#exampleModal" data-toggle="modal">Edit Stock</button> --}}

                <a href="" data-target="#pilihalamat" data-toggle="modal"><button class="btn btn-warning btnTrans" data-target="#exampleModal" data-toggle="modal">Edit Stock</button></a>

                <!-- <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">

                            <div class="input-group"> <input class="form-control" type="text" name="statusBarang" placeholder="Status" value="{{old('statusBarang') ? old('statusBarang') : $b->barang_status}}"> </div>
                            @error('statusBarang')
                                <span style='color: red'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div> -->
                <br> <br>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{-- <!-- <div class="input-group"> <input class="form-control" type="text" name="kategori" placeholder="Kategori" value="{{old('kategori') ? old('kategori') : $b->barang_kategori}}"> </div> --> --}}
                                <select name="kategori" id="">
                                @foreach ($kategori as $kat)
                                    @if ($kat->id == $b->barang_kategori)
                                        <option value="{{ $kat->id }}" selected>{{ $kat->kategori_nama }}</option>
                                    @else
                                        <option value="{{ $kat->id }}">{{ $kat->kategori_nama }}<option>
                                    @endif
                                @endforeach
                            </select>
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
            </form>
        </div>
    </div>
</div>

<!-- MODAL ADD STOCK -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Stock</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

            <form method="get" action="{{ url('/admin/prosesEditStock/'.$b->id) }}">
                <div class="modal-body" style="" >
                    <div style="float:left;width:60px;">
                        <label style="font-weight:normal;height:27px;">Jumlah</label> <br>
                        <label style="font-weight:normal;height:27px;">Jenis</label>

                    </div>
                    <div style="float:left">
                        : <input type="number" name="stok" id="" min="1" style="margin-bottom:7px;"><br>
                        : <input type="radio" name="txtstok" id="tambah" value="Tambah"> Tambah
                        <input type="radio" name="txtstok" id="kurang" value="Kurang" style="margin-left:5px;"> Kurang<br>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Confirm</button>
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
