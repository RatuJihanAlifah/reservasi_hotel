<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

  if (isset($_POST['add_room'])) 
  {

    $facility = filteration(json_decode($_POST['facility']));
    $frm_data = filteration($_POST);
    $flag = 0;

    $q1 = "INSERT INTO `rooms` (`name`, `area`, `price`, `quantity`, `adult`, `children`, `description`) VALUES (?,?,?,?,?,?,?)";
    $values = [
        $frm_data['name'],
        $frm_data['area'],
        $frm_data['price'],
        $frm_data['quantity'],
        $frm_data['adult'],
        $frm_data['children'],
        $frm_data['description']
    ];

    if (insert($q1, $values, 'siiiiis')) {
        $flag = 1;
    } 

    $room_id = mysqli_insert_id($con);

    $q2 = "INSERT INTO `room_facility`(`room_id`, `facility_id`) VALUES (?,?)";
    if($stmt = mysqli_prepare($con,$q2))
    {
      foreach($facility as $f){
        mysqli_stmt_bind_param($stmt,'ii',$room_id,$f);
        mysqli_stmt_execute($stmt);
      }
      mysqli_stmt_close($stmt);
    }
    else{
      $flag = 0;
      die('query cannot be prepared - insert');
    }

    if($flag){
      echo 1;
    }
    else{
      echo 0;
    }
  }

  if(isset($_POST['get_all_rooms']))
  {
    $res = select("SELECT * FROM `rooms` WHERE `removed`=?",[0],'i');
    $i=1;

    $data = "";

    while($row = mysqli_fetch_assoc($res))
    {
      if($row['status']==1){
        $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-success text-light btn-sm shadow-none'>active</button>";
      }
      else{
        $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-warning btn-sm shadow-none'>inactive</button>";
      }

      $data.="
        <tr class='align-middle'>
          <td>$i</td>
          <td>$row[name]</td>
          <td>$row[area]</td>
          <td>
            <span class='badge rounded-pill bg-light text-dark'>
              Adult: $row[adult]
            </span><br>
            <span class='badge rounded-pill bg-light text-dark'>
              Children: $row[children]
            </span>
          </td>
          <td>$row[price]</td>
          <td>$row[quantity]</td>
          <td>$status</td>
          <td>
            <button type='button' onclick='edit_details($row[id])' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room'>
              <i class='bi bi-pencil-square'></i> 
            </button>
            <button type='button' onclick=\"room_images($row[id],'$row[name]')\" class='btn btn-info text-light shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#room-images'>
              <i class='bi bi-images'></i> 
            </button>
            <button type='button' onclick='remove_room($row[id])' class='btn btn-danger text-light shadow-none btn-sm'>
              <i class='bi bi-trash'></i> 
            </button>
          </td>
        </tr>
      ";
      $i++;
    }
    echo $data;
  }

  if(isset($_POST['get_room']))
  {
    $frm_data = filteration($_POST);

    $res1 = select("SELECT * FROM `rooms` WHERE `id`=?",[$frm_data['get_room']],'i');
    $res2 = select("SELECT * FROM `room_facility` WHERE `room_id`=?",[$frm_data['get_room']],'i');

    $roomdata = mysqli_fetch_assoc($res1);
    $facility = [];

    if(mysqli_num_rows($res2)>0)
    {
      while($row = mysqli_fetch_assoc($res2)){
        array_push($facility,$row['facility_id']);
      }
    }

    $data = ["roomdata" => $roomdata, "facility" => $facility,];

    $data = json_encode($data);

    echo $data;
  }

  if(isset($_POST['edit_room']))
  {
    $facility = filteration(json_decode($_POST['facility']));
    $frm_data = filteration($_POST);
    $flag = 0;

    $q1 = "UPDATE `rooms` SET `name`=?,`area`=?,`price`=?,`quantity`=?,
    `adult`=?,`children`=?,`description`=? WHERE `id`=?";
    $values = [
      $frm_data['name'],
      $frm_data['area'],
      $frm_data['price'],
      $frm_data['quantity'],
      $frm_data['adult'],
      $frm_data['children'],
      $frm_data['description'],
      $frm_data['room_id']
    ];

    if(update($q1,$values,'siiiiisi')){
      $flag = 1;
    }
    $del_facility = delete("DELETE FROM `room_facility` WHERE `room_id`=?", [$frm_data['room_id']],'i');

    if(!($del_facility)){
      $flag = 0;
    }
    $q2 = "INSERT INTO `room_facility`(`room_id`, `facility_id`) VALUES (?,?)";
    if($stmt = mysqli_prepare($con,$q2))
    {
      foreach($facility as $f){
        mysqli_stmt_bind_param($stmt,'ii',$frm_data['room_id'],$f);
        mysqli_stmt_execute($stmt);
      }
      $flag =1;
      mysqli_stmt_close($stmt);
    }
    else{
      $flag = 0;
      die('query cannot be prepared - insert');
    }

    if($flag){
      echo 1;
    }
    else{
      echo 0;
    }
  }

  if(isset($_POST['toggle_status']))
  {
    $frm_data = filteration($_POST);

    $q = "UPDATE `rooms` SET `status`=? WHERE `id`=?";
    $v = [$frm_data['value'],$frm_data['toggle_status']];

    if(update($q,$v,'ii')){
      echo 1;
    }
    else{
      echo 0;
    }
  }

  if (isset($_POST['add_image']))
  {
    
    $img_r = uploadImage($_FILES['image'], ROOMS_FOLDER);

    if ($img_r == 'inv_img') {
        echo 'Invalid image type'; 
    } else if ($img_r == 'inv_size') {
        echo 'Image size exceeds limit'; 
    } else if ($img_r == 'upd_failed') {
        echo 'Image upload failed'; 
    } else {
   
    $room_id = $_POST['room_id']; 

    $q = "INSERT INTO `room_images`(`room_id`, `image`) VALUES (?,?)";
    $values = [$room_id, $img_r]; 
    $res = insert($q, $values, 'is'); 

    if ($res) {
        echo 'New image added successfully'; 
    } else {
        echo 'Failed to add new image'; 
    }
    }
  }

  if (isset($_POST['get_room_images']))
  {
    $frm_data = filteration($_POST);
    $res = select("SELECT * FROM `room_images` WHERE `room_id`=?",[$frm_data['get_room_images']],'i');
    
    $path = ROOMS_IMG_PATH;

    while($row = mysqli_fetch_assoc($res)) 
    {
      $thumb_btn = ($row['thumb'] == 1) ?
        "<i class='bi bi-check-lg text-light bg-success px-2 py-1 rounded fs-5'></i>" :
        "<button onclick=\"thumb_image('{$row['sr_no']}', '{$row['room_id']}')\" class='btn btn-secondary shadow-none'>
            <i class='bi bi-check-lg'></i>
        </button>";
      
      echo "
      <tr class='align-middle'>
        <td><img src='{$path}{$row['image']}' class='img-fluid'></td>
        <td>{$thumb_btn}</td>
        <td>
          <button onclick='rem_image({$row['sr_no']}, {$row['room_id']})' class='btn btn-danger shadow-none'>
              <i class='bi bi-trash'></i>
          </button>
        </td>
      </tr>";
  }
  }

  if(isset($_POST['rem_image'])) 
  {
    $frm_data = filteration($_POST);

    $values = [$frm_data['image_id'], $frm_data['room_id']];

    $pre_q = "SELECT * FROM `room_images` WHERE `sr_no`=? AND `room_id`=?";
    $res = select($pre_q, $values, 'ii');
    $img = mysqli_fetch_assoc($res);

    if (deleteImage($img['image'], ROOMS_FOLDER)) {
        $q = "DELETE FROM `room_images` WHERE `sr_no`=? AND `room_id`=?";
        $res = delete($q, $values, 'ii');
        
        if ($res) {
            echo 'deleted'; // Beritahu penghapusan berhasil
        } else {
            echo 'failed'; // Beritahu kegagalan penghapusan
        }
    } else {
        echo 0; // Beritahu ada kesalahan dalam proses penghapusan gambar
    }
  }

  if(isset($_POST['thumb_image'])) 
  {
    $frm_data = filteration($_POST);

    $pre_q ="UPDATE `room_images` SET `thumb`=? WHERE `room_id`=?";
    $pre_v = [0,$frm_data['room_id']];
    $pre_res = update($pre_q,$pre_v,'ii');

    $q ="UPDATE `room_images` SET `thumb`=? WHERE `sr_no`=? AND `room_id`=?";
    $v = [1,$frm_data['image_id'],$frm_data['room_id']];
    $res = update($q,$v,'iii');

    echo $res;
  }

  if (isset($_POST['remove_room'])) 
  {
    $frm_data = filteration($_POST);

    $res1 = select("SELECT * FROM `room_images` WHERE `room_id`=?",[$frm_data['room_id']],'i');

    while($row = mysqli_fetch_assoc($res1)){
      deleteImage($row['image'],ROOMS_FOLDER);
    }

    $res2 = delete("DELETE FROM `room_images` WHERE `room_id`=?",[$frm_data['room_id']],'i');
    $res3 = delete("DELETE FROM `room_facility` WHERE `room_id`=?",[$frm_data['room_id']],'i');
    $res4 = update("UPDATE `rooms` SET `removed`=? WHERE `id`=?",[1,$frm_data['room_id']],'ii');

    if($res2 || $res3 || $res4){
      echo 1;
    }
    else{
      echo 0;
    }

  }


?>
