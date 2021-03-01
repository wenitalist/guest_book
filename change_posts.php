<style>
    th, td, tr {
        border: 1px solid black;
        padding: 3px;
    }
    .table {
        border-collapse: collapse;
        font-size: 20px;
        margin-top: 5px;
    }
    .del_submit {
        margin-left: 2%;
    }
    .del_status {
        font-size: 15px;
        margin-left: 2%;
    }
</style>
<?php
session_start();
echo("<title>Таблица posts</title>");
include("dbconnect.php");
global $pdo;

$stmt = $pdo->query("SELECT * FROM posts");
//$colcount = $stmt->columnCount(); // Кол-во столбцов в таблице
//$rows = $stmt->rowCount(); // Кол-во строк в таблице
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$del_stat = "";
if ($_SESSION["delete_status"] == "yes") {$del_stat = "Удаление прошло успешно";}
if ($_SESSION["delete_status"] == "no") {$del_stat = "Не удалось удалить";}

echo("<div>");
echo("<form method='POST' action='/script_delete.php'>");
echo("<a href='select_table.php'>Назад</a>
      <a><input type='submit' name='delete_rows' class='del_submit' value='Удалить'/></a>
      <a class='del_status'>$del_stat</a>");
$_SESSION["delete_status"] = "";
echo("<table class='table'>");
echo("<tr>
      <th>ID</th>
      <th>Заголовок</th>
      <th>Содержимое</th>
      <th>Дата</th>
      <th>Автор</th>
      <th>Удаление</th>
      </tr>");
foreach ($data as $row)
{
    echo("<tr>
          <td>{$row['id']}</td>
          <td>{$row['title']}</td>
          <td>{$row['content']}</td>
          <td>{$row['date_of_public']}</td>
          <td>{$row['author']}</td>
          <td align='center'><input type='checkbox' name='checkbox_mass[]' value='{$row['id']}'></td>
          </tr>");
}
echo("</table>");
echo("<input type='text' name='selected_table' value='posts' hidden/>");
echo("</form>");
echo("</div>");