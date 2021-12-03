@extends('pegawai.base-layout')
@section('header')
    @include('pegawai.navbarPegawai')
@endsection
<!-- Akhir Navbar -->
@section('main')
<style>
    body {
        background: #E8D0B3;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #DBD0C0;
    }

    .profile-button {
        background: #f0ad4e;
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #f0ad4e;
    }

    .profile-button:focus {
        background: #E8D0B3;
        box-shadow: none
    }

    .profile-button:active {
        background: #E8D0B3;
        box-shadow: none
    }

    .back:hover {
        color: #E8D0B3;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }
    .add-experience:hover {
        background: #DBD0C0;
        color: #fff;
        cursor: pointer;
        border: solid 1px #DBD0C0;
    }
</style>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <form enctype="multipart/form-data" action="{{ url('/pegawai/updatePhoto') }}" method="post">
                    @csrf
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        @if($pegawai->pegawai_photo=="" || $pegawai->pegawai_photo==null)
                        <img src="https://i.imgur.com/wvxPV9S.png" style="transition: all 0.5s" height="100" width="100" />

                        @else
                        <img class="rounded-circle mt-5" width="150px" src={{asset('/storage/photos/'.$pegawai->pegawai_photo)}}>
                        @endif
                        <label for="files" class="btn"style="font-style:underline">Select Your New Profile Photo</label>
                        <input id="files" name="pegawai_photo" style="visibility:hidden;" type="file">
                        <button type="submit" class="btn btn-warning" style="margin-top:-35px;">Save Changes</button>

                        <span class="font-weight-bold">{{ $pegawai->pegawai_nama }}</span>
                        <span class="text-black-50">{{ $pegawai->pegawai_email }}</span>
                    </div>
                </form>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>

                    <form action="{{ url('/pegawai/editProfile') }}" method="post">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" name="nama" id="user_nama" value="{{ $pegawai->pegawai_nama }}"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">NIK</label><input type="text" class="form-control" value="{{ $pegawai->pegawai_nik }}" readonly></div>
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" name="telp" id="user_telp" value="{{ $pegawai->pegawai_telepon }}"></div>
                            <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" name="alamat" id="user_alamat" value="{{ $pegawai->pegawai_alamat }}"></div>
                            <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" name="email" id="user_email" value="{{ $pegawai->pegawai_email }}"></div>
                            <div class="col-md-12"><label class="labels">Saldo</label><input type="text" class="form-control"  value="{{ $pegawai->pegawai_saldo }}" readonly></div>
                        </div>
                    <div class="row mt-4">
                        <button class="btn btn-warning" type="button" style="margin-left:16px;" id="btnEdit" onclick="btnClick()">Edit Profile</button>
                        <button type="submit" class="btn btn-warning profile-button" style="margin-left:30px;" id="btnSave">Save Profile</button>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(isset($errorEmail))
                        <div class="errormsg" style="color: red">
                            <ul>
                                <li>{{$errorEmail}}</li>
                            </ul>
                        </div>
                    @endif
                </div>
                </form>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="col-md-12"><label class="labels">Saldo</label><input type="text" class="form-control"  value="{{ $pegawai->pegawai_saldo }}" readonly></div>
                    <div class="col-md-12"><label class="labels">Jasa</label><input type="text" class="form-control" value="{{ $pegawai->pegawai_jasa }}" readonly></div>
                    <div class="col-md-12"><label class="labels">Deskripsi</label><input type="text" class="form-control"  value="{{ $pegawai->pegawai_deskripsi }}" readonly></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

<script>
    $(document).ready(function() {
        $('#user_nama').prop('disabled', true);
        $('#user_telp').prop('disabled', true);
        $('#user_alamat').prop('disabled', true);
        $('#user_email').prop('disabled', true);
        $('#btnSave').prop('disabled', true);
    });
    function btnClick() {
        $('#user_nama').prop('disabled', false);
        $('#user_telp').prop('disabled', false);
        $('#user_alamat').prop('disabled', false);
        $('#user_email').prop('disabled', false);
        $('#btnSave').prop('disabled', false);
    }
</script>
@endsection
