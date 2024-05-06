
<?php
session_start(); 


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
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
           
            $_SESSION['username'] = $username; 
            header("Location: Apply.php");
            exit;
        } else {
            
            $error_message = "Incorrect password. Please try again.";
        }
    } else {
        
        $error_message = "User not found. Please register first.";
    }

  
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
            padding: 70px;
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
        .login-container {
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

    <div class="login-container">
        <h2>Please login below to your account</h2>
        <form action="#" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <input type="submit" value="Login">
            <input  style="background-color: red;" type="button" value="Cancel" onclick="window.location.href='INDEX.php'">
               <br>
            <a href="Signup.php">Dont have an account?click here</a>
        </form>
    </div>
</body>
</html>

