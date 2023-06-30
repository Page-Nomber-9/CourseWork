<html>
    <head>
        <title>Создание записи</title>
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
            </form>
            <h1>ЖУРНАЛ</h1>";
        echo "
        <form action='create_process.php' method='post'>
            <p>Дата поступления вызова</p>
            <input name='call_date_incoming' type='date'>
            <p>Время приема вызова</p>
            <input name='call_time_receiving' type='time'>
            <p>Время передачи вызова бригаде СМП</p>
            <input name='call_time_transfer' type='time'>
            <p>ФИО больного</p>
            <input name='sick_fam' type='text' placeholder='Фамилия'>
            <input name='sick_nam' type='text' placeholder='Имя'>
            <input name='sick_otch' type='text' placeholder='Отчество'>
            <p>Возраст</p>
            <input name='sick_age' type='text'>
            <p>Адрес</p>
            <input name='sick_address_sity' type='text' placeholder='Населенный пункт'>
            <input name='sick_address_street' type='text' placeholder='Улица'>
            <input name='sick_address_house' type='text' placeholder='Дом'>
            <input name='sick_address_flat' type='text' placeholder='Квартира'>
            <p>По какому поводу поступил вызов</p>
            <input type='text' name='call_reason' >
            <p>Фамилия и телефон вызывающего бригаду СМП</p>
            <input name='caller_fam' type='text' placeholder='Фамилия'>
            <input name='caller_phone' type='text' placeholder='Номер телефона'>
            <p>Оказанная помощь</p>
            <input  type='text' name='dep_help_in_site' placeholder='на месте'></input>
            <input  type='text' name='dep_help_in_car' placeholder='в машине'></input>
            <p>Куда направлен</p>
            <input  type='text' name='sick_where_sent'>
            <p>ФИО врача (фельдшера), оказавшего скорую медицинскую помощь</p>
            <input type='text' name='dep_doc_fam' >
            <input type='text' name='dep_doc_nam' >
            <input type='text' name='dep_doc_otch' >
            <p>Диагноз</p>
            <input  type='text' name='sick_diagnos'>
            <p>Состав бригады СМП</p>
            <input type='checkbox' name='doctor' value='1'> Доктор
            <input type='radio' name='paramedic' value='1'> 1 фельдшер
            <input type='radio' name='paramedic' value='2'> 2 фельдшера
            <input type='checkbox' name='attendant' value='1'> Санитар
            <input type='checkbox' name='driver' value='1'> Водитель
            <p>Время выезда бригады СМП</p>
            <input  type='time' name='dep_time'>
            <p>Время окончания вызова бригады СМП</p>
            <input  type='time' name='call_time_end'>
            <p>Сколько времени затрачено на вызов</p>
            <input  type='time' name='call_time_spent'>
            <p>Время доезда до места вызова</p>
            <input type='time' name='call_time_arrival'>
            <p>Через сколько минут автомобиль СМП выехал на вызов</p>
            <input  type='text' name='dep_col_min'>
            <br>
            <input type='submit' value='Отправить'>
        </form>"
        ?>
    </body>
</html>