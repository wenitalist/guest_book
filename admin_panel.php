<?php
?>
<style>
    .admin_panel {
        border: solid 1px black;
        width:200px;
        position: absolute;
        right: 10px;
        top: 4%;
        text-align: center;
    }
    .h3 {
        margin-top: 1%;
        margin-bottom: 1%
    }
    .hr {
        margin-top: 2%;
        margin-bottom: 2%;
    }
    .form {
        margin: auto;
    }
    .p {
        margin: 3%;
    }
    .input {
        width: 100%;
    }
</style>
<div class="admin_panel">
        <h3 class="h3">Админ панель</h3>
        <hr class="hr">
        <form class="form">
            <p class="p"><input type="submit" class="input" name="enter" required value="Удалить запись"/></p>
        </form>
</div>