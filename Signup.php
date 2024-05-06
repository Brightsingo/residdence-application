<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "SINGO"; 

   
    $conn = new mysqli($servername, $username, $password, $dbname);

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    
    if ($password !== $confirm_password) {
        die("Error: Passwords do not match.");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    
    $sql = "INSERT INTO users (username, fullname, password) VALUES ('$username', '$fullname', '$hashed_password')";


    if ($conn->query($sql) === TRUE) {
        
        header("Location: login.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

   
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    
</head>
<body>
    <nav>
        <a href="INDEX.php">Home</a>
        <a href="login.php">Login</a>
        <a href="Signup.php">Signup</a>
    </nav>
    <br>
    <br>
    <br>

    <div class="signup-container">
        <h2>Create an account here</h2>
        <form action="#" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="text" name="fullname" placeholder="Full Name" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <br>
            <input type="submit" value="Sign Up">
            <input style="background-color: red;" type="button" value="Cancel" onclick="window.location.href='INDEX.php'">
            <br>
            <a href="login.php">Already have an account? Login here</a>
        </form>
    </div>
</body>
</html>


<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-image: url('img/img.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    nav {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 40px;
        width: 100%;
        position: fixed;
        top: 0;
        z-index: 1000;
        display: flex;
        justify-content: center;
    }
    nav a {
        color: #fff;
        text-decoration: none;
        margin: 0 10px;
        padding: 5px 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    nav a:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }
    .signup-container {
        background: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        max-width: 400px;
        width: 100%;
        text-align: center;
    }
    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    input[type="submit"],
    input[type="button"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }
    input[type="button"]:hover {
        background-color: #45a049;
    }
</style>

