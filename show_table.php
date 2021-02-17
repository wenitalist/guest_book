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
include("dbconnect.php");
if (isset($_POST['table_selected']))
{
    $selected_table = $_POST['tables_list'];
    global $pdo;

    $stmt = $pdo->query("SELECT * FROM $selected_table");
    //$colcount = $stmt->columnCount(); // Кол-во столбцов в таблице
    //$rows = $stmt->rowCount(); // Кол-во строк в таблице
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo("<form method='POST' action=''>");
    if ($selected_table == "posts")
    {
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
    }
    if ($selected_table == "users")
    {
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
    }
    echo("<p><input type='submit' name='delete_rows' class='del_submit' value='Удалить'/></p>");
    echo("</form>");

    //header("Location: ".$_SERVER['HTTP_REFERER']);
}
$selected_table = $_POST['tables_list'];
include("script_delete.php");
exit();
?>