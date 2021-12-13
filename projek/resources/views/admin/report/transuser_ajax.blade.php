@foreach ($htranssewa as $i => $p)
        <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->user_id}}</td>
            @if ($p->voucher_id == null)
                <td>-</td>
            @else
                <td>{{$p->voucher_id}}</td>
            @endif
            <td>Rp.{{$p->hSewa_total}},-</td>
            <td>
                <button type="button" class="btn btn-warning"" data-toggle="modal" data-target="#exampleModal{{$p->id}}" style="text-decoration: none; border:none; text-align:center;">
                    Detail
                </button>
            </td>
        </tr>
        {{-- modal detail --}}
        <div class="modal fade" id="exampleModal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Detail Transaksi</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        @foreach ($dtranssewa as $y => $x)
                            @if ($x->hSewa_id == $p->id)
                                <div style="background-color: #F5EEDC; padding:5px 5px 5px 5px; border-radius:5px; margin-bottom:7px;">
                                    <div>Dtrans ID :{{$x->id}}</div>
                                    <div>Pegawai ID :{{$x->pegawai_id}}</div>
                                    <div>Tanggal sewa :{{$x->dSewa_tanggal}}</div>
                                    <div>Harga sewa : Rp.{{$x->dSewa_harga}},-</div>
                                    <div>Alamat :{{$x->dSewa_alamat}}</div>
                                    <div>Status :{{$x->dSewa_status_accpegawai}}</div>
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
