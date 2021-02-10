<?php
include("script_authorization.php");

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Авторизация</title>
    <style>
        .main {
            border: solid 2px black;
            width: 15%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 15%;
        }
        .field {
            margin: 5px;
            text-align: center;
        }
        .submit {
            width: 100px;
        }
        .enter {
            text-align: center;
        }
        .reg {
            text-align: center;
            margin-top: 1%;
        }
    </style>
</head>
<body>
    <form method="POST" action="" class="main">
        <h1 class="field">Авторизация</h1>
        <p class="field"><input name="login" type="text" maxlength="15" required placeholder="Имя пользователя"/></p>
        <p class="field"><input name="password" type="password" maxlength="15" required placeholder="Пароль"/></p>
        <p class="enter"><input type="submit" name="enter_auth" class="submit" required value="Войти"/></p>
    </form>
    <div class="reg">
        <a href="registration.php">Зарегистрироваться</a>--<a href="index.php">Вернуться на главную</a>
    </div>
</body>
</html>