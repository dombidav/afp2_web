<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book_genre extends Model
{
    public function genre(){
        return $this->belongsToMany(Genre::class);
    }


    public function book(){
        return "Könyv"; //$this->hasMany(App\Book:class);
    }
}
