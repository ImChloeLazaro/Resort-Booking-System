<?php 
session_start();
require '../model/Model.php';

class Authentication {

    public function login(){
        if(isset($_POST['login'])){
            
            $email = $_POST['email'];
            $password = $_POST['password'];

            $stmt = Singleton::getInstance()->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
            $stmt->bind_param('ss', $email, $password);
            $stmt->execute();

            $res = $stmt->get_result();

            if($res->num_rows == 1):
    
                $user = $res->fetch_object();

                $_SESSION['data'] = array(
                    "id" => $user->id,
                    "email" => $user->email,
                    "firstname" => $user->firstname
                );

                if($user->user_type === 'user')
                {
                    header("location: home.php");   
                }
                else
                {
                    header("location: admin.rooms.php");
                }
            else:
                echo 'Wrong Email or Password';
            endif;
        }
    }
}

$auth = new Authentication;
?>