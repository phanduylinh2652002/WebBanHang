<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
    <ul class="nav navbar-nav">
        <li class="active"><a href="{{ url('') }}" class="act">Trang chủ</a></li>
        <!-- Mega Menu -->
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm<b class="caret"></b></a>
            <ul class="dropdown-menu multi-column columns-3">
                <div class="row">
                    <div class="multi-gd-img">
                        <ul class="multi-column-dropdown">
                            @foreach( $category as $c)
                                <li><a href="{{url('loai-san-pham',$c->category_id)}}">{{ $c->category_name}}</a></li>

                            @endforeach
                        </ul>
                    </div>

                </div>
            </ul>
        </li>

        <li><a href="">Giới thiệu</a></li>
        <li><a href="">Liên hệ</a></li>
    </ul>
    
    <div class="product_list_header" style="padding-top: 14px;">
        <a href=" {{ url('showcart')}}" class="cart fa fa-cart-arrow-down" aria-hidden="true" width="100px"></a>
    </div>
    
    @if(auth()->user())
        <ul class="nav navbar-nav" style="float: right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ auth()->user()->name }}<b class="caret"></b></a>
                <ul class="dropdown-menu multi-column columns-3">
                    <div class="row">
                        <div class="multi-gd-img">
                            <ul class="multi-column-dropdown">
                                <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>
                </ul>
            </li>
        </ul>
    @endif
    @if(!auth()->user())
    <div class="header_login">
        <a href="{{ url('/login') }}">Đăng nhập</a>
    </div>
    @endif
</div>
<style>
    .product-list-header{
        position: relative;
    }
    .cart{
        position: absolute;
        font-size:30px;
        color: white;
        top: 10px;
    }
    .cart:hover{
        color: white;
    }
    .header_login a {
        color: white;
        font-size: 16px;
        font-weight:500;
        line-height: 50px;
        margin-left: 570px;
    }
</style>
