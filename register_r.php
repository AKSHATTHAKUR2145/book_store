<?php
require 'connect.php';

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $verifypassword = $_POST["verifypassword"];
    $email = $_POST["email"];

    $duplicate = mysqli_query($conn, "SELECT * FROM reader WHERE username ='$username'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Username already exists');</script>";
    } else {
        if ($password == $verifypassword) {
            $query = "INSERT INTO reader (username, password, email) VALUES ('$username', '$password', '$email')";
            mysqli_query($conn, $query);
            echo "<script>alert('Registration Successful!');</script>";
        } else {
            echo "<script>alert('Passwords do not match!');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reader Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body bgcolor="black">
    <form action="register_r.php" method="POST" class="form">
        <div class="control">
            <h1>SIGN UP as Reader</h1>
        </div>
        
        <div class="control block-cube block-input">
            <input name="username" type="text" id="username" placeholder="Create Username" required />
        </div>
        
        <div class="control block-cube block-input">
            <input name="password" id="password" type="password" placeholder="Create Password" required />
        </div>
        
        <div class="control block-cube block-input">
            <input name="verifypassword" id="verifypassword" type="password" placeholder="Verify Password" required />
        </div>
        
        <div class="control block-cube block-input">
            <input name="email" type="email" id="email" placeholder="Email Address" required />
        </div>
        
        <div class="control block-cube block-input">
            <input name="contact-number" type="tel" id="contact-number" placeholder="Contact Number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required />
        </div>
          
        <div class="control block-cube block-input">
            <input name="captcha" id="captcha" type="text" placeholder="Enter Captcha" required />
        </div>
        
        <div>
            <input type="checkbox" required /> Confirm you are a human
        </div>
        
        <div>
            <img src="captcha.jpeg" alt="captcha" width="250" height="50">
        </div>
        
        <button class="btn block-cube block-cube-hover" type="submit" name="submit">
            Sign Up as Reader
        </button>
    </form>
    <footer class="registration-s-footer">
        <p>Designed by <strong>Akshat Thakur</strong> (IC-2K23-07)</p>
    </footer>
</body>
</html>
