@extends('admin.home')
@section('do-du-lieu')
    <div class="row">
        <div >
            <div class="pull-left">
                <h2>Quản lý slide</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('slide.create') }}"style="margin-right: 270px"> Thêm slide mới</a>
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
                <th>Mã silde</th>
                <th>Ảnh</th>
                <th>Nội dung</th>
                <th>Hoạt động</th>
            </tr>
            @foreach ($slides as $s)
                <tr>
                    <td style="width: 10%">{{ $s->id }}</td>
                    <td style="width: 20%"><img src="{{ URL::to('/') }}/images/{{ $s->image }}" class="img-thumbnail" width="75" /></td>
                    <td>{{ $s->content }}</td>
                    <td style="width: 20%">
                        <form action="{{ route('slide.destroy',$s->id) }}" method="POST">

                            <a class="btn btn-primary" href="{{ route('slide.edit',$s->id) }}">Sửa</a>
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm_delete()" type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
<script>
    function confirm_delete() {
        return confirm('Bạn có chắc chắn muốn xóa?');
    }
</script>