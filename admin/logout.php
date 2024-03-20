<?php

session_start();
session_destroy();
session_abort();
session_unset();
    $_SESSION = [];

header("location: login.php");
 
?>