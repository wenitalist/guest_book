<?php
    if (isset($_GET["is_exit"]))
    {
        if ($_GET["is_exit"] == 1)
        {
                $_SESSION = array();
                session_destroy();
                header("Location: ?is_exit=0");
                exit();
        }
    }