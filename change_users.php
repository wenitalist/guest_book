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
echo("<title>Таблица users</title>");
include("dbconnect.php");
global $pdo;

$stmt = $pdo->query("SELECT * FROM users");
//$colcount = $stmt->columnCount(); // Кол-во столбцов в таблице
//$rows = $stmt->rowCount(); // Кол-во строк в таблице
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo("<a href='select_table.php'>Назад</a>");
echo("<form method='POST' action='/script_delete.php'>");
echo("<table class='table'>");
echo("<tr>
      <th>ID</th>
      <th>Имя пользователя</th>
      <th>Пароль</th>
      <th>Тип</th>
      <th>Удаление</th>
      </tr>");
$q = 1; // Для value checkbox
foreach ($data as $row)
{
    if ($row['type'] != "admin")
    {
        echo("<tr>
              <td>{$row['id']}</td>
              <td>{$row['login']}</td>
              <td>{$row['password']}</td>
              <td>{$row['type']}</td>
              <td align='center'><input type='checkbox' name='checkbox_mass[]' value='$q'></td>
              </tr>");
    }
    $q++;
}
echo("</table>");
echo("<input type='text' name='selected_table' value='users' hidden/>");
echo("<p><input type='submit' name='delete_rows' class='del_submit' value='Удалить'/></p>");
echo("</form>");