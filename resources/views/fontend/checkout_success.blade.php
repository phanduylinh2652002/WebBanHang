@extends('master')
@section('content')
    <div class="checkout-success" style="height: 500px">
        <div class="mesage" style="text-align: center; margin-top: 100px">
            <h1 style="margin-bottom: 30px">Bạn đã đặt hàng thành công</h1>
            <a class="back-home" href="{{ url('/') }}" style="padding: 10px 30px; color: #fff; font-size: 1em; background: #212121; text-decoration: none; border-radius: 0; cursor: pointer">Trang chủ</a>
        </div>
    </div>
@endsection
<style>
    .back-home{
        background: linear-gradient(to right, #65b28d, #07cd60) !important;
    }
</style>