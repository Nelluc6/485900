<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$username = $_SESSION['username'];
$userFolder = "user_files/$username/";

if(isset($_GET['file'])) {
    $fileToDelete = $_GET['file'];
    $filePath = $userFolder . $fileToDelete;
    if(file_exists($filePath)) {
        if(unlink($filePath)) {
            header('Location: dashboard.php');
            exit;
        } else {
            echo "Error deleting file.";
        }
    } else {
        echo "File not found.";
    }
} else {
    echo "Invalid request.";
}
?>