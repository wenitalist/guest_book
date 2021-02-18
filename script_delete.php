<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include("dbconnect.php");
$c_mass = $_POST['checkbox_mass'];
$name_t = $_POST['selected_table']; // Имя нужной таблицы
if(empty($c_mass))
{
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
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}