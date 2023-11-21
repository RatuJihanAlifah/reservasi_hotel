<?php
            
    $hname = 'localhost';
    $uname = 'root';
    $pass = '';
    $db = 'resinda';

     $con = mysqli_connect($hname,$uname,$pass,$db);

    if(!$con){
        die("Cannot Connect to Database".mysqli_connect_error());
    }

    function filteration($data){
        foreach($data as $key => $value){
            $value = trim($value);
            $value = stripslashes($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            $data[$key] = $value;
        }
        return $data;
    }

    function select($sql,$values,$datatypes)
    {
        $con = $GLOBALS['con'];
        if($stmt = mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt)){
                $res = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else{
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Select");
            }
        }
        else{
            die("Query cannot be prepared - Select");
        }
    }

    function update($sql,$values,$datatypes)
    {
        $con = $GLOBALS['con'];
        if($stmt = mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt)){
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else{
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Update");
            }
        }
        else{
            die("Query cannot be prepared - Update");
        }
    }

    function insert($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];
        if ($stmt = mysqli_prepare($con, $sql)) 
        {
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            } else {
                mysqli_stmt_close($stmt); 
                die("Query cannot be executed - Insert");
            }
        } else {
            die("Query cannot be prepared - Insert");
        }
    }

        function delete($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];
        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            } else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Delete");
            }
        } else {
            die("Query cannot be prepared - Delete");
        }
    }

    function selectAll($table) {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM $table";
        $result = mysqli_query($con, $sql);
    
        if (!$result) {
            die("Query cannot be executed - Select All");
        }
    
        return $result;
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

    
    

    

    
?>