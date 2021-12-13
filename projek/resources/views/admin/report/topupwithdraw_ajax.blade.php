@foreach ($htranstpwd as $i => $p)
<tr>
    <td>{{$p->htranstpwd_id}}</td>
    <td>{{$p->user_id}}</td>
    <td>{{$p->htranstpwd_tanggal}}</td>
    <td>{{ $p->htranstpwd_total }}</td>
    <td>{{ $p->htranstpwd_tipe }}</td>
    <td>{{ $p->htranstpwd_status }}</td>
    <td>{{ $p->token_payment }}</td>
    <td>{{ $p->status_payment }}</td>
    <td>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$p->htranstpwd_id}}" style="text-decoration: none; border:none; text-align:center;">
            Detail
        </button>
    </td>
</tr>
{{-- modal detail --}}
<div class="modal fade" id="exampleModal{{$p->htranstpwd_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if ($p->htranstpwd_tipe=="topup")
                <h3 class="modal-title" id="exampleModalLabel">Detail TopUp</h3>
                @else
                <h3 class="modal-title" id="exampleModalLabel">Detail Withdraw</h3>
                @endif
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @foreach ($dtranstpwd as $y => $x)
                    @if ($x->htranstpwd_id == $p->htranstpwd_id)
                        <div style="background-color: #F5EEDC; padding:5px 5px 5px 5px; border-radius:5px; margin-bottom:7px;">
                            <div>Dtrans ID :{{$x->id}}</div>
                            <div>Jumlah :{{$x->htranstpwd_jumlah}}</div>
                            <div>Nominal :{{$x->htranstpwd_nominal}}</div>
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
