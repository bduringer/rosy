<?php 

namespace app\helpers;
class Auth{
    public static function check(string $type){
        switch ($type) {
            case 'auth':
                if(!isset($_SESSION['logged'])){
                    return redirect('/login');
                };
            break;
            
            default:
                # code...
                break;
        }

    }
}