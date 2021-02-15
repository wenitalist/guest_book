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
        <form method="POST" action="" class="select_table">
            <select name="tables_list">
                <?php
                global $data;
                $q = 0;
                while ($data[$q])
                {
                    $name_t = strval($data[$q]->Tables_in_guest_book);
                    echo("<option  name='$name_t' value='$name_t'>$name_t</option>");
                    //echo("<p><input type='submit' name='$name_t' class='submit' value='$name_t'/></p>");
                    $q++;
                }
                ?>
                <p><input type='submit' name='table_selected' class='submit' value='Выбрать'/></p>
            </select>
        </form>
    </div>
    <div>
        <?php
            include("show_table.php");
        ?>
    </div>
</body>