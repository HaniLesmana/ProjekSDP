<!DOCTYPE html>
<html lang="en">
<head>
  <title>Babowe's Employee Rating Review Report</title>
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
    <h1>Laporan Rating Review User</h1>
  {{-- <p>The .table-hover class enables a hover state on table rows:</p> --}}
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Pegawai Id</th>
        <th>Nama</th>
        <th>Saldo</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($pegawai as $i => $p)
        @php
            $rata2 = 0;
            $temp = 0;
        @endphp
        @foreach ($p->reviews as $r)
            @php
                $temp += $r->rating;
            @endphp
        @endforeach
        @foreach ($pegawai as $i => $p)
        <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->pegawai_nama}}</td>
            <td>{{$p->pegawai_saldo }}</td>
        </tr>
        <?php $ctr=0; ?>
        @foreach ($dtranssewa as $y => $x)
            @if ($x->pegawai_id == $p->id)
            <?php $ctr++; ?>
            @endif
        @endforeach
        <div style="background-color: #F5EEDC; padding:5px 5px 5px 5px; border-radius:5px; margin-bottom:7px;">
            <div>Jumlah Transaksi: <?= $ctr ?></div>
        </div>
    </tbody>
  </table>
</div>

</body>
</html>
