@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-dark py-4">
            Your Orders
        </h2>

        <div class="table-responsive my-4">
            <table class="table border table-striped table-hover table-light">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Price</th>
                        <th>Info UI</th>
                        <th>Dish ID</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($ordersData as $data)
                        <tr>
                            <td>
                                {{ $data->order_id }}
                            </td>
                            <td>
                                {{ $data->total_price }}
                            </td>
                            <td>
                                <div>
                                    {{ $data->ui_name }}
                                </div>
                                <div>
                                    {{ $data->ui_address }}
                                </div>
                                <div>
                                    {{ $data->ui_mail }}
                                </div>
                                <div>
                                    {{ $data->ui_phone }}
                                </div>
                            </td>
                            <td>
                                {{ $data->dish_id }}
                            </td>
                            <td>
                                {{ $data->qty }}
                            </td>
                        </tr>
                    @empty
                        <h3 class="py-3">
                            No orders at the moment
                        </h3>
                    @endforelse



                </tbody>
            </table>
        </div>

    </div>
@endsection
