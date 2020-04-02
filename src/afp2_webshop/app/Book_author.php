<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book_author extends Model
{
    public function author(){
        return $this->belongsToMany(Author::class);
    }


    public function book(){
        return "Könyv"; //$this->hasMany(App\Book:class);
    }
}
