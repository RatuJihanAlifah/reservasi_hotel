<?php
  require('../inc/db_config.php');
  require('../inc/essentials.php');
  adminLogin();

  if(isset($_POST['add_facility']))
  {
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `facility`(`name`) VALUES (?)";
    $values = [$frm_data['name']];
    $res = insert($q,$values,'s');
    echo $res;
  }

  if (isset($_POST['get_facility'])) 
  {
    $res = selectAll('facility');
    $i = 1;
    if ($res) {
      foreach ($res as $row)
      {
        echo 
          "<tr>
            <td>$i</td>
            <td>{$row['name']}</td>
            <td>
              <button type='button' onclick='rem_facility({$row['id']})' class='btn btn-danger btn-sm'>
                <i class='bi bi-trash'></i> Delete
              </button>
            </td>
          </tr>";
        $i++;
      }
    } else {
        echo "<tr><td colspan='3'>No data available</td></tr>";
    }
  }

  if(isset($_POST['rem_facility']))
  {
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_facility']];

    $check_q = select('SELECT * FROM `room_facility` WHERE `facility_id`=?',[$frm_data['rem_facility']],'i');

    if(mysqli_num_rows($check_q)==0){
      $q = "DELETE FROM `facility` WHERE `id`=?";
      $res = delete($q,$values,'i');
      echo $res;
    }
    else{
      echo 'room_added';
    }

    
  }




?>
