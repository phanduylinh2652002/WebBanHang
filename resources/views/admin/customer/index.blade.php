@extends("admin.home")
@section("do-du-lieu")
    <div class="row">
        <div >
            <div class="pull-left">
                <h2>Danh sách khách hàng</h2>
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
            <tr>
                <th >Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Địa chỉ</th>
            </tr>
            @foreach ($customer as $c)
                <tr>
                    <td style="width: 15%">{{ $c->customer_id}}</td>
                         <td style="width: 25%">{{ $c->customer_name}}</td>
                         <td style="width: 15%">{{ $c->customer_phone}}</td>
                         <td style="width: 20%">{{ $c->customer_email}}</td>
                         <td style="width: 25%">{{ $c->customer_adress}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
