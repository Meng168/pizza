@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(count($errors) > 0)
                <div class="mt-3 card">
                    <div class="card-body">
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Edit Pizza</div>
                <form action="{{ route('pizza.update',$pizza->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name of pizza</label>
                            <input class="form-control" type="text" name="name" placeholder="name of pizza" value="{{ $pizza->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description of pizza</label>
                            <textarea class="form-control" name="description">{{ $pizza->description }}</textarea>
                        </div>
                        <div class="form-inline">
                            <label>Pizza price($)</label>
                            <input type="text" name="small_pizza_price" class="form-control" placeholder="small pizza price" value="{{ $pizza->small_pizza_price }}">
                            <input type="text" name="medium_pizza_price" class="form-control" placeholder="medium pizza price" value="{{ $pizza->medium_pizza_price }}">
                            <input type="text" name="large_pizza_price" class="form-control" placeholder="large pizza price" value="{{ $pizza->large_pizza_price }}">
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category">
                                <option selected disabled>Choose</option>
                                @foreach ($category as $row)
                                    <option value="{{ $row->category }}" @php if($row->category == $post->category) echo "selected"; @endphp>{{ $row->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <br>
                            <img src="{{ Storage::url($pizza->image) }}" id="showImage" style="width: 100px; height: 100px; border: 1px solid #ccc;">
                        </div>
                        <div class="text-center form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#image').on('change', function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
