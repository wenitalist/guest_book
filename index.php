<?php
    include ('dbconnect.php');
    include ('add.php');
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
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
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
        .form_div {
            border: solid 2px black;
            margin: auto;
            width: 800px;
        }
        .form {
            margin-left: 3px;
            margin-top: 3px;
            margin-bottom: 5px;
        }
        .np {
            margin-left: 3px;
            margin-top: 3px;
            margin-bottom: 3px;
        }
        .textarea {
            resize: none;
            margin-left: 3px;
            margin-top: 3px;
            margin-bottom: 3px;
            font-size:20px;
            height: 200px;
            width: 784px;
        }
        .submit {
            margin: 3px;
            text-align: right;
        }
    </style>
</head>

<body>
<div class="form_div">
    <h1 class="np">Оставить запись</h1>
    <hr>
    <form method="POST" action="" class="form">
        <p class="np"><input name="author" type="text" maxlength="15" required placeholder="Ваше имя"/>
            <input name="title" type="text" maxlength="30" required placeholder="Заголовок темы"/></p>
        <textarea name="content" class="textarea" maxlength="100" required placeholder="Описание"></textarea>
        <p class="submit"><input type="submit" name="enter" required value="Опубликовать"/></p>
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