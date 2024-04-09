<?php
session_start();
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
                <li class="active"><a href="#">Главная</a></li>
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
        <div>
            <h1 class="column">Новые заявки</h1>
            <div>
                <?php
                $sql = "SELECT ID_request, Name, Description, ID_Category, Photo, Date FROM request WHERE ID_Status = 1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $date = $row['Date'];
                        $Name = $row['Name'];
                        $Description = $row['Description'];
                        $ID_Category = $row['ID_Category'];
                        $Name_Category;
                        $Photo = $row['Photo'];

                        $sql_category = "SELECT Name_Category FROM category WHERE ID_Category = '$ID_Category'";
                        $resultCategory = $conn->query($sql_category);
                        if ($resultCategory->num_rows > 0) {
                            while($row1 = $resultCategory->fetch_object()) {
                                $Name_Category = $row1->Name_Category;
                            }
                        }

                        echo '<form action="ChangeStatus.php" method="post" class="column lineRadius sizeReqAdmin">
                        <div class="infoAdmin">
                            <div class="column textTime"><span>'.$date.'</span></div>
                            <div class="column varName"><span>'.$Name.'</span></div>
                            <div><span>'.$Description.'</span></div>
                            <div><span>Категория </span> <span class="varCategory">'.$Name_Category.'</span></div>
                            <div class="column"><img class="imageReqAdmin" src="../'.$Photo.'"></div>
                        </div>
                        <div class="buttonsAdmin">
                            <button class="btn btn-success btn-lg anim column mat" name="change" value="'.$row['ID_request'].'1">Решить</button>
                            <div></div>
                            <button class="btn btn-remove btn-lg anim column mat" name="change" value="'.$row['ID_request'].'2">Отклонить</button>
                        </div>
                        </form>';
                    }
                }
                ?>
                
            </div>
        </div>
    </div>
</div>

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>