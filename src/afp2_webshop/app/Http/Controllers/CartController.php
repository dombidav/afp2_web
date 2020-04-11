<?php

namespace App\Http\Controllers;

use App\Order;
use App\Package;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Helpers\AppHelper;

class CartController extends Controller
{
    public function __construct()
    {
    }

    public  function show(){
        if(Auth::check()){
            return view('cart_page', ['cart_content' => DB::table('orders')->where('user_id', '=', Auth::id())->where('status', '=', '0')->get()]);
        }
        return response('TEST')->cookie('guest_id', AppHelper::generateUserID(), 9999);
    }

    public function add($id){
        $user_id = Auth::check() ? Auth::id() : \Cookie::get('guest_id');
        $needs_id = false;
        if(!$user_id){
            $needs_id = true;
            $user_id = AppHelper::generateUserID();
        }
        $order_id = DB::table('orders')->where('user_id', '=', $user_id)->get();
        if($order_id->count() < 1){
            $order_id = AppHelper::generateOrderID();
            DB::insert('INSERT INTO `orders` (`id`, `user_id`, `billing`, `shipping`, `status`) VALUES (:gen_id, :user_id, :billing, :shipping, \'0\')',
                [
                    'gen_id' => $order_id,
                    'user_id' => $user_id,
                    'billing' => Auth::user()->billing ?? 0,
                    'shipping' => Auth::user()->shipping ?? 0,
                ]);
        }
        else{
            $order_id = $order_id[0]->id;
        }
        if(DB::table('packages')->where('order_id', '=', $order_id)->where('book_id', '=', $id)->count() > 0){
            $ok = DB::update('UPDATE `packages` SET `quantity`=`quantity`+1 WHERE `book_id`=:book_id AND `order_id`=:order_id',
                [
                    'book_id' => $id,
                    'order_id' => $order_id
                ]
            );
        }else{
            $ok = DB::insert('INSERT INTO `packages` (`order_id`, `book_id`) VALUES (:order_id, :book_id)',
                [
                    'order_id' => $order_id,
                    'book_id' => $id
                ]);
        }
        if($needs_id) {
            if ($ok)
                return response("$id => $order_id")->cookie('guest_id', $user_id, 9999);
            else
                return response('eh')->cookie('guest_id', $user_id, 9999);
        }
        else{
            if ($ok)
                return response("$id => $order_id");
            else
                return response('eh');
        }
    }

    public function delete($id){
        if(Auth::check()){
            $order_id = DB::table('orders')->where('user_id', '=',Auth::id())->where('status', '=', '0')->get()[0];
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
