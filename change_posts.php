<style>
    th, td, tr {
        border: 1px solid black;
        padding: 3px;
    }
    .table {
        border-collapse: collapse;
    }
    .del_submit {
        margin-left: auto;
        float: left;
    }
</style>
<?php
echo("<title>Таблица posts</title>");
include("dbconnect.php");
global $pdo;

$stmt = $pdo->query("SELECT * FROM posts");
//$colcount = $stmt->columnCount(); // Кол-во столбцов в таблице
//$rows = $stmt->rowCount(); // Кол-во строк в таблице
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo("<a href='select_table.php'>Назад</a>");
echo("<form method='POST' action='/script_delete.php'>");
echo("<table class='table'>");
echo("<tr>
      <th>ID</th>
      <th>Заголовок</th>
      <th>Содержимое</th>
      <th>Дата</th>
      <th>Автор</th>
      <th>Удаление</th>
      </tr>");
$q = 1; // Для value checkbox
foreach ($data as $row)
{
    echo("<tr>
          <td>{$row['id']}</td>
          <td>{$row['title']}</td>
          <td>{$row['content']}</td>
          <td>{$row['date_of_public']}</td>
          <td>{$row['author']}</td>
          <td align='center'><input type='checkbox' name='checkbox_mass[]' value='$q'></td>
          </tr>");
    $q++;
}
echo("</table>");
echo("<input type='text' name='selected_table' value='posts' hidden/>");
echo("<p><input type='submit' name='delete_rows' class='del_submit' value='Удалить'/></p>");
echo("</form>");