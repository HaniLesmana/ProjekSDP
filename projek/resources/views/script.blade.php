@foreach ($pegawai as $i => $p)
<div class="card" style="width: 15rem;float:left;">
    @if ($p->pegawai_jasa=="art")
    <img src="{{asset('img/img1.png')}}" class="card-img-top" style="height:11rem;" alt="...">
    @else
    <img src="{{asset('img/img2.png')}}" class="card-img-top" style="height:11rem;" alt="...">
    {{-- <img src="https://spesialis1.orthopaedi.fk.unair.ac.id/wp-content/uploads/2021/02/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg" class="card-img-top" style="height:11rem;" alt="..."> --}}
    @endif

    <div class="card-body">
        <h5 class="card-title">{{$p->pegawai_nama}}</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <form action="{{ url('/home/add_cart/'.$p->pegawai_id)}}" method="get">
            <button type="submit" class="btn btn-primary">Booking</button>
        </form>
      {{-- <a href="#" class="btn btn-primary">Booking</a> --}}
    </div>
</div>
@endforeach
