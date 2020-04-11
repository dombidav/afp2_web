<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(){
        if(!Auth::check())
            abort(403);
        return json_encode(Auth::user());
    }
}
