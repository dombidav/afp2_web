<?php

namespace App\Http\Controllers;

use App\Book;
use App\Book_author;
use App\Genre;
use App\Helpers\AppHelper;
use Illuminate\Http\Request;
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
        $books = Book::search(htmlspecialchars(trim($request->input('search_field'))));
        return AppHelper::viewWithGuestId('shop.shop_page', ['books' => $books]);
    }

    public function searchAuthor(Request $request){
        $author = Author::search(htmlspecialchars(trim($request->input('search_author'))));
        $authorId = $author->id;
        $book_author= Book_author::where('author_id', $authorId)->all();
        $books = $book_author->book_id;
        return AppHelper::viewWithGuestId('shop.shop_page', ['books' => $books]);
    }

    public function searchGenre(Request $request){
        $genre = Genre::search(htmlspecialchars(trim($request->input('search_genre'))));
        $books=Book::where('genre', $genre)->all();

        return AppHelper::viewWithGuestId('shop.shop_page', ['books' => $books]);
    }
    public function searchPublisher(Request $request){
        $publisher= Publisher::search(htmlspecialchars(trim($request->input('search_publisher'))));
        $books=Book::where('publisher', $publisher)->all();

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
