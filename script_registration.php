<?php
include ('dbconnect.php');
if (isset($_POST['enter_reg']) == true && isset($_POST['login_reg']) && isset($_POST['password_reg'])) {

    $login_reg = $_POST['login_reg'];
    $password_reg = $_POST['password_reg'];
    $type_reg = "user";
    $table_reg = "users";

    global $pdo;
    $pdo->exec("set names utf8");
    $data = array( 'login' => $login_reg, 'password' => $password_reg, 'type' => $type_reg);
    $query = $pdo->prepare("INSERT INTO $table_reg (login, password, type) VALUES (:login, :password, :type)");
    $query->execute($data);

    header("Location: http://wenitalist.local/index.php");
    exit();
}