@extends('master')
@section('content')
    <div class="checkout-success" style="height: 500px">
        <div class="mesage" style="text-align: center; margin-top: 100px">
            <h1 style="margin-bottom: 30px">Bạn đã mua hàng thành công và admin sẽ liên hệ với bạn về đơn hàng!</h1>
            <a class="back-home" href="{{ url('/') }}" style="padding: 10px 30px; color: #fff; font-size: 1em; background: #212121; text-decoration: none; border-radius: 0; cursor: pointer">Trang chủ</a>
        </div>
    </div>
@endsection
