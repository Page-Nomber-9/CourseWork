<?php
$result = mysqli_query($connect, $user_info);
$row = $result -> fetch_assoc(); 

echo "<p style='color: #AAAAAA;'>0 - привелегированный; 1 - обычный</p>";

echo "<table>
<tr class='first'>
    <td>
    email пользователя
    </td>

    <td>
    пароль пользователя
    </td>

    <td>
    тип пользователя
    </td>

    <td>
    фамилия пользователя
    </td>

    <td>
    имя пользователя
    </td>

    <td>
    отчество пользователя
    </td>
    <td>
    Изменение
    </td>
    <td>
    Удаление
    </td>
</tr>";

foreach ($result as $row) {
echo "<tr>
    <td>
    ".$row["user_email"]."
    </td>

    <td>
    ".$row["user_password"]."
    </td>

    <td>
    ".$row["user_type"]."
    </td>

    <td>
    ".$row["user_fam"]."
    </td>

    <td>
    ".$row["user_nam"]."
    </td>

    <td>
    ".$row["user_otch"]."
    </td>

    <td>
        <form action='redaction_user.php' method='post'>
        <input name='".$row["user_id"]."' type='submit' value='Изменить'>
        </form>
    </td>
    <td>
        <form action='delete_user.php' method='post'>
        <input name='".$row["user_id"]."' type='submit' value='Удалить'>
        </form>
    </td>
</tr>";
}
echo "</table>";
?>