@extends("admin.home")
@section("do-du-lieu")
    <div class="row">
        <div >
            <div class="pull-left">
                <h2>Chi tiết hóa đơn</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('admin/bill') }}" style="margin-right: 105px"> Quay lại</a>
            </div>
        
        </div>

        <br>
        <br>
    <fieldset style="margin-left:50px">
            <legend>Thông tin khách hàng</legend>
       
        <table border="1px" align="center" style="width: 40%; margin-left: 95px; text-align: center">
            <tr>
                <td>Tên khách hàng</td>
                <td>{{$bill_customer->customer_name}}</td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td>{{$bill_customer->customer_phone}}</td>
            </tr>
            <tr>
                <td>Địa chỉ email</td>
                <td>{{$bill_customer->customer_email}}</td>
            </tr>
            <td>Địa chỉ</td>
                <td>{{$bill_customer->customer_adress}}</td>
        </table>
    </fieldset>
    <br>
    <fieldset style="margin-left:50px">
        <legend>Danh sách mua hàng</legend>
    
        <table  border="1px" align="center" style=" width: 80%;
                margin-top:50px;">
            <tr>
            <th style=" color: white; height: 50px; text-align: center;"> Mã sản phẩm</th>
            <th style=" color: white; height: 50px; text-align: center;">Tên sản phẩm</th>
             <th style=" color: white; height: 50px; text-align: center;">Số lượng</th>
             <th style=" color: white; height: 50px; text-align: center;">Giá</th>
          
            </tr>
      @foreach($bill_detail as $bill_detail)
                <tr>
                    <td style="height: 50px; text-align: center; width: 20%">{{$bill_detail->product_id}}</td> 
                    <td style="height: 50px; text-align: center;">{{$bill_detail->product_name}}</td>
                   <td style="height: 50px; text-align: center;">{{$bill_detail->quantity}}</td>
                   <td style="height: 50px; text-align: center;">{{number_format($bill_detail->price)}}</td>
                   
                </tr>
         @endforeach
        </table>
    </fieldset>
    <br><br>
    </div>
@endsection
