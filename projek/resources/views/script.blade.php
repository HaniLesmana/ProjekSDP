{{-- @foreach ($pegawai as $i => $p)
<div class="card" style="width: 15rem;float:left;">
    @if ($p->pegawai_jasa=="Cleaning")
    <img src="{{asset('img/img2.png')}}" class="card-img-top" style="height:11rem;" alt="...">
    @else
    <img src="{{asset('img/img1.png')}}" class="card-img-top" style="height:11rem;" alt="...">

    @endif
    <div class="card-body">
        <h5 class="card-title">{{$p->pegawai_nama}}</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <form action="{{ url('/user/detailcart/'.$p->id)}}" method="get">
            <button type="submit" class="btn btn-primary">Booking</button>
        </form>
    </div>
</div>
@endforeach --}}

<style>
    body{
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
    }
    a:hover{
        color:darkorange;
    }
    a{
        color:white;
    }
</style>

@foreach ($pegawai as $i => $p)


    <div class="col-md-3 single-product">
        <div class="product-f-image">
            <!-- <img src="img/product-2.jpg" alt="" style="height:350px;"> -->

            @if ($p->pegawai_jasa=="Cleaning")
                <img src="{{asset('img/img2.png')}}" class="card-img-top" style="height:280px;" alt="...">
            @else
                <img src="{{asset('img/img1.png')}}" class="card-img-top" style="height:280px;" alt="...">
            @endif

            <div class="product-hover">
                <a href="{{ url('/user/detailcart/'.$p->id)}}" class="add-to-cart-link" style="background-color:#ffbb33;border:none;">Booking</a>
                <a href="#" data-toggle="modal" data-target="#modalDetailPegawai{{$p->id}}" style="background-color:#ffbb33;border:none;"  class="view-details-link">See details</a>
            </div>
        </div>

        <h2>{{ $p->pegawai_jasa }}</h2>
        <div class="product-carousel-price">
            <ins>Rp 50.000,-</ins> <del>Rp 100.000,-</del>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modalDetail" id="modalDetailPegawai{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="line-height:18px;">
                <div style="float:left;width:100px;">
                    <label>Nama</label> <br>
                    <label>Bio</label> <br>
                    <label>Rating</label>
                </div>
                <div style="float:left;">
                    <label>: {{ $p->pegawai_nama }}</label> <br>
                    <label>: Bio pegawai</label> <br>
                    <label>: 4.5</label>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btnClose btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{ url('/user/detailcart/'.$p->id)}}"><button type="button" class="btn btn-primary">Booking</button></a>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
@endforeach
