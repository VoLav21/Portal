<?php
session_start();

$conn = new mysqli("localhost", "root", "", "portal");
$fileproblem = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['namerequest'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $user_id = $_SESSION['user_id'];
    $date = date("Y-m-d H:i:s");

    if (isset($_FILES['file'])) {
        $errors = array();
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];

        // Проверяем формат файла
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $allowed_extensions = array("jpeg", "jpg", "png");

        if (!in_array($file_ext, $allowed_extensions)) {
            $fileproblem = 1;
        }

        // Проверяем размер файла
        if ($file_size > 10000000) {
            $fileproblem = 2;
        }

        // Если ошибок нет, перемещаем файл в папку 'img' и добавляем данные в базу данных
        if (empty($errors) && $fileproblem < 1) {
            $targetfile = "img/" . $file_name;

            if (move_uploaded_file($file_tmp, $targetfile)) {
                $sql = "INSERT INTO request (ID_User, Name, Description, ID_Category, Photo, ID_Status, Date) VALUES ('$user_id', '$name', '$description', '$category', '$targetfile', '1', '$date')";

                if ($conn->query($sql) === TRUE) {
                    header('Location: success.php');
                    exit;
                } else {
                    echo "Ошибка: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Не удалось переместить файл в папку 'img'.";
            }
        } else {
            $_SESSION['file_problem'] = $fileproblem;
            header('Location: SubmitApplication.php');
        }
    }
    $conn->close();
}
?>
