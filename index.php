<?php
    session_start();
    include ('dbconnect.php');
    include ('script_add.php');
    include ('exit.php');
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
        .entry {
            margin: 3px;
            display: inline-block;
            float: right;
        }
    </style>
</head>

<body>
<div class="entry">
    <?php
    if (isset($_SESSION["is_auth"]))
    {
        $q = $_SESSION["login"];
        echo ("Аккаунт: $q - ");
        echo ("<a href='?is_exit=1'>Выйти</a>");
    }
    else
    {
        echo ("<a href='authorization.php'>Войти</a>");
    }
    ?>
</div>

    <?php
    global $data_aut;
    global $type;

    if ($_SESSION["is_auth"] == true && $_SESSION["type"] == "admin")
    {
        include ("admin_panel.php");
    }
    ?>

    <?php
    if (isset($_SESSION["is_auth"]))
    {
        include ("form_add.php");
    }
    ?>

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
</body>
</html>