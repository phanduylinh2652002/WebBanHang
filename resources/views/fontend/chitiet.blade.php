@extends('master')
@section('content')
    <!-- //breadcrumbs -->
    <div class="products">
        <div class="container">
            <div class="agileinfo_single">

                <div class="col-md-4 agileinfo_single_left">
                    <img id="example" src="{{ URL::to('/') }}/images/{{ $chitiet->image }}" alt=" " class="img-responsive">
                </div>
                <div class="col-md-8 agileinfo_single_right">
                    <h2>{{$chitiet->product_name }}</h2>
                    <div class="w3agile_description">
                        <h4>Mô tả :</h4>
                        <p>{{ $chitiet->description}}</p>
                    </div>
                    <div class="snipcart-item block">
                        <div class="snipcart-thumb agileinfo_single_right_snipcart">
                           @if($chitiet->product_discount > 0)

                                                        <h4 class="m-sing">{{$chitiet->product_discount}}<span>{{$chitiet->product_price}}</span></h4>
                                                        
                                                        @endif

                                                        @if($chitiet->product_discount == 0)

                                                        <h4 class="m-sing">{{$chitiet->product_price}}</h4>

                                                        @endif
                        </div>
                        <div class="snipcart-details agileinfo_single_right_details">
                        <form action="{{url('addcart')}}" method="post">
                                                            @csrf
                                                            <fieldset>
                                                                <input type="hidden" name="product_id" value="{{$chitiet->product_id}}" />
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                                <input type="submit" name="submit" value="Thêm vào giỏ " class="button" />
                                                            </fieldset>
                         </form>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- new -->
    <div class="newproducts-w3agile">
        <div class="container">
            <h3>Sản phẩm liên quan</h3>
            <div class="agile_top_brands_grids">
                @foreach($splienquan as $lq)
                <div class="col-md-3 top_brand_left-1">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                          <!--   <div class="agile_top_brand_left_grid_pos">
                                <img src="images/offer.png" alt=" " class="img-responsive">
                            </div> -->
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <a href="{{url('chi-tiet-san-pham',$lq->product_id)}}"><img title=" " alt=" " src="{{ URL::to('/') }}/images/{{ $lq->image }}" width="150px" height="150px"></a>
                                            <p>{{$lq->product_name}}</p>
                         
                                                    @if($lq->product_discount > 0)

                                                        <h4>{{$lq->product_discount}}<span>{{$lq->product_price}}</span></h4>
                                                        
                                                        @endif

                                                        @if($lq->product_discount == 0)

                                                        <h4 class="m-sing">{{$lq->product_price}}</h4>
                                                        @endif

                                        </div>
                                        <div class="snipcart-details top_brand_home_details">
                                            <form action="{{url('addcart')}}" method="post">
                                                            @csrf
                                                            <fieldset>
                                                                <input type="hidden" name="product_id" value="{{$lq->product_id}}" />
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                                <input type="submit" name="submit" value="Thêm vào giỏ " class="button" />
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
    <!-- //new -->



@endsection
