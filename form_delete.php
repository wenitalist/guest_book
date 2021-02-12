<?php
include("dbconnect.php");
include("show_table.php");
global $pdo;
$stmt = $pdo->query("SHOW TABLES FROM guest_book");
$data = $stmt->fetchAll();
?>
<form method="POST" action="show_table.php" class="select_table">
    <select onchange="" name="select_table[]">
        <option value="none" hidden="">Выберите таблицу</option>
        <?php
        global $data;
        $q = 0;
            while ($data[$q])
            {
                $name_t = strval($data[$q]->Tables_in_guest_book);
                echo("<option name='$name_t' value='$q'>$name_t</option>");
                $q++;
            }
        ?>
    </select>
</form>