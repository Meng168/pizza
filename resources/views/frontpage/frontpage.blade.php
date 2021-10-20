@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    <form action="{{ route('frontpage') }}" method="GET">
                        <a href="/" class="list-group-item list-group-item-action​" style="color: #fb6107">Back</a>
                        <input type="submit" class="list-group-item list-group-item-action" name="category" value="Vegetarian">
                        <input type="submit" class="list-group-item list-group-item-action" name="category" value="Nonvegetarian">
                        <input type="submit" class="list-group-item list-group-item-action" name="category" value="Traditional">
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
                                <img src="{{ Storage::url($pizza->image) }}" class="img-thumbnail" style="width: 100%; height: 50%; object-fit: cover; object-position: center" alt="">
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
                <div class="ml-1">
                    {{ $pizzas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    *{
        padding: 0;
        margin: 0;
    }
    a.list-group-item{
        font-size: 18px;
    }
    a.list-group-item:hover{
        background-color: #e63946;
        color: #fff!important;
    }
    .card-header{
        background-color: #e63946;
        color: #fff;
        font-size: 20px
    }
</style>
@endsection

