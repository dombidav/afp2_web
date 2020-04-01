<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function author(){
        return $this->hasMany(Book_author::class);
    }

    public function publisher(){
        //return $this->hasOne(Publisher::class);

    }

    public function genre(){
        return $this->hasMany(Book_genre::class);
    }
}
