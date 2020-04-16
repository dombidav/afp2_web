<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 */
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
        return $this->belongsToMany(Author::class, 'book_authors')->get();
    }

    public function getAuthorNames($or = ''){
        $ans = '';
        foreach ($this->authors() as $author){
            $ans .= $author->name . ', ';
        }
        return strlen($ans) > 0 ? trim($ans, ', ') : $or;
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class, 'book_genres');
    }
}
