<?php
  require('inc/essentials.php');
  adminLogin();
  require('inc/db_config.php');

  if(isset($_GET['seen']))
  {
    $frm_data = filteration($_GET);

    if($frm_data['seen']=='all'){
      $q = "UPDATE `user_queries` SET `seen`=?";
      $values = [1];
      if(update($q,$values,'ii')){
        alert('success', 'Marked all as read!');
      }
      else{
        alert('error','Operation Failed!');
      }
    }
    else{
      $q = "UPDATE `user_queries` SET `seen`=? WHERE `sr_no`=?";
      $values = [1,$frm_data['seen']];
      if(update($q,$values,'ii')){
        alert('success', 'Marked as read!');
      }
      else{
        alert('error','Operation Failed!');
      }
    }
  }

  if(isset($_GET['del']))
  {
    $frm_data = filteration($_GET);

    if($frm_data['del']=='all'){
      $q = "DELETE FROM `user_queries`";
      if(mysqli_query($con,$q)){
        alert('success', 'All data deleted!');
      }
      else{
        alert('error','Operation Failed!');
      }
    }
    else{
      $q = "DELETE FROM `user_queries` WHERE `sr_no`=?";
      $values = [$frm_data['del']];
      if(delete($q,$values,'i')){
        alert('success', 'Data deleted!');
      }
      else{
        alert('error','Operation Failed!');
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin Panel - Facility</title>
      <?php require('inc/links.php'); ?>
  </head>
  <body style="background-color: #C5DCE2;">

    <?php require('inc/header.php') ?>

    <div class="container-fluid" id="main-content">
      <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
          <h3 class="mb-4">FACILITY HOTEL</h3>

          <!-- General Settings-->
          <div class="card border-0 shadow mb-4">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="card-title m-0">Facility</h5>
                <button type="button" class="btn btn-primary shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#facility-s">
                  <i class="bi bi-plus-square"></i> Add
                </button>
              </div>
              <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                <table class="table table-hover border">
                  <thead class="sticky-top">
                    <tr class="bg-primary text-light">
                      <th scope="col">No</th>
                      <th scope="col">Name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="facility-data">
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Facility Modal-->
    <div class="modal fade" id="facility-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form id="facility_s_form">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Facility</h5>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label fw-bold">Name</label>
                <input type="text" id="facility_name" class="form-control shadow-one" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary shadow-none">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
   
    <?php require('inc/scripts.php')?>
    <script src="scripts/facility.js"></script>
  </body>
</html>