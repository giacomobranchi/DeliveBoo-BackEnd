@extends('layouts.admin')

@section('content')
    @extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-dark py-4">
            Your Dishes in Orders
        </h2>

        <div class="table-responsive my-4">
            <table class="table border table-striped table-hover table-light">
                <thead>
                    <tr>
                        <th>Orders ID</th>
                        <th>Dish ID</th>
                        <th>Quantity</th>
                        <th>Dish Name</th>
                        <th>Dish Description</th>
                        <th>Dish Price</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($ordersData as $data)
                        <tr>
                            <td>
                                {{ $data->order_id }}
                            </td>
                            <td>
                                {{ $data->dish_id }}
                            </td>
                            <td>
                                {{ $data->qty }}
                            </td>
                            <td>
                                {{ $data->name }}
                            </td>
                            <td>
                                {{ $data->description }}
                            </td>
                            <td>
                                {{ $data->price }}
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>

    </div>
@endsection

@endsection
