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
        <div class="product_list_header">
            
                <a href=" {{ url('showcart')}}"class="fa fa-cart-arrow-down" aria-hidden="true" width="100px"></a>
           
               
        </div>
    </div>