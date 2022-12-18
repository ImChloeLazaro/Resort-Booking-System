<?php 
require '../model/Model.php';

class Room{

    public function AddRoom()
    {
        if(isset($_POST['add_room']))
        {
            $image = $_FILES['image']['name'];
            $roomno = $_POST['rnumber'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $type = $_POST['type'];
            $status = false;

            $stmt = Singleton::getInstance()->prepare(
            "INSERT INTO `rooms`(`number`, `picture`, `description`, `price`, `type`, `is_occupied`) 
            VALUES (?,?,?,?,?,?)");

            $stmt->bind_param('sssssi',  $roomno, $image, $description, $price, $type, $status);
            
            $path = "../storage/".$image;

            if(move_uploaded_file($_FILES['image']['tmp_name'], $path)):
                $stmt->execute();
                echo "<script>alert('Room Added Successful')</script>";
            else:
                echo "<script>alert('Room Added Unsuccessful')</script>";
            endif;
        }
    }

    public function showRoom()
    {
        $stmt = Singleton::getInstance()->prepare("SELECT * FROM rooms");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function editRoom()
    {
        if(isset($_POST['edit_room'])):

            $id = $_POST['id'];
            $roomno = $_POST['rnumber'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $type = $_POST['type'];

            $stmt = Singleton::getInstance()->prepare("
            UPDATE `rooms` SET `number`=?,`description`=?,`price`=?,`type`=? WHERE id = ?");
            $stmt->bind_param('isisi', $roomno, $description, $price, $type, $id);
            if($stmt->execute()):
                echo "<script>alert('Room Update Successful')</script>";
            else:
                echo "<script>alert('Room Update Unsuccessful')</script>";
            endif;
        endif;
    }
    public function deleteRoom()
    {
        if(isset($_GET['id'])):
            $id = $_GET['id'];
            $stmt = Singleton::getInstance()->prepare("DELETE FROM `rooms` WHERE id = ?");
            $stmt->bind_param('i', $id);
            if($stmt->execute()):
                echo "<script>alert('Room Delete Successful')</script>";
            else:
                echo "<script>alert('Room Delete Unsuccessful')</script>";
            endif;
        endif;
        
    }
    public function booking()
    {
        if(isset($_POST['booknow'])){
            $user_id = $_POST['user_id'];
            $room_id = $_POST['room_id'];
            $price = $_POST['price'];
            $start = $_POST['start'];
            $expire = $_POST['expire'];

            $date = date_diff(date_create($start), date_create($expire));
            $numberofdate = $date->format('%a');

            //calculate total payment of user.
            $total = $price * $numberofdate;

            $stmt = Singleton::getInstance()->prepare("INSERT INTO `reservations`(`user_id`, `room_id`, `start`, `expire`,`total`) VALUES (?,?,?,?,?)");

            $stmt->bind_param('iissi', $user_id, $room_id, $start, $expire, $total);
            
            if($stmt->execute()):
                $is_occupied = true;
                $stmt = Singleton::getInstance()->prepare("UPDATE `rooms` SET `is_occupied`= ? WHERE id = ? ");
                $stmt->bind_param('ii', $is_occupied, $room_id);
                if($stmt->execute()):
                    header("location:booking.success.php?room_id=".$room_id);
                endif;
            else:
                header("location:home.php?book=error");
            endif;
        }
    }
    public function showAllReserved(){
        $stmt = Singleton::getInstance()->prepare("SELECT * FROM `reservations` INNER JOIN `users` INNER JOIN `rooms` ON reservations.user_id = users.id AND reservations.room_id = rooms.id");
        $stmt->execute();
        $reservations = $stmt->get_result();
        
        return $reservations;
    }
    public function displayRoom($room_id)
    {
        $stmt = Singleton::getInstance()->prepare("SELECT * FROM `reservations` INNER JOIN `users` ON reservations.user_id = users.id WHERE reservations.room_id = ?");
        $stmt->bind_param('i', $room_id);
        $stmt->execute();
        $reservations = $stmt->get_result();
        
        return $reservations;
    }
}

$room = new Room();
?>