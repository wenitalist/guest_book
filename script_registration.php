<?php
include ('dbconnect.php');
if (isset($_POST['enter_reg']) == true && isset($_POST['login_reg']) && isset($_POST['password_reg'])) {

    $login_reg = $_POST['login_reg']; // Логин который ввели при регистрации
    $password_reg = $_POST['password_reg'];
    $type_reg = "user";
    $table_reg = "users";

    global $pdo;
    $chek = $pdo->query("SELECT * FROM users");
    $chek->execute();
    $data_chek = $chek->fetchAll(PDO::FETCH_ASSOC);

    foreach($data_chek as $row) // Проверка на логин, не занят ли
    {
        $login_db = $row['login'];
        if ($login_reg == $login_db)
        {
            header("Location: ".$_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    $hash_pass = password_hash($password_reg, PASSWORD_BCRYPT);

    $pdo->exec("set names utf8");
    $data = array( 'login' => $login_reg, 'password' => $hash_pass, 'type' => $type_reg);
    $query = $pdo->prepare("INSERT INTO $table_reg (login, password, type) VALUES (:login, :password, :type)");
    $query->execute($data);

    header("Location: index.php");
    exit();
}