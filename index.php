<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Inn Sight</title>
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
          <form>
            <div class="row align-items-end">
              <div class="col-lg-3 mb-3">
                <label for="form-label" style="font-weight: 500;">Check In</label>
                <input type="date" class="form-control shadow-none">
              </div>
              <div class="col-lg-3 mb-3">
                <label for="form-label" style="font-weight: 500;">Check Out</label>
                <input type="date" class="form-control shadow-none">
              </div>
              <div class="col-lg-3 mb-3">
                <label class="form-label" style="font-weight: 500;">Adult</label>
                  <select class="form-select shadow-none">
                    <option selected>Open this select</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="2">Three</option>
                  </select>
              </div>
              <div class="col-lg-2 mb-3">
                <label class="form-label" style="font-weight: 500;">Children</label>
                  <select class="form-select shadow-none">
                    <option selected>Open this select</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="2">Three</option>
                  </select>
              </div>
              <div class="col-lg-1 mb-lg-3 mt-2">
                  <button type="submit" class="btn btn-primary shadow-none custom-bg">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <br>

    <!-- Our Room -->
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 my-3">

          <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
            <img src="img/room/executive.jpg" class="card-img-top">

              <div class="card-body">
                <h5>Simple Room</h5>
                <h6 class="mb-2 text-danger">IDR 890.000</h6>
                <div class="features mb-1">
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    2 Kamar
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    1 Bathroom
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    1 Balcony
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    3 Sofa
                  </span>
                </div>
                <div class="facilities mb-3">
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    AC
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Television
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Wifi
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Room Heater
                  </span>
                </div>
                <div class="guests mb-4">
                  <h6 class="mb-1">Guests</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    5 Adults
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    4 Children
                  </span>
                </div>
                  <div class="rating mb-3">
                    <div>
                      <span class="badge rounded-pill bg-light text-primary text-wrap">
                      Rating Rooms
                      </span>
                    </div>
                    <span class="badge rounded-pill bg-light">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                    </span>
                  </div>
                  <a href="#" class="btn btn-primary btn-sm">Pilih Kamar</a>
              </div>
          </div> 
        </div>

        <div class="col-lg-4 col-md-6 my-3">

          <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
            <img src="img/room/deluks_single.jpg" class="card-img-top">

              <div class="card-body">
                <h5>Simple Room</h5>
                <h6 class="mb-2 text-danger">IDR 890.000</h6>
                <div class="features mb-1">
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    2 Kamar
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    1 Bathroom
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    1 Balcony
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    3 Sofa
                  </span>
                </div>
                <div class="facilities mb-3">
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    AC
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Television
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Wifi
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Room Heater
                  </span>
                </div>
                <div class="guests mb-4">
                  <h6 class="mb-1">Guests</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    5 Adults
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    4 Children
                  </span>
                </div>
                  <div class="rating mb-3">
                    <div>
                      <span class="badge rounded-pill bg-light text-primary text-wrap">
                      Rating Rooms
                      </span>
                    </div>
                    <span class="badge rounded-pill bg-light">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                    </span>
                  </div>
                  <a href="#" class="btn btn-primary btn-sm">Pilih Kamar</a>
              </div>
          </div> 
        </div>

        <div class="col-lg-4 col-md-6 my-3">

          <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
            <img src="img/room/premier.jpg" class="card-img-top">

              <div class="card-body">
                <h5>Simple Room</h5>
                <h6 class="mb-2 text-danger">IDR 890.000</h6>
                <div class="features mb-1">
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    2 Kamar
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    1 Bathroom
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    1 Balcony
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    3 Sofa
                  </span>
                </div>
                <div class="facilities mb-3">
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    AC
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Television
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Wifi
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Room Heater
                  </span>
                </div>
                <div class="guests mb-4">
                  <h6 class="mb-1">Guests</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    5 Adults
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    4 Children
                  </span>
                </div>
                  <div class="rating mb-3">
                    <div>
                      <span class="badge rounded-pill bg-light text-primary text-wrap">
                      Rating Rooms
                      </span>
                    </div>
                    <span class="badge rounded-pill bg-light">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                    </span>
                  </div>
                  <a href="#" class="btn btn-primary btn-sm">Pilih Kamar</a>
              </div>
          </div> 
        </div>
        
      </div>

      <div class="col-lg-12 text-center mt-5">
        <a href="rooms.php" class="btn btn-sm btn-outline-primary rounded-0 fw-bold shadow-none">Moor Hotel >>></a>
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
            <div class="swiper-slide bg-white p-4">
              <div class="profile d-flex align-items-center mb-3">
                <img src="img/features/1.jpg" width="30px">
                <h6 class="m-0 ms-2">Faisya Revenia</h6>
              </div>
              <p>
                Bagus hotel nya. Kamar nya nyaman bangettt
              </p>
              <div class="rating">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
              </div>
            </div>

            <div class="swiper-slide bg-white p-4">
              <div class="profile d-flex align-items-center mb-3">
                <img src="img/features/1.jpg" width="30px">
                <h6 class="m-0 ms-2">Faisya Revenia</h6>
              </div>
              <p>
                Bagus hotel nya. Kamar nya nyaman bangettt
              </p>
              <div class="rating">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
              </div>
            </div>

            <div class="swiper-slide bg-white p-4">
              <div class="profile d-flex align-items-center mb-3">
                <img src="img/features/1.jpg" width="30px">
                <h6 class="m-0 ms-2">Faisya Revenia</h6>
              </div>
              <p>
                Bagus hotel nya. Kamar nya nyaman bangettt
              </p>
              <div class="rating">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
              </div>
            </div>
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