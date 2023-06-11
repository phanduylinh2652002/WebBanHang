@extends('master')
@section('content')
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{ url('')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
                <li class="active">Tìm kiếm sản phẩm</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!--- products --->
    <div class="products">
        <div class="container">
        <h3 style=" font-family: Arial; color:#FF9933">Tìm thấy {{count($product)}} sản phẩm</h3>
            <div class="col-md-12 products-right">
                <div class="agile_top_brands_grids">
                  

                    @foreach($product as $search)
                    <div class="col-md-3 top_brand_left">
                                <div class="hover14 column">
                                    <div class="agile_top_brand_left_grid">
                                        <div class="agile_top_brand_left_grid_pos">
                                            <!-- <img src="images/offer.png" alt=" " class="img-responsive" /> -->
                                        </div>
                                        <div class="agile_top_brand_left_grid1">
                                            <figure>
                                                <div class="snipcart-item block" >
                                                    <div class="snipcart-thumb">
                                                        <a href="{{url('chi-tiet-san-pham',$search->product_id)}}"><img title=" " alt=" " src="{{ URL::to('/') }}/images/{{ $search->image }}" width="150px" height="150px" /></a>
                                                        <p>{{$search->product_name}}</p>

                                                       @if($search->product_discount > 0)

                                                        <h4>{{number_format($search->product_discount)}}<span>{{number_format($search->product_price)}}</span></h4>
                                                        
                                                        @endif

                                                        @if($search->product_discount == 0)

                                                        <h4>{{number_format($search->product_price)}}</h4>

                                                        @endif
                                                    </div>
                                                    <div class="snipcart-details top_brand_home_details">
                                                        <form action="{{url('addcart')}}" method="post">
                                                            @csrf
                                                            <fieldset>
                                                                <input type="hidden" name="product_id" value="{{$search->product_id}}" />
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


                <nav class="numbering">
                     {!! $product->links() !!}
                </nav>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!--- products --->

@endsection
