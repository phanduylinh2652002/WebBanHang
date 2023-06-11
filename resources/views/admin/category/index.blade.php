@extends("admin.home")
@section("do-du-lieu")
    <div class="row">
        <div >
            <div class="pull-left">
                <h2>Quản lý loại sản phẩm</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('category.create') }}"style="margin-right: 110px"> Thêm mới</a>
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
    </style>
        <table  border="1px" align="center">
        <tr>
            <th>Loại sản phẩm</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($categories as $c)
            <tr>
                <td>{{ $c->category_name}}</td>
                <td>
                    <form action="{{route('category.destroy',$c->category_id)}}" method="POST">

                        <a class="btn btn-primary" href="{{ route('category.edit', $c->category_id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    </div>

@endsection
