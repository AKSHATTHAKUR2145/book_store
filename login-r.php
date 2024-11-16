<?php
session_start();
require 'connect.php';

if (isset($_POST["submit"])) {
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST["password"]);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM reader WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password (use hashed password for better security)
        if ($password === $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["username"] = $username;
            header("location: dashboard-s.php");
            exit;
        } else {
            echo "<script>alert('Wrong Password!');</script>";
        }
    } else {
        echo "<script>alert('No Account found! Register First.');</script>";
    }

    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reader Login: BookHub</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-form">
        <h2>Reader Login</h2>
        <form action="login-r.php" method="POST" class="form" autocomplete="off">
            <div class="control block-cube block-input">
                <input name="username" type="text" placeholder="Username" required />
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
                <input name="password" type="password" placeholder="Password" required />
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
            
            <button type="submit" name="submit" class="btn">Login</button>
        </form>
    </div>
</body>
</html>
