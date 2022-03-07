<?php 

class Session{ 
    static function get($key){
        return $_COOKIE[$key] ?? '';
    }
}