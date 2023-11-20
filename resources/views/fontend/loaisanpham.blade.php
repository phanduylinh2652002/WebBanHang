@extends('master')
@section('content')
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{ url('')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
                <li class="active">Sản phẩm</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!--- products --->
    <div class="products">
        <div class="container">
            <div class="col-md-4 products-left" style="margin-top: 40px;">
                <div class="categories" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                    <h2>Danh mục</h2>
                    <ul class="cate">
                    
                        <ul>
                            @foreach($category as $category)
                            <li><a href="{{url('loai-san-pham',$category->category_id)}}"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{ $category->category_name}}</a></li>
                            @endforeach
                        </ul>
                        
                    </ul>
                </div>
            </div>
            <div class="col-md-8 products-right">
                <div class="agile_top_brands_grids">
                    @foreach($loaisanpham as $loai)
                    <div class="col-md-4 top_brand_left">
                                <div class="hover14 column">
                                    <div class="agile_top_brand_left_grid">
                                        <div class="agile_top_brand_left_grid_pos">
                                            
                                        </div>
                                        <div class="agile_top_brand_left_grid1">
                                            <figure>
                                                <div class="snipcart-item block" >
                                                    <div class="snipcart-thumb">
                                                        <a href="{{url('chi-tiet-san-pham',$loai->product_id)}}"><img title=" " alt=" " src="{{ URL::to('/') }}/images/{{ $loai->image }}" width="150px" height="150px" /></a>
                                                        <p>{{$loai->product_name}}</p>

                                                       @if($loai->product_discount > 0)

                                                        <h4>{{number_format($loai->product_discount)}}<span>{{number_format($loai->product_price)}}</span></h4>
                                                        
                                                        @endif

                                                        @if($loai->product_discount == 0)

                                                        <h4>{{ number_format($loai->product_price)}}</h4>

                                                        @endif
                                                    </div>
                                                    <div class="snipcart-details top_brand_home_details">
                                                        <form action="{{url('addcart')}}" method="post">
                                                            @csrf
                                                            <fieldset>
                                                                <input type="hidden" name="product_id" value="{{$loai->product_id}}" />
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
                     {!! $loaisanpham->links() !!}
                </nav>
            </div>
            <div class="clearfix" style=" text-align: center;"> </div>

        </div>
    </div>
    <!--- products --->

@endsection
