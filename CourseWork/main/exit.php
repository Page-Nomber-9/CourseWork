<?php
    session_start();
    $_SESSION["try_login"] = false;
    $new_url = "http://coursework/index.php";
    header('location: '.$new_url);
?>