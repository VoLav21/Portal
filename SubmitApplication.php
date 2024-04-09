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
                        <li><a href="myRequest.php">Мои заявки</a></li>
                        <li><a href="#">Новая заявка</a></li>
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
        <form action="successfully.php" method="post" enctype="multipart/form-data">
            <h1 class="column">Оставить заявку</h1>
            <div class="column">
                <div>
                    <div class="column">
                        <input required name="namerequest" class="input" type="text" placeholder="Название">
                    </div>
                    <div class="column">
                        <input required name="description" class="input " type="text" placeholder="Описание">
                    </div>
                    <div class="column">
                        <select required name="category" id="category">
                        <?php
                        $sql = "SELECT ID_Category, Name_Category FROM category";
                       
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $idCat = $row['ID_Category'];
                                $nameCat = $row['Name_Category'];
                                echo '<option value="'.$idCat.'">'.$nameCat.'</option>';
                            }
                        }
                        ?>
                        </select>
                    </div>
                    <div>
                    <div title="Выберите файл" class="input__wrapper">
                        <input required name="file" type="file" id="input__file" class="input input__file" multiple>
                        <label for="input__file" class="input__file-button">
                            <span class="input__file-icon-wrapper">
                                <img class="input__file-icon" src="img/add.png" width="25">
                            </span>
                            <span class="input__file-button-text">Выберите файл</span>
                        </label>
                    </div>
                    <?php
                        $problem = $_SESSION['file_problem'];
                        if($problem == 2){
                            echo "<h3 class=".'column pass2'.">Файл не должен превышать 10 MB</h3>";
                            $_SESSION['file_problem'] = 0;
                        }
                        else if($problem == 1){
                            echo "<h3 class=".'column pass2'.">Разрешены только файлы JPEG, JPG и PNG.</h3>";
                            $_SESSION['file_problem'] = 0;
                        }
                        else{
                            echo "";
                        }
                        ?>
                    </div>
                        <button class="btn btn-success btn-lg anim column mat" type="submit">Оставить заявку</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="js/addProblem.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>