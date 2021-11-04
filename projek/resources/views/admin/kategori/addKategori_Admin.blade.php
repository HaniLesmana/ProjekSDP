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
        <form method="post" action="{{ url('/admin/prosesAddKategori') }}">
            @csrf
            <div class="card-body" style="width:400px;padding-top:30px; padding-bottom:30px;">
         <h5 class="card-title mb-3" style="text-align: center;">Add Kategori</h5>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group"> <input class="form-control" name="nama" type="text" placeholder="Nama Kategori" value="{{ old('nama') }}" required> </div>
                            @error('nama')
                                <span style='color: red'>{{ $message }}</span>
                            @enderror
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
