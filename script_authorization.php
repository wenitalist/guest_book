<?php
include ('dbconnect.php');
if (isset($_POST['enter_auth']) == true && isset($_POST['login_auth']) && isset($_POST['password_auth'])) {

    $login_auth = $_POST['login_auth'];
    $password_auth = $_POST['password_auth'];

    global $pdo;
    $stmt = $pdo->query("SELECT * FROM users WHERE login='$login_auth' AND password='$password_auth'");
    $data_aut = $stmt->fetchAll();
    if ($data_aut == true)
    {
        $type = $data_aut[0]->type;
        session_start();
        $_SESSION["is_auth"] = true;
        $_SESSION["login"] = $login_auth;
        $_SESSION["type"] = $type;
        //$_SESSION["password"] = $password_auth;
    }
    else
    {
        $_SESSION["is_auth"] = false;
        echo ("Неверный логин или пароль");
    }

    header("Location: http://wenitalist.local/index.php");
    exit();
}