@extends("admin.home")
@section("do-du-lieu")
    <div class="row">
        <div >
            <div class="pull-left">
                <h2>Quản lý hóa đơn</h2>
            </div>
        
        </div>

        <style>
            table{
                width: 80%;
                margin-top:50px;


            }
            th{
                color: white;
                height: 50px;
                text-align: center;
            }
            td{
                height: 50px;
                text-align: center;
            }
            .pagination{
                margin-left: 510px !important;
                margin-top:50px !important;
            }
        </style>
        
        <table  border="1px" align="center">
            <tr><th>Mã hóa đơn</th>
             <th>Tên khách hàng</th>
             <th>Số điện thoại</th>
             <th>Ngày mua</th>
             <th>Tổng tiền</th>
                <th width="280px">Hoạt động</th>
            </tr>
            @foreach ($bills as $b)
                <tr><td>{{$b->bill_id}}</td>
                   <td>{{$b->customer_name}}</td>
                   <td>{{$b->customer_phone}}</td>
                   <td>{{$b->bill_date}}</td>
                   <td>{{number_format($b->bill_total)}}</td>

                    <td style=" width: 20%">
                       
                            <a class="btn btn-primary" href="{{ url('admin/bill-detail',$b->bill_id)}}">Chi tiết</a>
       
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
  {!! $bills->links() !!}
 
@endsection
