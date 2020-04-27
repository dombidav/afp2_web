<?php

namespace App\Http\Controllers;

use App\Book;
use App\Book_author;
use App\Genre;
use App\Helpers\AppHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        //return view('shop_page', ['all_books' => \App\Book::all()]);
        return view('shop.shop_page', [ 'books' => \App\Book::all()]);
    }

    public function search(Request $request){
        $books = ($request->input('search_field') == null)
            ? Book::extendedSearch($request->all())
            : Book::search(htmlspecialchars(trim($request->input('search_field'))));
        return AppHelper::viewWithGuestId('shop.shop_ajax', ['books' => $books] );

    }

    public function searchMiddleware(Request $request){
        return redirect()->route('shop.search.query', $request->input('search_field'));
    }

    public function searchQ(string $query){
        return AppHelper::viewWithGuestId('shop.shop_page', ['search_field' => $query]);
    }

    public function searchAuthor(Request $request){
        $books = Book::searchAuthor((htmlspecialchars(trim($request->input('search_author')))));
        return AppHelper::viewWithGuestId('shop.shop_page', ['books' => $books]);
    }

    public function searchGenre(Request $request){
        $books = Book::searchGenre((htmlspecialchars(trim($request->input('search_genre')))));
        return AppHelper::viewWithGuestId('shop.shop_page', ['books' => $books]);
    }
    public function searchPublisher(Request $request){
        $books = Book::searchPublisher((htmlspecialchars(trim($request->input('search_publisher')))));

        return AppHelper::viewWithGuestId('shop.shop_page', ['books' => $books]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //NEM KELL!!!!
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        return AppHelper::viewWithGuestId('shop.item', ['book' => Book::where('id', $id)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
