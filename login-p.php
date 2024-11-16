<?php
session_start();
require 'connect.php';

if (isset($_POST["submit"])) {
    $publisher_id = $_POST["publisher_id"];
    $password = $_POST["password"];
    $result=mysqli_query($conn , "SELECT * FROM publisher WHERE username=$publisher_id");

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if($password==$row["password"]){
            $_SESSION["login"] = true;
            header("location: dashboard-s.php");
        } 
        else{
            echo "<script>alert('Wrong Password!');</script>";
        }

    } 
    else{
        echo "<script>alert('No Account found! Register First.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reader login:bookhub</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="login-form">
        <h2>reader login</h2>
        <form action="login-p.php" method="POST" class="form" autocomplete="off">
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
          <input name="password" type="password" placeholder="Password" />
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
        
        </form>
    </div>
</body>
</html>