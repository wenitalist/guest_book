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
<?php
    $id = 0;
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM posts WHERE id = 1');
    $data = $stmt->fetchAll();
    echo($data[0]->title);
?>
</body>
</html>