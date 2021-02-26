<?php
session_start();
include ('dbconnect.php');
include ('script_add.php');
include ('exit.php');
if ($_SESSION["is_auth"] == NULL)
{
    $_SESSION["is_auth"] = false;
}
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
        .addl {
            border: 4px double blue;
            margin: 3px;
        }
        .text {
            margin: 3px;
        }
        .date {
            text-align: right;
            margin-right: 3px;
            margin-top: 1px;
            margin-bottom: 6px;
        }
    </style>
</head>

<body>
<div class="entry">
    <?php
    if (($_SESSION["is_auth"]) == true)
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
if (($_SESSION["is_auth"]) == true)
{
    include ("form_add.php");
}
?>

<?php
echo("<div class='main'>");
global $pdo;
$result = $pdo->query("SELECT * FROM posts");
$result->execute();
$data = $result->fetchAll(PDO::FETCH_ASSOC);
foreach($data as $row)
{
    $str_aut = $row['author'];
    $str_aut .= " - ";
    $str_date = $row['date_of_public'];
    $str_aut .= $str_date;

    echo("<div class='addl'>
          <h2 class='text'>{$row['title']}</h2>
          <hr>
          <p class='text'>{$row['content']}</p>
          <hr>
          <p class='date'>$str_aut</p>
          </div>");
}
echo("</div>");
?>
</body>
</html>