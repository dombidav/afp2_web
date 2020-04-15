<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * @return array|bool
     * @var $ans Illuminate\Database\Eloquent\Collection
     */
    public static function search($input)
    {
        $ans = Book::query()->where('title', 'like', '%'.$input.'%')->orWhere('id', '=', $input)->get();
        try{
            if ($ans->count() > 0)
                return $ans;
        }catch (\Exception $e){ return false; }
        return false;
    }

    public function authors(){
        return $this->belongsToMany(Author::class, 'book_authors');
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class, 'book_genres');
    }
}
