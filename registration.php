<?php
include("script_registration.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Регистрация</title>
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
            width: auto;
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
        <h1 class="field">Регистрация</h1>
        <p class="field"><input pattern="^[0-9a-z]+$" name="login_reg" type="text" maxlength="15" required placeholder="Имя пользователя"/></p>
        <p class="field"><input pattern="^[0-9a-z]+$" name="password_reg" type="password" maxlength="15" required placeholder="Пароль"/></p>
        <p class="enter"><input type="submit" name="enter_reg" class="submit" required value="Зарегистрироваться"/></p>
    </form>
    <div class="reg">
        <a href="authorization.php">Авторизироваться</a>--<a href="index.php">Вернуться на главную</a>
    </div>
</body>
</html>