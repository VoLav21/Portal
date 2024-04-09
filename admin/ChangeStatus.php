<?php
session_start();
$changeStatus = $_POST['change'];
$_SESSION['NumberForChange'] = (int)($changeStatus / 10);
$conn = new mysqli("localhost", "root", "", "portal");
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Улучши свой город</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
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
                <li class="active"><a href="index.php">Главная</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Администратор <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li role="separator" class="divider"></li>
                        <li><a href="../index.php">Выход</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="jumbotron column">
    <div class="container column">
        <form action="ChangeStatus.php" method="post">
            <?php
            if($changeStatus % 2 != 0){
                echo '<h1 class="column">Решение проблемы</h1>';
                echo '<div title="Выберите файл" class="input__wrapper">
                        <input required name="file" type="file" id="input__file" class="input input__file" multiple>
                        <label for="input__file" class="input__file-button">
                            <span class="input__file-icon-wrapper">
                                <img class="input__file-icon" src="../img/add.png" width="25">
                            </span>
                            <span class="input__file-button-text">Выберите файл</span>
                        </label>
                    </div>';
                echo '<div class="column">
                        <button class="btn btn-success btn-lg" value="1" type="submit">Решить</button>
                    </div>';
            }
            else{
                echo '<h1 class="column">Отклонение заявки</h1>';
                echo '<div class="column">
                        <input required name="description" class="input " type="text" placeholder="Причина отклонения заявки">
                    </div>';
                echo '<div class="column martop">
                        <button class="btn btn-remove btn-lg" value="1" type="submit">Отклонить</button>
                    </div>';
            }
            ?>
            
        </form>
    </div>
</div>

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>