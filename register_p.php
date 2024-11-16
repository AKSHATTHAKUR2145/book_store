<?php
require 'connect.php';
if (isset($_POST["sign up as publisher"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $publisher_id = $_POST["publisher_id"];
    $verifypassword = $_POST["verifypassword"];
    $email = $_POST["email"];
    $duplicate = mysqli_query($conn, "SELECT * FROM publisher WHERE username ='$username'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('username already exists');</script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO publisher (username, password,email) VALUES ('$username', '$password', '$email')";
            mysqli_query($conn, $query);
            echo "<script>alert('Registration Successful!');</script>";
        } else {
            echo "<script>alert('Password does not match :(');</script>";
        }
    }
}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Book Review and Rating Site/sign in</title>
    <link rel="stylesheet" href="style.css">
</head>
<body bgcolor="black">
    <form action="register_p.php" class="form">
        <div class="control">
          <h1>SIGN UP as publisher</h1>
        </div>
        
        <div class="control block-cube block-input">
          <input name="username" type="text" id="username" placeholder="create Username" />
          <div class="bg-top">
            <div class="bg-inner"></div>
          </div>
          <div class="bg-right">
            <div class="bg-inner"></div>
          </div>
          <div class="bg">
            <div class="bg-inner"></div>
          </div>
        </div>
        
        <div class="control block-cube block-input">
          <input name="password" id="password" type="password" placeholder="create Password" />
          <div class="bg-top">
            <div class="bg-inner"></div>
          </div>
          <div class="bg-right">
            <div class="bg-inner"></div>
          </div>
          <div class="bg">
            <div class="bg-inner"></div>
          </div>
        </div>
        <div class="control block-cube block-input">
            <input name="verifypassword" id="verifypassword" type="password" placeholder="verify Password" />
            <div class="bg-top">
              <div class="bg-inner"></div>
            </div>
            <div class="bg-right">
              <div class="bg-inner"></div>
            </div>
            <div class="bg">
              <div class="bg-inner"></div>
            </div>
          </div>
        
          <div class="control block-cube block-input">
            <input name="publisher_id" type="text" id="publisher_id" placeholder="publisher_id" />
            <div class="bg-top">
              <div class="bg-inner"></div>
            </div>
            <div class="bg-right">
              <div class="bg-inner"></div>
            </div>
            <div class="bg">
              <div class="bg-inner"></div>
            </div>
          </div>
          
        <div class="control block-cube block-input">
          <input name="email" type="email" id="email" placeholder="email address" />
          <div class="bg-top">
            <div class="bg-inner"></div>
          </div>
          <div class="bg-right">
            <div class="bg-inner"></div>
          </div>
          <div class="bg">
            <div class="bg-inner"></div>
          </div>
        </div>
        
        <div class="control block-cube block-input">
          <input name="contact-number" type="tel" id="contact-number" placeholder="contact number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required/>
          <div class="bg-top">
            <div class="bg-inner"></div>
          </div>
          <div class="bg-right">
            <div class="bg-inner"></div>
          </div>
          <div class="bg">
            <div class="bg-inner"></div>
          </div>
        </div>
          
          <div class="control block-cube block-input">
            <input name="captcha" id="captcha" type="text" placeholder="enter captcha" />
            <div class="bg-top">
              <div class="bg-inner"></div>
            </div>
            <div class="bg-right">
              <div class="bg-inner"></div>
            </div>
            <div class="bg">
              <div class="bg-inner"></div>
            </div>
          </div>
          <div>
    <br><div>
    <span><input type="checkbox" >confirm you are a human </span>
</div>
    <div class="control block-cube block-input">
        <div class="bg">
          <div class="bg-inner"><img src="captcha.jpeg" alt="captcha" width="250" height="50"></div>
        </div>
      </div>
      <div>
<br>
<div>
    <br>
</div>
        <button class="btn block-cube block-cube-hover" type="button">
            <div class="bg-top">
              <div class="bg-inner"></div>
            </div>
            <div class="bg-right">
              <div class="bg-inner"></div>
            </div>
            <div class="bg">
              <div class="bg-inner"></div>
            </div>
            <div class="text">
              <button><a href="register_p.php">sign up as </a></button>
            </div>
          </button></div>
        </form>
        <footer class="registeration-s-footer">
            <p>Designed by <strong>Akshat Thakur</strong> (IC-2K23-07)</p>
        </footer>
    </body>
    </html>
</body>
</html>
