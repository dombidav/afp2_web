@extends('layouts.app')

@section('content')
    @if(count($orders) > 0)
        @foreach($orders as $order)
            {{ $order }}
        @endforeach
    @else
        No Orders
    @endif
@endsection
