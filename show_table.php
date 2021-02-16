<style>
    .td, .tr {
        border: 1px solid black;
        padding: 3px;
    }
    .table {
        border-collapse: collapse;
    }
</style>
<?php
if (isset($_POST['table_selected']))
{
    $selected_table = $_POST['tables_list'];
    global $pdo;
    $n = 0;

    $stmt = $pdo->query("SELECT * FROM $selected_table"); // Первый раз чтобы взять всю инфу с бд
    $colcount = $stmt->columnCount(); // Кол-во столбцов в таблице
    //$rows = $stmt->rowCount(); // Кол-во строк в таблице
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC); // Тут хранятся все записи

    $stmt = $pdo->query("SELECT * FROM $selected_table"); // Второй раз берет только названия столбцов
    $column_names = $stmt->fetch(PDO::FETCH_ASSOC); // Тут только перввая строка из таблицы

    echo("<table class='table'>");
    echo("<tr class='tr'>"); // Тег строки таблицы
    for ($k = 0; $k < $colcount; $k++) // Цикл делает заголовки к столбцам таблицы
    {
        $p = array_keys($column_names)[$k];
        echo ("<td class='td'>$p</td>");
    }
    echo("</tr>");
    while ($data[$n])
    {
        echo("<tr class='tr'>");
        for ($k = 0; $k < $colcount; $k++)
        {
            $b = ($data[$n])[$k]; // strval()
            echo ("<td class='td'>$b</td>");
        }
        $n++;
        echo("</tr>");
    }
    echo("</table>");
    $vbn = $data[0];
    var_dump($data);


    //header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}
?>