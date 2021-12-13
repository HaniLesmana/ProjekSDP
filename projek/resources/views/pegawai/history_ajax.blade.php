@isset($dtransewa)
    @foreach ($dtransewa as $i =>$dt)
    <tr>
        <td>{{$i+1}}</td>
        @if($dt->pegawai->pegawai_photo=="" || $dt->pegawai->pegawai_photo==null)
            <td><a href="#"><img src="{{asset('/img/profile.png')}}" class="avatar" alt="Avatar" style="height:50px;"> {{$dt->pegawai->pegawai_nama}}</a></td>
        @else
            <td><a href="#"><img src="{{asset('/storage/photos/'.$dt->pegawai->pegawai_photo)}}" class="avatar" alt="Avatar"> {{$dt->pegawai->pegawai_nama}}</a></td>
        @endif

        <td>{{$dt->dSewa_alamat}}</td>
        <td>{{$dt->dSewa_tanggal}}</td>
        @if ($dt->dSewa_status_accpegawai==0)
            <td><span class="status text-danger">&bull;</span>Cancel</td>
        @elseif ($dt->dSewa_status_accpegawai==1)
            <td><span class="status text-info">&bull;</span>Accept</td>
        @elseif ($dt->dSewa_status_accpegawai==2)
            <td><span class="status text-warning">&bull;</span>Pending</td>
        @elseif ($dt->dSewa_status_accpegawai==3)
            <td><span class="status text-success">&bull;</span>Finish</td>
        @endif

        <td>Rp. {{$dt->dSewa_harga}}</td>
        <td>
            <a href="{{url('/user/detailongoing/'.$dt->id)}}" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a>
        </td>
    </tr>
    @endforeach
@endisset
