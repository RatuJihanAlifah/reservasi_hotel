<?php 
require('../admin/inc/essentials.php');
require('../admin/inc/db_config.php');

date_default_timezone_set("Asia/Kolkata");

if(isset($_POST['info_form'])) {
  $fullName = isset($_POST['full_name']) ? $_POST['full_name'] : '';
  $username = isset($_POST['username']) ? $_POST['username'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';

  $updateQuery = "UPDATE `registered_users` SET `full_name`=?, `username`=? WHERE `email`=?";
  
  $stmt = mysqli_prepare($con, $updateQuery);
  mysqli_stmt_bind_param($stmt, "sss", $fullName, $username, $email);
  
  if(mysqli_stmt_execute($stmt)) {
    echo '1'; // Berhasil
  } else {
    echo '0'; // Gagal, tampilkan pesan kesalahan dari MySQL
    echo 'Error: ' . mysqli_stmt_error($stmt);
  }

  mysqli_stmt_close($stmt);
}
?>
