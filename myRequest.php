<?php
session_start();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Улучши свой город</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Городской портал</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="indexUser.php">Главная</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        <?php
                        $conn = new mysqli("localhost", "root", "", "portal");
                        $user_id = $_SESSION['user_id'];
                        $sql = "SELECT Name, SecondName, MiddleName FROM users WHERE ID_User = '$user_id'";
                       
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $shortenedName = mb_substr($row["Name"], 0, 1); 
                                $shortenedMiddleName = mb_substr($row["MiddleName"], 0, 1);
                    
                                echo " ". $row["SecondName"]. " ". $shortenedName.". ". $shortenedMiddleName. ".";
                            }
                        }
                        ?>
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Мои заявки</a></li>
                        <li><a href="SubmitApplication.php">Новая заявка</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="index.php">Выход</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="jumbotron column">
    <div class="container">
        <div>
            <h1 class="column">Мои заявки</h1>
            <?php
            $selectRemove = $_SESSION['SelectRemove'];
            if($selectRemove == 1){
                echo '<h3 class="column pass2">Запись успешно удалена</h3>';
            }
            $_SESSION['SelectRemove'] = 0;
            ?>

            <div class="column wrap">
                <?php
                    $sql_request = "SELECT ID_request, Name, ID_Category, ID_Status, Date FROM request WHERE ID_User = '$user_id'";
                    $resultRequest = $conn->query($sql_request);
                    if ($resultRequest->num_rows > 0) {
                        while($row = $resultRequest->fetch_assoc()) {
                            $id_Status = $row["SecondName"];
                            $name_Status = "Новая";
                            if($id_Status == 2){
                                $name_Status = "Решена";
                            }
                            else if($id_Status == 3){
                                $name_Status = "Отклонена";
                            }

                            $id_category = $row['ID_Category'];
                            $name_category;

                            $sql_category = "SELECT Name_Category FROM category WHERE ID_Category = '$id_category'";
                            $resultCategory = $conn->query($sql_category);
                            if ($resultCategory->num_rows > 0) {
                                while($row1 = $resultCategory->fetch_object()) {
                                    $name_category = $row1->Name_Category;
                                }
                            }

                            $name_req = $row['Name'];
                            $date_req = $row['Date'];

                            $classStatus;
                            switch($name_Status){
                                case 'Новая': 
                                    $classStatus = "statuss"; 
                                break;
                                case 'Решена': 
                                    $classStatus = "statussgreen"; 
                                break;
                                case 'Отклонена': 
                                    $classStatus = "statussred"; 
                                break;
                            }
                            echo 
                            '<div class="lineRadius">
                                <form action="RemoveReq.php" method="post">
                                    <div class="'.$classStatus.'line"> 
                                        <label class="textTime">'.$date_req.'</label>
                                    </div>
                                    <div class="Category">
                                        <span>Категория </span><span class="varCategory">'.$name_category.'</span>
                                    </div>
                                    <div class="nameRequest">
                                        <span class="varName">'.$name_req.'</span>
                                    </div>
                                    <div class="Status">
                                        <span>Статус </span><span class="'.$classStatus.'">'.$name_Status.'</span>
                                    </div>
                                    <button id="RemoveReq" name="item_id" type="submit" value="'.$row['ID_request'].'">х</button>
                                </form>
                            </div>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<script src="js/addProblem.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>