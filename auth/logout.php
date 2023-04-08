<?php

    header("location: ../form-login-adm.php");

    session_start();
    unset($_SESSION['user_vol']);
    unset($_SESSION['user_inst']);
    session_destroy();

?>