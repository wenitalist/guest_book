<style>
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
    .a {
        padding-right: 1%;
        color: green;
    }
</style>
<div class="form_div">
    <h1 class="np">Оставить запись</h1>
    <hr>
    <form method="POST" action="/script_add.php" class="form">
        <p class="np"><input name="title" type="text" maxlength="30" required placeholder="Заголовок темы"/></p>
        <textarea name="content" class="textarea" maxlength="100" required placeholder="Описание"></textarea>
        <p class="submit">
            <a class="a">
                <?php if ($_SESSION["add_status"] == "yes") { echo("Запись успешно добавлена"); $_SESSION["add_status"] = "";} ?>
            </a><input type="submit" name="enter" required value="Опубликовать"/>
        </p>
    </form>
</div>