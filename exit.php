<?php
    if (isset($_GET["is_exit"]))
    {
        if ($_GET["is_exit"] == 1)
        {
                $_SESSION = array();
                session_destroy();
                session_start();
                $_SESSION["is_auth"] = false;
                header("Location: ?is_exit=0");
                exit();
        }
    }