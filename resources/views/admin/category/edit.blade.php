@extends('admin.home')
@section('do-du-lieu')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sửa loại sản phẩm</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('category.index') }}"> Quay lại</a>
            </div>
        </div>
    </div>

    <form action="{{ route('category.update',$category->category_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tên loại sản phẩm:</strong>
                    <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control" placeholder="CategoryName">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Sửa</button>
            </div>
        </div>
    </form>
@endsection
