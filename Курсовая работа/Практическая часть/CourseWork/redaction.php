<html>
    <head>
        <title>Редактирование</title>
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
            <form action='main.php'>
                <input type='submit' value='НАЗАД'>
            </form>";

        $id = 1;
        while (!isset($_POST[$id])) {
            $id++;
        }
        echo $id;

        $_SESSION["red_id"] = $id;

        $call_smp = "SELECT * FROM call_smp WHERE call_id = '$id';";
        $caller_smp = "SELECT * FROM caller_smp WHERE id_caller = '$id';";
        $departure = "SELECT * FROM departure WHERE id_dep = '$id';";
        $sick = "SELECT * FROM sick WHERE sick_id = '$id';";
        $brigade = "SELECT * FROM smp_brigade WHERE smp_brigade_id = '$id';";

        $call_smp_result = mysqli_query($connect, $call_smp);
        if (!$call_smp_result) {
            echo "Ошибка: сведения о вызове (" .mysqli_error($connect). ")<br>";
        }
        else{
            $row_call_smp = $call_smp_result -> fetch_assoc();
        }
        
        $caller_smp_result = mysqli_query($connect, $caller_smp);
        if (!$caller_smp_result) {
            echo "Ошибка: сведения о вызывающем (" .mysqli_error($connect). ")<br>";
        }
        else{
            $row_caller_smp = $caller_smp_result -> fetch_assoc();
        }
        
        $departure_result = mysqli_query($connect, $departure);
        if (!$departure_result) {
            echo "Ошибка: сведения о выезде (" .mysqli_error($connect). ")<br>";
        }
        else{
            $row_departure = $departure_result -> fetch_assoc();
        }
        
        $sick_result = mysqli_query($connect, $sick);
        if (!$sick_result) {
            echo "Ошибка: сведения о больном (" .mysqli_error($connect). ")<br>";
        }
        else{
            $row_sick = $sick_result -> fetch_assoc();
        }
        
        $brigade_result = mysqli_query($connect, $brigade);
        if (!$brigade_result) {
            echo "Ошибка: сведения о составе бригады (" .mysqli_error($connect). ")<br>";
        }
        else{
            $row_brigade = $brigade_result -> fetch_assoc();
        }

        echo "
        <form action='radaction_process.php' method='post'>
            <p>Дата поступления вызова</p>
            <input name='call_date_incoming' type='date' value='".$row_call_smp["call_date_incoming"]."'>
            <p>Время приема вызова</p>
            <input name='call_time_receiving' type='time' value='".$row_call_smp["call_time_receiving"]."'>
            <p>Время передачи вызова бригаде СМП</p>
            <input name='call_time_transfer' type='time' value='".$row_call_smp["call_time_transfer"]."'>
            <p>ФИО больного</p>
            <input name='sick_fam' type='text' placeholder='Фамилия' value='".$row_sick["sick_fam"]."'>
            <input name='sick_nam' type='text' placeholder='Имя' value='".$row_sick["sick_nam"]."'>
            <input name='sick_otch' type='text' placeholder='Отчество' value='".$row_sick["sick_otch"]."'>
            <p>Возраст</p>
            <input name='sick_age' type='text' value='".$row_sick["sick_age"]."'>
            <p>Адрес</p>
            <input name='sick_address_sity' type='text' placeholder='Населенный пункт' value='".$row_sick["sick_address_sity"]."'>
            <input name='sick_address_street' type='text' placeholder='Улица' value='".$row_sick["sick_address_street"]."'>
            <input name='sick_address_house' type='text' placeholder='Дом' value='".$row_sick["sick_address_home"]."'>
            <input name='sick_address_flat' type='text' placeholder='Квартира' value='".$row_sick["sick_address_flat"]."'>
            <p>По какому поводу поступил вызов</p>
            <input type='text' name='call_reason' value='".$row_call_smp["call_reason"]."'>
            <p>Фамилия и телефон вызывающего бригаду СМП</p>
            <input name='caller_fam' type='text' placeholder='Фамилия' value='".$row_caller_smp["caller_fam"]."'>
            <input name='caller_phone' type='text' placeholder='Номер телефона' value='".$row_caller_smp["caller_phone"]."'>
            <p>Оказанная помощь</p>
            <input  type='text' name='dep_help_in_site' placeholder='на месте' value='".$row_departure["dep_help_in_site"]."'>
            <input  type='text' name='dep_help_in_car' placeholder='в машине' value='".$row_departure["dep_help_in_car"]."'>
            <p>Куда направлен</p>
            <input  type='text' name='sick_where_sent' value='".$row_sick["sick_where_sent"]."'>
            <p>ФИО врача (фельдшера), оказавшего скорую медицинскую помощь</p>
            <input type='text' name='dep_doc_fam' value='".$row_departure["dep_doc_fam"]."'>
            <input type='text' name='dep_doc_nam' value='".$row_departure["dep_doc_nam"]."'>
            <input type='text' name='dep_doc_otch' value='".$row_departure["dep_doc_otch"]."'>
            <p>Диагноз</p>
            <input  type='text' name='sick_diagnos' value='".$row_sick["sick_diagnos"]."'>
            <p>Состав бригады СМП</p>";
            if ($row_brigade["doctor"] == 1) {
                echo "
                <input type='checkbox' name='doctor' value='1' checked='checked'> Доктор";
            }
            else {
                echo "
                <input type='checkbox' name='doctor' value='1'> Доктор";
            }
            
            if ($row_brigade["paramedic"] == 1) {
                echo "
                <input type='radio' name='paramedic' value='1' checked='checked'> 1 фельдшер
                <input type='radio' name='paramedic' value='2'> 2 фельдшера";
            }
            else {
                if ($row_brigade["paramedic"] == 2) {
                echo "
                <input type='radio' name='paramedic' value='1'> 1 фельдшер
                <input type='radio' name='paramedic' value='2' checked='checked'> 2 фельдшера";
                }
                else{
                    echo "
                    <input type='radio' name='paramedic' value='1'> 1 фельдшер
                    <input type='radio' name='paramedic' value='2'> 2 фельдшера";
                }
            }

            if ($row_brigade["attendant"] == 1) {
                echo "
                <input type='checkbox' name='attendant' value='1' checked='checked'> Санитар";
            }
            else {
                echo "
                <input type='checkbox' name='attendant' value='1'> Санитар";
            }

            if ($row_brigade["driver"] == 1) {
                echo "
                <input type='checkbox' name='driver' value='1' checked='checked'> Водитель";
            }
            else {
                echo "
                <input type='checkbox' name='driver' value='1'> Водитель";
            }

            echo "
            <p>Время выезда бригады СМП</p>
            <input  type='time' name='dep_time' value='".$row_departure["dep_time"]."'>
            <p>Время окончания вызова бригады СМП</p>
            <input  type='time' name='call_time_end' value='".$row_call_smp["call_time_end"]."'>
            <p>Сколько времени затрачено на вызов</p>
            <input  type='time' name='call_time_spent' value='".$row_call_smp["call_time_spent"]."'>
            <p>Время доезда до места вызова</p>
            <input type='time' name='call_time_arrival' value='".$row_call_smp["call_time_arrival"]."'>
            <p>Через сколько минут автомобиль СМП выехал на вызов</p>
            <input  type='text' name='dep_col_min' value='".$row_departure["dep_col_min"]."'>
            <br>
            <input type='submit' value='Отправить'>
        </form>"
    ?>
    </body>
</html>