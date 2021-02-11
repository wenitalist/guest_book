<?php
include ('dbconnect.php');
if (isset($_POST['enter']) == true && isset($_POST['title']) && isset($_POST['content'])) {
    $author = $_SESSION['login'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date("Y-m-d");
    $table = "posts";

    global $pdo;
    $pdo->exec("set names utf8");
    $data = array( 'title' => $title, 'content' => $content, 'date' => $date, 'author' => $author);
    $query = $pdo->prepare("INSERT INTO $table (title, content, date_of_public, author) VALUES (:title, :content, :date, :author)");
    $query->execute($data);

    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}
