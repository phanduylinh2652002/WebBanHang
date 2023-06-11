@extends("admin.home")
@section("do-du-lieu")
    <div class="row">
        <div >
            <div class="pull-left">
                <h2>Quản lý sản phẩm</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('product.create') }}"> Thêm sản phẩm mới</a>
            </div>
        </div>

        <style>
            table{
                width: 100%;
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
        </style>
        <table  border="1px">
            <tr><th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Giá</th>
                <th>Giá sale</th>
                <th>Số lượng</th>
                <th>Sản phẩm nổi bật</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($products as $p)
                <tr><td><img src="{{ URL::to('/') }}/images/{{ $p->image }}" class="img-thumbnail" width="100px" /></td>
                    <td>{{ $p->product_name }}</td>
                    <td>{{ $p->category_name }}</td>
                    <td>{{ $p->product_price }}</td>
                    <td>{{ $p->product_discount }}</td>
                    <td>{{ $p->product_quantity }}</td>
                    <td>{{ $p->product_hot }}</td>

                    <td>
                        <form action="{{ route('product.destroy',$p->product_id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('product.show',$p->product_id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('product.edit',$p->product_id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {!! $products->links() !!}

@endsection
