<?php
  require('inc/essentials.php');
  require('inc/db_config.php');
  adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin Panel - Rooms</title>
      <?php require('inc/links.php'); ?>
  </head>
  <body style="background-color: #C5DCE2;">

    <?php require('inc/header.php') ?>

    <div class="container-fluid" id="main-content">
      <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
          <h3 class="mb-4">ROOMS</h3>

          <div class="card border-0 shadow mb-4">
            <div class="card-body">
              <div class="text-end mb-4">
                <button type="button" class="btn btn-primary shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-room">
                  <i class="bi bi-plus-square"></i> Add
                </button>
              </div>
              <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                <table class="table table-hover border text-center">
                  <thead>
                    <tr class="bg-primary text-light">
                      <th scope="col">No</th>
                      <th scope="col">Name</th>
                      <th scope="col">Area</th>
                      <th scope="col">Guests</th>
                      <th scope="col">Price</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="room-data">
                  </tbody>
                </table>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>

    <!-- Add room modal -->
    <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <form id="add_room_form" autocomplete="off">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Room</h5>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Name</label>
                  <input type="text" name="name" class="form-control shadow-one" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Area</label>
                  <input type="number" min="1" name="area" class="form-control shadow-one" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Price</label>
                  <input type="number" min="1" name="price" class="form-control shadow-one" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Quantity</label>
                  <input type="number" min="1" name="quantity" class="form-control shadow-one" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Adult (Max.)</label>
                  <input type="number" min="1" name="adult" class="form-control shadow-one" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Children (Max.)</label>
                  <input type="number" min="1" name="children" class="form-control shadow-one" required>
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label fw-bold">Facilities</label>
                  <div class="row">
                    <?php
                      $res = selectAll('facility');
                      while($opt = mysqli_fetch_assoc($res)){
                        echo"
                          <div class='col-md-3 mb-1'>
                            <label>
                              <input type='checkbox' name='facility' value='$opt[id]' class='form-check-input shadow-none'>
                              $opt[name]
                            </label>
                          </div>
                        ";
                      }
                    ?>
                  </div>
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label fw-bold">Description</label>
                  <textarea name="description" rows="4" class="form-control shadow-none" required></textarea>
                </div>
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

    <!-- Edit room modal -->
    <div class="modal fade" id="edit-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <form id="edit_room_form" autocomplete="off">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Room</h5>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Name</label>
                  <input type="text" name="name" class="form-control shadow-one" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Area</label>
                  <input type="number" min="1" name="area" class="form-control shadow-one" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Price</label>
                  <input type="number" min="1" name="price" class="form-control shadow-one" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Quantity</label>
                  <input type="number" min="1" name="quantity" class="form-control shadow-one" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Adult (Max.)</label>
                  <input type="number" min="1" name="adult" class="form-control shadow-one" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Children (Max.)</label>
                  <input type="number" min="1" name="children" class="form-control shadow-one" required>
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label fw-bold">Facilities</label>
                  <div class="row">
                    <?php
                      $res = selectAll('facility');
                      while($opt = mysqli_fetch_assoc($res)){
                        echo"
                          <div class='col-md-3 mb-1'>
                            <label>
                              <input type='checkbox' name='facility' value='$opt[id]' class='form-check-input shadow-none'>
                              $opt[name]
                            </label>
                          </div>
                        ";
                      }
                    ?>
                  </div>
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label fw-bold">Description</label>
                  <textarea name="description" rows="4" class="form-control shadow-none" required></textarea>
                </div>
                <input type="hidden" name="room_id" value="1">
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

    <!-- Manage room modal -->
    <div class="modal fade" id="room-images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Room Name</h5>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="image-alert">

            </div>  
            <div class="border-bottom border-3 pb-3 mb-3">
              <form id="add_image_form">
                <label class="form-label fw-bold">Add Image</label>
                <input type="file" name="image" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none mb-3" required>
                <button class="btn btn-primary shadow-none">ADD</button>
                <input type="hidden" name="room_id">
              </form>
            </div>
              <div class="table-responsive-lg" style="height: 350px; overflow-y: scroll;">
                <table class="table table-hover border text-center">
                  <thead>
                    <tr class="bg-primary text-light sticky-top">
                      <th scope="col" width="60%">Image</th>
                      <th scope="col">Thumb</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody id="room-image-data">
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>


   
    <?php require('inc/scripts.php')?>
    <script>
      let add_room_form = document.getElementById('add_room_form');

      add_room_form.addEventListener('submit', function(e){
        e.preventDefault();
        add_room();
      });

      function add_room() 
      {
        let data = new FormData();
        data.append('add_room', '');
        data.append('name', add_room_form.elements['name'].value);
        data.append('area', add_room_form.elements['area'].value);
        data.append('price', add_room_form.elements['price'].value);
        data.append('quantity', add_room_form.elements['quantity'].value);
        data.append('adult', add_room_form.elements['adult'].value);
        data.append('children', add_room_form.elements['children'].value);
        data.append('description', add_room_form.elements['description'].value);

        let facility = [];
        add_room_form.elements['facility'].forEach(el =>{
          if(el.checked){
            facility.push(el.value);
          }
        });

        data.append('facility', JSON.stringify(facility));

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/rooms.php",true);

        xhr.onload = function(){
          var myModal = document.getElementById('add-room');
          var modal = bootstrap.Modal.getInstance(myModal);
          modal.hide();

          if(this.responseText == 1){
            alert('success', 'New room added!');
            add_room_form.reset();
            get_all_rooms();
          }
          else{
            alert('error', 'Server Down!');
          }
        }
        xhr.send(data);
            
      }

      function get_all_rooms()
      {
        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/rooms.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function(){
          document.getElementById('room-data').innerHTML = this.responseText;
        }
        xhr.send('get_all_rooms');
      }

      let edit_room_form = document.getElementById('edit_room_form');

      function edit_details(id) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function () {
          let data = JSON.parse(this.responseText);
          let roomData = data.roomdata;
          
          edit_room_form.elements['name'].value = roomData.name;
          edit_room_form.elements['area'].value = roomData.area;
          edit_room_form.elements['price'].value = roomData.price;
          edit_room_form.elements['quantity'].value = roomData.quantity;
          edit_room_form.elements['adult'].value = roomData.adult;
          edit_room_form.elements['children'].value = roomData.children;
          edit_room_form.elements['description'].value = roomData.description;
          edit_room_form.elements['room_id'].value = roomData.id;

          edit_room_form.elements['facility'].forEach(el =>{
            if(data.facility.includes(Number(el.value))){
              el.checked = true;
            }
          });
        }
        xhr.send('get_room=' + id);
      
      }

      edit_room_form.addEventListener('submit', function(e){
        e.preventDefault();
        submit_edit_room();
      });

      function submit_edit_room() 
      {
        let data = new FormData();
        data.append('edit_room', '');
        data.append('room_id', edit_room_form.elements['room_id'].value);
        data.append('name', edit_room_form.elements['name'].value);
        data.append('area', edit_room_form.elements['area'].value);
        data.append('price', edit_room_form.elements['price'].value);
        data.append('quantity', edit_room_form.elements['quantity'].value);
        data.append('adult', edit_room_form.elements['adult'].value);
        data.append('children', edit_room_form.elements['children'].value);
        data.append('description', edit_room_form.elements['description'].value);

        let facility = [];
        edit_room_form.elements['facility'].forEach(el =>{
          if(el.checked){
            facility.push(el.value);
          }
        });

        data.append('facility', JSON.stringify(facility));

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/rooms.php",true);

        xhr.onload = function(){
          var myModal = document.getElementById('edit-room');
          var modal = bootstrap.Modal.getInstance(myModal);
          modal.hide();

          if(this.responseText == 1){
            alert('success', ' Room data edited!');
            edit_room_form.reset();
            get_all_rooms();
          }
          else{
            alert('error', 'Server Down!');
          }
        }
        xhr.send(data);
            
      }

      function toggle_status(id,val)
      {
        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/rooms.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function(){
          if(this.responseText==1){
            alert('success','Status toggled!');
            get_all_rooms()
          }
          else{
            alert('error','Server down');
          }
        }
        xhr.send('toggle_status=' + id + '&value=' + val);
      }

      let add_image_form = document.getElementById('add_image_form');

      add_image_form.addEventListener('submit',function(e){
        e.preventDefault();
        add_image();
      });

      function add_image()
      {
        let data = new FormData();
        data.append('image',add_image_form.elements['image'].files[0]);
        data.append('room_id',add_image_form.elements['room_id'].value);
        data.append('add_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/rooms.php",true);

       
        xhr.onload = function() {
            if (this.responseText === 'Invalid image type') {
                alert('error', 'Only JPG, WEBP, or PNG images are allowed!', 'image-alert');
            } 
            else if (this.responseText === 'Image size exceeds limit') {
                alert('error', 'Image should be less than 2MB!', 'image-alert');
            } 
            else if (this.responseText === 'Image upload failed') {
                alert('error', 'Image upload failed. Server Down!', 'image-alert');
            } 
            else if (this.responseText === 'New image added successfully') {
                alert('success', 'New image added!', 'image-alert');
                add_image_form.reset();
                room_images(add_image_form.elements['room_id'].value,document.querySelector("#room-images .modal-title").innerText)
            }
        };


        xhr.send(data);
      }

      function room_images(id,rname)
      {
        document.querySelector("#room-images .modal-title").innerText = rname;
        add_image_form.elements['room_id'].value = id;
        add_image_form.elements['image'].value = '';

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/rooms.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function(){
          document.getElementById('room-image-data').innerHTML = this.responseText;
        }
        xhr.send('get_room_images='+id);
      }

      function rem_image(img_id, room_id) 
      {
        let data = new FormData();
        data.append('image_id', img_id);
        data.append('room_id', room_id);
        data.append('rem_image', '');

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);

        xhr.onload = function () {
            if (this.responseText === 'deleted') {
                alert('success', 'Image removed!', 'image-alert');
                room_images(room_id, document.querySelector("#room-images .modal-title").innerText);
            } else {
                alert('error', 'Image removal failed', 'image-alert');
            }
        };

        xhr.send(data);
      }

      function thumb_image(img_id, room_id)
      {
        let data = new FormData();
        data.append('image_id', img_id);
        data.append('room_id', room_id);
        data.append('thumb_image', 'update_thumb'); // Menggunakan string untuk menandai perubahan thumbnail

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);

        xhr.onload = function () {
            if (this.responseText == '1') {
                alert('success', 'Image thumbnail changed!', 'image-alert');
                room_images(room_id, document.querySelector("#room-images .modal-title").innerText);
            } else {
                alert('error', 'Image thumbnail failed', 'image-alert');
            }
        };

        xhr.send(data);
      }

      function remove_room(room_id)
      {
        if(confirm("Are you sure, you want to delete this room?"))
        {
          let data = new FormData();
          data.append('room_id', room_id);
          data.append('remove_room', ''); 

          let xhr = new XMLHttpRequest();
          xhr.open("POST", "ajax/rooms.php", true);

          xhr.onload = function () 
          {
            if (this.responseText == '1') {
              alert('success', 'Room removed!');
              get_all_rooms();
            } 
            else {
              alert('error', 'Room removed failed');
            }
          };

          xhr.send(data);
        }
      
      }



      window.onload = function(){
        get_all_rooms();
      }
    </script>


  </body>
</html>