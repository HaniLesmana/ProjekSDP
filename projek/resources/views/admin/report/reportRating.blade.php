@extends('admin.base-layout')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-11"><h2>Laporan Rating Review Pegawai</h2></div>
        <div class="col-md-12" style="margin:10px 0 10px 0;">
            <form action="topupPDF" method="GET">
                <button type="submit" class="btn btn-primary"> Print PDF <i class="fas fa-file-pdf"></i></button>
            </form>
        </div>
    </div>

  <div class="table-responsive" id="contentss">
  <table class="table table-striped" id="myTable">
    <thead style="background-color:#E8D0B3;">
      <tr>
        <th>Pegawai Id</th>
        <th>Nama</th>
        <th>Rating</th>
        <th>Foto</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($pegawai as $i => $p)
        @foreach ( $rating as $rate => $r )
            @if ($p->id==$r->pegawai_id)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->pegawai_nama}}</td>
                    <td>{{$r->rating }}</td>
                    <td>{{$p->pegawai_photo }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$p->id}}" style="text-decoration: none; border:none; text-align:center;">
                            Detail
                        </button>
                    </td>
                </tr>
            @endif
            <div class="modal fade" id="exampleModal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Review</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            @foreach ($rating as $y => $x)
                                @if ($x->id == $p->id)
                                    <div style="background-color: #F5EEDC; padding:5px 5px 5px 5px; border-radius:5px; margin-bottom:7px;">
                                        <div>{{ $x->review }}</div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    @endforeach
    </tbody>
  </table>
  </div>
</div>
@endsection
