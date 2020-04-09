{{ var_dump($cart_content) }}

@auth()
    Üdv {{ \Illuminate\Support\Facades\Auth::user()->id }}
@else
    Üdv vendég!
@endauth
