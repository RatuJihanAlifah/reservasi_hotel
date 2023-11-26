<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resinda - Confirm Booking</title>
  <?php require('inc/links.php') ?>
</head>
<body class="bg-light">
  
  <?php require('inc/header.php') ?>

  <?php 
    if(!isset($_GET['id']) || $settings_r['shutdown']==true){
      redirect('rooms.php');
    }
    else if(!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)){
      redirect('rooms.php');
    }

    $data = filteration($_GET);

    $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?", [$data['id'],1, 0], 'iii');

    if(mysqli_num_rows($room_res)==0){
      redirect('rooms.php');
    }

    $room_data = mysqli_fetch_assoc($room_res);

    $_SESSION['room'] = [
      "id" => $room_data['id'],
      "name" => $room_data['name'],
      "price" => $room_data['price'],
      "id" => $room_data['id'],
      "available" => false, 
    ];

    $user_data = null; // Inisialisasi variabel $user_data

    if (isset($_SESSION['uEmail']))
    {
      $user_res = select("SELECT * FROM `registered_users` WHERE `email`=? LIMIT 1", [$_SESSION['uEmail']], "i");
      $user_data = mysqli_fetch_assoc($user_res);
    }
  ?>

  <div class="container">
    <div class="row">
      
      <div class="col-12 my-5 mb-4 px-4">
        <h2 class="fw-bold h-font">CONFIRM BOOKING</h2>
        <div style="font-size: 14px;">
          <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
          <span class="text-secondary"> > </span>
          <a href="rooms.php" class="text-secondary text-decoration-none">ROOMS</a>
          <span class="text-secondary"> > </span>
          <a href="#" class="text-secondary text-decoration-none">CONFIRM</a>

        </div>
      </div>

      <div class="col-lg-7 col-md-12 px-4">
        
        <?php 
        
          $room_thumb = ROOMS_IMG_PATH."deluks_twin.jpg";
          $thumb_q = mysqli_query($con,"SELECT * FROM `room_images` 
          WHERE `room_id`='$room_data[id]' 
          AND `thumb`='1'");

          if(mysqli_num_rows($thumb_q)>0){
            $thumb_res = mysqli_fetch_assoc($thumb_q);
            $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
          }

          echo<<<data
            <div class="card p-2 shadow-sm rounded">
                <img src="$room_thumb" class="img-fluid rounded mb-2">
                <h5>{$room_data['name']}</h5>
                <h6>IDR{$room_data['price']} per night</h6>
            </div>
          data;


        ?>
      </div>

      <div class="col-lg-5 col-md-12 px-4">
        <div class="card mb-4 border-0 shadow-sm rounded-3">
          <div class="card-body">
          <form action="booking.php" method="POST" id="booking_form">
            <h6 class="mb-3">BOOKING DETAILS</h6>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Name</label>
                <input name="full_name" type="text" value="<?php echo isset($user_data['full_name']) ? $user_data['full_name'] : '' ?>" class="form-control shadow-one" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="text" value="<?php echo isset($user_data['email']) ? $user_data['email'] : '' ?>" class="form-control shadow-one" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Check In</label>
                <input name="checkin" onchange="check_availability()" type="date" class="form-control shadow-one" required>
              </div>
              <div class="col-md-6 mb-4">
                <label class="form-label">Check Out</label>
                <input name="checkout" onchange="check_availability()" type="date"  class="form-control shadow-one" required>
              </div>
              <div class="col-12">
                <div class="spinner-border text-primary mb-3 d-none" id="info_loader" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
                <h6 class="mb-3 text-danger" id="booking_info">Provide check-in & check-out date !</h6>
                <button name="booking" class="btn w-100 text-white custom-bg shadow-none mb-1" disabled>Booking</button>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php require('inc/footer.php') ?>
  <script>
    let booking_form = document.getElementById('booking_form');
    let info_loader = document.getElementById('info_loader');
    let booking_info = document.getElementById('booking_info');

    function check_availability() {
      let checkin_val = booking_form.elements['checkin'].value;
      let checkout_val = booking_form.elements['checkout'].value;

      booking_form.elements['booking'].setAttribute('disabled', true);

      if (checkin_val !== '' && checkout_val !== '') {
        // Pengaturan loading dan lainnya (seperti sebelumnya)

        let data = new FormData();
        data.append('check_availability', '');
        data.append('check_in', checkin_val);
        data.append('check_out', checkout_val);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/confirm_booking.php");

        xhr.onload = function () {
          let response = JSON.parse(this.responseText);
          if (response.status === 'check_in_out_equal') {
            booking_info.innerText = "You cannot check-out on the same day!";
          } else if (response.status === 'check_out_earlier') {
            booking_info.innerText = "Check-out date is earlier than check-in date!";
          } else if (response.status === 'check_in_earlier') {
            booking_info.innerText = "Check-in date is earlier than today's date!";
          } else if (response.status === 'unavailable') {
            booking_info.innerText = "Room not available for this check-in date!";
          } else {
            booking_info.innerHTML = "No. of Days: " + response.days + "<br>Total Amount for booking: IDR" + response.booking;
            booking_info.classList.replace('text-danger', 'text-dark');
            booking_form.elements['booking'].removeAttribute('disabled');
          }

          booking_info.classList.remove('d-none');
          info_loader.classList.add('d-none');
        };
        xhr.send(data);
      }
    }
  </script>
</body>
</html>