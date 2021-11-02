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
    input::-webkit-outer-spin-button, input::-webkit-inner-spin-button{
        -webkit-appearance: none;
        margin: 0;
    }
</style>
<div class="container mt-5 mb-5 d-flex justify-content-center" style="padding-top:20px; padding-bottom:20px;background-color:#DBD0C0">
    <div class="card px-1 py-4">
        <form method="post" action="{{ url('/admin/prosesAddBarang') }}">
            @csrf
            <div class="card-body" style="width:400px;padding-top:30px; padding-bottom:30px;">
            {{-- <form action="/pegawai/insert" method="post">
                @csrf
                <input type="hidden" name="data_pegawai" value= "@if(isset($data_pegawai)){{$data_pegawai}}@endif">
                <input type="hidden" name="data_kategori" value="@if(isset($data_kategori)){{$data_kategori}}@endif">
                <input type="hidden" name="data_item" value= "@if(isset($data_item)){{$data_item}}@endif"> --}}
                <h5 class="card-title mb-3" style="text-align: center;">Add Barang</h5>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group"> <input class="form-control" name="nama" type="text" placeholder="Nama Barang" required> </div>
                            {{-- @error('usern')
                                <span style='color: red'>{{ $message }}</span>
                            @enderror --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group"> <input class="form-control" type="number" name="harga" placeholder="Harga" required> </div>
                            {{-- @error('pass')
                                <span style='color: red'>{{ $message }}</span>
                            @enderror --}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group"> <input class="form-control" type="number" name="stok" placeholder="Stok" required> </div>
                            {{-- @error('namaLengkap')
                                <span style='color: red'>{{ $message }}</span>
                            @enderror --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="kat">Kategori</label><br>
                            <select name="kategori" id="kat" class="form-select" aria-label="Default select example">
                                @if(isset($kategori))
                                    @foreach($kategori as $kat)
                                        <option value="{{ $kat->kategori_id }}">{{$kat->kategori_nama }}</option>
                                    @endforeach
                                @endif
                            </select>
                            {{-- <div class="input-group"> <input class="form-control" type="text" name="kategori" placeholder="Kategori"> </div> --}}
                            {{-- @error('nomorTelepon')
                                <span style='color: red'>{{ $message }}</span>
                            @enderror --}}
                        </div>
                    </div>
                </div>
                <button type="submit" style="color:white;margin-top:8px;color:white;height:35px;width: 375px;border-radius:3px;border:1px solid black; background-color:#FACE7F;text-align:center;">
                    Add
                </button>
                {{-- </form> --}}
            </div>
        </form>
    </div>
</div>
@endsection
