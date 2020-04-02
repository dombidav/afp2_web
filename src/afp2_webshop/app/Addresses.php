<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    public function address()
    {

        return $this->belongsTo(Addresses::class);
    }
}
