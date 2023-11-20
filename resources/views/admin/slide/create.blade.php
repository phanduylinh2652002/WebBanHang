@extends('admin.home')
@section('do-du-lieu')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Thêm sản phẩm mới</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('slide.index') }}"> Quay lại</a>
            </div>
        </div>
    </div>

    <form action="{{ route('slide.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    <strong>Content</strong>
                    <input type="text" name="content" class="form-control" placeholder="content">

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hình ảnh:</strong>
                    <input type="file" name="image" />
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </div>
    </form>
@endsection
