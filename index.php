<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Resinda</title>
      <?php require('inc/links.php')?>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  </head>

  <body class="bg-light">
    
    <?php require('inc/header.php'); ?>

    <div class="container-fluid px-lg-4 mt-4">
      <div class="swiper swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="img/resinda/resinda5.JPG" height="500" width="500" class="w-100 d-block" />
          </div>
          <div class="swiper-slide">
            <img src="img/resinda/resinda2.jpg" height="500" width="500" class="w-100 d-block" />
          </div>
          <div class="swiper-slide">
            <img src="img/resinda/resinda3.jpg" height="500" width="500" class="w-100 d-block" />
          </div>
          <div class="swiper-slide">
            <img src="img/resinda/resinda 4.jpg" height="500" width="500" class="w-100 d-block" />
          </div>
          <div class="swiper-slide">
            <img src="img/resinda/resinda1.jpg" height="500" width="500" class="w-100 d-block" />
          </div>
        </div>
      </div>
    </div>

    <div class="container availability-form">
      <div class="row">
        <div class="col-lg-12 bg-white shadow p-4 rounded">
          <h5 class="mb-4"> Check Booking Availability</h5>
          <form action="rooms.php">
            <div class="row align-items-end">
              <div class="col-lg-3 mb-3">
                <label for="form-label" style="font-weight: 500;">Check In</label>
                <input type="date" class="form-control shadow-none" name="checkin" required>
              </div>
              <div class="col-lg-3 mb-3">
                <label for="form-label" style="font-weight: 500;">Check Out</label>
                <input type="date" class="form-control shadow-none" name="checkout" required>
              </div>
              <div class="col-lg-3 mb-3">
                <label class="form-label" style="font-weight: 500;">Adult</label>
                  <select class="form-select shadow-none" name="adult">
                    <?php 
                      $guests_q = mysqli_query($con,"SELECT MAX(adult) AS `max_adult`, MAX(children) AS `max_children` 
                        FROM `rooms` WHERE `status`='1' AND `removed`='0'");
                      $guests_res = mysqli_fetch_assoc($guests_q);

                      for($i=1; $i<=$guests_res['max_adult']; $i++)
                      {
                        echo"<option value='$i'>$i</option>";
                      }
                    ?>
                  </select>
              </div>
              <div class="col-lg-2 mb-3">
                <label class="form-label" style="font-weight: 500;">Children</label>
                <select class="form-select shadow-none" name="children">
                  <?php 
                    for($i=1; $i<=$guests_res['max_children']; $i++)
                    {
                      echo"<option value='$i'>$i</option>";
                    }
                  ?>
                </select>
              </div>
              <input type="hidden" name="check_availability">
              <div class="col-lg-1 mb-lg-3 mt-2">
                  <button type="submit" class="btn btn-primary shadow-none custom-bg">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>
    <!-- Our Room -->
    <div class="container">
      <div class="row">

        <?php 
          $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=? ORDER BY `id` DESC LIMIT 3", [1, 0], 'ii');

          while($room_data = mysqli_fetch_assoc($room_res))
          {
            //get facility of room

            $fac_q = mysqli_query($con,"SELECT f.name FROM `facility` f 
              INNER JOIN `room_facility` rfea ON f.id = rfea.facility_id
              WHERE rfea.room_id = '$room_data[id]'");

            $facility_data = "";
            while($fac_row = mysqli_fetch_assoc($fac_q)){
              $facility_data .="<span class='badge rounded-pill bg-light text-dark text-wrap'>
              $fac_row[name]
              </span>";
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
             
              $book_btn = "<button onclick='checkLoginToBook($login,$room_data[id])' class='btn btn-primary btn-sm'>Book Now</button>";
            }

            $rating_q = "SELECT AVG(rating) AS `avg_rating` FROM `rating_review`
              WHERE `room_id`='$room_data[id]' ORDER BY `sr_no` DESC LIMIT 20";

            $rating_res = mysqli_query($con,$rating_q);
            $rating_fetch = mysqli_fetch_assoc($rating_res);
            
            $rating_data = "";

            if($rating_fetch['avg_rating']!==NULL)
            {
              $rating_data = "<div class='rating mb-4'>
              <h6 class='mb-1'>Rating</h6>
              <span class='badge rounded-pill bg-light'>";

              for($i=0; $i< $rating_fetch['avg_rating']; $i++){
                $rating_data .="<i class='bi bi-star-fill text-warning'></i>";
              }
                $rating_data .="</span>
                </div>";
            }



            //print room
            echo <<<data
              <div class="col-lg-4 col-md-6 my-3">

                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                  <img src="$room_thumb" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover;">

                    <div class="card-body">
                      <h5>$room_data[name]</h5>
                      <h6 class="mb-2 text-danger">IDR $room_data[price]</h6>
                      <div class="facilities mb-3">
                        <h6 class="mb-1">Facilities</h6>
                        $facility_data
                      </div>
                      <div class="guests mb-4">
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                          $room_data[adult] Adults
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                          $room_data[children] Children
                        </span>
                      </div>
                      $rating_data
                      <div class="d-flex justify-content-evenly mb-2">
                        $book_btn
                        <a href="room_details.php?id=$room_data[id]" class="btn btn-outline-primary btn-sm">More Details</a>
                      </div>
                    </div>
                </div> 
              </div>


            data;


          }

        ?>
        
      </div>

      <div class="col-lg-12 text-center mt-5">
        <a href="rooms.php" class="btn btn-sm btn-outline-primary rounded-0 fw-bold shadow-none">Moor Rooms >>></a>
      </div>   
    </div>
    <br>

    <!-- Our Facility Hotel-->
    <div class="container bg-white mt-5 shadow p-4 rounded" id="fasility">
      <div class="row">
      <h4 class="mb-3 fw-bold text-center">Fasility Hotel</h4>
        <div class="col-lg-3 p-4">
          <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
            <i class="bi bi-wifi me-1 text-muted"></i> Wi-Fi
          </a><br>
          <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
            <i class="fas fa-swimming-pool me-1 text-muted"></i> Facebook
          </a><br>
          <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
            <i class="bi bi-instagram me-1 text-muted"></i> Instagram
          </a><br>
        </div>
        <div class="col-lg-3 p-4">
          <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
            <i class="bi bi-twitter me-1 text-muted"></i> Twitter
          </a><br>
          <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
            <i class="bi bi-facebook me-1 text-muted"></i> Facebook
          </a><br>
          <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
            <i class="bi bi-instagram me-1 text-muted"></i> Instagram
          </a><br>
        </div>
        <div class="col-lg-3 p-4">
          <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
            <i class="bi bi-twitter me-1 text-muted"></i> Twitter
          </a><br>
          <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
            <i class="bi bi-facebook me-1 text-muted"></i> Facebook
          </a><br>
          <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
            <i class="bi bi-instagram me-1 text-muted"></i> Instagram
          </a><br>
        </div>
        <div class="col-lg-3 p-4">
          <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
            <i class="bi bi-twitter me-1 text-muted"></i> Twitter
          </a><br>
          <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
            <i class="bi bi-facebook me-1 text-muted"></i> Facebook
          </a><br>
          <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
            <i class="bi bi-instagram me-1 text-muted"></i> Instagram
          </a><br>
        </div>
      </div>
    </div>
    <br><br>
    <br><br>
    
    <!-- Testimony -->
      <h4 class="mb-3 fw-bold text-center" id="testimoni">Testimoni</h4>
      <div class="container">
        <div class="swiper swiper-testimonials">
          <div class="swiper-wrapper">
            <?php
            
              $review_q = "SELECT rr.*, uc.full_name AS uname, r.name AS rname FROM `rating_review` rr 
                INNER JOIN `registered_users` uc ON rr.email = uc.email
                INNER JOIN `rooms` r ON rr.room_id = r.id
                ORDER BY `sr_no` DESC LIMIT 6";

              $review_res= mysqli_query($con,$review_q);

              if(mysqli_num_rows($review_res)==0){
                echo 'No Reviews Yet !!';
              }
              else{
                while($row = mysqli_fetch_assoc($review_res))
                {
                  $stars = "<i class='bi bi-star-fill text-warning'></i> ";
                  for($i=1; $i<$row['rating']; $i++){
                    $stars .=" <i class='bi bi-star-fill text-warning'></i>";
                  }

                  echo <<<slides
                    <div class="swiper-slide bg-white p-4">
                      <div class="profile d-flex align-items-center mb-3">
                        <h6 class="m-0 ms-2 fw-bold">$row[uname]</h6>
                      </div>
                      <p>
                        $row[review]
                      </p>
                      <div class="rating">
                        $stars
                      </div>
                    </div>
                  slides;
                }
              }
            ?>
            
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
    <br><br>
    <br><br>


    <!-- Reach Us -->

    <?php
      $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
      $values = [1];
      $contact_r = mysqli_fetch_assoc(select($contact_q,$values,'i'));
    ?>

    <h4 class="mb-3 fw-bold text-center" id="contact-us">Contact Us</h4>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 mb-5 px-4">
          <div class="bg-white rounded shadow p-4">
            <iframe class="w-100 rounded mb-4" height="320 px" src="<?php echo $contact_r['iframe'] ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <h6>Address</h6>
            <a href="<?php echo $contact_r['address'] ?>" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
              <i class="bi bi-geo-alt-fill"></i><?php echo $contact_r['address'] ?>
            </a>
            <h6 class="mt-3">Call Us</h6>
            <a href="+<?php echo $contact_r['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
              <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn1'] ?>
            </a>
            <h6 class="mt-3">Email</h6>
            <a href="<?php echo $contact_r['email'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-envelope-fill"></i><?php echo $contact_r['email'] ?>
            </a>
            <h6 class="mt-3">Follow Us</h6>
            <a href="<?php echo $contact_r['tw'] ?>" class="d-inline-block text-dark text-decoration-none mb-2">
              <i class="bi bi-twitter me-1"></i>twitter
            </a><br>
            <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block text-dark text-decoration-none mb-2">
              <i class="bi bi-facebook me-1"></i>facebook
            </a><br>
            <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block text-dark text-decoration-none mb-2">
              <i class="bi bi-instagram me-1"></i> Instagram
            </a><br>
          </div>
        </div>


        <div class="col-lg-6 col-md-6 px-4">
          <div class="bg-white rounded shadow p-4">
            <form method="POST">
              <h5>Send a message</h5>
              <div class="mt-3">
                <label class="form-label" style="font-weight: 500;">Name</label>
                <input name="name" required type="text" class="form-control shadow-one">
              </div>
              <div class="mt-3">
                <label class="form-label" style="font-weight: 500;">Email</label>
                <input name="email" required type="email" class="form-control shadow-one">
              </div>
              <div class="mt-3">
                <label class="form-label" style="font-weight: 500;">Subject</label>
                <input name="subject" required type="text" class="form-control shadow-one">
              </div>
              <div class="mt-3">
                <label class="form-label" style="font-weight: 500;">Message</label>
                <textarea name="message" required class="form-control shadow-none" rows="13" style="resize: none;"></textarea>
              </div>
              <button type="submit" name="send" class="btn btn-primary custom-bg mt-4">SEND</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php 
      
      if(isset($_POST['send']))
      {
        $frm_data = filteration($_POST);

        $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
        $values = [$frm_data['name'],$frm_data['email'],$frm_data['subject'],$frm_data['message']];

        $res = insert($q,$values,'ssss');
        if($res==1){
          alert('success','Mail sent!');
        }
        else{
          alert('error','Server Down! Try again later.');
        }
      }
    ?>

    <?php require('inc/footer.php') ?>

    <script src="myScript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".swiper-container", {
          spaceBetween: 30,
          effect: "fade",
          loop: true,
          autoplay: {
            delay: 3500,
            disableOnInteraction: false,
          }
        });

        var swiper = new Swiper(".swiper-testimonials", {
          effect: "coverflow",
          grabCursor: true,
          centeredSlides: true,
          slidesPerView: "auto",
          slidesPerView: "3",
          loop: true,
          coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,
          },
          pagination: {
            el: ".swiper-pagination",
          },
          breakpoints: {
            320:{
              slidesPerView : 1,
            },
            640:{
              slidesPerView : 1,
            },
            768:{
              slidesPerView : 2,
            },
            1024:{
              slidesPerView : 3,
            },
          }
        });
    </script>
  </body>
</html>