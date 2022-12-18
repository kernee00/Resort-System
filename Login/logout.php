<?php
    session_start();


    session_destroy();

    header('Location: loginV2.php');


?>