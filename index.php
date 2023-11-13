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
            <img src="img/room/1.webp" class="card-img-top">

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
            <img src="img/room/1.webp" class="card-img-top">

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
    <div class="container bg-white mt-5 shadow p-4 rounded">
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
    <h4 class="mb-3 fw-bold text-center">Testimonials</h4>
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
    <br><br>
    <br><br>


    <!-- Reach Us -->
    <h4 class="mb-3 fw-bold text-center">Contact Us</h4>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 mb-5 px-4">
          <div class="bg-white rounded shadow p-4">
            <iframe class="w-100 rounded mb-4" height="320 px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.697051085713!2d107.27529727360283!3d-6.303477293685709!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699d4600afe789%3A0x255602cda524ab18!2sResinda%20By%20Padma%20Hotels!5e0!3m2!1sid!2sid!4v1699676132475!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <h6>Address</h6>
            <a href="https://maps.app.goo.gl/CqhZa9CboZ15pzrJ6" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
              <i class="bi bi-geo-alt-fill"></i> Jl. Resinda Raya No.1, Purwadana, Telukjambe Timur, Karawang, Jawa Barat
            </a>
            <h6 class="mt-3">Call Us</h6>
            <a href="tel:(0267) 8622000" class="d-inline-block mb-2 text-decoration-none text-dark">
              <i class="bi bi-telephone-fill"></i> (0267) 8622000
            </a>
            <h6 class="mt-3">Email</h6>
            <a href="mailto: reservation@resindahotel.com" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-envelope-fill"></i> reservation@resindahotel.com
            </a>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 px-4">
          <div class="bg-white rounded shadow p-4">
            <form>
              <h5>Send a message</h5>
              <div class="mt-3">
                <label class="form-label" style="font-weight: 500;">Name</label>
                <input type="text" class="form-control shadow-one">
              </div>
              <div class="mt-3">
                <label class="form-label" style="font-weight: 500;">Email</label>
                <input type="email" class="form-control shadow-one">
              </div>
              <div class="mt-3">
                <label class="form-label" style="font-weight: 500;">Subject</label>
                <input type="text" class="form-control shadow-one">
              </div>
              <div class="mt-3">
                <label class="form-label" style="font-weight: 500;">Message</label>
                <textarea class="form-control shadow-none" rows="7" style="resize: none;"></textarea>
              </div>
              <button type="submit" class="btn btn-primary custom-bg mt-4">SEND</button>
            </form>
          </div>
        </div>
      </div>
    </div>

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