@extends('admin.base-layout')
@section('header')
    @include('admin.navbarAdmin')
@endsection
@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-11"><h2>List Barang</h2></div>
            <div class="col-sm-11">
                <button type="submit" style="align:right;border-radius:3px;border:1px solid black; background-color:#FACE7F;align:right; width:65px; font-size:9.5px;">
                    <a href="/admin/addBarang" style="text-decoration: :none; color:white;">
                        Add Barang
                    </a>
                </button>
            </div>

    </div>
  <div class="table-responsive">
  <table class="table table-striped">
    <thead style="background-color:#E8D0B3;">
      <tr>
        <th>No</th>
        <th>Id</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Status</th>
        <th>Kategori</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        <td>1</td>
        <td>K001</td>
        <td>Sabun</td>
        <td>10.000</td>
        <td>100</td>
        <td>1</td>
        <td>ART</td>
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
    </tbody>
  </table>
  </div>
</div>
@endsection
