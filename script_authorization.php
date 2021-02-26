<?php
include ('dbconnect.php');
if (isset($_POST['enter_auth']) == true && isset($_POST['login_auth']) && isset($_POST['password_auth'])) {

    $login_auth = $_POST['login_auth'];
    $password_auth = $_POST['password_auth'];

    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE login=:login_auth");
    $stmt->execute(['login_auth' => $login_auth]);
    $data_aut = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $password = $data_aut[0]['password']; // Хэш с бд
    $chek = password_verify($password_auth, $password);

    if ($chek == true and $data_aut[0]['login'] == $login_auth)
    {
        $type = $data_aut[0]['type'];
        session_start();
        $_SESSION["is_auth"] = true;
        $_SESSION["login"] = $login_auth;
        $_SESSION["type"] = $type;
        //$_SESSION["password"] = $password_auth;
        header("Location: index.php");
        exit();
    }
    else
    {
        session_start();
        $_SESSION["is_auth"] = false;
        $_SESSION["error_auth"] = "Неправильный логин или пароль";
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }
}