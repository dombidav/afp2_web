@extends('layouts.app')

@section('content')
    @foreach($books as $book)
        -> {{ $book }}<hr>
    @endforeach
 @endsection
