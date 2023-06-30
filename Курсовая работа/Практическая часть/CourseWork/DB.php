<?php
$localhost = "localhost";
$db = "SMP";
$user = "root";
$password = "";
$connect = new mysqli($localhost, $user, $password);
if (!$connect){
    echo "Подключение к серверу не удалось";
}
$connect_db = mysqli_select_db($connect, $db);
if (!$connect_db){
    echo "Подключение к базе данных не удалось не удалось";
}
?>