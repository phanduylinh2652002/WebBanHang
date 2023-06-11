@extends('admin.home')
@section('do-du-lieu')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Loại sản phẩm:</strong>
                    <select name="category_id" class="form-control" required>
                        <option value="">Chọn loại sản phẩm</option>
                        @foreach($categories as $c)
                            <option value="{{ $c->category_id }}">{{ $c->category_name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="product_name" class="form-control" placeholder="product_name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Giá:</strong>
                    <input type="text" name="product_price" class="form-control" placeholder="product_price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Giá sale:</strong>
                    <input type="text" name="product_discount" class="form-control" placeholder="product_discount">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Số lượng:</strong>
                    <input type="text" name="product_quantity" class="form-control" placeholder="product_quantity">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image"/>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mô tả:</strong>
                    <textarea class="form-control" style="height:150px" name="description"
                              placeholder="description"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="product_hot">
                    <label class="form-check-label" for="flexCheckDefault">
                        sản phẩm nổi bật
                    </label>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
