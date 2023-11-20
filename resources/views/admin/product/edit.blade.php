@extends('admin.home')
@section('do-du-lieu')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sửa sản phẩm</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('product.index') }}"> Quay lại</a>
            </div>
        </div>
    </div>
    {{--@if ($errors->any())--}}
    {{--    <div class="alert alert-danger">--}}
    {{--        <strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
    {{--        <ul>--}}
    {{--            @foreach ($errors->all() as $error)--}}
    {{--                <li>{{ $error }}</li>--}}
    {{--            @endforeach--}}
    {{--        </ul>--}}
    {{--    </div>--}}
    {{--@endif--}}
    <form action="{{ route('product.update',$product->product_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    <strong>Loại sản phẩm:</strong>
                    <select name="category_id" class="form-control" required>
                        <option value="">Chọn loại sản phẩm</option>
                        @foreach($categories as $c)
                            <option value="{{ $c->category_id }}" @if($product->category_id === $c->category_id) selected @endif>{{ $c->category_name }}</option>
                        @endforeach

                    </select>
                    <input type="text" name="category_id" class="form-control" placeholder="category_id" value="{{$product->category_id}}">

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tên sản phẩm:</strong>
                    <input type="text" name="product_name" class="form-control" placeholder="product_name" value="{{$product->product_name}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Giá:</strong>
                    <input type="text" name="product_price" class="form-control" placeholder="product_price" value="{{$product->product_price}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Giá sale:</strong>
                    <input type="text" name="product_discount" class="form-control" placeholder="product_discount" value="{{$product->product_discount}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Số lượng:</strong>
                    <input type="text" name="product_quantity" class="form-control" placeholder="product_quantity" value="{{$product->product_quantity}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hình ảnh:</strong>
                    <input type="file" name="image" />
                    <img src="{{ URL::to('/') }}/images/{{ $product->image }}" class="img-thumbnail" width="100" />
                    <input type="hidden" name="hidden_image" value="{{ $product->image }}" />
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mô tả:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="description" >{{$product->description}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="product_hot"
                        @if($product->product_hot) checked @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            sản phẩm nổi bật
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
    </form>
@endsection
