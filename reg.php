<?php
$pdo = new PDO('mysql:host=localhost;dbname=portal', 'root', '');

$name_ = $_POST['name'];
$second_ = $_POST['second'];
$middle_ = $_POST['middle'];
$login_ = $_POST['email'];
$passw_ = $_POST['pass'];

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//SQL запрос 
$sql = $pdo->prepare("INSERT INTO users(Name, SecondName, MiddleName, Login, Password) VALUES ('$name_', '$second_', '$middle_', '$login_', '$passw_')");

//Выполнение запроса
$sql->execute();
if($sql != null){
    header("Location: login.php");
}
$pdo = null;