<?php 
  require('admin/inc/db_config.php');
  require('admin/inc/essentials.php');
  session_start();

  $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
  $values = [1];
  $contact_r = mysqli_fetch_assoc(select($contact_q,$values,'i'));
    
?>



<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
      <img src="img/logo.png" width="130px" style="margin: 1px;padding: 0px">
      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link me-2" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="rooms.php">Rooms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="#testimoni">Testimoni</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="#fasility">Fasility</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="#contact-us">Contact Us</a>
          </li>
        </ul>

        <?php
        
          if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
          {
            echo"
               <a href='logout.php' class='btn btn-primary btn-sm'>$_SESSION[username] - LOG OUT</a>
            ";  
          }
          else
          {
            echo"
              <form class='d-flex'>
                <button type='button' class='btn btn-outline-primary btn-sm shadow-none me-lg-3 me-3' data-bs-toggle='modal' data-bs-target='#loginModal'>
                  Login
                </button>
                <button type='button' class='btn btn-outline-primary btn-sm shadow-none' data-bs-toggle='modal' data-bs-target='#registerModal'>
                  Register
                </button>
              </form>
            ";
          }

        ?>

        
      </div>
    </div>
</nav>

<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="login_register.php">
        <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center">
          <i class="bi bi-person-circle fs-3 me-2"></i>User Login
          </h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">Email or Username</label>
                <input name="email_username" type="email" class="form-control shadow-one">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control shadow-none">
            </div>
            <div class="d-flex align-items-center justify-content-between mb-2">
                <button type="submit" class="btn btn-primary" name="login">LOGIN</button>
                <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password?</a>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="POST" id="register-form" action="login_register.php">
        <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center">
          <i class="bi bi-person-lines-fill fs-3 me-2"></i>Register Login</h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Name</label>
                <input name="full_name" type="text" class="form-control shadow-one" required>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Username</label>
                <input name="username" type="text" class="form-control shadow-one" required>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control shadow-one" required>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control shadow-one" required>
              </div>
              <div class="text-center my-1">
                <button type="submit" class="btn btn-primary" name="register">REGISTER</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


