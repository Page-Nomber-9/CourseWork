<?php
            require_once ("main/DB.php");
            session_start();
            $_SESSION["try_login"] = true;
            $login = $_POST['login'];
            $password = $_POST['password'];
                $link = "SELECT * FROM user
                        where user_email = '$login' and user_password = '$password';";
                $result = mysqli_query($connect, $link);
                $row = $result -> fetch_assoc();
                if ($row["user_email"] != null) {
                    
                    $_SESSION["id"] = $row["user_id"];
                    $_SESSION["type"] = $row["user_type"];
                    $new_url = "http://coursework/main/main.php";
                    header('location: '.$new_url);
                }
                else{
                    $new_url = "http://coursework/index.php";
                    header('location: '.$new_url);
                }
?>