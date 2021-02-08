<?php
if (($_POST['enter']) == true && isset($_POST['author']) && isset($_POST['title']) && isset($_POST['content'])) {
    $author = $_POST['author'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    echo 2;

    $_POST['enter'] = false;
}
