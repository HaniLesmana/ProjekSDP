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
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
</style>
<body>

<div class="container">
    <div class="navbar-brand" id="gambar" href="#"></div><br>
    <div style="clear: both"></div>
    <h1>Laporan Transasi User</h1>
  {{-- <p>The .table-hover class enables a hover state on table rows:</p> --}}
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>User ID</th>
        <th>Voucher ID</th>
        <th>Total</th>
        <th>Detail</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($htranssewa as $i => $p)
            <tr style="border-bottom: 1px solid black">
                <td>{{$p->id}}</td>
                <td>{{$p->user_id}}</td>
                @if ($p->voucher_id == null)
                    <td>-</td>
                @else
                    <td>{{$p->voucher_id}}</td>
                @endif
                <td>Rp.{{$p->hSewa_total}},-</td>
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
                                <tr>
                                    <td> {{$x->pegawai_id}}</td>
                                    <td>{{$x->pegawai_id}}</td>
                                    <td>{{$x->dSewa_tanggal}}</td>
                                    <td>Rp.{{$x->dSewa_harga}},-</td>
                                    <td>{{$x->dSewa_alamat}}</td>
                                    <td>{{$x->dSewa_status_accpegawai}}</td>
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
