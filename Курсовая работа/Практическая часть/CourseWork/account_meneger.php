<html>
    <head>
        <title>Управление аккаунтами</title>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
        <script src="https://kit.fontawesome.com/80ffbef846.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        session_start();
        require_once ("DB.php");

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
                    <img src='img/icon.png'> Система учета вызовов скорой медицинской помощи
                </div>
                <form action='exit.php'>
                ".$row['user_fam']. " ".$row['user_nam']."
                    <input type='submit' value='ВЫЙТИ'>
                </form> 
            </section>";

        echo "<form action='main.php'>
        <input type='submit' value='Назад'>
        </form>";
        $user_info = "SELECT * FROM user WHERE user_id <> '$user_id'";
        require_once("table_acc.php");

        echo "<form action='create_user.php'>
        <input type='submit' value='Создать аккаунт'>
        </form>";
        ?>
    </body>
</html>