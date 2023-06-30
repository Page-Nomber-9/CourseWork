<?php
    session_start();
        
    $user_id = $_SESSION["id"];
    if (!isset($_SESSION["id"])) {
        $new_url = "http://coursework";
         header('location: '.$new_url);
    }
    require_once("DB.php");

    $call_date_incoming = $_POST['call_date_incoming'];
    $call_time_receiving = $_POST['call_time_receiving'];
    $call_time_transfer = $_POST['call_time_transfer'];
    $sick_fam = $_POST['sick_fam'];
    $sick_nam = $_POST['sick_nam'];
    $sick_otch = $_POST['sick_otch'];
    $sick_age = $_POST['sick_age'];
    $sick_address_sity = $_POST['sick_address_sity'];
    $sick_address_street = $_POST['sick_address_street'];
    $sick_address_house = $_POST['sick_address_house'];
    $sick_address_flat = $_POST['sick_address_flat'];
    $call_reason = $_POST['call_reason'];
    $caller_fam = $_POST['caller_fam'];
    $caller_phone = $_POST['caller_phone'];
    $dep_help_in_site = $_POST['dep_help_in_site'];
    $dep_help_in_car = $_POST['dep_help_in_car'];
    $sick_where_sent = $_POST['sick_where_sent'];
    $dep_doc_fam = $_POST['dep_doc_fam'];
    $dep_doc_nam = $_POST['dep_doc_nam'];
    $dep_doc_otch = $_POST['dep_doc_otch'];
    $brigade_doctor = $_POST['doctor'] ?? 0;
    $brigade_paramedic = $_POST['paramedic'] ?? 0;
    $brigade_attendant = $_POST['attendant'] ?? 0;
    $brigade_driver = $_POST['driver'] ?? 0;
    $dep_time = $_POST['dep_time'];
    $call_time_end = $_POST['call_time_end'];
    $call_time_spent = $_POST['call_time_spent'];
    $call_time_arrival = $_POST['call_time_arrival'];
    $sick_diagnos = $_POST['sick_diagnos'];
    $dep_col_min = $_POST['dep_col_min'];
    $f = true;

    $brigade = "INSERT INTO smp_brigade (doctor, paramedic, attendant, driver)
    VALUES ('$brigade_doctor', '$brigade_paramedic', '$brigade_attendant', '$brigade_driver');";


    $call_smp = "INSERT INTO call_smp (call_date_incoming, call_time_receiving, call_time_transfer, call_reason,
    call_time_end, call_time_spent, call_time_arrival)
    VALUES ('$call_date_incoming', '$call_time_receiving', '$call_time_transfer', '$call_reason', '$call_time_end',
    '$call_time_spent', '$call_time_arrival');";


    $caller_smp = "INSERT INTO caller_smp (caller_fam, caller_phone)
    VALUES ('$caller_fam', '$caller_phone');";


    $departure = "INSERT INTO departure (dep_help_in_site, dep_help_in_car, dep_doc_fam, dep_doc_nam,
    dep_doc_otch, dep_time, dep_col_min)
    VALUES ('$dep_help_in_site', '$dep_help_in_car', '$dep_doc_fam', '$dep_doc_nam', '$dep_doc_otch',
    '$dep_time', '$dep_col_min');";


    $sick = "INSERT INTO sick (sick_age, sick_address_sity, sick_address_street, sick_address_home,
    sick_address_flat, sick_fam, sick_nam, sick_otch, sick_where_sent, sick_diagnos)
    VALUES ('$sick_age', '$sick_address_sity', '$sick_address_street', '$sick_address_house', '$sick_address_flat',
    '$sick_fam', '$sick_nam', '$sick_otch', '$sick_where_sent', '$sick_diagnos');";

        $call_smp_result = mysqli_query($connect, $call_smp);
        if (!$call_smp_result) {
            echo "Ошибка: сведения о вызове (" .mysqli_error($connect). ")<br>";
            $f = false;
        }
        
        $caller_smp_result = mysqli_query($connect, $caller_smp);
        if (!$caller_smp_result) {
            echo "Ошибка: сведения о вызывающем (" .mysqli_error($connect). ")<br>";
            $f = false;
        }
        
        $departure_result = mysqli_query($connect, $departure);
        if (!$departure_result) {
            echo "Ошибка: сведения о выезде (" .mysqli_error($connect). ")<br>";
            $f = false;
        }
        
        $sick_result = mysqli_query($connect, $sick);
        if (!$sick_result) {
            echo "Ошибка: сведения о больном (" .mysqli_error($connect). ")<br>";
            $f = false;
        }
        
        $brigade_result = mysqli_query($connect, $brigade);
        if (!$brigade_result) {
            echo "Ошибка: сведения о составе бригады (" .mysqli_error($connect). ")<br>";
            $f = false;
        }

        if ($f) {
            $new_url = "main.php";
            header('location: '.$new_url);
        }

?>