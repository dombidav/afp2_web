@extends('layouts.app')

@section('content')
    <table>
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Items</th>
            <th>Total</th>
            <th>Created at</th>
            <th>Status</th>

        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>
                    {{ $order->id }}
                </td>
                <td>
                    @foreach(\App\Helpers\AppHelper::getPackages($order->id) as $pack)
                       {{ $pack['count'] }}× {{ $pack['book']->title }} <br>
                    @endforeach
                </td>
                <td>
                    @php
                    $sum = 0;
                    foreach (\App\Helpers\AppHelper::getPackages($order->id) as $pack){
                        $bookPrice = $pack['book']->price * $pack['count'];
                        $sum += $bookPrice;
                    }
                    echo $sum;
                    @endphp
                </td>
                <td>
                    {{ $order->created_at }}
                </td>
                <td>
                    {{ $order->status }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
