<html>
    <head>
        <title>Создание аккаунта</title>
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
            </section>
            <form action='account_meneger.php'>
                <input type='submit' value='НАЗАД'>
        </form>";

        echo "<form  action='create_user_process.php' method='post'>
                <p>email пользователя</p>
                <input type='text' name='user_email' placeholder='rrr@bk.ru'>
                
                <p>пароль пользователя</p>
                <input type='text' name='user_password' placeholder='пароль'>

                <p>тип пользователя</p>
                <input type='text' name='user_type' placeholder='0 или 1'>

                <p>фамилия пользователя</p>
                <input type='text' name='user_fam' placeholder='Иванов'>

                <p>имя пользователя</p>
                <input type='text' name='user_nam' placeholder='Иван'>

                <p>отчество пользователя</p>
                <input type='text' name='user_otch' placeholder='Иванович'><br>

                <input type='submit'>
            </form>";
        ?>
    </body>
</html>