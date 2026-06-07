
<?php 
    require_once "settings.php";
    $message = "";
    session_start();
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if($conn) {
        if (isset($_POST["username"], $_POST["password"])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $sql = "SELECT * FROM `user` WHERE username = '$username'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($password === $row["password"]) {
                        $_SESSION['username'] = $username;
                        $_SESSION['email'] = $row["email"];
                        header("Location: profile.php");
                        exit();
                    } else { $message = "Incorrect Password!";}
                }
            } else {$message = "User not found!";}
        }
    } else {echo "connection failed";}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4;">

<div style="width: 300px; margin: 100px auto; padding: 20px; background: white; border-radius: 5px; box-shadow: 0 0 10px #ccc;">
    <h2 style="text-align:center;">Login</h2>

    <?php echo "<p style='color: red'>$message</p>"; ?>

    <form method="post">
        <label>Username:</label><br>
        <input type="text" name="username" required
               style="width:100%; padding:5px; margin:5px 0 10px 0;"><br>

        <label>Password:</label><br>
        <input type="password" name="password" required
               style="width:100%; padding:5px; margin:5px 0 10px 0;"><br>

        <input type="submit" value="Login"
               style="width:100%; padding:10px; background:#007BFF; color:white; border:none; cursor:pointer;">
    </form>
</div>

</body>
</html>