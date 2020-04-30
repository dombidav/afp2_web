
@extends('layouts.app')

@section('content')
    USER: {{ $user_id }}<br><br>
    CART ID: {{ $order_id }}<br><br>
    <div class="container">
        @if($packs != null)
        <header class="section-heading">
            <h3 class="section-title text-md-center">Shopping cart</h3>
        </header>

        <!-- sect-heading -->

        <div class="row justify-content-center">
            <table class="table table-borderless text-md-center col-8">
                <thead>
                <tr class="border-top">
                    <th scope="col"></th>
                    <th scope="col">Title</th>
                    <th scope="col">Piece</th>
                    <th scope="col">Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($packs as $pack)
                    <tr class="bg">
                        <th scope="row"> <a href="#" class="img-wrap"> <img src="images/unknown_product.png" class="img-sm img-cart"> </a></th>
                        <td>
                            {{ $pack['book']->title }}
                        </td>
                        <td>
                            <input type="number" value ="{{$pack['count']}}" id="{{$pack['book']->id}}" min="0" class="form-control form-control-cart">
                        </td>
                        <td>
                             {{$pack['book']->price}} <span>* {{$pack['count']}} Ft</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="float-right">
                    <label for="total">Total:</label>
                    <input type="number" id="total" placeholder = "totalprice" class="form-control" readonly><br> //{$pack->sum('sum_price')}
                    <a href="{{route('orders.place', $order_id) }}" class="btn btn-outline-warning form-control">Buy</a>
                </div>
            </div>
        </div>
        @else
            <section class="section-pagetop bg">
                <div class="container">
                    <h2 class="title-page">There is nothing in the cart.</h2>
                </div>
            </section>
        @endif
    </div>

@endsection
