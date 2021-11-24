@extends('admin.base-layout')
@section('header')
    @include('admin.navbarAdmin')
@endsection
@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-11"><h2>List Barang</h2></div>
        <div class="col-sm-11">
            {{-- <form method="get" action="{{ url('/admin/addKategori') }}" style="float: left;">
                <button type="submit" style="height:35px;color:white;align:right;border-radius:3px;border:1px solid black; background-color:#FACE7F;align:right; width:80px; font-size:9.5px;">
                        Add Kategori
                </button>
            </form> --}}
            <form method="get" action="{{ url('/admin/addBarang') }}" style="float: left;margin-left: 5px;margin-bottom: 10px;">
                <button type="submit" style="height:35px;color:white;align:right;border-radius:3px;border:1px solid black; background-color:#FACE7F;align:right; width:80px; font-size:9.5px;">
                    Add Barang
                </button>
            </form>
        </div>
    </div>
  <div class="table-responsive">
  <table class="table table-striped">
    <thead style="background-color:#E8D0B3;">
    {{-- <thead style="background-color:black;color:white;"> --}}
      <tr>
        <th>No</th>
        <th>ID</th>
        <th>Kategori</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Stok</th>

        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        @if(isset($barang))
            @for($i = 0; $i < count($barang); $i++)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $barang[$i]->id }}</td>
                    {{-- <td>{{ $barang[$i]->kategori->kategori_nama }}</td> --}}
                    <td>{{ $barang[$i]->barang_nama }}</td>
                    <td>{{ $barang[$i]->barang_harga }}</td>
                    <td>{{ $barang[$i]->barang_stok }}</td>
                    {{-- <td>
                        @if($barang[$i]->barang_status == 1)
                            Available
                        @elseif($barang[$i]->barang_status == 2)
                            Kosong
                        @endif
                    </td> --}}
                    <td>
                    <button type="submit" style="border-radius:3px;border:1px solid black; background-color:#FACE7F;">
                        <a href="/admin/editBarang/{{$barang[$i]->id}}" style="text-decoration: :none; color:white;">
                            Edit
                        </a>
                    </button>
                    </td>
                    {{-- <td>
                        <button type="submit" style="text-decoration: none; border:none; background-color:white; text-align:center;">
                            <i class="fa fa-trash" style="font-size:18px;color:red; "></i>
                            <a href="/admin/prosesDeleteBarang/{{$barang[$i]->id}}" style="text-decoration: :none; color:white;">
                                Delete
                            </a>
                        </button>
                    </td> --}}
                    <td>
                        <!-- BUTTON DELETE -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$barang[$i]->id}}" style="text-decoration: none; border:none; background-color:transparent; text-align:center;">
                            <i class="fa fa-trash" style="font-size:18px;color:red; "></i>
                        </button>
                        <button type="submit" style="text-decoration: none; border:none; background-color:white; text-align:center;">

                        </button>
                    </td>
                </tr>
                <div class="modal fade" id="exampleModal{{$barang[$i]->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                Are you sure?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <form method="get" action="{{ url("/admin/prosesDeleteBarang/".$barang[$i]->id) }}">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        @endif
    </tbody>
  </table>
  </div>
</div>
@endsection
