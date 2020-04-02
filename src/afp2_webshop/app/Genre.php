<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function Books(){
        return $this->belongsToMany(Book::class, 'book_genres');
    }
}
