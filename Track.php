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
            background-image: url('img/wes.jpg');
            background-size: auto;
            background-position: center top;
            background-repeat: no-repeat;
        }
        .container {
            max-width: 800px; 
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
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
        <h2>Application Information</h2>
        <table>
            <thead>
                <tr>
                    <th>Date of Application</th>
                    <th>Residence</th>
                    <th>Room Number</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
           
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "SINGO";

                
                $conn = new mysqli($servername, $username, $password, $dbname);

              
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                
                $sql = "SELECT submission_date, residence, room_number, status FROM applications";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                   
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["submission_date"] . "</td>";
                        echo "<td>" . $row["residence"] . "</td>";
                        echo "<td>" . $row["room_number"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No applications found.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

