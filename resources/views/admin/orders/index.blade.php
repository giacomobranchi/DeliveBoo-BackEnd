@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-dark py-4">
            Your Orders
        </h2>

        @forelse($ordersData as $data)
            <div>
                {{ $data->dish_id }}
            </div>
            <div>
                {{ $data->total_price }} €
            </div>
            <div>
                {{ $data->name }}
            </div>
        @empty
            No more orders
        @endforelse


    </div>
@endsection
