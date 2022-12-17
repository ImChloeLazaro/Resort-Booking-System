<?php 

    class Session{
        
        public function __construct()
        {
            if(!session_start()){
                session_start();
            }
        }

        public static function setSession($key, $value)
        {
            $_SESSION[$key] = $value;

            return $_SESSION[$key];
        }

        public static function showSession($key)
        {
            return $_SESSION[$key];
        }

        public static function deleteSession($key){
            unset($_SESSION[$key]);
        }

        public static function destroySession()
        {
            session_destroy();
            session_unset();
        }
    }

    $session = new Session();
?>
