@extends('master')
@section('content')
<!-- //main-slider -->
<ul id="demo1">
    @foreach($slide as $sl)
    <li>
        <img src="{{ URL::to('/') }}/images/{{ $sl->image }}" alt=""   height="500px" />
        <!--Slider Description example-->
        <div class="slide-desc">
            <h3>{{$sl->content}}</h3>
        </div>
    </li>
    @endforeach
</ul>
<!-- //main-slider -->
<!-- //top-header and slider -->
<!-- top-brands -->
<div class="top-brands">
    <div class="container">
        <h2>Sản phẩm </h2>
        <div class="grid_3 grid_5">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Sản phẩm khuyến mại<img src="" alt="" srcset=""></a></li>
                    <li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours">Sản phẩm nổi bật<i></i></a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
                        <div class="agile-tp">
                            <h5>Sản phẩm khuyến mại</h5>
                            <p class="w3l-ad">Danh sách sản phẩm khuyến mại</p>
                        </div>
                        <div class="agile_top_brands_grids" style="margin-bottom: 10px">
                            
                            @foreach($disproduct as $dp)
                           
                            <div class="col-md-4 top_brand_left" style="margin-bottom: 20px">
                                <div class="hover14 column" style="border-radius: 35px; ">
                                    <div class="agile_top_brand_left_grid" style="border-radius: 35px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                        <div class="agile_top_brand_left_grid_pos">
                                            <img src="{{asset('frontend/images/offer.png')}}" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="agile_top_brand_left_grid1">
                                            <figure>
                                                <div class="snipcart-item block" >
                                                    <div class="snipcart-thumb">
                                                        <a href="{{url('chi-tiet-san-pham',$dp->product_id)}}"><img title=" " alt=" " src="{{ URL::to('/') }}/images/{{ $dp->image }}" width="150px" height="150px" /></a>
                                                        <p>{{$dp->product_name}}</p>

                                                       <h4>{{number_format($dp->product_discount)}}<span>{{number_format($dp->product_price)}}</span></h4>
                                                    </div>
                                                    <div class="snipcart-details top_brand_home_details">
                                                        <form action="{{url('addcart')}}" method="post">
                                                            @csrf
                                                            <fieldset>
                                                                <input type="hidden" name="product_id" value="{{$dp->product_id}}" />
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                                <input type="submit" name="submit" value="Thêm vào giỏ" class="button" />
                                                            </fieldset>
                                                        </form>
                            
                                                    </div>
                                                </div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              @endforeach

                         <div class="clearfix"> </div>
                        </div>

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
                        <div class="agile-tp">
                            <h5>Sản phẩm nổi bật</h5>
                            <p class="w3l-ad">Danh sách sản phẩm nổi bật.</p>
                        </div>
                        <div class="agile_top_brands_grids">
                              @foreach($hotproduct as $hp)
                            <div class="col-md-4 top_brand_left">
                                <div class="hover14 column" style="margin-bottom: 20px; border-radius: 35px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                    <div class="agile_top_brand_left_grid" style="border-radius: 35px;">
                                        <div class="agile_top_brand_left_grid_pos">
                                          <img src="{{asset('frontend/images/offer.png')}}" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="agile_top_brand_left_grid1">
                                            <figure>
                                                <div class="snipcart-item block" >
                                                    <div class="snipcart-thumb">
                                                        <a href="{{url('chi-tiet-san-pham',$hp->product_id)}}"><img title=" " alt=" " src="{{ URL::to('/') }}/images/{{ $hp->image }}" width="150px" height="150px" /></a>
                                                        <p>{{$hp->product_name}}</p>

                                                        @if($hp->product_discount > 0)

                                                        <h4>{{number_format($hp->product_discount)}}<span>{{number_format($hp->product_price)}}</span></h4>
                                                        
                                                        @endif

                                                        @if($hp->product_discount == 0)

                                                        <h4>{{number_format($hp->product_price)}}</h4>

                                                        @endif
                                                    </div>
                                                    @if(auth()->user())
                                                    <div class="snipcart-details top_brand_home_details">
                                                        <form action="{{url('addcart')}}" method="post">
                                                            @csrf
                                                            <fieldset>
                                                                <input type="hidden" name="product_id" value="{{$hp->product_id}}" />
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                                <input type="submit" name="submit" value="Thêm vào giỏ" class="button" />
                                                            </fieldset>
                                                        </form>
                                            
                                                    </div>
                                                    @endif
                                                </div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach

                            <div class="clearfix"> </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //top-brands -->
<!-- Carousel
   ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
             <img class="first-slide" src="{{asset('frontend/images/sl1.jpg')}}" alt="First slide">
        </div>
        <div class="item">
            <img class="second-slide " src="{{asset('frontend/images/sl2.jpg')}}" alt="Second slide" height="100px">

        </div>
    </div>

</div><!-- /.carousel -->


<!-- new -->
<div class="newproducts-w3agile">
    <div class="container">
        <h3>Sản phẩm mới nhất</h3>
        <div class="agile_top_brands_grids">
            @foreach($newproduct as $new)
            <div class="col-md-3 top_brand_left-1">
                <div class="hover14 column">
                    <div class="agile_top_brand_left_grid">
                        <div class="agile_top_brand_left_grid_pos">
                            <img src="{{asset('frontend/images/offer.png')}}" alt=" " class="img-responsive">
                        </div>
                        <div class="agile_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block">
                                    <div class="snipcart-thumb">
                                        <a href="{{url('chi-tiet-san-pham',$new->product_id)}}"><img title=" " alt=" " src="{{ URL::to('/') }}/images/{{ $new->image }}" width="150px" height="150px"></a>
                                        <p>{{$new->product_name}}</p>
                              
                                        @if($new->product_discount > 0)

                                                        <h4>{{number_format($new->product_discount)}}<span>{{number_format($new->product_price)}}</span></h4>
                                                        
                                        @endif

                                        @if($new->product_discount == 0)

                                                        <h4>{{number_format($new->product_price)}}</h4>

                                        @endif
                                    </div>
                                    <div class="snipcart-details top_brand_home_details">
                                        <form action="{{url('addcart')}}" method="post">
                                                            @csrf
                                                            <fieldset>
                                                                <input type="hidden" name="product_id" value="{{$new->product_id}}" />
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                                <input type="submit" name="submit" value="Thêm vào giỏ" class="button" />
                                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
@endsection
<style>
</style>
