<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Order;
use App\Package;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct()
    {
    }

    public function index(){
        $this->getUserId($user_id, $needs_id);
        $order_id = Order::getCartIDFor($user_id);
        $packages = Package::forOrder($order_id);
        if($needs_id)
            return response(json_encode($packages))->cookie('guest_id', $user_id, 9999);
        return json_encode($packages);
    }

    public function add($id){
        $this->getUserId($user_id, $needs_id);
        $order_id = Order::getCartIDFor($user_id);
       Package::IncrementQuantityOrInsertNew($order_id, $id);
       if ($needs_id)
           return response(json_encode(['Success' => true, 'Order' => $order_id, 'Book' => $id]))->cookie('guest_id', $user_id, 9999);
       return json_encode(['Success' => true, 'Order' => $order_id, 'Book' => $id]);
    }

    public function add2($book_id, $user_id){
        $order_id = Order::getCartIDFor($user_id);
        Package::IncrementQuantityOrInsertNew($order_id, $book_id);
        return json_encode(['Success' => true, 'Order' => $order_id, 'Book' => $book_id]);
    }

    public function remove($id){
        $this->getUserId($user_id, $needs_id);
        $order_id = Order::getCartIDFor($user_id);
        Package::DeleteWhere($order_id, $id);
        if ($needs_id)
            return response(json_encode(['Success' => true, 'Order' => $order_id, 'Book' => $id]))->cookie('guest_id', $user_id, 9999);
        return json_encode(['Success' => true, 'Order' => $order_id, 'Book' => $id]);
    }

    public function remove2($book_id, $user_id){
        $order_id = Order::getCartIDFor($user_id);
        Package::DeleteWhere($order_id, $book_id);
        return json_encode(['Success' => true, 'Order' => $order_id, 'Book' => $book_id]);
    }

    public function edit($book_id, $quantity){
        $this->getUserId($user_id, $needs_id);
        $order_id = Order::getCartIDFor($user_id);
        Package::UpdateOrInset($order_id, $book_id, $quantity);
        if ($needs_id)
            return response(json_encode(['Success' => true, 'Order' => $order_id, 'Book' => $book_id]))->cookie('guest_id', $user_id, 9999);
        return json_encode(['Success' => true, 'Order' => $order_id, 'Book' => $book_id]);
    }
    public function edit2($book_id, $quantity, $user_id){
        $order_id = Order::getCartIDFor($user_id);
        Package::UpdateOrInset($order_id, $book_id, $quantity);
        return json_encode(['Success' => true, 'Order' => $order_id, 'Book' => $book_id]);
    }

    public function show($id){
        $order_id = Order::getCartIDFor($id);
        $packages = Package::forOrder($order_id);
        return json_encode($packages);
    }

    /**
     * @param $user_id
     * @param $needs_id
     */
    public function getUserId(&$user_id, &$needs_id): void
    {
        $user_id = Auth::check() ? Auth::id() : Cookie::get('guest_id');
        $needs_id = false;
        if (!$user_id) {
            $needs_id = true;
            $user_id = AppHelper::generateUserID();
        }
    }
}
