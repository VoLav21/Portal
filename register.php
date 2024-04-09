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
                <li class="active"><a href="#">Зарегистрироваться</a></li>
                <li><a href="login.php">Войти</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="jumbotron column">
    <div class="container">
        <form action="reg.php" method="post">
            <h1 class="column">Регистрация пользователя</h1>
            <div class="column">
                <div>
                    <div class="column">
                        <input required name="name" class="input" type="text" placeholder="Имя">
                    </div>
                    <div class="column">
                        <input required name="second" class="input " type="text" placeholder="Фамилия">
                    </div>
                    <div class="column">
                        <input required name="middle" class="input " type="text" placeholder="Отчество">
                    </div>
                    <div class="column">
                        <input required name="email" class="input " type="text" placeholder="E-mail">
                    </div>
                    <div class="column">
                        <input required name="pass" class="input " type="text" placeholder="Пароль">
                    </div>
                    <div class="column">
                        <input required class="input pass2" type="text" placeholder="Повторите пароль">
                    </div>
                    <div class="column obrabotka">
                        <div>
                            <input required type="checkbox" class="pass2" id="obrabotka">
                            <label for="obrabotka">Согласен на обработку персональных данных</label>
                        </div>
                    </div>
                    <div class="registr column">
                        <div>
                            <button class="btn btn-success btn-lg column anim" type="submit">Зарегистрироваться</button>
                            <a href="login.php" class="column animlink">Уже есть аккаунт?</a>
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