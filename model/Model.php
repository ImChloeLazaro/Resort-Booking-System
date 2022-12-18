<?php 

class Singleton{

    public static $connection = NULL;

    private function __construct(){
    }

    public static function getInstance()
    {
        if(self::$connection == NULL):
            self::$connection = new mysqli('localhost', 'root', '', 'resort');
        endif;

        return self::$connection;
    }

}

?>