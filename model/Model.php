<?php 

class Singleton{

    public static $connection = NULL;

    private function __construct(){
    }

    public static function getInstance()
    {
        if(self::$connection == NULL):
            self::$connection = new mysqli('localhost', 'root', '', 'resort');
        else:
            echo 'Database Class is Already Instantiated';
        endif;

        return self::$connection;
    }

}

?>