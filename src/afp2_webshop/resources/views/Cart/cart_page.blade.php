USER: {{ $user_id }}<br><br>
CART ID: {{ $order_id }}<br><br>
CART CONTENT:<br><br>
@foreach($packs as $pack)
    <hr>
    -> <b>{{ $pack['count'] }}×</b> {{ $pack['book']->title }}
@endforeach
