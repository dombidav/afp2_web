<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $incrementing = false; //NEM INTEGER AZ ID

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function billing(){
        //return $this->belongsTo(Address::class, "billing");
    }

    public function shipping(){
        //return $this->belongsTo(Address::class, "shipping");
    }
}
