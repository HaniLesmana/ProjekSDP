@extends('admin.base-layout')
@section('header')
    @include('admin.navbarAdmin')
@endsection
@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-11"><h2>List Barang</h2></div>
        <div class="col-sm-11">
            <form method="get" action="{{ url('/admin/addKategori') }}" style="float: left;">
                <button type="submit" style="height:35px;color:white;align:right;border-radius:3px;border:1px solid black; background-color:#FACE7F;align:right; width:80px; font-size:9.5px;">
                        Add Kategori
                </button>
            </form>
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
      <tr>
        <th>No</th>
        <th>ID</th>
        <th>Kategori</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        @if(isset($barang))
            @for($i = 0; $i < count($barang); $i++)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $barang[$i]->barang_id }}</td>
                    <td>{{ $barang[$i]->kategori_nama }}</td>
                    <td>{{ $barang[$i]->barang_nama }}</td>
                    <td>{{ $barang[$i]->barang_harga }}</td>
                    <td>{{ $barang[$i]->barang_stok }}</td>
                    <td>
                        @if($barang[$i]->barang_status == 1)
                            Available
                        @elseif($barang[$i]->barang_status == 2)
                            Kosong
                        @endif
                    </td>
                    <td>
                    <button type="submit" style="border-radius:3px;border:1px solid black; background-color:#FACE7F;">
                        <a href="/admin/editBarang" style="text-decoration: :none; color:white;">
                            Edit
                        </a>
                    </button>
                    </td>
                    <td>
                        <button type="submit" style="text-decoration: none; border:none; background-color:white; text-align:center;">
                            <i class="fa fa-trash" style="font-size:18px;color:red; "></i>
                        </button>
                    </td>
                </tr>
            @endfor
        @endif
    </tbody>
  </table>
  </div>
</div>
@endsection
