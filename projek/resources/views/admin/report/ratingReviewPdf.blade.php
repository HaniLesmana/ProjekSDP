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
    <h1>Laporan Rating Review User </h1>
  {{-- <p>The .table-hover class enables a hover state on table rows:</p> --}}
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Pegawai Id</th>
        <th>Nama</th>
        <th>Rating</th>
        <th>Detail</th>
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
            <?php
                if(count($p->reviews) > 0){
                    $rata2 = $temp / count($p->reviews);
                }
            ?>
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->pegawai_nama}}</td>
                <td><?= round($rata2,2)?></td>
                <td>
                    <table style="border:1px solid black;">
                        <tr style="border:1px solid black">
                            <th>User Id</th>
                            <th>User </th>
                            <th>Rating</th>
                            <th>Review</th>
                        </tr>
                        @foreach ($rating as $y => $x)
                            @if ($x->pegawai_id == $p->id)
                                @foreach ($user as $z => $u )
                                    @if ($u->id == $x->user_id)
                                        <td>{{ $u->id }}</td>
                                        <td>{{ $u->user_nama }}</td>
                                        <td>{{ $x->rating }}</td>
                                        <td>{{ $x->review }}</td>
                                    @endif
                                @endforeach
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
