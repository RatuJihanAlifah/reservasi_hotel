<?php 

  define('SITE_URL', 'http://127.0.0.1/resinda/');
  define('ROOMS_IMG_PATH', SITE_URL . 'img/rooms/');
  define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/resinda/img/');
  define('ROOMS_FOLDER', 'rooms/');

  function adminLogin()
  {
    session_start();
    if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
      echo"<script>
        window.location.href='index.php';
      </script>";
      exit;
    }
  }

  function redirect($url){
    echo"<script>
      window.location.href='$url';
    </script>"  
    ;
    exit;
  }

  function alert($type, $msg){
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
    echo <<<alert
        <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
            <strong class="me-3">$msg</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    alert;
      
  }


  $halaman_aktif = 'logout';

?>