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

    public static function searchAuthor($input)
    {
        $b_a = Book_author::query()->where((Author::where('name', 'like', '%'.$input.'%')->id),'==', 'author_id')->get();

        try{
            if ($b_a->count() > 0)
                $ans= Book::query()->where('id', '==', $b_a->book_id)->get();
                try{
                    if ($ans->count() > 0)
                        return $ans;
                }catch (\Exception $e){ return false; }
        }catch (\Exception $e){ return false; }
        return false;
    }

    public static function searchGenre($input)
    {
        $b_g= Book_author::query()->where((Genre::where('name_en', 'like', '%'.$input.'%')->id),'==', 'genre_id')->get();

        try{
            if ($b_g->count() > 0)
                $ans= Book::query()->where('id', '==', $b_g->book_id)->get();
            try{
                if ($ans->count() > 0)
                    return $ans;
            }catch (\Exception $e){ return false; }
        }catch (\Exception $e){ return false; }
        return false;
    }

    public static function searchPublisher($input)
    {
        $pub = Publisher::query()->where('name', 'like', '%'.$input.'%')->get();
        try{
            if ($pub->count() > 0)
                $ans = Book::query()->where('publisher_id', '==', $pub->id)->get();
            try{
                if ($ans->count() > 0)
                    return $ans;
            }catch (\Exception $e){ return false; }
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
