<?php
// Include file konfigurasi database dan fungsi essentials
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');

// Mulai sesi
session_start();

  // Proses login
  if(isset($_POST['login'])) {
      $emailOrUsername = $_POST['email_username'];

      $query = "SELECT * FROM `registered_users` WHERE `email`='$emailOrUsername' OR `username`='$emailOrUsername'";
      $result = mysqli_query($con, $query);

      if($result) {
          if(mysqli_num_rows($result) == 1) {
              $result_fetch = mysqli_fetch_assoc($result);
              if(password_verify($_POST['password'], $result_fetch['password'])) {
                  $_SESSION['logged_in'] = true;
                  $_SESSION['uEmail'] = $result_fetch['email']; // Simpan email dalam sesi
                  $_SESSION['username'] = $result_fetch['username'];
                  header("location: index.php");
                  exit;
              } else {
                  // Password salah
                  header("location: index.php?error=incorrect_password");
                  exit;
              }
          } else {
              // Email atau username tidak terdaftar
              header("location: index.php?error=not_registered");
              exit;
          }
      } else {
          // Query error
          header("location: index.php?error=query_error");
          exit;
      }
  }

  // Proses pendaftaran
  if(isset($_POST['register'])) {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $fullName = $_POST['full_name'];

      $userExistQuery = "SELECT * FROM `registered_users` WHERE `username`='$username' OR `email`='$email'";
      $userExistResult = mysqli_query($con, $userExistQuery);

      if($userExistResult) {
          if(mysqli_num_rows($userExistResult) > 0) {
              $userExistFetch = mysqli_fetch_assoc($userExistResult);
              if($userExistFetch['username'] == $username) {
                  // Username sudah terdaftar
                  header("location: index.php?error=username_taken");
                  exit;
              } else {
                  // Email sudah terdaftar
                  header("location: index.php?error=email_taken");
                  exit;
              }
          } else {
              // Tidak ada user yang menggunakan username atau email ini, maka lakukan pendaftaran
              $query = "INSERT INTO `registered_users`(`full_name`, `username`, `email`, `password`) VALUES ('$fullName','$username','$email','$password')";
              if(mysqli_query($con, $query)) {
                  $_SESSION['uEmail'] = $email; // Simpan email dalam sesi setelah pendaftaran berhasil
                  header("location: index.php?success=registration_successful");
                  exit;
              } else {
                  // Error saat melakukan query
                  header("location: index.php?error=query_error");
                  exit;
              }
          }
      } else {
          // Error saat melakukan query cek user exist
          header("location: index.php?error=query_error");
          exit;
      }
  }

?>

