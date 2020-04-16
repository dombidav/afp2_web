<?php


namespace App\Helpers;


class AppHelper
{
    public static function generateUserID(){
        $characters = '0123456789';
        $ans = $characters[rand(1, strlen($characters)-1)];
        for ($i = 1; $i < 8; $i++){
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

    /**
     * @param string $text original text
     * @param int $maxchar maximum character number
     * @param string $end ending
     * @return string wrapped text, ending with $end
     */
    public static function wrap($text, $maxchar, $end='...') {
        if (strlen($text) > $maxchar || $text == '') {
            $words = preg_split('/\s/', $text);
            $output = '';
            $i      = 0;
            while (1) {
                $length = strlen($output)+strlen($words[$i]);
                if ($length > $maxchar) {
                    break;
                }
                else {
                    $output .= " " . $words[$i];
                    ++$i;
                }
            }
            $output .= $end;
        }
        else {
            $output = $text;
        }
        return $output;
    }
}
