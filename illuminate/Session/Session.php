<?php 
namespace Illuminate\Session;

class Session{

    /**  
     * @param string $key
     * @param string $msg
     * @return void 
    */
    static function flash($key , $msg)
    {
        setcookie($key , $msg ,time() +  2 , '/');
    }

    /**  
     * @param string $key
     * @param string $msg
     * @param integer $msg
     * @return void 
    */
    static function set($key , $msg , $time){
        setcookie($key , $msg ,time() + ( $time * 60) , '/');
        
    }

    /**  
     * @param string $key 
     * @return mixed 
    */
    static function get($key){
        return $_COOKIE[$key] ?? '';
    }

    static function forget($key){
        unset($_COOKIE[$key]);
        return ;
    }
}