<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PROFILE</title>
  <?php require('inc/links.php') ?>

  <style>
    .email-box {
      display: inline-block;
      border: 1px solid #ced4da;
      padding: 8px 12px;
      border-radius: 4px;
      pointer-events: none;
      background-color: #f8f9fa;
    }
  </style>
</head>
<body class="bg-light">
  
  <?php 
    require('inc/header.php'); 

    if(!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)){
      redirect('index.php');
    }

    $u_exist = select("SELECT * FROM `registered_users` WHERE `email`=? LIMIT 1",[$_SESSION['uEmail']],'s');

    if(mysqli_num_rows($u_exist)==0){
      redirect('index.php');
    }

    $u_fetch = mysqli_fetch_assoc($u_exist);
  ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="col-12 my-5 px-4">
        <h2 class="fw-bold h-font">PROFILE</h2>
        <div style="font-size: 14px;">
          <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
          <span class="text-secondary"> > </span>
          <a href="#" class="text-secondary text-decoration-none">PROFILE</a>
        </div>
      </div>
      <div class="col-12 mb-5 px-4">
        <div class="bg-white p-3 p-md-4 rounded shadow">
          <form id="info-form">
            <h5 class="mb-3 fw-bold">Profile Information</h5>
            <div class="row">
              <label class="form-label">Name</label>
              <input name="full_name" value="<?php echo $u_fetch['full_name']?>" type="text" class="form-control  shadow-one" required>

              <label class="form-label mt-2">Username</label>
              <input name="username" value="<?php echo $u_fetch['username']?>" type="text" class="form-control shadow-one" required>

              <label class="form-label mt-2">Email</label>
              <div class="email-box"><?php echo $u_fetch['email']?></div>

            <div class="text-center mt-4">
              <button type="submit" class="btn btn-primary" name="register">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>  

  <?php require('inc/footer.php') ?>

  <script>
    let info_form = document.getElementById('info-form');

    info_form.addEventListener('submit',function(e){
      e.preventDefault();

      let data = new FormData();
      data.append('info_form','');
      data.append('full_name',info_form.elements['full_name'].value);
      data.append('username',info_form.elements['username'].value);
      data.append('email',info_form.elements['email'].value);

      let xhr = new XMLHttpRequest();
      xhr.open("POST","ajax/profile.php",true);

      xhr.onload = function(){
        if(this.responseText == 'email_already'){
          alert('error',"Email is already registered!");
        }
        else if(this.responseText == 0){
          alert('error',"No Changes Made!");
        }
        else{
          alert('success',"Changes Saved!");
        }
        
      }
      xhr.send(data);

    })

  </script>
</body>
</html>