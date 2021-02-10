<?php
include ('dbconnect.php');

global $pdo;
$query = "CREATE TABLE IF NOT EXISTS posts (
    id int(11) NOT NULL AUTO_INCREMENT,
    title varchar(30) DEFAULT NULL,
    content varchar(100) DEFAULT NULL,
    date_of_public DATE DEFAULT NULL,
    author varchar(15) DEFAULT NULL,
    PRIMARY KEY(id)
    )";
$pdo->exec($query);