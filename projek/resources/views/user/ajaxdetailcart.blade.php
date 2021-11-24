@foreach($addons as $key => $addon)
                            <div class="col-md-3 col-sm-4">
                                <div class="single-new-arrival">
                                    <div class="single-new-arrival-bg">

                                        {{-- Gambar barang --}}
                                        <img src="{{asset('img/sapu.png')}}" alt="new-arrivals images" style="object-fit:fill;">

                                        <div class="single-new-arrival-bg-overlay"></div>

                                        {{-- BTN ADD TO CART --}}
                                        <div class="new-arrival-cart" >
                                            <p>
                                                <span class="lnr lnr-cart"></span>
                                                <button data-toggle="modal" data-target="#modalEditAddOn{{$addon['id']}}" style="color:white;">Edit</button>

                                            </p>
                                            <p class="arrival-review pull-right">
                                                <span class="lnr lnr-heart"></span>
                                                <span class="lnr lnr-frame-expand"></span>
                                            </p>
                                        </div>
                                    </div>
                                    <h4><a href="#">{{ $addon['barang_nama'] }}</a></h4>
                                    <p class="arrival-product-price">
                                        Rp.{{ $addon['barang_harga'] }}

                                    </p>
                                    <a href="{{ url('user/doremoveaddon/'.$addon['id'].'/'.$pegawai->id) }}">&nbsp;&nbsp;&nbsp;<button data-toggle="modal" data-target="#modalEditAddOn{{$addon['id']}}" style="color:red; font-size:15px;font-weight:normal;margin-top:9px;margin-left:-10px;">Remove</button></a>

                                </div>
                            </div>

                            {{-- MODAL INPUT STOCK --}}
                            <div class="modal fade bd-example-modal-sm" id="modalEditAddOn{{$addon['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="{{ url('/user/doeditaddon') }}">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">{{ $addon['barang_nama'] }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <div class="modal-body" style="color:black;">
                                                Jumlah :
                                                <?php
                                                    $brg = [];
                                                    foreach ($databarang as $barang) {
                                                        if($barang->id == $addon['id']){
                                                            $brg = $barang;
                                                        }
                                                    }
                                                ?>
                                                <select name="jumlah" id="" class="form-select" aria-label="Default select example">
                                                    @for($i = 1; $i <= ($brg->barang_stok); $i++)
                                                        @if($i == $addon['jumlah'])
                                                            <option value="{{$i}}" selected>{{$i}}</option>
                                                        @else
                                                            <option value="{{$i}}">{{$i}}</option>
                                                        @endif

                                                    @endfor
                                                </select>
                                                <input type="hidden" name="id" value="{{ $addon['id'] }}">
                                                <input type="hidden" name="idpegawai" value="{{ $pegawai->id }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="btnAdd" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- MODAL INPUT STOCK --}}

                        @endforeach
