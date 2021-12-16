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
        <form action="{{ url('admin/prosesAddPegawai') }}" method="post">
            @csrf
            <h5 class="card-title mb-3" style="text-align: center;">Add Pegawai</h5>
            <div class="row">
                <div class="col-sm-12">
                    {{-- <div class="form-group">
                        <input class="form-control" type="text" name="id" placeholder="ID Employee" value="{{ old('id') }}"> </div>
                        @error('id')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror --}}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" name="nik" type="text" placeholder="NIK" value="{{ old('nik') }}"> </div>
                        @error('nik')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" name="email" type="email" placeholder="Email" value="{{ old('email') }}"> </div>
                        @error('email')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="text" name="nama" placeholder="Nama" value="{{ old('nama')}}"> </div>
                        @error('nama')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="text" name="telepon" placeholder="No. Telp" value="{{ old('telepon')}}"> </div>
                        @error('telepon')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="text" name="alamat" placeholder="Alamat" value="{{ old('alamat')}}"> </div>
                        @error('alamat')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group">
                            <label style="font-weight: normal">Jenis Pegawai</label> <br>
                            <input type="radio" name="jenis" value="Cleaning" id="art" style="margin-right:5px;"> <label for="art" style="font-weight: normal">Cleaning</label>
                            <input type="radio" name="jenis" value="Painting" id="tukang" style="margin-left:15px;margin-right:5px;"> <label for="tukang" style="font-weight: normal">Painting</label>
                            <input type="radio" name="jenis" value="Plumbing" id="tukang" style="margin-left:15px;margin-right:5px;"> <label for="tukang" style="font-weight: normal">Plumbing</label>
                            <input type="radio" name="jenis" value="Electrical" id="tukang" style="margin-left:15px;margin-right:5px;"> <label for="tukang" style="font-weight: normal">Electrical</label>
                            <input type="radio" name="jenis" value="Repair" id="tukang" style="margin-left:0px;margin-right:5px;"> <label for="tukang" style="font-weight: normal">Repair</label>
                        </div>

                        @error('jenis')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="password" name="password" placeholder="Password" value="{{ old('password')}}"> </div>
                        @error('password')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation')}}"> </div>
                        @error('password_confirmation')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" style="color:white; width: 375px;border-radius:3px;border:1px solid black; color:white; background-color:#FACE7F;text-align:center;">
                Add
            </button>
            </form>
        </div>
    </div>
</div>
@endsection
