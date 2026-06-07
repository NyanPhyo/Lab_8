<?php
    require_once "settings.php";
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    session_start();
    $username = $_SESSION['username'];

    if ($conn) {
        if(isset($_POST["new_email"])){
            $new_email = mysqli_real_escape_string($conn, $_POST['new_email']);
            $sql = "UPDATE `user` SET email = '$new_email' WHERE username = '$username'";
            mysqli_query($conn, $sql);

            $_SESSION['email'] = $new_email;
            header("Location: profile.php");
            exit();
        }
    } else {echo "Connection failed!";}
?>