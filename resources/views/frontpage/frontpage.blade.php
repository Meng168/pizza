@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    <form action="{{ route('frontpage') }}" method="GET">
                        <a href="/" class="list-group-item list-group-item-action">Back</a>
                        <input type="submit" class="list-group-item list-group-item-action" name="category" value="Vegetarian">
                        <input type="submit" class="list-group-item list-group-item-action" name="category" value="Nonvegetarian">
                        <input type="submit" class="list-group-item list-group-item-action" name="category" value="Tranditional">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza ({{ count($pizzas) }} pizza)</div>

                <div class="card-body">
                    <div class="row">
                        @forelse ($pizzas as $pizza)
                            <div class="text-center col-md-4" style="border: 1px solid #ccc">
                                <img src="{{ Storage::url($pizza->image) }}" class="img-thumbnail" style="width: 100%" alt="">
                                <p>{{ $pizza->name }}</p>
                                <p>{{ $pizza->description }}</p>
                                <a href="{{ route('pizza.show', $pizza->id) }}">
                                    <button class="mb-1 btn btn-danger">Order Now</button>
                                </a>
                            </div>
                        @empty
                            <p>no pizza to show</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    a.list-group-item{
        font-size: 18px;
    }
    a.list-group-item:hover{
        background-color: red;
        color: #fff;
    }
    .card-header{
        background-color: red;
        color: #fff;
        font-size: 20px
    }
</style>
@endsection

