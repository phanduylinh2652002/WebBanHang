@extends('master')
@section('content')

    <div class="checkout">
        <div class="container">
            <h2>Bạn có : <span>{{count($carts)}} sản phẩm</span> trong giỏ hàng</h2>
            @if(count($carts))
                <div class="checkout-right">
                    <table class="timetable_sub">
                        <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>

                            <th>Remove</th>
                        </tr>
                        </thead>
                        @foreach($carts as $item)
                            <tr class="rem3">
                                <td class="invert">{{$item['name']}}</td>
                                <td class="invert">
                                    <div style="width: 50%;text-align: center">

                                        <form method="post" style=" float: left; "
                                              action="{{url("up?product_id=" . $item['id'] . "&increment=1")}}">

                                            <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="cart_quantity_up">
                                                +
                                            </button>
                                        </form>
                                        <input style=" float: left;" class="cart_quantity_input" type="text"
                                               name="quantity" value="{{$item['qty']}}" autocomplete="off" size="1"
                                               disabled>
                                        <form method="post" style=" float: left;"
                                              action="{{url("down?product_id=" . $item['id'] . "&decrease=1")}}">

                                            <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="cart_quantity_up">
                                                -
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                <td class="invert">{{ number_format($item['price'])}}</td>
                                <td class="invert">{{ number_format($item['subtotal'])}}</td>
                                <td class="invert">
                                    <form method="post" action="{{url("remove?product_id=" . $item['id'])}}">
                                        <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="cart_quantity_up">
                                            Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>

                <div class="checkout-left">
                    <div class="checkout-left-basket">
                    </div>
                    <div class="checkout-right-basket">
                        <a href="{{ url(''	)}}"><span class="glyphicon glyphicon-menu-left"
                                                         aria-hidden="true"></span>Tiếp tục mua hàng</a>
                        <a href="{{url('cart/destroy')}}"><span aria-hidden="true"></span>Xóa tất cả</a>
                        <a href="{{url('getcheckout')}}"><span aria-hidden="true"></span>Thanh toán</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            @else
                <div class="checkout-right-basket">
                    <a href="{{url('')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Mua hàng</a>
                </div>

            @endif

        </div>
    </div>
    </div>

@endsection
