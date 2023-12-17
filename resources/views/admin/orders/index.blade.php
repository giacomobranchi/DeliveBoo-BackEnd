@extends('layouts.admin')

@section('content')
    <div class="container">

        <h1>Welcome in Orders</h1>

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
            ciao
        @endforelse


    </div>
@endsection
