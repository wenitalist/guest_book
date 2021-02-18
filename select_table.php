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
</head>
<body>
    <div>
        <a href="index.php">Назад</a>
        <?php
        $q = 0;
        while ($data[$q])
        {
            $name_t = strval($data[$q]->Tables_in_guest_book);
            $str = 'change_';
            $str .= $name_t;
            $str .= '.php';
            echo("<p><a href='$str'>$name_t</a></p>");
            $q++;
        }
        ?>
    </div>
</body>