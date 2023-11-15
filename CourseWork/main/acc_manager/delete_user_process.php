<?php
        session_start();
        require_once ("../DB.php");

        if (!isset($_SESSION["id"])) {
            $new_url = "http://coursework";
            header('location: '.$new_url);
        }

        $id = $_SESSION["id_user_del"];

        $link = "DELETE FROM user WHERE (user_id = '$id');";

        $result = mysqli_query($connect, $link);
        if (!$result) {
            echo "Ошибка: удаление информации (" .mysqli_error($connect). ")<br>";
        }
        else{
            $new_url = "account_meneger.php";
            header('location: '.$new_url);
        }
?>