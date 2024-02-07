<?php
session_start();
if(isset($_POST['username'])) {
    $username = $_POST['username'];
    $users = file('users.txt', FILE_IGNORE_NEW_LINES);
    if(in_array($username, $users)) {
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Invalid username.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Enter your username" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>