<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-top: 20px;
        }
        select {
            padding: 5px;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Applications</h2>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Student Number</th>
            <th>Residence</th>
            <th>Room Number</th>
            <th>Status</th>
            <th>Action</th>
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

        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $application_id = $_POST['application_id'];
            $new_status = $_POST['new_status'];

            
            $update_sql = "UPDATE applications SET status = '$new_status' WHERE id = $application_id";
            if ($conn->query($update_sql) === TRUE) {
                
                echo "<meta http-equiv='refresh' content='0'>";
            } else {
                echo "Error updating status: " . $conn->error;
            }
        }

        
        $sql = "SELECT applications.id, users.fullname, applications.student_number, applications.residence, applications.room_number, applications.status 
                FROM applications 
                INNER JOIN users ON applications.user_id = users.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["fullname"] . "</td>";
                echo "<td>" . $row["student_number"] . "</td>";
                echo "<td>" . $row["residence"] . "</td>";
                echo "<td>" . $row["room_number"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td>";
                echo "<form action='' method='post'>";
                echo "<input type='hidden' name='application_id' value='" . $row["id"] . "'>";
                echo "<select name='new_status'>";
                echo "<option value='admitted'>Admitted</option>";
                echo "<option value='rejected'>Rejected</option>";
                echo "</select>";
                echo "<input type='submit' value='Update'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No applications found.</td></tr>";
        }
        $conn->close();
        ?>
    </tbody>
</table>

</body>
</html>
