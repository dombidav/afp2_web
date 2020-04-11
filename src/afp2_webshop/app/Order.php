<?php

namespace App;

use App\Helpers\AppHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public $incrementing = false; //NEM INTEGER AZ ID

    /**
     * @param $user_id int User owning the cart
     * @return string Cart id
     */
    public static function getCartIDFor($user_id) : string
    {
        $order = Order::query()->where('user_id', '=', $user_id)->where('status', '=', 0)->get();
        if ($order->count() == 0){
            $order = AppHelper::generateOrderID();
            self::CreateCart($user_id, $order);
        }
        else{
            $order = $order[0]->id;
        }
        return $order;
    }

    /**
     * @param int $user_id
     * @param string $order_id
     * @return bool
     */
    public static function CreateCart($user_id, string $order_id): bool
    {
        return DB::insert('INSERT INTO `orders` (`id`, `user_id`, `billing`, `shipping`, `status`) VALUES (:gen_id, :user_id, :billing, :shipping, 0)',
            [
                'gen_id' => $order_id,
                'user_id' => $user_id,
                'billing' => Auth::check() ? Auth::user()->billing() : 0,
                'shipping' => Auth::check() ? Auth::user()->shipping() : 0,
            ]
        );
    }

    public static function emptyForTest()
    {
        $order_id = Order::query()->where('user_id', '=', 0);
        if($order_id->count() == 0)
            return true;
        else{
            $order_id = $order_id->get()[0]->id;
            DB::delete('DELETE FROM `packages` WHERE `order_id` = :order_id', ['order_id' => $order_id]);
            return DB::delete('DELETE FROM `orders` WHERE user_id = 0');
        }
    }

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
