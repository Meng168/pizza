@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Order</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">User</th>
                                <th scope="col">Phone/Email</th>
                                <th scope="col">Date/Time</th>
                                <th scope="col">Pizza</th>
                                <th scope="col">S.pizza</th>
                                <th scope="col">M.pizza</th>
                                <th scope="col">L.pizza</th>
                                <th scope="col">Total($)</th>
                                <th scope="col">Message</th>
                                <th scope="col">Status</th>
                                <th scope="col">Accept</th>
                                <th scope="col">Reject</th>
                                <th scope="col">Complete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    {{-- user នៅ class model --}}
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->user->email }}<br>{{ $order->user->phone }}</td>
                                    <td>{{ $order->date }}/{{ $order->time }}</td>
                                    <td>{{ $order->pizza->name }}</td>
                                    <td>{{ $order->small_pizza }}</td>
                                    <td>{{ $order->medium_pizza }}</td>
                                    <td>{{ $order->large_pizza }}</td>
                                    <td>$
                                        {{
                                            ($order->pizza->small_pizza_price * $order->small_pizza) +
                                            ($order->pizza->medium_pizza_price * $order->medium_pizza) +
                                            ($order->pizza->large_pizza_price * $order->large_pizza)
                                        }}
                                    </td>
                                    <td>{{ $order->body }}</td>
                                    <td>{{ $order->status }}</td>
                                    <form action="{{ route('order.status', $order->id) }}" method="POST">
                                    @csrf
                                        <td>
                                            <input name="status" class="btn btn-primary btn-sm" type="submit" value="Accept">
                                        </td>
                                        <td>
                                            <input name="status" class="btn btn-danger btn-sm" type="submit" value="Reject">
                                        </td>
                                        <td>
                                            <input name="status" class="btn btn-success btn-sm" type="submit" value="Completed">
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
