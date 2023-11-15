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

        if (!isset($_SESSION["id"])) {
            $new_url = "http://coursework";
            header('location: '.$new_url);
        }

        $id = $_SESSION["del_id"];

        $call_smp = "DELETE FROM call_smp WHERE (call_id = '$id');";
        $caller_smp = "DELETE FROM caller_smp WHERE (id_caller = '$id');";
        $departure = "DELETE FROM departure WHERE (id_dep = '$id');";
        $sick = "DELETE FROM sick WHERE (sick_id = '$id');";
        $brigade = "DELETE FROM smp_brigade WHERE (smp_brigade_id = '$id');";

        $f = true;

        $call_smp_result = mysqli_query($connect, $call_smp);
        if (!$call_smp_result) {
            echo "Ошибка: удаление информации о вызове (" .mysqli_error($connect). ")<br>";
            $f = false;
        }


        $caller_smp_result = mysqli_query($connect, $caller_smp);
        if (!$caller_smp_result) {
            echo "Ошибка: удаление информации о вызывающем (" .mysqli_error($connect). ")<br>";
            $f = false;
        }

        $departure_result = mysqli_query($connect, $departure);
        if (!$departure_result) {
            echo "Ошибка: удаление информации о выезде (" .mysqli_error($connect). ")<br>";
            $f = false;
        }

        $sick_result = mysqli_query($connect, $sick);
        if (!$sick_result) {
            echo "Ошибка: удаление информации о больном (" .mysqli_error($connect). ")<br>";
            $f = false;
        }

        $brigade_result = mysqli_query($connect, $brigade);
        if (!$brigade_result) {
            echo "Ошибка: удаление информации о составе бригады (" .mysqli_error($connect). ")<br>";
            $f = false;
        }

        if ($f) {
            $new_url = "../main.php";
            header('location: '.$new_url);
        }
        echo $f;
    ?>
    </body>
</html>