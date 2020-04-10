<?php


namespace App\Helpers;


class AppHelper
{
    public static function generateUserID(){
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_+';
        $ans = '';
        for ($i = 0; $i < 8; $i++){
            $ans .= $characters[rand(0, strlen($characters)-1)];
        }
        return $ans;
    }

    public static function generateOrderID(){
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_+';
        $ans = '';
        for ($i = 0; $i < 16; $i++){
            $ans .= $characters[rand(0, strlen($characters)-1)];
        }
        return $ans;
    }
}
