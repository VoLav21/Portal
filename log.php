<?php
session_start();
$conn = new mysqli("localhost", "root", "", "portal");
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$login_2 = $_POST['emailLog'];
$passw_2 = $_POST['passLog'];
$log1;
$pass1;
$id_log = 0;
$logIN = 0;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $log1 = $row['Login'];
        $pass1 = $row['Password'];
    
        if($login_2 == $log1 && $passw_2 == $pass1){
            $ID_ = $row['ID_User'];
           
            $_SESSION['user_id'] = $ID_;
            if($row['Role'] == "1"){
                header("Location: indexUser.php");
                $id_log = $id_log + 1;
            }
            else{
                header("Location: admin/");
                $id_log = $id_log + 1;
            }
        }
        else{
            $logIN = 1;
        }
    }
}
if($id_log == 0){
    if($logIN == 1){
        $_SESSION['no_id'] = 1;
        header("Location: login.php");
    }
}
