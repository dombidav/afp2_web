@extends('layouts.app')

@section('content')

    <section class="section-pagetop bg">
        <div class="container">
            <h2 class="title-page">Category products</h2>
            <nav>
                <ol class="breadcrumb text-warning">
                    <li class="breadcrumb-item"><a href="#" class="text-warning-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-warning-dark">Best category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Great articles</li>
                </ol>
            </nav>
        </div> <!-- container //  -->
    </section>
    <!-- ========================= SECTION INTRO END// ========================= -->

    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content padding-y">
        <div class="container">

            <div class="row">
                <aside class="col-md-3">

                    <div class="card">
                        <article class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
                                    <i class="icon-control orange fa fa-chevron-down"></i>
                                    <h6 class="title">Quick Search</h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_1" style="">
                                <div class="card-body">
                                    <form class="pb-3">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" id="quick_search">
                                            <div class="input-group-append">
                                                <button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group  .// -->
                        <article class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" class="">
                                    <i class="icon-control orange fa fa-chevron-down"></i>
                                    <h6 class="title">Author</h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_2" style="">
                                <div class="card-body">
                                    <form method="post" class="pb-3" action="{{ route('shop.search') }}">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="search_author" name="search_author" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>

                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group  .// -->
                        <article class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true" class="">
                                    <i class="icon-control orange fa fa-chevron-down"></i>
                                    <h6 class="title">Genre </h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_3" style="">
                                <div class="card-body">
                                    <form method="post" class="pb-3" action="{{ route('shop.search') }}">
                                        @csrf
                                        <div class="input-group">
                                            <label for="search_genre">Műfaj keresés</label>
                                            <input type="text" class="form-control" id="search_genre" name="search_genre" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                    <div>
                                        <div class="squaredThree">
                                            <input type="checkbox" name="optionsRadios" id="genre1" value="Genre 1" >
                                            <label for="genre1"></label>
                                        </div>
                                        <label class="label-text" style="margin-left: 10px">Genre 1</label>
                                    </div>
                                    <div>
                                        <div class="squaredThree">
                                            <input type="checkbox" name="optionsRadios" id="genre2" value="Genre 2" >
                                            <label for="genre2"></label>
                                        </div>
                                        <label class="label-text" style="margin-left: 10px">Genre 2</label>
                                    </div>
                                    <div>
                                        <div class="squaredThree">
                                            <input type="checkbox" name="optionsRadios" id="genre3" value="Genre 3" >
                                            <label for="genre3"></label>
                                        </div>
                                        <label class="label-text" style="margin-left: 10px">Genre 3</label>
                                    </div>
                                    <div>
                                        <div class="squaredThree">
                                            <input type="checkbox" name="optionsRadios" id="genre4" value="Genre 4" >
                                            <label for="genre4"></label>
                                        </div>
                                        <label class="label-text" style="margin-left: 10px">Genre 4</label>
                                    </div>
                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group .// -->
                        <article class="filter-group">
                            <header class="card-header" >
                                <a href="#" data-toggle="collapse" data-target="#collapse_4" aria-expanded="true" class="">
                                    <i class="icon-control orange fa fa-chevron-down"></i>
                                    <h6 class="title">Price range </h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show"  id="collapse_4" style="">
                                <div class="card-body">
                                    <input type="range" class="custom-range" min="0" max="100" name="">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Min</label>
                                            <input class="form-control" placeholder="0 €" type="number" min="0" oninput="this.value = Math.abs(this.value)">
                                        </div>
                                        <div class="form-group text-right col-md-6">
                                            <label>Max</label>
                                            <input class="form-control" placeholder="1 000 €" type="number" min="0" oninput="this.value = Math.abs(this.value)">
                                        </div>
                                    </div> <!-- form-row.// -->
                                </div><!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group .// -->
                        <article class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_6" aria-expanded="false" class="">
                                    <i class="icon-control orange fa fa-chevron-down "></i>
                                    <h6 class="title">More filter </h6>
                                </a>
                            </header>
                            <div class="filter-content collapse in" id="collapse_6" style="">
                                <h6 class="title card-header">Language </h6>
                                <div class="card-body">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="myfilter_radio" checked="" class="custom-control-input control-orange">
                                        <div class="custom-control-label">English</div>
                                    </label>

                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="myfilter_radio" class="custom-control-input">
                                        <div class="custom-control-label">French</div>
                                    </label>

                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="myfilter_radio" class="custom-control-input">
                                        <div class="custom-control-label">German</div>
                                    </label>

                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="myfilter_radio" class="custom-control-input">
                                        <div class="custom-control-label">Other</div>
                                    </label>
                                </div><!-- card-body.// -->
                                <h6 class="title card-header">Publisher </h6>
                                <div class="card-body">
                                    <form method="post" class="pb-3"  action="{{ route('shop.search') }}">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="search_publisher" name="search_publisher" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- card-body.// -->
                                <h6 class="title card-header">Pages </h6>
                                <div class="card-body">
                                    <input type="range" class="custom-range" min="0" max="100" name="">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Min</label>
                                            <input class="form-control" placeholder="0" type="number" min="0" oninput="this.value = Math.abs(this.value)">
                                        </div>
                                        <div class="form-group text-right col-md-6">
                                            <label>Max</label>
                                            <input class="form-control" placeholder="10 000" type="number" min="0" oninput="this.value = Math.abs(this.value)">
                                        </div>
                                    </div> <!-- form-row.// -->
                                </div><!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group .// -->
                    </div> <!-- card.// -->

                </aside> <!-- col.// -->
                <main class="col-md-9">

                    <header class="border-bottom mb-4 pb-3">
                        <div class="form-inline">
                            <span class="mr-md-auto">{{sizeof($books)}} Items found </span>
                            <select class="mr-2 form-control">
                                <option>Latest items</option>
                                <option>Most Popular</option>
                                <option>Cheapest</option>
                            </select>
                            <div class="btn-group">
                                <a href="#" class="btn btn-outline-secondary" data-toggle="tooltip" title="List view">
                                    <i class="fa fa-bars"></i></a>
                                <a href="#" class="btn  btn-outline-secondary active" data-toggle="tooltip" title="Grid view">
                                    <i class="fa fa-th"></i></a>
                            </div>
                        </div>
                    </header><!-- sect-heading -->
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
                                    <a href="afp2.test/cart/add/{{$i}}" class="btn btn-block btn-warning">Add to cart </a>
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

                    <nav class="mt-4" aria-label="Page navigation sample">
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </div>
                            <div class="col-4"></div>
                        </div>
                    </nav>

                </main> <!-- col.// -->

            </div>

        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
 @endsection
