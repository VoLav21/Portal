<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                            <li><a href="myRequest.php">Мои заявки</a></li>
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
            <h1 class="column">Заявка отправлена на рассмотрение</h1>
            <div class="column">
                <a href="indexUser.php"><button class="btn btn-success btn-lg anim column mat">Вернуться на главную</button></a>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</html>