<?php
session_start();
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
            width: auto;
        }
        .enter {
            text-align: center;
        }
        .reg {
            text-align: center;
            margin-top: 1%;
        }
        .auth_error {
            color: red;
            margin: auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <form method="POST" action="/script_authorization.php" class="main">
        <h1 class="field">Авторизация</h1>
        <p class="field"><input name="login_auth" type="text" maxlength="15" required placeholder="Имя пользователя"/></p>
        <p class="field"><input name="password_auth" type="password" maxlength="15" required placeholder="Пароль"/></p>
        <?php
        if ($_SESSION["auth_status"] == "no") {echo("<p class='auth_error'>Неправильный логин или пароль</p>"); $_SESSION["auth_status"] = "";}
        ?>
        <p class="enter"><input type="submit" name="enter_auth" class="submit" required value="Войти"/></p>
    </form>
    <div class="reg">
        <a href="registration.php">Зарегистрироваться</a>--<a href="index.php">Вернуться на главную</a>
    </div>
</body>
</html>