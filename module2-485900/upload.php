<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$username = $_SESSION['username'];
$userFolder = "user_files/$username/";

if(isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    
    if(move_uploaded_file($fileTmpName, $userFolder . $fileName)) {
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Error uploading file.";
    }
}
?>