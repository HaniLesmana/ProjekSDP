<!DOCTYPE html>
<html lang="en">
<head>
  <title>Babowe Report's</title>
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
    border: 1px solid black;
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
    <h1>Laporan Transaksi Barang</h1>
  {{-- <p>The .table-hover class enables a hover state on table rows:</p> --}}
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>User ID</th>
        <th>Pegawai ID </th>
        <th>Total</th>
        <th>Detail</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($htranssewa as $i => $p)
            <tr style="border-bottom: 2px solid black">
                <td>{{$p->id}}</td>
                <td>{{$p->user_id}}</td>
                <td>{{$p->pegawai_id}}</td>
                <td>Rp.{{$p->hBarang_total}},-</td>
                <td>
                    <table style="width:500px;border:1px solid black;">
                        <tr style="border:1px solid black">
                            <th> Dtrans ID</th>
                            <th> Pegawai ID </th>
                            <th>Tanggal sewa</th>
                            <th>Harga sewa</th>
                            <th>Alamat</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($dtranssewa as $y => $x)
                            @if ($x->hSewa_id == $p->id)
                                <div style="background-color: #F5EEDC; padding:5px 5px 5px 5px; border-radius:5px; margin-bottom:7px;">
                                    <div>Dtrans ID :{{$x->id}}</div>
                                    @foreach ($barang as $t => $q )
                                        @if ($q->id == $x->barang_id)
                                        <div>Barang :{{$x->barang_id}}, {{$q->barang_nama}}</div>
                                        @endif
                                    @endforeach
                                    <div>Jumlah :{{$x->barang_jumlah}}</div>
                                </div>
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
