<?php
session_start();
include("dbconn.php");

if (!isset($_SESSION['DocID'])) {
    // If DocID is not set in session, redirect to login page
    header("Location: doctorLogin.html");
    exit(); // Stop further execution
}

// DocID is set, proceed with fetching appointments
$docID = $_SESSION['DocID'];

?>


<!DOCTYPE html>
<html>
<head>
    <title>Total Appointments</title>
    <style>
        body {
            background-color: #D9F1FF;
            font-family: Arial, sans-serif;
        }

        .title-container {
            text-align: center;
            margin: 20px auto;
            padding: 20px 10px;
            border: 2px solid #1E90FF;
            border-radius: 10px;
            width: 90%;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1), 0 0 0 2px rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .logo {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 100px;
        }

        h2 {
            margin: 0;
            font-size: 24px;
            color: #1E90FF;
            text-transform: uppercase;
        }

        .menu-container {
            text-align: center;
            margin: 20px auto;
        }

        .menu {
            display: inline-block;
            padding: 0;
            list-style: none;
        }

        .menu li {
            display: inline;
            margin: 0 15px;
        }

        .menu a {
            text-decoration: none;
            color: #000000;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s, background-color 0.3s;
            padding: 10px 20px;
            border: 2px solid #1E90FF;
            border-radius: 5px;
            background-color: #ffffff;
        }

        .menu a:hover {
            color: #ffffff;
            background-color: #1E90FF;
        }

        .menu li:hover {
            transform: translateX(-5PX);
        }

        .menu li:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: ##1E90FF;
            transition: width 0.3s, lef 0.3s;
            transform: translateX(-50%);
        }

        .menu li:hover::after {
            width: 100%;
            left: 0%;
        }

        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: separate;
            border-spacing: 0;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1), 0 0 0 2px rgba(0, 0, 0, 0.05);
            border: 2px solid #1E90FF;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #dddddd;
        }

        th {
            background-color: #1E90FF;
            color: white;
        }

        td {
            background-color: #f2f2f2;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .done-symbol {
            font-size: 20px;
            color: #1E90FF;
        }
        
        .delete-button {
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            background-color: #dc3545;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .delete-button:hover {
            background-color: #c82333;
        }

        .back-button {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            border: 2px solid #1E90FF;
            background-color: #ffffff;
            color: black;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #1E90FF;
            color: #ffffff;
        }

        .back-button a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    <div class="title-container">
        <a href="dashboardDoc.html" class="back-button">Back</a>
        <img src="img/LOGO.png" alt="Your Logo" class="logo">
        <h2>Total Appointments</h2>
    </div>

    <div class="menu-container">
        <ul class="menu">
            <li><a href="newAppointment.php">New Appointments</a></li>
            <li><a href="approvedAppointment.php">Approved Appointments</a></li>
            <li><a href="rejectedAppointment.php">Rejected Appointments</a></li>
            <li><a href="totalAppointment.php">All Appointments</a></li>
        </ul>
    </div>

    <table>
        <thead>
            <tr>
                <th>Appointment No</th>
                <th>ID</th>
                <th>Name</th>
                <th>Phone No</th>
                <th>Email</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Symptom</th>
                <th>Message</th>
                <th>Status</th>
                <th>Remark</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Establish database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "huasdb";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve appointments for the logged-in doctor
            $sql = "SELECT * FROM appointment WHERE Status = 'Rejected' AND DocID = ?";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("i", $docID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    // Display appointment details
                    // Add delete button in the last column
                    echo "<td>" . $row['AppointmentNo'] . "</td>";
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['PhoneNo'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . $row['AppointmentDate'] . "</td>";
                    echo "<td>" . $row['AppointmentTime'] . "</td>";
                    echo "<td>" . $row['Symptom'] . "</td>";
                    echo "<td>" . $row['Message'] . "</td>";
                    echo "<td>" . $row['Status'] . "</td>";
                    echo "<td>" . $row['Remark'] . "</td>";
                    echo "<td class='action-buttons'><button onclick=\"deleteAppointment(" . $row['AppointmentNo'] . ")\">Delete</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='12'>No appointments found</td></tr>";
            }

            $stmt->close();
            $connect->close();
            ?>
        </tbody>
    </table>

    <script>
        function deleteAppointment(appointmentNo) {
            var confirmation = confirm("Are you sure you want to delete this appointment?");
            if (confirmation) {
                // Send AJAX request to delete appointment
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "deleteAppointment.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Reload the page after deletion
                        location.reload();
                    }
                };
                xhr.send("appointmentNo=" + appointmentNo);
            }
        }
    </script>
</body>
</html>
