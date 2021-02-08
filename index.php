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
        .form {
            border: solid 2px black;
            margin: auto;
        }
    </style>
</head>

<body>
<div class="form">
    <form method="POST" action="">
        <input name="name" type="text" placeholder="Имя"/>
        <input name="text" type="text" placeholder="Текст"/>
        <input type="submit" value="Отправить"/>
    </form>
</div>
<div class="main">
    <?php
    global $pdo;
    $result = $pdo->query("SELECT * FROM posts");
    $count = $result->rowCount();
    for ($q = 1; $q <= $count; $q++)
    {
        include ('post.php');
    }
    ?>
</div>
</body>
</html>