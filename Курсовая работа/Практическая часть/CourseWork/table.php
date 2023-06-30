<?php
$call_smp = "SELECT * FROM call_smp;";
$caller_smp = "SELECT * FROM caller_smp;";
$departure = "SELECT * FROM departure;";
$sick = "SELECT * FROM sick;";
$brigade = "SELECT * FROM smp_brigade;";

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


echo "        <table>
<tr class='first'>
    <td colspan='2'>
    </td>";
    foreach ($sick_result as $row_sick) {
        echo               
        "<td>
            <form action='redaction.php' method='post'>
            <input type='submit' name='".$row_sick["sick_id"]."' value='Редактировать'>
            </form>
            <form action='delete_wait.php' method='post'>
            <input type='submit' name='".$row_sick["sick_id"]."' value='Удалить'>
            </form>
        </td>";
    }
    echo"
</tr>
<tr>
    <td colspan='2'>
    № п/п
    </td>";
    foreach ($sick_result as $row_sick) {
        echo "<td>"
        .$row_sick["sick_id"].
        "</td>";
    }
    echo"
</tr>
<tr>
    <td colspan='2'>
    Дата поступления (число, месяц, год) вызова
    </td>";
    foreach ($call_smp_result as $row_call_smp) {
        echo "<td>".$row_call_smp["call_date_incoming"]."</td>";
    }
    echo"
</tr>
<tr >
    <td rowspan='2'>
    Время (часы, минуты)
    </td>
    <td>
    Приема вызова
    </td>";
    foreach ($call_smp_result as $row_call_smp) {
        echo "<td>".$row_call_smp["call_time_receiving"]."</td>";
    }
    echo"
</tr>
    
<tr>
    <td>
    передачи вызова бригаде СМП
    </td>";
    foreach ($call_smp_result as $row_call_smp) {
        echo "<td>".$row_call_smp["call_time_transfer"]."</td>";
    }
    echo"
</tr>
<tr>
    <td colspan='2'>
    ФИО больного
    </td>";
    foreach ($sick_result as $row_sick) {
        echo "<td>".$row_sick["sick_fam"]. " ".$row_sick["sick_nam"]. " ". $row_sick["sick_otch"]."</td>";
    }
    echo"
</tr>
<tr>
    <td colspan='2'>
    Возраст
    </td>";
    foreach ($sick_result as $row_sick) {
        echo "<td>".$row_sick["sick_age"]."</td>";
    }
    echo"
</tr>
<tr>
    <td colspan='2'>
    Адрес 
    </td>";
    foreach ($sick_result as $row_sick) {
        echo "<td>"
        .$row_sick["sick_address_sity"]. ", ул. " .$row_sick["sick_address_street"].
        ", дом ". $row_sick["sick_address_home"]. ", кв. ". $row_sick["sick_address_flat"].
        "</td>";
    }
    echo"
</tr>
<tr>
    <td colspan='2'>
    По какому поводу поступил вызов
    </td>";
    foreach ($call_smp_result as $row_call_smp) {
        echo "<td>".$row_call_smp["call_reason"]."</td>";
    }
    echo"
</tr>
<tr>
    <td colspan='2'>
    Фамилия лица вызывающего бригаду СМП и номер его телефона
    </td>";
    foreach ($caller_smp_result as $row_caller_smp) {
        echo "<td>"
        .$row_caller_smp["caller_fam"]. " ". $row_caller_smp["caller_phone"].
        "</td>";
    }
    echo"
</tr>
<tr>
    <td colspan='2'>
    Диагноз
    </td>";
    foreach ($sick_result as $row_sick) {
        echo "<td>"
        .$row_sick["sick_diagnos"].
        "</td>";
    }
    echo"
</tr>
<tr>
    <td colspan='2'>
    Оказанная помощь
    </td>";
    foreach ($departure_result as $row_departure) {
        echo "<td>"
        .$row_departure["dep_help_in_site"]. ", " . $row_departure["dep_help_in_car"].
        "</td>";
    }

    echo"	
</tr>
<tr>
    <td colspan='2'>
    Куда направлен
    </td>";
    foreach ($sick_result as $row_sick) {
        echo "<td>"
        .$row_sick["sick_where_sent"].
        "</td>";
    }

    echo"	
</tr>
<tr>
    <td colspan='2'>
    ФИО врача (фельдшера), оказавшего СМП 
    </td>";
    foreach ($departure_result as $row_departure) {
        echo "<td>"
        .$row_departure["dep_doc_fam"]. " ". $row_departure["dep_doc_nam"]. " ".$row_departure["dep_doc_otch"].
        "</td>";
    }
    echo"
</tr>
<tr>
    <td colspan='2'>
    Состав бригады СМП
    </td>";
    foreach ($brigade_result as $row_brigade) {
        echo "<td>"
        .$row_brigade["doctor"]. " доктор, ". $row_brigade["paramedic"]." фельдшер, ".
    $row_brigade["attendant"]. " Санитар, ". $row_brigade["driver"]. " водитель".
        "</td>";
    }
    echo "
</tr>
<tr>
    <td rowspan='2'>
    Время (часы, минуты)
    </td>
    <td>
    Выезда бригады СМП на вызов
    </td>";
    foreach ($departure_result as $row_departure) {
        echo "<td>"
        .$row_departure["dep_time"].
        "</td>";
    }
    echo"
</tr>
<tr>
    <td>
    Окончание вызова бригады СМП
    </td>";
    foreach ($call_smp_result as $row_call_smp) {
        echo "<td>"
        .$row_call_smp["call_time_end"].
        "</td>";
    }
    echo"
</tr>
<tr>
    <td colspan='2'>
    Сколько времени затрачено на вызов 
    </td>";
    foreach ($call_smp_result as $row_call_smp) {
        echo "<td>"
        .$row_call_smp["call_time_spent"].
        "</td>";
    }
    echo"
</tr>
<tr>
    <td colspan='2'>
    Время доезда до места вызова
    </td>";
    foreach ($call_smp_result as $row_call_smp) {
        echo "<td>"
        .$row_call_smp["call_time_arrival"].
        "</td>";
    }
    echo"
</tr>
<tr>
    <td colspan='2'>
    Через сколько минут автомобиль СМП выехал на вызов
    </td>";
    foreach ($departure_result as $row_departure) {
        echo "<td>"
        .$row_departure["dep_col_min"].
        "</td>";
    }
    echo"
</tr>
</table>";
?>