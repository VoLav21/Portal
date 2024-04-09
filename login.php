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
                <li><a href="index.php">Главная</a></li>
                <li><a href="register.php">Зарегистрироваться</a></li>
                <li class="active"><a href="#">Войти</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="jumbotron column">
    <div class="container">
        <form action="log.php" method="post">
            <h1 class="column">Вход в личный аккаунт</h1>
            <div class="column">
                <div>
                    <div class="column">
                        <input required name="emailLog" class="input" type="text" placeholder="Логин">
                    </div>
                    <div class="column">
                        <input required name="passLog" class="input" type="text" placeholder="Пароль">
                    </div>
                    <?php
                        $no_id = $_SESSION['no_id'];
                        $_SESSION['no_id'] = 0;
                        if($no_id == 1){
                            echo "<h3 class=".'column pass2'.">Неверный логин или пароль</h3>";
                        }
                    ?>
                    <div class="registr column">
                        <div>
                            <button class="btn btn-success btn-lg anim column mat" type="submit">Войти</button>
                            <a href="register.php" class="animlink">Ещё нет аккаунта?</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>