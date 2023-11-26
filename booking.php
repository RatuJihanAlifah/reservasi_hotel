<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resinda - Room Details</title>
  <?php require('inc/links.php') ?>
</head>
<body class="bg-light">
  
  <?php require('inc/header.php') ?>

  <?php


    if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)) {
    }

    function generate_order_id() {
        return uniqid('ORDER');
    }

    if (isset($_POST['booking'])) {
        $frm_data = filteration($_POST);

        // Hitung durasi menginap
        $checkin = new DateTime($frm_data['checkin']);
        $checkout = new DateTime($frm_data['checkout']);
        $duration = $checkin->diff($checkout);

        $email = $frm_data['email'];
        $room_id = $_SESSION['room']['id'];
        $order_id = generate_order_id();

        $query1 = "INSERT INTO `booking_order`(`email`, `room_id`, `check_in`, `check_out`, `order_id`) VALUES (?,?,?,?,?)";
        insert($query1, [$frm_data['email'], $_SESSION['room']['id'], $frm_data['checkin'], $frm_data['checkout'], $order_id], 'sisss');
        $booking_id = mysqli_insert_id($con);

        $total_price = $_SESSION['room']['price'] * $duration->days;
        $query2 = "INSERT INTO `booking_details`(`booking_id`, `room_name`, `price`, `total_price`, `full_name`, `email`) VALUES (?,?,?,?,?,?)";
        insert($query2, [$booking_id, $_SESSION['room']['name'], $_SESSION['room']['price'], $total_price, $frm_data['full_name'], $frm_data['email']], 'isssss');

        echo "<script>alert('Booking successful! Your stay duration is ".$duration->days." days. Selamat, booking Anda berhasil!');</script>";
    }
  ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title text-center">Booking Details</h5>
                    <ul class="list-group list-group-flush">
                        <?php
                        if (isset($_SESSION['booking_detail'])) {
                            $booking_detail = $_SESSION['booking_detail'];
                            ?>
                            <li class="list-group-item"><strong>Booking ID:</strong> <?php echo $booking_detail['booking_id']; ?></li>
                            <li class="list-group-item"><strong>Room:</strong> <?php echo $booking_detail['room_name']; ?></li>
                            <li class="list-group-item"><strong>Price per night:</strong> IDR <?php echo $booking_detail['price']; ?></li>
                            <li class="list-group-item"><strong>Total Price:</strong> IDR <?php echo $booking_detail['total_price']* $duration->days; ?></li>
                            <li class="list-group-item"><strong>Full Name:</strong> <?php echo $booking_detail['full_name']; ?></li>
                            <li class="list-group-item"><strong>Email:</strong> <?php echo $booking_detail['email']; ?></li>
                            <li class="list-group-item"><strong>Check-in:</strong> <?php echo $booking_detail['checkin']; ?></li>
                            <li class="list-group-item"><strong>Check-out:</strong> <?php echo $booking_detail['checkout']; ?></li>
                            <li class="list-group-item"><strong>Duration:</strong> <?php echo $duration->days; ?> days</li>
                            <!-- Tambahkan rincian lainnya jika ada -->
                            <?php
                        } else {
                            ?>
                            <li class="list-group-item text-center">No booking details available.</li>
                            <?php
                        }
                        ?>
                    </ul>
                    <div class="text-center mt-3">
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require('inc/footer.php') ?>
</body>
</html>
