<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style='color: navy'> Profile Page </h1>
    <?php 
        echo "<h3 style='color: royalblue'> Welcome, $username</h3>";
        echo "<h3 style='color: royalblue'> Email: $email</h3>";
    ?>
    <form action="update_profile.php" method="post">
        <input type="submit" value="change_email"
               style="width:100%; padding:10px; background:#007BFF; color:white; border:none; cursor:pointer;">
        <input type="text" name="new_email" required placeholder="Enter new email"
               style="width:100%; padding:5px; margin:5px 0 10px 0;"><br>
    </form>
</body>
</html>

