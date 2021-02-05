<?php
    include ('dbconnect.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>guest_book</title>
    <style>
        .main {
            border: solid 2px black;
            width: 800px;
            margin: auto;
        }
        .addl {
            border: 4px double blue;
            margin: 3px;
        }
        .text {
            margin: 3px;
        }
        .date {
            text-align: right;
            margin-right: 3px;
            margin-top: 1px;
            margin-bottom: 6px;
        }
    </style>
</head>

<body>
<div class="main">
    <div class="addl">
        <h2 class="text">
            <?php
            global $pdo;
            $stmt = $pdo->query('SELECT title FROM posts WHERE id = 1');
            $data = $stmt->fetchAll();
            echo($data[0]->title);
            ?>
        </h2>
        <hr>
        <p class="text">
            <?php
            global $pdo;
            $stmt = $pdo->query('SELECT content FROM posts WHERE id = 1');
            $data = $stmt->fetchAll();
            echo($data[0]->content);
            ?>
        </p>
        <hr>
        <p class="date">
            <?php
            global $pdo;
            $stmt = $pdo->query('SELECT author, date_of_public FROM posts WHERE id = 1');
            $data = $stmt->fetchAll();
            $str_aut = ($data[0]->author);
            $str_aut .= " - ";
            $str_date = ($data[0]->date_of_public);
            $str_aut .= $str_date;
            echo($str_aut);
            ?>
        </p>
    </div>
</div>
</body>
</html>