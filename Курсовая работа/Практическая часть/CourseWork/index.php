<html>
    <head>
        <title>Вход</title>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
        <script src="https://kit.fontawesome.com/80ffbef846.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <section class="shapka">
        <div>
            <img src="img/icon.png"> Система учета вызовов скорой медицинской помощи
        </div>
    </section>
    <?php
    session_start();
    $try_login = $_SESSION["try_login"];
    session_destroy();
        require_once ("DB.php");
        echo "<section class='index_main'>
            <div class='index_main_img'>
                <img src='img/icon.png'>";
            if ($try_login == true) {
                echo "</div>
                <div class='try_is_true_p'><p>неправильный логин или пароль</p></div>
                <div class='index_main_form'>
                    <form action='index_reg.php' method='post' class='try_is_true'>";
            }
            else{
                echo "</div>
                <div class='index_main_form'>
                <form action='index_reg.php' method='post'>";
            }
            echo "
                    <input name='login' required type='text' placeholder='Логин' style='margin-left: 0px'><br>
                    <input name='password' required type='password' placeholder='Пароль' style='margin-left: 0px'><br>
                    <div class='index_main_sub'>
                        <input type='submit' value='ВОЙТИ' style='margin-left: 0px'>
                    </div>
                </form>
            </div>
            </section>";
    ?>
    </body>
</html>