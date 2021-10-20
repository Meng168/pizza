@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{ route('pizza.index') }}" class="list-group-item list-group-item-action">View</a>
                        <a href="{{ route('pizza.create') }}" class="list-group-item list-group-item-action">Create</a>
                        <a href="{{ route('pizza.order') }}" class="list-group-item list-group-item-action">Order</a>
                    </ul>
                </div>
            </div>
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
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>
                <form action="{{ route('pizza.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name of pizza</label>
                            <input class="form-control" type="text" name="name" placeholder="name of pizza">
                        </div>
                        <div class="form-group">
                            <label for="description">Description of pizza</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-inline">
                            <label>Pizza price($)</label>
                            <input type="number" name="small_pizza_price" class="form-control" placeholder="small pizza price">
                            <input type="number" name="medium_pizza_price" class="form-control" placeholder="medium pizza price">
                            <input type="number" name="large_pizza_price" class="form-control" placeholder="large pizza price">
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category">
                                <option selected disabled>Choose</option>
                                <option value="vegetarian">Vegetarian Pizza</option>
                                <option value="nonvegetarian">Non Vegetarian Pizza</option>
                                <option value="traditional">Traditional Pizza</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <img id="showImage" src="{{ Storage::url('no_image.jpg') }}" style="width: 100px; height: 100px; border: 1px solid #ccc;">
                            </div>
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
