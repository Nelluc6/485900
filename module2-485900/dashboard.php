<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
$username = $_SESSION['username'];
$userFolder = "user_files/$username/";

// Get list of files
$files = array_diff(scandir($userFolder), array('.', '..'));

if(isset($_GET['delete'])) {
    $fileToDelete = $_GET['delete'];
    if(file_exists($userFolder . $fileToDelete)) {
        unlink($userFolder . $fileToDelete);
        header('Location: dashboard.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $username; ?></h2>
    <h3>Your Files:</h3>
    <ul>
        <?php foreach($files as $file): ?>
            <li>
                <?php echo $file; ?>
                <a href="view.php?user=<?php echo $username; ?>&file=<?php echo urlencode($file); ?>" target="_blank">View</a>
                <a href="dashboard.php?delete=<?php echo urlencode($file); ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <h3>Upload New File:</h3>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="submit">Upload</button>
    </form>
    <a href="index.php">Logout</a>
</body>
</html>