<?php
session_start();

$conn = new mysqli("localhost", "root", "", "portal");
$idProblem = $_POST['item_id'];

$sql = "DELETE FROM request WHERE ID_request  = $idProblem";

if ($conn->query($sql) === TRUE) {
    header("Location: myRequest.php");
    $_SESSION['SelectRemove'] = 1;
  } else {
    echo "Ошибка при удалении записи: " . $conn->error;
  }
  
  // Закрываем соединение
  $conn->close();