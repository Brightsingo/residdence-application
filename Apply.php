<?php
session_start(); 


if (!isset($_SESSION['username'])) {
    
    header("Location: login.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "SINGO"; 

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $username = $_SESSION['username'];
    
    $sql_user = "SELECT id FROM users WHERE username = '$username'";
    $result_user = $conn->query($sql_user);

    if ($result_user->num_rows > 0) {
        $row = $result_user->fetch_assoc();
        $user_id = $row['id']; 

        
        $student_number = $_POST['student_number'];
        $gender = $_POST['gender'];
        $phone_number = $_POST['phone_number'];
        $residence = $_POST['residence'];

        
        $sql_room_number = "SELECT MAX(room_number) AS max_room FROM applications WHERE residence = '$residence'";
        $result_room_number = $conn->query($sql_room_number);
        $row_room_number = $result_room_number->fetch_assoc();
        $room_number = $row_room_number['max_room'] + 1;

      
        $status = "waitinglist";

        $sql_insert = "INSERT INTO applications (user_id, student_number, gender, phone_number, residence, room_number, status) 
                       VALUES ('$user_id', '$student_number', '$gender', '$phone_number', '$residence', '$room_number', '$status')";
        
        if ($conn->query($sql_insert) === TRUE) {
           
            header("Location: Track.php");
            exit;
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    } else {
        echo "User not found.";
    }

  
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('img/src.jpg');
            background-size: cover;
            background-position: center;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: grid;
            gap: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        nav {
            background-color: #333;
            padding: 40px;
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
            background-color: #555;
        }
    </style>
</head>
<body>
    <center>
    <nav>
        <a href="Apply.php">Apply</a>
        <a href="Track.php">Track</a>
        <a href="INDEX.php">Logout</a>
    </nav>
</center>
    <div class="container">
        <h2 style="color: #0056b3;">Residence application Form</h2>
        <form action="#" method="post">
            <label for="student_number">Student Number:</label>
            <input type="text" id="student_number" name="student_number" required>
            
            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value=" ">Select your choice</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            
            <label for="phone_number">Phone Number:</label>
            <input type="tel" id="phone_number" name="phone_number" required>
            
            <label for="residence">Residence:</label>
            <select id="residence" name="residence">
                <option value=" ">Select your choice</option>
                <option value="F3 MALE HOSTEL">F3 MALE HOSTEL</option>
                <option value="F4 FEMALE HOSTEL">F4 FEMALE HOSTEL</option>
                <option value="LOST CITY BOYS">LOST CITY BOYS</option>
                <option value="LOST CITY GIRLS">LOST CITY GIRLS</option>
                <option value="NEW MALE">NEW Male</option>
                <option value="NEW FEMALE">NEW FEMALE</option>
                <option value="DBSA MALE">DBSA Male</option>
                <option value="DBSA FEMALE">DBSA FEMALE</option>
            </select>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>

