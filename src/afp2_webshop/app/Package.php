<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function order(){
        return $this->belongsTo(Order::class); //`package`.`order_id` -t keres
        //$this->hasOne(Order::class); //`orders`.`package_id` -t keres
    }

    public function book(){
        return "Könyv"; //$this->hasOne(App\Book::class);
    }
}
