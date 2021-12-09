@component('mail::message')
<b>Hai {{$dtrans->htranssewa->user->user_nama}}</b> <br>

Transaksi anda dengan {{$dtrans->pegawai->pegawai_nama}} sudah selesai. <br>
Terima kasih sudah menggunakan Babowe. <br>

<br>

Jangan lupa bagikan pengalamanmu menggunakan jasa {{$dtrans->pegawai->pegawai_nama}} dengan memberikan review dan rating <br>

<br>

HtransSewaID : {{$dtrans->htranssewa->id}} <br>
Tanggal Sewa : {{$dtrans->htranssewa->created_at}} <br>
Detail : <br>
{{$dtrans->pegawai->pegawai_jasa}}
{{$dtrans->pegawai->pegawai_nama}}
{{$dtrans->pegawai->pegawai_telepon}}

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent




