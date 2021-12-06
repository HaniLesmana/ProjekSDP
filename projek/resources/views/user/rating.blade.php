@extends('user.base-layout')
<!-- Navbar -->
@section('header')
    @include('user.navbarUser')
@endsection

<!-- Akhir Navbar -->
@section('main')
<style>
body{
    background:#dcdcdc;
    }
    .total-like-user-main a {
        display: inline-block;
        margin: 0 -17px 0 0;
    }
    .total-like {
        border: 1px solid;
        border-radius: 50px;
        display: inline-block;
        font-weight: 500;
        height: 34px;
        line-height: 33px;
        padding: 0 13px;
        vertical-align: top;
    }
    .restaurant-detailed-ratings-and-reviews hr {
        margin: 0 -24px;
    }
    .graph-star-rating-header .star-rating {
        font-size: 17px;
    }
    .progress {
        background: #f2f4f8 none repeat scroll 0 0;
        border-radius: 0;
        height: 30px;
    }
    .rating-list {
        display: inline-flex;
        margin-bottom: 15px;
        width: 100%;
    }
    .rating-list-left {
        height: 16px;
        line-height: 29px;
        width: 10%;
    }
    .rating-list-center {
        width: 80%;
    }
    .rating-list-right {
        line-height: 29px;
        text-align: right;
        width: 10%;
    }
    .restaurant-slider-pics {
        bottom: 0;
        font-size: 12px;
        left: 0;
        z-index: 999;
        padding: 0 10px;
    }
    .restaurant-slider-view-all {
        bottom: 15px;
        right: 15px;
        z-index: 999;
    }
    .offer-dedicated-nav .nav-link.active,
    .offer-dedicated-nav .nav-link:hover,
    .offer-dedicated-nav .nav-link:focus {
        border-color: #3868fb;
        color: #3868fb;
    }
    .offer-dedicated-nav .nav-link {
        border-bottom: 2px solid #fff;
        color: #000000;
        padding: 16px 0;
        font-weight: 600;
    }
    .offer-dedicated-nav .nav-item {
        margin: 0 37px 0 0;
    }
    .restaurant-detailed-action-btn {
        margin-top: 12px;
    }
    .restaurant-detailed-header-right .btn-success {
        border-radius: 3px;
        height: 45px;
        margin: -18px 0 18px;
        min-width: 130px;
        padding: 7px;
    }
    .text-black {
        color: #000000;
    }
    .icon-overlap {
        bottom: -23px;
        font-size: 74px;
        opacity: 0.23;
        position: absolute;
        right: -32px;
    }
    .menu-list img {
        width: 41px;
        height: 41px;
        object-fit: cover;
    }
    .restaurant-detailed-header-left img {
        width: 88px;
        height: 88px;
        border-radius: 3px;
        object-fit: cover;
        box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075)!important;
    }
    .reviews-members .media .mr-3 {
        width: 56px;
        height: 56px;
        object-fit: cover;
    }
    .rounded-pill {
        border-radius: 50rem!important;
    }
    .total-like-user {
        border: 2px solid #fff;
        height: 34px;
        box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075)!important;
        width: 34px;
    }
    .total-like-user-main a {
        display: inline-block;
        margin: 0 -17px 0 0;
    }
    .total-like {
        border: 1px solid;
        border-radius: 50px;
        display: inline-block;
        font-weight: 500;
        height: 34px;
        line-height: 33px;
        padding: 0 13px;
        vertical-align: top;
    }
    .restaurant-detailed-ratings-and-reviews hr {
        margin: 0 -24px;
    }
    .graph-star-rating-header .star-rating {
        font-size: 17px;
    }
    .progress {
        background: #f2f4f8 none repeat scroll 0 0;
        border-radius: 0;
        height: 30px;
    }
    .rating-list {
        display: inline-flex;
        margin-bottom: 15px;
        width: 100%;
    }
    .rating-list-left {
        height: 16px;
        line-height: 29px;
        width: 10%;
    }
    .rating-list-center {
        width: 80%;
    }
    .rating-list-right {
        line-height: 29px;
        text-align: right;
        width: 10%;
    }
    .restaurant-slider-pics {
        bottom: 0;
        font-size: 12px;
        left: 0;
        z-index: 999;
        padding: 0 10px;
    }
    .restaurant-slider-view-all {
        bottom: 15px;
        right: 15px;
        z-index: 999;
    }

    .progress {
        background: #f2f4f8 none repeat scroll 0 0;
        border-radius: 0;
        height: 30px;
    }
