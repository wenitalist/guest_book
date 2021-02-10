<?php
    session_start();
    include ('dbconnect.php');
    include ('add.php');
    include ('script_authorization.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Гостевая книга</title>
    <style>
        .main {
            border: solid 2px black;
            width: 800px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
        }
        .form_div {
            border: solid 2px black;
            margin: auto;
            width: 800px;
        }
        .form {
            margin-left: 3px;
            margin-top: 3px;
            margin-bottom: 5px;
        }
        .np {
            margin-left: 3px;
            margin-top: 3px;
            margin-bottom: 3px;
        }
        .textarea {
            resize: none;
            margin-left: 3px;
            margin-top: 3px;
            margin-bottom: 3px;
            font-size:20px;
            height: 200px;
            width: 784px;
        }
        .submit {
            margin: 3px;
            text-align: right;
        }
        .entry {
            margin: 3px;
            display: inline-block;
            float: right;
        }
        .admin_panel {

        }
    </style>
</head>

<body>
<div class="entry">
    <?php

    ?>
    <a href="authorization.php">Войти</a>
</div>
<div class="form_div">
    <h1 class="np">Оставить запись</h1>
    <hr>
    <form method="POST" action="" class="form">
        <p class="np"><input name="author" type="text" maxlength="15" required placeholder="Ваше имя"/>
            <input name="title" type="text" maxlength="30" required placeholder="Заголовок темы"/></p>
        <textarea name="content" class="textarea" maxlength="100" required placeholder="Описание"></textarea>
        <p class="submit"><input type="submit" name="enter" required value="Опубликовать"/></p>
    </form>
</div>
<div class="main">
    <?php
    global $pdo;
    $result = $pdo->query("SELECT * FROM posts");
    $count = $result->rowCount();
    for ($q = 1; $q <= $count; $q++)
    {
        include ('post.php');
    }
    ?>
</div>
<div class="admin_panel">
    <?php
    global $data_aut;
    global $type;

    if ($_SESSION["is_auth"] == true && $_SESSION["type"] == "admin")
    {
        include ("admin_panel.php");
    }
    ?>
</div>
</body>
</html>