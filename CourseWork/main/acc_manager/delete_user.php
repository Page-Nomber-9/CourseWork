<html>
    <head>
        <title>Удаление</title>
        <link rel="stylesheet" href="../../style/style.css">
        <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
        <script src="https://kit.fontawesome.com/80ffbef846.js" crossorigin="anonymous"></script>
    </head>
    <body>
<?php
        session_start();
        require_once ("../DB.php");

        $user_id = $_SESSION["id"];
        if (!isset($_SESSION["id"])) {
            $new_url = "http://coursework";
            header('location: '.$new_url);
        }

        $link = "SELECT * FROM user where user_id = '$user_id';";
        $result = mysqli_query($connect, $link);
        $row = $result -> fetch_assoc();
        echo "<section class='shapka'>
                <div>
                    <img src='../../img/icon.png'> Система учета вызовов скорой медицинской помощи
                </div>
                <form action='../exit.php'>
                ".$row['user_fam']. " ".$row['user_nam']."
                    <input type='submit' value='ВЫЙТИ'>
                </form> 
            </section>";

        $id = 1;
        while (!isset($_POST[$id])) {
            $id++;
        }
        $link = "SELECT * FROM user WHERE user_id = '$id'";
        $result = mysqli_query($connect, $link);
        if (!$result) {
            echo "Ошибка: ".mysqli_error($connect). ")<br>";
        }
        else{
            $row = $result -> fetch_assoc();
        }
        $_SESSION["id_user_del"] = $id;
        echo "Вы хотите удалить пользователя ".$row["user_email"]."?";
        echo "<form action='delete_user_process.php'>
            <input type='submit' value='Удалить'>
            </form>";
        echo "<form action='account_meneger.php'>
            <input type='submit' value='Отмена'>
            </form>";
?>
    </body>
</html>