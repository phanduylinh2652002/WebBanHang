@extends('admin.home')
@section('do-du-lieu')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sửa slide</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('slide.index') }}"> Quay lại</a>
            </div>
        </div>
    </div>
    <form action="{{ route('slide.update',$slide->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    <strong>Content</strong>
                    <input type="text" name="content" class="form-control" placeholder="content" value="{{ $slide->content }}">

                </div>
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" />
                    <img src="{{ URL::to('/') }}/images/{{ $slide->image }}" class="img-thumbnail" width="100" />
                    <input type="hidden" name="hidden_image" value="{{ $slide->image }}" />
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Sửa</button>
            </div>
        </div>
    </form>
@endsection
