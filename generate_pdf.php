<?php
  require('admin/inc/essentials.php');
  require('admin/inc/db_config.php');
  require('admin/inc/mpdf/vendor/autoload.php');

  session_start();

  if(!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)){
    redirect('index.php');
  }

  if(isset($_GET['gen_pdf']) && isset($_GET['id']))
  {
    $frm_data = filteration($_GET);

    $query = "SELECT bo.*, bd.*, uc.email FROM `booking_order` bo
      INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id 
      INNER JOIN `registered_users` uc ON bo.email = uc.email
      WHERE ((bo.booking_status='booked' AND bo.arrival=1)
      OR (bo.booking_status='cancelled' AND bo.refund=0)
      OR (bo.booking_status='pending' AND bo.arrival=0))
      AND bo.booking_id = '$frm_data[id]'";

    $res = mysqli_query($con,$query);
    
    $total_rows= mysqli_num_rows($res);

    if($total_rows==0){
      header('location: index.php');
      exit;
    }

    $data = mysqli_fetch_assoc($res);

    $date = date("h:ia | d-m-Y", strtotime($data['datentime']));
    $checkin = date("d-m-Y", strtotime($data['check_in']));
    $checkout = date("d-m-Y", strtotime($data['check_out']));

    $tabel_data = "
      <h2>BOOKING RECIEPT</h2>
      <table border='1'>
        <tr>
          <td>Order ID : {$data['order_id']}</td>
          <td>Booking Date : $date</td>
        </tr>
        <tr>
          <td colspan='2'>Status : {$data['booking_status']}</td>
        </tr>
        <tr>
          <td>Name : {$data['full_name']}</td>
          <td>Email : {$data['email']}</td>
        </tr>
        <tr>
          <td>Room Name : {$data['room_name']}</td>
          <td>Coast : {$data['price']} per night</td>
        </tr>
        <tr>
          <td>Check-in : $checkin</td>
          <td>Check-out : $checkout</td>
        </tr>
        <tr>
          <td colspan='2'>Total Price : {$data['total_price']}</td>
        </tr>
      </table>
    ";

    $mpdf = new \Mpdf\Mpdf();

    $mpdf->WriteHTML($tabel_data);

    $mpdf->Output($data['order_id'].'.pdf','D');

    echo $tabel_data;
  }
  else{
    header('location: dashboard.php');
  }

?>