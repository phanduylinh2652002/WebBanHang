@extends('admin.home')
@section('do-du-lieu')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Thêm loại sản phẩm</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('category.index') }}"> Quay lại</a>
            </div>
        </div>
    </div>

    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tên loại sản phẩm:</strong>
                    <input type="text" name="category_name" class="form-control" placeholder="CategoryName">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </div>
    </form>
@endsection
