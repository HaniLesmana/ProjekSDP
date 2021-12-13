@isset($dtranssewa)
@foreach ($dtranssewa as $d)
<tr>
    <td>{{$d->id}}</td>
    <td>{{$d->htranssewa->user->user_nama}}</td>
    <td>{{$d->pegawai->pegawai_nama}}</td>
    <td>Rp.{{$d->htranssewa->hSewa_total}},-</td>
    <td>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$p->id}}" style="text-decoration: none; border:none; text-align:center;">
            Detail
        </button>
    </td>
</tr>
{{-- modal detail --}}
<div class="modal fade" id="exampleModal{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Detail Transaksi</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <!-- @foreach ($dtranssewa as $y => $x)
                    @if ($x->id == $p->id) -->
                        <div style="background-color: #F5EEDC; padding:5px 5px 5px 5px; border-radius:5px; margin-bottom:7px;">
                            <div>Dtrans ID :{{$x->id}}</div>
                            <div>Barang: {{$x->dtransbarang->barang_id}},{{$x->dtransbarang->barang->barang_nama}}</div>
                            <!-- @foreach ($barang as $t => $q )
                                @if ($q->id == $x->barang_id)
                                <div>Barang :{{$x->barang_id}}, {{$q->barang_nama}}</div>
                                @endif
                            @endforeach -->
                            <div>Jumlah :{{$x->dtransbarang->barang_jumlah}}</div>
                        </div>
                    <!-- @endif -->
                <!-- @endforeach -->
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@endforeach
@endisset
