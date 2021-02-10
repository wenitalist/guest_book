<?php
include ('dbconnect.php');
if (isset($_POST['enter_auth']) == true && isset($_POST['login']) && isset($_POST['password'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];

    global $pdo;
    $stmt = $pdo->query("SELECT * FROM users WHERE login='$login' AND password='$password'");
    $data_aut = $stmt->fetchAll();
    if ($data_aut == true)
    {
        $type = $data_aut[0]->type; // Хранит тип пользователя
        session_start();
        $_SESSION["is_auth"] = true;
        $_SESSION["login"] = $login;
        $_SESSION["type"] = $type;
        //$_SESSION["password"] = $password;
    }
    else
    {
        $_SESSION["is_auth"] = false;
        echo ("Неверный логин или пароль");
    }

    header("Location: http://wenitalist.local/index.php");
    exit();
}