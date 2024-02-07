<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$username = $_SESSION['username'];
$userFolder = "user_files/$username/";

if(isset($_GET['file'])) {
    $file = $_GET['file'];
    $filePath = $userFolder . $file;
    if(file_exists($filePath)) {
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"" . basename($filePath) . "\""); 
        readfile($filePath);
        exit;
    } else {
        echo "File not found.";
    }
}
?>