</style>
<link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">
<div class="container">
<div class="col-md-12">
    <div class="offer-dedicated-body-left">
        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade active show" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                <div id="ratings-and-reviews" class="bg-white rounded shadow-sm p-4 mb-4 clearfix restaurant-detailed-star-rating">
                    <span class="star-rating float-right">
                        <a href="#"><i class="icofont-ui-rating icofont-2x active"></i></a>
                        <a href="#"><i class="icofont-ui-rating icofont-2x active"></i></a>
                        <a href="#"><i class="icofont-ui-rating icofont-2x active"></i></a>
                        <a href="#"><i class="icofont-ui-rating icofont-2x active"></i></a>
                        <a href="#"><i class="icofont-ui-rating icofont-2x"></i></a>
                    </span>
                    <h5 class="mb-0 pt-1">Rate this</h5>
                </div>
                <div id="allreview">
                <div class="bg-white rounded shadow-sm p-4 mb-4 clearfix graph-star-rating">
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
                    <!-- <div class="graph-star-rating-footer text-center mt-3 mb-3">
                        <button type="button" class="btn btn-outline-primary btn-sm">Rate and Review</button>
                    </div> -->
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
                </div>
                <div class="bg-white rounded shadow-sm p-4 mb-5 rating-review-select-page">
                    <h5 class="mb-4">Leave Comment</h5>
                    <p class="mb-2">Rate the Service</p>
                    <div class="mb-4">
                        <span class="star-rating" id="contBintang">
                            <i class="icofont-ui-rating icofont-2x b" id="bintang1"></i>
                            <i class="icofont-ui-rating icofont-2x b" id="bintang2"></i>
                            <i class="icofont-ui-rating icofont-2x b" id="bintang3"></i>
                            <i class="icofont-ui-rating icofont-2x b" id="bintang4"></i>
                            <i class="icofont-ui-rating icofont-2x b" id="bintang5"></i>

                            <label id="myRate" style="padding-left:15px;font-size:20px;font-weight:bold;">0</label>
                        </span>
                    </div>

                    <!-- <form method="get" action="{{ url('/user/gotocheckout') }}"> -->
                        <div class="form-group">
                            <label>Your Review</label>
                            <textarea class="form-control" id="input_review"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit" id="btnreview"> Submit Review </button>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
var rating=1;
$(document).ready(function() {
    resetWarna();

    $("#bintang1").mouseenter(function(){
        $('#bintang1').css('color',"#ffbb33");
        $('#bintang2').css('color',"#3868fb");
        $('#bintang3').css('color',"#3868fb");
        $('#bintang4').css('color',"#3868fb");
        $('#bintang5').css('color',"#3868fb");
        $('#myRate').html('1');
    });

    $("#bintang2").mouseenter(function(){
        $('#bintang1').css('color',"#ffbb33");
        $('#bintang2').css('color',"#ffbb33");
        $('#bintang3').css('color',"#3868fb");
        $('#bintang4').css('color',"#3868fb");
        $('#bintang5').css('color',"#3868fb");
        $('#myRate').html('2');
    });

    $("#bintang3").mouseenter(function(){
        $('#bintang1').css('color',"#ffbb33");
        $('#bintang2').css('color',"#ffbb33");
        $('#bintang3').css('color',"#ffbb33");
        $('#bintang4').css('color',"#3868fb");
        $('#bintang5').css('color',"#3868fb");
        $('#myRate').html('3');
    });

    $("#bintang4").mouseenter(function(){
        $('#bintang1').css('color',"#ffbb33");
        $('#bintang2').css('color',"#ffbb33");
        $('#bintang3').css('color',"#ffbb33");
        $('#bintang4').css('color',"#ffbb33");
        $('#bintang5').css('color',"#3868fb");
        $('#myRate').html('4');
    });

    $("#bintang5").mouseenter(function(){
        $('#bintang1').css('color',"#ffbb33");
        $('#bintang2').css('color',"#ffbb33");
        $('#bintang3').css('color',"#ffbb33");
        $('#bintang4').css('color',"#ffbb33");
        $('#bintang5').css('color',"#ffbb33");
        $('#myRate').html('5');
    });

    // $("#contBintang").mouseleave(function(){
    //     resetWarna();
    // });

    function resetWarna(){
        $('#bintang1').css('color',"#3868fb");
        $('#bintang2').css('color',"#3868fb");
        $('#bintang3').css('color',"#3868fb");
        $('#bintang4').css('color',"#3868fb");
        $('#bintang5').css('color',"#3868fb");
        $('#myRate').html('0');
    }
    // $("#bintang2").mouseleave(function(){
    //     resetWarna();
    // });
    // $("#bintang3").mouseleave(function(){
    //     resetWarna();
    // });
    // $("#bintang4").mouseleave(function(){
    //     resetWarna();
    // });
    // $("#bintang5").mouseleave(function(){
    //     resetWarna();
    // });

    $("#bintang1").click(function(){
        rating=1;
    });
    $("#bintang2").click(function(){
        rating=2;
    });
    $("#bintang3").click(function(){
        rating=3;
    });
    $("#bintang4").click(function(){
        rating=4;
    });
    $("#bintang5").click(function(){
        rating=5;
    });
    $("#btnreview").click(function(){
        $.ajax({
            type: 'get',
            url: '/user/ajax_rating/'+rating+"/"+$("#input_review").val()+"/"+$("#id").val(),
            // headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
            // data:{
            //     datachat:inputchattext,
            //     iduser:userdiclick,
            //     _token: '{{csrf_token()}}'
            // },
            success: function(data) {
                $("#allreview").empty();
                $("#allreview").append(data);
                $("#input_review").val("");
                //alert("berhasil");
                // loadChatAjax2();
                //loadChatAjax();
            }
        });
    });
});
function resetWarna(){
        $('#bintang1').css('color',"#3868fb");
        $('#bintang2').css('color',"#3868fb");
        $('#bintang3').css('color',"#3868fb");
        $('#bintang4').css('color',"#3868fb");
        $('#bintang5').css('color',"#3868fb");
        $('#myRate').html('0');
    }
</script>
@endsection
