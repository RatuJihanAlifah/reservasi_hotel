<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

if (isset($_POST['booking_analytics'])) 
{
  $frm_data = filteration($_POST);

  $condition="";

  $result = mysqli_fetch_assoc(mysqli_query($con,"SELECT 
    COUNT(booking_id) AS `total_bookings`,

    COUNT(CASE WHEN booking_status='booked' AND arrival=1 THEN 1 END) AS `active_bookings`,
    COUNT(CASE WHEN booking_status='cancelled' AND refund=0 THEN 0 END) AS `cancelled_bookings`

    FROM `booking_order`"));

  $output = json_encode($result);

  echo $output;
}

if (isset($_POST['user_analytics'])) 
{
  $condition = ""; // Sesuaikan kondisi sesuai kebutuhan

  $total_reviews = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(sr_no) AS `count` FROM `rating_review` $condition"));

  $total_queries = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(sr_no) AS `count` FROM `user_queries` $condition"));

  $total_new_reg = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(email) AS `count` FROM `registered_users` $condition"));

  $output = [
    'total_queries' => $total_queries['count'],
    'total_reviews' => $total_reviews['count'],
    'total_new_reg' => $total_new_reg['count']
  ];
  $output = json_encode($output);

  echo $output;
  
}

?>

