<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

if (isset($_POST['get_users'])) {
    $res = selectAll('registered_users');
    $i = 1;

    $data = "";

    while ($row = mysqli_fetch_assoc($res)) {
        $data .= "
            <tr>
                <td>$i</td>
                <td>$row[full_name]</td>
                <td>$row[username]</td>
                <td>$row[email]</td>
                <td>$row[password]</td>
            </tr>
        ";
        $i++;
    }
    echo $data;
}

if (isset($_POST['search_user'])) {
    $username = $_POST['search_user'];

    $query = "SELECT * FROM `registered_users` WHERE `full_name` LIKE ?";
    $res = select($query, ["%$username%"], 's');
    $i = 1;

    $data = "";

    while ($row = mysqli_fetch_assoc($res)) {
        $data .= "
            <tr>
                <td>$i</td>
                <td>$row[full_name]</td>
                <td>$row[username]</td>
                <td>$row[email]</td>
                <td>$row[password]</td>
            </tr>
        ";
        $i++;
    }
    echo $data;
}
?>

