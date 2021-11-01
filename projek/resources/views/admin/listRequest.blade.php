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
    <?php
        if(isset($data)){
            $data = json_decode($data);
            foreach ($data as $data) {
                echo '<tbody>';
                    echo'<td>'.$data->htranstpwd_id.'</td>';
                    $temp = DB::select("select * from user where user_id = '$data->user_id'");
                    echo'<td>'.data_get($temp,'0.user_nama').'</td>';
                    echo'<td>'.$data->htranstpwd_total.'</td>';
                    echo'<td>'.$data->htranstpwd_tipe.'</td>';
                    $myDateTime = DateTime::createFromFormat('Y-m-d',$data->htranstpwd_tanggal);
                    $formatteddate = $myDateTime->format('d-m-Y h:m:s');
                    echo'<td>'.$formatteddate.'</td>';
                    //status = 0:declined, 1:accepted, 2=pending
                    if($data->htranstpwd_status == "0"){
                        echo'<td>Declined</td>';
                    }
                    else if($data->htranstpwd_status == "1"){
                        echo'<td>Accepted</td>';
                    }
                    else{
                        echo'<td>Pending</td>';
                    }
                    ?>
                    <td>
                        <button type="submit" style="border-radius:3px;border:1px solid black; background-color:#FACE7F;">
                            <a href="{{ url('/admin/detailTopUp/'.$data->htranstpwd_id.'/'.data_get($temp,'0.user_email') )}}" style="text-decoration: :none; color:white;">
                                Detail
                            </a>
                        </button>
                    </td>
                    <?php
                echo '</tbody>';
            }
        }
    ?>
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
