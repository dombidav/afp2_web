@auth()
    Bejelentkezve<br>
    @foreach($cart_content as $item)
        {{ $item->id }}
    @endforeach
@else
    Vendég
@endauth
