<?php 

  define('SITE_URL', 'http://127.0.0.1/resinda/');
  define('ROOMS_IMG_PATH', SITE_URL . 'img/rooms/');
  define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/resinda/img/');
  define('ROOMS_FOLDER', 'rooms/');
  define('USERS_FOLDER', 'users/');


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

  function uploadImage($file, $folder)
  {
    $targetDirectory = UPLOAD_IMAGE_PATH . $folder;
    $targetFile = $targetDirectory . basename($file['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $allowedExtensions = array("jpg", "png", "jpeg", "gif");
    if (!in_array($imageFileType, $allowedExtensions)) {
        return 'inv_img'; 
    }

    if ($file['size'] > 5000000) { 
        return 'inv_size';
    }

    if (!move_uploaded_file($file['tmp_name'], $targetFile)) {
        return 'upd_failed'; 
    }

    return basename($file['name']);
  }

  function deleteImage($fileName, $folder)
  {
    $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . '/resinda/img/' . $folder;
    $targetFile = $targetDirectory . $fileName;

    if (file_exists($targetFile)) {
        if (unlink($targetFile)) {
            return 'deleted'; 
        } else {
            return 'del_failed'; 
        }
    } else {
        return 'not_found'; 
    }
  }

  function uploadSVGImage($file, $folder)
  {
    $targetDirectory = UPLOAD_IMAGE_PATH . $folder;
    $targetFile = $targetDirectory . basename($file['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Allow only SVG files
    if ($imageFileType !== 'svg') {
        return 'inv_img';
    }

    if ($file['size'] > 5000000) {
        return 'inv_size';
    }

    if (!move_uploaded_file($file['tmp_name'], $targetFile)) {
        return 'upd_failed';
    }

    return basename($file['name']);
  }

  
  
    $halaman_aktif = 'logout';

?>