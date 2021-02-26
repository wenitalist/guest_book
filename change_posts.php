<style>
    th, td, tr {
        border: 1px solid black;
        padding: 3px;
    }
    .table {
        border-collapse: collapse;
        font-size: 20px;
        margin: 2%;
    }
    .zxc {
        margin-left: auto;
        margin-right: auto;
        margin-top: 15%;
        width: 575px;
    }
    .del_submit {
        float: right;
        margin-top: 1%;
    }
    .dop {
        margin-top: 5px;
        border: solid 2px black;
        width: 575px;
    }
    a. {
        margin: auto;
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

echo("<div class='zxc'>");
echo("<a href='select_table.php' class='a'>Назад</a>");
echo("<div class='dop'>");
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
echo("<p><input type='submit' name='delete_rows' class='del_submit' value='Удалить'/></p>");
echo("</form>");
echo("</div>");
echo("</div>");