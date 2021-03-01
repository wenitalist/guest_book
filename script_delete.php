<?php
session_start();
if ($_SESSION["is_auth"] == true && $_SESSION["type"] == "admin")
{
    include("dbconnect.php");
    $c_mass = $_POST['checkbox_mass'];
    $name_t = $_POST['selected_table']; // Имя нужной таблицы
    if(empty($c_mass))
    {
        $_SESSION["delete_status"] = "no";
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }
    else
    {
        if ($name_t == "posts" or $name_t == "users")
        {
            foreach ($c_mass as $row)
            {
                global $pdo;
                $query = $pdo->prepare("DELETE FROM $name_t WHERE id=:id");
                $query->execute(array("id" => $row));
            }
        }
        $_SESSION["delete_status"] = "yes";
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }
}