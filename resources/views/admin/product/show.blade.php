@extends("admin.home")
@section("do-du-lieu")
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Xem sản phẩm</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('product.index') }}"> Quay lại</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tên sản phẩm:</strong>
                {{ $product->product_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mô tả:</strong>
                {{ $product->description }}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hình ảnh</strong>
                <img src="{{ URL::to('/') }}/images/{{ $product->image }}" class="img-thumbnail" width="200px" />
            </div>

        </div>
    </div>

@endsection
