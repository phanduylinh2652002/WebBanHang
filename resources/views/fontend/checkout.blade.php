@extends('master')
@section('content')

    <div class="checkout">
        <div class="container">
            <div class="row">
                <form action="{{ url('postcheckout') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-sm-12 clearfix">
                        <div class="container">

                            <div class="bill-to">
                                <p style="font-size: 24px">Thông tin khách hàng</p>
                                <br>
                                @if(count($errors) >0)
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="form-one">
                                    <input type="text" name="fullName" value="{{ old('fullName') }}"
                                           placeholder="Họ và Tên *" required>
                                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email *"
                                           required>
                                    <input type="text" name="address" value="{{ old('address') }}"
                                           placeholder="Địa Chỉ *" required>
                                    <input type="text" name="phoneNumber" value="{{ old('phoneNumber') }}"
                                           placeholder="Số điện thoại *" required>
                                    <p style="color: red; font-size: 14px">(*) Thông tin quý khách phải nhập đầy đủ</p>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>

                    @if(count($carts))
                        <div class="checkout-right">
                            <table class="timetable_sub">
                                <thead>
                                <tr>


                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng tiền</th>

                                </tr>
                                </thead>
                                @foreach($carts as $item)
                                    <tr class="rem3">
                                        <td class="invert">{{$item['name']}}</td>
                                        <td class="invert">
                                            {{ $item['qty'] }}
                                        </td>
                                        <td class="invert">{{ number_format($item['price'])}}</td>
                                        <td class="invert">{{ number_format($item['subtotal'])}}</td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>

                        <div class="checkout-left">
                            <div class="checkout-left-basket">

                                <h4>Hóa đơn giá</h4>
                                <ul>

                                    @foreach($carts as $item)
                                        <li>{{$item['name']}} <span>{{ number_format($item['subtotal']) }} </span></li>
                                    @endforeach
                                    <li>Total
                                        <i>-</i>VAT<span>{{ number_format(\Illuminate\Support\Facades\Session::get('total') ?? 0) }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="checkout-right-basket">
                                <a href="{{ url('showcart') }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Quay lại giỏ hàng</a>
                                <button type="submit" class="send_prd btn-default check_out ">Gửi đơn hàng</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <style>
        .send_prd{
            padding: 8px;
            background-color: #212121;
            color: white;
            font-weight: 600;
            border-radius: 0;
            border: none;
        }
        .send_prd:hover{
            background: linear-gradient(to right, #65b28d, #07cd60);
            color: white;
        }
    </style>
@endsection
