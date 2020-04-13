Newest:<br>
@foreach($newest as $new)
    -> {{ $new }}<br>
@endforeach
<hr>
Featured:<br>
@foreach($featured as $book)
    -> {{ $book }}<br>
@endforeach
