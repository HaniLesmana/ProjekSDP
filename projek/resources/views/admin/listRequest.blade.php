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
        <th>ID</th>
        <th>Nama</th>
        <th>Jumlah Top Up</th>
        <th>Jenis</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th></th>
      </tr>
    </thead>
    @if (isset($datas))
        @foreach ($datas as $data)
            <tbody>
                <td>{{ $data->htranstpwd_id }}</td>
                <td>{{ $data->user->user_nama }}</td>
                <td>{{ $data->htranstpwd_total }}</td>
                <td>{{ $data->htranstpwd_tipe }}</td>
                <td>{{ date('d-m-Y h:m:s', strtotime($data->htranstpwd_tanggal)) }}</td>
                @if ($data->htranstpwd_status == "0")
                    <td>Declined</td>
                @elseif ($data->htranstpwd_status == "1")
                    <td>Accepted</td>
                @else
                    <td>Pending</td>
                @endif
                <td>
                    <button type="submit" style="border-radius:3px;border:1px solid black; background-color:#FACE7F;">
                        <a href="{{ url('admin/detailTopUp/'.$data->htranstpwd_id.'/'.$data->user->user_email )}}" style="text-decoration:none; color:white;">
                            Detail
                        </a>
                    </button>
                </td>
            </tbody>
        @endforeach
    @endif
    {{-- <tbody>
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
    </tbody> --}}
  </table>
  </div>
</div>
@endsection
