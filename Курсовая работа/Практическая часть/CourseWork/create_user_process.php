<?php
    session_start();
                
    $user_id = $_SESSION["id"];
    if (!isset($_SESSION["id"])) {
        $new_url = "http://coursework";
        header('location: '.$new_url);
    }

require_once("DB.php");
$user_email = $_POST["user_email"];
$user_password = $_POST["user_password"];
$user_type = $_POST["user_type"];
$user_fam = $_POST["user_fam"];
$user_nam = $_POST["user_nam"];
$user_otch = $_POST["user_otch"];

$link = "INSERT INTO user (user_email, user_password, user_type, user_fam, user_nam, user_otch)
    VALUES ('$user_email', '$user_password', '$user_type', '$user_fam', '$user_nam', '$user_otch');";

$result = mysqli_query($connect, $link);

if (!$result) {
    echo "Ошибка записи данных (" .mysqli_error($connect). ")<br>";
}
else {
    $new_url = "account_meneger.php";
    header('location: '.$new_url);
}
?>