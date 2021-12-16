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
        <form action="{{ url('admin/prosesEditPegawai/'.$id)}}" method="post">
            @csrf
            <!-- <input type="hidden" name="data_pegawai" value= "@if(isset($data_pegawai)){{$data_pegawai}}@endif">
            <input type="hidden" name="data_kategori" value="@if(isset($data_kategori)){{$data_kategori}}@endif">
            <input type="hidden" name="data_item" value= "@if(isset($data_item)){{$data_item}}@endif">  -->
            <h5 class="card-title mb-3" style="text-align: center;">Edit Pegawai</h5>
            @foreach ($pegawai as $p)
                {{-- <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input class="form-control" type="text" name="id" placeholder="ID Pegawai" value="{{old('id') ? old('id') : $p->id}}"> </div>
                            @error('nik')
                                <span style='color: red'>{{ $message }}</span>
                            @enderror
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group"> <input class="form-control" name="nik" type="text" placeholder="nik" value="{{old('nik') ? old('nik') : $p->pegawai_nik}}"> </div>
                            @error('nik')
                                <span style='color: red'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group"> <input class="form-control" name="email" type="email" placeholder="Email" value="{{old('email') ? old('email') : $p->pegawai_email}}"> </div>
                            @error('email')
                                <span style='color: red'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group"> <input class="form-control" type="text" name="nama" placeholder="Nama" value="{{old('nama') ? old('nama') : $p->pegawai_nama}}"> </div>
                            @error('nama')
                                <span style='color: red'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group"> <input class="form-control" type="number" name="telepon" placeholder="No. Telp" value="{{old('telepon') ? old('telepon') : $p->pegawai_telepon}}"> </div>
                            @error('telepon')
                                <span style='color: red'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group"> <input class="form-control" type="text" name="alamat" placeholder="Alamat" value="{{old('alamat') ? old('alamat') : $p->pegawai_alamat}}"> </div>
                            @error('alamat')
                                <span style='color: red'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group"> <input class="form-control" type="password" name="password" placeholder="Password" value="{{old('password') ? old('password') : $p->pegawai_password}}"> </div>
                            @error('password')
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
                                @if ($p->pegawai_jasa=="Cleaning")
                                    <input type="radio" name="jenis" value="Cleaning" id="Cleaning" style="margin-right:5px;" checked> <label for="Cleaning" style="font-weight: normal"> Cleaning</label>
                                    <input type="radio" name="jenis" value="Painting" id="Painting" style="margin-left:15px;margin-right:5px;"> <label for="Painting" style="font-weight: normal"> Painting</label>
                                    <input type="radio" name="jenis" value="Plumbing" id="Plumbing" style="margin-left:15px;margin-right:5px;"> <label for="Plumbing" style="font-weight: normal"> Plumbing</label>
                                    <input type="radio" name="jenis" value="Electrical" id="Electrical" style="margin-left:15px;margin-right:5px;"> <label for="Electrical" style="font-weight: normal"> Electrical</label>
                                    <input type="radio" name="jenis" value="Repair" id="Repair" style="margin-left:15px;margin-right:5px;"> <label for="Repair" style="font-weight: normal"> Repair</label>
                                @elseif ($p->pegawai_jasa=="Painting")
                                    <input type="radio" name="jenis" value="Cleaning" id="Cleaning" style="margin-right:5px;"> <label for="Cleaning" style="font-weight: normal"> Cleaning</label>
                                    <input type="radio" name="jenis" value="Painting" id="Painting" style="margin-left:15px;margin-right:5px;" checked> <label for="Painting" style="font-weight: normal"> Painting</label>
                                    <input type="radio" name="jenis" value="Plumbing" id="Plumbing" style="margin-left:15px;margin-right:5px;"> <label for="Plumbing" style="font-weight: normal"> Plumbing</label>
                                    <input type="radio" name="jenis" value="Electrical" id="Electrical" style="margin-left:15px;margin-right:5px;"> <label for="Electrical" style="font-weight: normal"> Electrical</label>
                                    <input type="radio" name="jenis" value="Repair" id="Repair" style="margin-left:15px;margin-right:5px;"> <label for="Repair" style="font-weight: normal"> Repair</label>
                                @elseif ($p->pegawai_jasa=="Plumbing")
                                    <input type="radio" name="jenis" value="Cleaning" id="Cleaning" style="margin-right:5px;"> <label for="Cleaning" style="font-weight: normal"> Cleaning</label>
                                    <input type="radio" name="jenis" value="Painting" id="Painting" style="margin-left:15px;margin-right:5px;"> <label for="Painting" style="font-weight: normal"> Painting</label>
                                    <input type="radio" name="jenis" value="Plumbing" id="Plumbing" style="margin-left:15px;margin-right:5px;" checked> <label for="Plumbing" style="font-weight: normal"> Plumbing</label>
                                    <input type="radio" name="jenis" value="Electrical" id="Electrical" style="margin-left:15px;margin-right:5px;"> <label for="Electrical" style="font-weight: normal"> Electrical</label>
                                    <input type="radio" name="jenis" value="Repair" id="Repair" style="margin-left:15px;margin-right:5px;"> <label for="Repair" style="font-weight: normal"> Repair</label>
                                @elseif ($p->pegawai_jasa=="Electrical")
                                    <input type="radio" name="jenis" value="Cleaning" id="Cleaning" style="margin-right:5px;"> <label for="Cleaning" style="font-weight: normal"> Cleaning</label>
                                    <input type="radio" name="jenis" value="Painting" id="Painting" style="margin-left:15px;margin-right:5px;"> <label for="Painting" style="font-weight: normal"> Painting</label>
                                    <input type="radio" name="jenis" value="Plumbing" id="Plumbing" style="margin-left:15px;margin-right:5px;"> <label for="Plumbing" style="font-weight: normal"> Plumbing</label>
                                    <input type="radio" name="jenis" value="Electrical" id="Electrical" style="margin-left:15px;margin-right:5px;" checked> <label for="Electrical" style="font-weight: normal"> Electrical</label>
                                    <input type="radio" name="jenis" value="Repair" id="Repair" style="margin-left:15px;margin-right:5px;"> <label for="Repair" style="font-weight: normal"> Repair</label>
                                @elseif ($p->pegawai_jasa=="Repair")
                                    <input type="radio" name="jenis" value="Cleaning" id="Cleaning" style="margin-right:5px;"> <label for="Cleaning" style="font-weight: normal"> Cleaning</label>
                                    <input type="radio" name="jenis" value="Painting" id="Painting" style="margin-left:15px;margin-right:5px;"> <label for="Painting" style="font-weight: normal"> Painting</label>
                                    <input type="radio" name="jenis" value="Plumbing" id="Plumbing" style="margin-left:15px;margin-right:5px;"> <label for="Plumbing" style="font-weight: normal"> Plumbing</label>
                                    <input type="radio" name="jenis" value="Electrical" id="Electrical" style="margin-left:15px;margin-right:5px;"> <label for="Electrical" style="font-weight: normal"> Electrical</label>
                                    <input type="radio" name="jenis" value="Repair" id="Repair" style="margin-left:15px;margin-right:5px;" checked> <label for="Repair" style="font-weight: normal"> Repair</label>
                                @endif


                            </div>
                            @error('jenis')
                                <span style='color: red'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group"> <input class="form-control" type="number" name="saldo" placeholder="Saldo" value="{{old('saldo') ? old('saldo') : $p->pegawai_saldo}}"> </div>
                            @error('saldo')
                                <span style='color: red'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group"> <input class="form-control" type="number" name="status" placeholder="Status" value="{{old('status') ? old('status') : $p->pegawai_status}}"> </div>
                            @error('status')
                                <span style='color: red'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div> --}}
                {{-- <button type="submit" style="color:white; width: 375px;border-radius:3px;border:1px solid black; background-color:#FACE7F;text-align:center;">
                <a href="#" style="text-decoration: none;color:white">Edit</a>
                </button> --}}
                <button type="submit" style="color:white; width: 375px;border-radius:3px;border:1px solid black; color:white; background-color:#FACE7F;text-align:center;">
                    Edit
                </button>
            @endforeach
        </form>
        </div>
    </div>
</div>
@endsection
