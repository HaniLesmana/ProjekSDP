@extends('admin.base-layout')
@section('header')
    @include('admin.navbarAdmin')
@endsection
@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-11"><h2>List Request Top Up</h2></div>
    </div>
  <div class="table-responsive">
  <table class="table table-striped">
    <thead style="background-color:#E8D0B3;">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jumlah Top Up</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <td>1</td>
        <td>Clarissa</td>
        <td>10.000</td>
        <td>
        <button type="submit" style="border-radius:3px;border:1px solid black; background-color:#FACE7F;">
            <a href="/admin/detailTopUp/{id}" style="text-decoration: :none; color:white;">
                Lihat Detail
            </a>
        </button>
        </td>
    </tbody>
  </table>
  </div>
</div>
@endsection
