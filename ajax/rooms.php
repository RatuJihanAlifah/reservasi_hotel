<?php 
  require('../admin/inc/essentials.php');
  require('../admin/inc/db_config.php');
  date_default_timezone_set("Asia/Kolkata");
  session_start();

  if(isset($_GET['fetch_rooms']))
  {

    $chk_avail = json_decode($_GET['chk_avail'],true);

    if($chk_avail['checkin']!='' && $chk_avail['checkout']!='')
    {
      $today_date = new DateTime(date("Y-m-d"));
      $checkin_date = new DateTime($chk_avail['checkin']);
      $checkout_date = new DateTime($chk_avail['checkout']);

      if ($checkin_date == $checkout_date){
        echo"<h3 class='text-center text-danger'>Invalid Dates Entered!</h3>";
        exit;
      } elseif ($checkout_date < $checkin_date){
        echo"<h3 class='text-center text-danger'>Invalid Dates Entered!</h3>";
        exit;
      } elseif ($checkin_date < $today_date){
        echo"<h3 class='text-center text-danger'>Invalid Dates Entered!</h3>";
        exit;
      }
    }

    $guests = json_decode($_GET['guests'], true);
    $adults = ($guests['adults']!='') ? $guests['adults'] : 0;
    $children = ($guests['children']!='') ? $guests['children'] : 0;

    $facility_list = json_decode($_GET['facility_list'],true);

    $count_rooms = 0;
    $output = "";

    $settings_q = "SELECT * FROM `settings` WHERE `sr_no`=1";
    $settings_r = mysqli_fetch_assoc(mysqli_query($con,$settings_q));

    $room_res = select("SELECT * FROM `rooms` WHERE `adult`>=? AND `children`>=? AND `status`=? AND `removed`=? ", [$adults,$children,1,0], 'iiii');

    while($room_data = mysqli_fetch_assoc($room_res))
    {
      if($chk_avail['checkin']!='' && $chk_avail['checkout']!='')
      {
        $tb_query = "SELECT COUNT(*) AS `total_bookings` FROM `booking_order`
          WHERE booking_status=? AND room_id=? AND check_out > ? AND check_in < ?";

        $values = ['booked',$room_data['id'],$chk_avail['checkin'],$chk_avail['checkout']];
        $tb_fetch = mysqli_fetch_assoc(select($tb_query,$values,'siss'));

        if (($room_data['quantity']-$tb_fetch['total_bookings'])==0){
          continue;
        }
      }

      //get facility of room
      $fac_count=0;

      $fac_q = mysqli_query($con,"SELECT f.name, f.id FROM `facility` f 
        INNER JOIN `room_facility` rfea ON f.id = rfea.facility_id
        WHERE rfea.room_id = '$room_data[id]'");

      $facility_data = "";

      while($fac_row = mysqli_fetch_assoc($fac_q))
      {
        if( in_array($fac_row['id'],$facility_list['facility'])){
          $fac_count++;
        }
        $facility_data .="<span class='badge rounded-pill bg-light text-dark text-wrap'>
        $fac_row[name]
        </span>";
      }  

      if(count($facility_list['facility'])!=$fac_count){
        continue;
      }
      
      //get thumbnail of image

      $room_thumb = ROOMS_IMG_PATH."deluks_twin.jpg";
      $thumb_q = mysqli_query($con,"SELECT * FROM `room_images` 
      WHERE `room_id`='$room_data[id]' 
      AND `thumb`='1'");

      if(mysqli_num_rows($thumb_q)>0){
        $thumb_res = mysqli_fetch_assoc($thumb_q);
        $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
      }


      $book_btn = "";

      if(!$settings_r['shutdown']){
        $login=0;
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
          $login=1;
        }
        
        $book_btn = "<button onclick='checkLoginToBook($login,$room_data[id])' class='btn w-100 btn-primary btn-sm mb-2'>Book Now</button>";
      }


      //print room
      $output.="
        <div class='card mb-4 border-0 shadow'>
          <div class='row g-0 p-3 align-items-center'>
            <div class='col-md-4 mb-lg-0 mb-md-0 mb-3'>
              <img src='$room_thumb' class='img-fluid rounded' height='250' width='300'>
            </div>
            <div class='col-md-5 px-lg-3 px-md-3 px-0'>
              <h5 class='mb-3 fw-bold'>$room_data[name]</h5>
              <div class='facility mb-3'>
                <h6 class='mb-1'>Facilities</h6>
                $facility_data
              </div>
              <div class='guests'>
                <h6 class='mb-1'>Guests</h6>
                <span class='badge rounded-pill bg-light text-dark text-wrap'>
                  $room_data[adult] Adults
                </span>
                <span class='badge rounded-pill bg-light text-dark text-wrap'>
                  $room_data[children] Children
                </span>
              </div>  
            </div>
            <div class='col-md-2 mt-lg-0 mt-md-0 mt-4 text-center'>
                <h6 class='mb-4'>IDR $room_data[price]</h6>
                $book_btn
                <a href='room_details.php?id=$room_data[id]' class='btn w-100 btn-outline-primary btn-sm'>More Details</a>
            </div>
          </div>
        </div>
      ";
      $count_rooms++;
    }

    if($count_rooms>0){
      echo $output;
    }
    else{
      echo"<h3 class='text-center text-danger'>No rooms to show!</h3>";
    }
  }
?> 
