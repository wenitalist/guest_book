<?php
include("dbconnect.php");
global $pdo;
$stmt = $pdo->query("SHOW TABLES FROM guest_book");
$data = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Выбрать таблицу</title>
    <style>
        .main {
            border: solid 2px black;
            width: 13%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 15%;
        }
        .field {
            margin: 5px;
            text-align: center;
        }
        .reg {
            text-align: center;
            margin-left: 11%;
        }
        .tables {
            margin: 3%;
            font-size: 20px;
        }
    </style>
</head>
<body>
<div class="main">
    <div class="field">
        <h2 class="field">Выберите таблицу</h2>
        <hr>
        <?php
        $q = 0;
        while ($data[$q])
        {
            $name_t = strval($data[$q]->Tables_in_guest_book);
            $str = 'change_';
            $str .= $name_t;
            $str .= '.php';
            echo("<p class='tables'><a href='$str'>$name_t</a></p>");
            $q++;
        }
        ?>
    </div>
</div>
<div class="reg">
    <a href="index.php">Назад</a>
</div>
</body>
</html>