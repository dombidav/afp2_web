@extends('layouts.app')

@section('content')
    @if($book != null)
        <section class="section-name padding-y-sm">
            <div class="container">
                <div class="row justify-content-center">
                    <table class="table table-borderless text-md-center col-8">
                        <thead>
                        </thead>

                        <tbody>
                        <tr class="bg">
                            <th scope="row"> <a href="#" class="img-wrap"> <img src="/images/unknown_product.png" class="img-sm"> </a>
                            </th>
                            <th>
                                @title
                            </th>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row justify-content-center">
                    <table class="table table-borderless text-md-center col-2">
                        <tbody>
                        <tr class="table table-borderless text-md-center col-3">
                            <th>
                            </th>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr class="bg table table-borderless text-md-center col-3">
                            <th>Author
                            </th>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr class="bg table table-borderless text-md-center col-3">
                            <td>
                                @authors
                            </td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr class="bg table table-borderless text-md-center col-3">
                            <th>
                            </th>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr class="bg table table-borderless text-md-center col-3">
                            <th>Publisher
                            </th>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr class="bg table table-borderless text-md-center col-3">
                            <td>
                                {{\App\Publisher::where('id', $book->publisher_id)->first()->name}}
                            </td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr class="bg table table-borderless text-md-center col-3">
                            <th>
                            </th>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr class="bg table table-borderless text-md-center col-3">
                            <th>Genre
                            </th>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr class="bg table table-borderless text-md-center col-3">
                            <td>
                                {{ $book->getGenreNames() }}
                            </td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr class="bg table table-borderless text-md-center col-3">
                            <th>
                            </th>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr class="bg table table-borderless text-md-center col-3">
                            <th>Language
                            </th>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr class="bg table table-borderless text-md-center col-3">
                            <td>
                                {{$book->language}}
                            </td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr class="bg table table-borderless text-md-center col-3">
                            <th>
                            </th>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr class="bg table table-borderless text-md-center col-3">
                            <td>Price:
                            </td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr class="bg table table-borderless text-md-center col-3">
                            <td>
                                @price
                            </td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr class="bg table table-borderless text-md-center col-3">
                            <td>
                                <a onclick="add_to_cart('{{ route('cart.add', $book->id) }}')" class="btn btn-block btn-warning">Add to cart </a>
                            </td>
                        </tr>
                        </tbody>

                        <div class="row justify-content-center">
                            <table class="table table-borderless text-md-center col-5">
                                <tbody>
                                <tr class="table table-borderless text-md-center col-8">
                                    <th>
                                    </th>
                                </tr>
                                </tbody>
                                <tbody>
                                <tr class="table table-borderless text-md-center col-8">
                                    <th>
                                        Description
                                    </th>
                                </tr>
                                </tbody>
                                <tbody>
                                <tr class="table table-borderless text-md-center col-8">
                                    <td>
                                    </td>
                                </tr>
                                </tbody>
                                <tbody>
                                <tr class="table table col-md-8 table-borderless text-md-center col-8">
                                    <td>
                                        {{$book->description}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </table>
                </div>
            </div>
        </section>
    @else
        <section class="section-pagetop bg">
            <div class="container">
                <h2 class="title-page">There is no such book.</h2>
            </div>
        </section>

    @endif
@endsection('content')

@section('page_script')
    <script src="{{ URL::asset('js/add_cart.js') }}" type="text/javascript"></script>
@endsection
