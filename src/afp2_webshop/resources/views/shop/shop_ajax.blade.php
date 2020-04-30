<header class="border-bottom mb-4 pb-3">
    <div class="form-inline">
        <span class="mr-md-auto">{{ sizeof($books) }} Items found </span>
    </div>
</header><!-- sect-heading -->

<div class="row">
        @for($i = 0; $i < sizeof($books); $i++)
        <div class="col-md-4">
            <figure class="card card-product-grid">
                <div class="img-wrap">
                    <img src="{{ asset("images/book/thumbnails/" . $books[$i]->thumbnail) }}"/>
                    <a class="btn-overlay" href="{{ route('shop.get', $books[$i]->id) }}"><i class="fa fa-search-plus"></i> More</a>
                </div> <!-- img-wrap.// -->
                <figcaption class="info-wrap">
                    <div class="fix-height">
                        <a href="#" class="title">{{ \App\Helpers\AppHelper::wrap($books[$i]->title, 55) }}</a>
                        <div class="price-wrap mt-2">
                            <span class="price">{{$books[$i]->price}} Ft</span>
                        </div> <!-- price-wrap.// -->
                    </div>
                    <a href="{{ route('cart.add', $books[$i]->id) }}" class="btn btn-block btn-warning">Add to cart </a>
                </figcaption>
            </figure>
        </div> <!-- col.// -->
            @if(($i-2)%3 == 0)
                </div>
                <div class="row">
            @endif
        @endfor
    </div> <!-- row end.// -->
