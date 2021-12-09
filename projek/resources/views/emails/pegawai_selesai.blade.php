@component('mail::message')
<b>Hai {{$dtrans->pegawai->pegawai_nama}}</b> <br>

Transaksi anda dengan {{$dtrans->htranssewa->user->user_nama}} sudah selesai. <br>
Dana akan diteruskan ke akun kamu pada akhir bulan ini. <br>
<br>

HtransSewaID : {{$dtrans->htranssewa->id}} <br>
Tanggal Sewa : {{$dtrans->htranssewa->created_at}} <br>
Detail : <br>
{{$dtrans->htranssewa->user->user_nama}} <br>
{{$dtrans->htranssewa->user->user_telepon}} <br>
{{$dtrans->htranssewa->user->user_alamat}} <br>

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
