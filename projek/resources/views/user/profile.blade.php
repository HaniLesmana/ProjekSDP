@extends('user.base-layout')
<!-- Navbar -->
@section('header')
    @include('user.navbarUser')
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
<form enctype="multipart/form-data" action="{{ url('/editProfile')}}" method="post">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    @if($user->user_photo=="" || $user->user_photo==null)
                    <img src="https://i.imgur.com/wvxPV9S.png" style="transition: all 0.5s" height="100" width="100" />
                    @else
                    <img class="rounded-circle mt-5" width="150px" src={{asset('/storage/photos/'.$user->user_photo)}}>
                    @endif
                    <span class="font-weight-bold">{{ $user->user_nama }}</span>
                    <span class="text-black-50">{{ $user->user_email }}</span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" id="user_nama" value="{{ $user->user_nama }}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" name="user_telp" id="user_telp" value="{{ $user->user_telepon }}"></div>
                        <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" name="user_alamat" id="user_alamat" value="{{ $user->user_alamat }}"></div>
                        <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" name="user_email" id="user_email" value="{{ $user->user_email }}"></div>
                        <div class="col-md-12"><label class="labels">Saldo</label><input type="text" class="form-control"  value="{{ $user->user_saldo }}" readonly></div>
                        <div class="col-md-12"><label class="labels">Poin</label><input type="text" class="form-control" value="{{ $user->user_poin }}" readonly></div>
                    </div>
                    <div class="row mt-4">
                        <button class="btn btn-warning" type="button" style="margin-left:16px;" id="btnEdit" onclick="btnClick()">Edit Profile</button>
                        <button class="btn btn-warning profile-button" style="margin-left:30px;" type="submit" id="btnSave" onclick="btnSaveClick()">Save Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</form>

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
    function btnSaveClick() {
        $('#user_nama').prop('disabled', true);
        $('#user_telp').prop('disabled', true);
        $('#user_alamat').prop('disabled', true);
        $('#user_email').prop('disabled', true);
        $('#btnSave').prop('disabled', true);
    }
</script>
@endsection
