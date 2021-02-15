<?php
if (isset($_POST['table_selected']))
{
    $selected_table = $_POST['tables_list'];
    echo $selected_table;

    //header("Location: ".$_SERVER['HTTP_REFERER']);
    //exit();
}