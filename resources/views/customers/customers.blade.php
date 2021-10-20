@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Customers
                    <a href="{{ route('pizza.order') }}" style="float: right">View Pizza</a>
                    <p style="float: right">&nbsp;||&nbsp;</p>
                    <a href="{{ route('pizza.create') }}" style="float: right">Add Pizza</a>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Nmae</th>
                                <th scope="col">Email</th>
                                <th scope="col">Member since</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    {{-- user នៅ class model --}}
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email  }}</td>
                                    <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('M d Y') }}</td>
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
