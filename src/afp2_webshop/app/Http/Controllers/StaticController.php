<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function showHome(){
        return view('static.home', ['newest' => Book::orderBy('created_at')->limit(4)->get(), 'featured' => Book::inRandomOrder()->limit(10)->get()]);
    }

    public function showContact(){
        return view('static.contact');
    }

    public function showAbout(){
        return view('static.about');
    }
}
