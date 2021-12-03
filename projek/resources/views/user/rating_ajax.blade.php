<div class="bg-white rounded shadow-sm p-4 mb-4 clearfix graph-star-rating" id="allreview">
    <h5 class="mb-0 mb-4">Ratings and Reviews</h5>
    <div class="graph-star-rating-header">
        <div class="star-rating">
            <a href="#"><i class="icofont-ui-rating active"></i></a>
            <a href="#"><i class="icofont-ui-rating active"></i></a>
            <a href="#"><i class="icofont-ui-rating active"></i></a>
            <a href="#"><i class="icofont-ui-rating active"></i></a>
            <a href="#"><i class="icofont-ui-rating"></i></a>
            <b class="text-black ml-2">{{$total_star}}</b>
        </div>
        <p class="text-black mb-4 mt-2">Rated {{$rata_star}} out of 5</p>
    </div>
    <div class="graph-star-rating-body">
        <div class="rating-list">
            <div class="rating-list-left text-black">
                5 Star
            </div>
            <div class="rating-list-center">
                <div class="progress">
                    <div style="width: {{$persen5}}%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-warning">
                        <!-- <span class="sr-only">80% Complete (danger)</span> -->
                    </div>
                </div>
            </div>
            <div class="rating-list-right text-black">{{$persen5}}%</div>
        </div>
        <div class="rating-list">
            <div class="rating-list-left text-black">
                4 Star
            </div>
            <div class="rating-list-center">
                <div class="progress">
                    <div style="width: {{$persen4}}%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-warning">
                        <span class="sr-only">80% Complete (danger)</span>
                    </div>
                </div>
            </div>
            <div class="rating-list-right text-black">{{$persen4}}%</div>
        </div>
        <div class="rating-list">
            <div class="rating-list-left text-black">
                3 Star
            </div>
            <div class="rating-list-center">
                <div class="progress">
                    <div style="width: {{$persen3}}%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-warning">
                        <span class="sr-only">80% Complete (danger)</span>
                    </div>
                </div>
            </div>
            <div class="rating-list-right text-black">{{$persen3}}%</div>
        </div>
        <div class="rating-list">
            <div class="rating-list-left text-black">
                2 Star
            </div>
            <div class="rating-list-center">
                <div class="progress">
                    <div style="width: {{$persen2}}%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-warning">
                        <span class="sr-only">80% Complete (danger)</span>
                    </div>
                </div>
            </div>
            <div class="rating-list-right text-black">{{$persen2}}%</div>
        </div>
        <div class="rating-list">
            <div class="rating-list-left text-black">
                1 Star
            </div>
            <div class="rating-list-center">
                <div class="progress">
                    <div style="width: {{$persen1}}%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-warning">
                        <span class="sr-only">80% Complete (danger)</span>
                    </div>
                </div>
            </div>
            <div class="rating-list-right text-black">{{$persen1}}%</div>
        </div>
    </div>
    <div class="graph-star-rating-footer text-center mt-3 mb-3">
        <button type="button" class="btn btn-outline-primary btn-sm">Rate and Review</button>
    </div>
</div>
<div class="bg-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews">
    <!-- <a href="#" class="btn btn-outline-primary btn-sm float-right">Top Rated</a> -->
    <h5 class="mb-1">All Ratings and Reviews</h5>
    @isset($review)
        @foreach($review as $key => $dr)
        <div class="reviews-members pt-4 pb-4">
        <div class="media">
            <a href="#"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar1.png" class="mr-3 rounded-pill"></a>
            <div class="media-body">
                <div class="reviews-members-header">
                    <span class="star-rating float-right">
                        @if($dr->rating==1)
                            <i class="icofont-ui-rating active"></i>
                        @elseif($dr->rating==2)
                            <i class="icofont-ui-rating active"></i>
                            <i class="icofont-ui-rating active"></i>
                        @elseif($dr->rating==3)
                            <i class="icofont-ui-rating active"></i>
                            <i class="icofont-ui-rating active"></i>
                            <i class="icofont-ui-rating active"></i>
                        @elseif($dr->rating==4)
                            <i class="icofont-ui-rating active"></i>
                            <i class="icofont-ui-rating active"></i>
                            <i class="icofont-ui-rating active"></i>
                            <i class="icofont-ui-rating active"></i>
                        @elseif($dr->rating==5)
                            <i class="icofont-ui-rating active"></i>
                            <i class="icofont-ui-rating active"></i>
                            <i class="icofont-ui-rating active"></i>
                            <i class="icofont-ui-rating active"></i>
                        @endif
                            <!-- <a href="#"><i class="icofont-ui-rating active"></i></a>
                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                            <a href="#"><i class="icofont-ui-rating"></i></a> -->
                            </span>
                    <h6 class="mb-1"><a class="text-black" href="#">{{$dr->pegawai->pegawai_nama}}</a></h6>
                    <p class="text-gray">{{$dr->created_at}}</p>
                </div>
                <div class="reviews-members-body">
                    <!-- <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections </p> -->
                    {{$dr->review}}
                </div>
                <div class="reviews-members-footer">
                    <!-- <a class="total-like" href="#"><i class="icofont-thumbs-up"></i> 856M</a> <a class="total-like" href="#"><i class="icofont-thumbs-down"></i> 158K</a>
                    <span class="total-like-user-main ml-2" dir="rtl">
                            <a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Gurdeep Osahan"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar5.png" class="total-like-user rounded-pill"></a>
                            <a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Gurdeep Singh"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar2.png" class="total-like-user rounded-pill"></a>
                            <a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Askbootstrap"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar3.png" class="total-like-user rounded-pill"></a>
                            <a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Osahan"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar4.png" class="total-like-user rounded-pill"></a>
                            </span> -->
                </div>
            </div>
        </div>
    </div>
    <hr>
        @endforeach
    @endisset
    <input type="hidden" id="id" value="{{$id}}">
    <!-- <div class="reviews-members pt-4 pb-4">
        <div class="media">
            <a href="#"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar6.png" class="mr-3 rounded-pill"></a>
            <div class="media-body">
                <div class="reviews-members-header">
                    <span class="star-rating float-right">
                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                            <a href="#"><i class="icofont-ui-rating"></i></a>
                            </span>
                    <h6 class="mb-1"><a class="text-black" href="#">Gurdeep Singh</a></h6>
                    <p class="text-gray">Tue, 20 Mar 2020</p>
                </div>
                <div class="reviews-members-body">
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                </div>
                <div class="reviews-members-footer">
                    <a class="total-like" href="#"><i class="icofont-thumbs-up"></i> 88K</a> <a class="total-like" href="#"><i class="icofont-thumbs-down"></i> 1K</a>
                    <span class="total-like-user-main ml-2" dir="rtl">
                            <a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Gurdeep Osahan"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar5.png" class="total-like-user rounded-pill"></a>
                            <a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Gurdeep Singh"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar2.png" class="total-like-user rounded-pill"></a>
                            <a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Askbootstrap"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar3.png" class="total-like-user rounded-pill"></a>
                            <a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Osahan"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar4.png" class="total-like-user rounded-pill"></a>
                            </span>
                </div>
            </div>
        </div>
    </div>
    <hr> -->
    <!-- <a class="text-center w-100 d-block mt-4 font-weight-bold" href="#">See All Reviews</a> -->
</div>
