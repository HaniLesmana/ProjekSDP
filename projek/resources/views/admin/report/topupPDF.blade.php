<!DOCTYPE html>
<html lang="en">
<head>
  <title>Babowe Top Up Withdraw Report's</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
    #gambar{
        background-image: url(img/title.png);
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        height: 60px;
        width: 250px;
        margin-top:6px;
        position:inherit;
        float: right;
    }
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
</style>
<body>
    <?php
    $path = 'img/title.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<div class="container">
    <img src="<?php echo $base64?>" width="250" height="60"/><br>
    <div style="clear: both"></div>
    <h1>Laporan TopUp Withdraw</h1>
  {{-- <p>The .table-hover class enables a hover state on table rows:</p> --}}
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id Transaksi</th>
        <th>User ID</th>
        <th>Tanggal</th>
        <th>Total</th>
        <th>Tipe</th>
        <th>Status</th>
        <th>Token</th>
        <th>Payment Status</th>
        <th>Detail</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($htranstpwd as $i => $p)
            <tr style="border-bottom: 1px solid black">
                <td>{{$p->htranstpwd_id}}</td>
                <td>{{$p->user_id}}</td>
                <td>{{$p->htranstpwd_tanggal}}</td>
                <td>{{ $p->htranstpwd_total }}</td>
                <td>{{ $p->htranstpwd_tipe }}</td>
                <td>{{ $p->htranstpwd_status }}</td>
                <td>{{ $p->token_payment }}</td>
                <td>{{ $p->status_payment }}</td>
                <td>
                    <table style="width:500px;border:1px solid black;">
                        <tr style="border:1px solid black">
                            <th> Dtrans ID</th>
                            <th> Nominal </th>
                            <th> Jumlah </th>
                        </tr>
                        @foreach ($dtranstpwd as $y => $x)
                            @if ($x->htranstpwd_id == $p->htranstpwd_id)
                                <tr>
                                    <td>{{$x->id}}</td>
                                    <td>{{$x->htranstpwd_nominal}}</td>
                                    <td>{{$x->htranstpwd_jumlah}}</td>
                                </tr>
                            @endif
                        @endforeach
                      </table>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
