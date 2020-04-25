@for($i = 0; $i < sizeof($books)-2; $i=$i+3)

    <div class="row">
        <div class="col-md-4">
            <figure class="card card-product-grid">
                <div class="img-wrap">
                    <img src="images/unknown_product.png">
                    <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> More</a>
                </div> <!-- img-wrap.// -->
                <figcaption class="info-wrap">
                    <div class="fix-height">
                        <a href="#" class="title">{{$books[$i]->title}}</a>
                        <div class="price-wrap mt-2">
                            <span class="price">{{$books[$i]->price}}€</span>
                        </div> <!-- price-wrap.// -->
                    </div>
                    <a href="afp2.test/cart/add/{{ $books[$i]->id }}" class="btn btn-block btn-warning">Add to cart </a>
                </figcaption>
            </figure>
        </div> <!-- col.// -->

        <div class="col-md-4">
            <figure class="card card-product-grid">
                <div class="img-wrap">
                    <img src="images/unknown_product.png">
                    <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> More</a>
                </div> <!-- img-wrap.// -->
                <figcaption class="info-wrap">
                    <div class="fix-height">
                        <a href="#" class="title">{{$books[$i+1]->title}}</a>
                        <div class="price-wrap mt-2">
                            <span class="price">{{$books[$i+1]->price}}€</span>
                        </div> <!-- price-wrap.// -->
                    </div>
                    <a href="afp2.test/cart/add/{{$i+1}}" class="btn btn-block btn-warning">Add to cart </a>
                </figcaption>
            </figure>
        </div> <!-- col.// -->

        <div class="col-md-4">
            <figure class="card card-product-grid">
                <div class="img-wrap">
                    <img src="images/unknown_product.png">
                    <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> More</a>
                </div> <!-- img-wrap.// -->
                <figcaption class="info-wrap">
                    <div class="fix-height">
                        <a href="#" class="title">{{$books[$i+2]->title}}</a>
                        <div class="price-wrap mt-2">
                            <span class="price">{{$books[$i+2]->price}}€</span>
                        </div> <!-- price-wrap.// -->
                    </div>
                    <a href="afp2.test/cart/add/{{$i+2}}" class="btn btn-block btn-warning">Add to cart </a>
                </figcaption>
            </figure>
        </div> <!-- col.// -->


    </div> <!-- row end.// -->
@endfor
