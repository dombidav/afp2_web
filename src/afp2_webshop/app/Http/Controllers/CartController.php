<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct()
    {
    }

    public  function show(){
        if(true /*Auth::check()*/){
            $id = 14; //Auth::user()->id;
            return view('cart_page', ['cart_content' => DB::table('orders')->where('user_id', '=',14)->where('status', '=', '0')->get()]);
        }
        return '';
    }

    public function add($id){
        DB::insert('INSERT INTO `orders` (`id`, `user_id`, `billing`, `shipping`, `status`, `created_at`, `updated_at`) VALUES (:gen_id, :user_id, :billing, :shipping, \'0\', :created_at, :updated_at)',
            [
                'gen_id' => "asdawrxyc",
                'user_id' => "sda",
                'billing' => 0,
                'shipping' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        if(Auth::check()){
            DB::insert('INSERT INTO `orders` (`id`, `user_id`, `billing`, `shipping`, `status`) VALUES (:gen_id, :user_id, :billing, :shipping, \'0\')',
                [
                    'gen_id' => "asdawrxyc",
                    'user_id' => Auth::user()->id,
                    'billing' => Auth::user()->billing ?? '',
                    'shipping' => Auth::user()->shipping ?? '',
            ]);
        }else{
            //...cookies...
        }
        return view('cart_add_success');
    }

    public function delete($id){
        if(Auth::check()){
            $order_id = DB::table('orders')->where('user_id', '=',14)->where('status', '=', '0')->get()[0];
            DB::delete ('DELETE FROM `packages` where `order_id` = :order_id AND `book_id` = :book_id',
                [
                    'order_id' => $order_id,
                    'book_id' => $id
                ]);
        }else{
            //...cookies...
        }
        return view('cart_add_success');
    }
}
