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
    <title>View New Appointments</title>
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
            padding: 10px 20px;
            border: 2px solid #1E90FF;
            border-radius: 5px;
            background-color: #ffffff;
            transition: color 0.3s, background-color 0.3s;
        }

        .menu a:hover {
            color: #ffffff;
            background-color: #1E90FF;
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
            flex-wrap: wrap;
        }

        .approve-button, .reject-button {
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .approve-button {
            background-color: #28a745;
        }

        .approve-button:hover {
            background-color: #218838;
        }

        .reject-button {
            background-color: #dc3545;
        }

        .reject-button:hover {
            background-color: #c82333;
        }

        .done-symbol {
            font-size: 20px;
            color: #1E90FF;
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
    <script>
        function updateAppointmentStatus(action, appointmentNo) {
            var remark = document.getElementById('remark-' + appointmentNo).value;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "processNewAppointment.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert("localhost says: " + action.charAt(0).toUpperCase() + action.slice(1) + " successfully");
                    location.reload(); //refresh page to update the data
                }
            };
            xhr.send("action=" + action + "&id=" + appointmentNo + "&remark=" + encodeURIComponent(remark));
        }
    </script>
</head>
<body>
    <div class="title-container">
        <a href="dashboardDoc.html" class="back-button">Back</a>
        <img src="img/LOGO.png" alt="Your Logo" class="logo">
        <h2>New Appointments</h2>
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
            // Retrieve appointments for the logged-in doctor
            $sql = "SELECT * FROM appointment WHERE (Status = 'Pending' OR Status IS NULL OR Status = '') AND DocID = ?";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("i", $docID);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['AppointmentNo'] . "</td>";
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['PhoneNo'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . $row['AppointmentDate'] . "</td>";
                    echo "<td>" . $row['AppointmentTime'] . "</td>";
                    echo "<td>" . $row['Symptom'] . "</td>";
                    echo "<td>" . $row['Message'] . "</td>";
                    echo "<td>" . (isset($row['Status']) ? $row['Status'] : 'Pending') . "</td>";
                    echo "<td><input type='text' id='remark-" . $row['AppointmentNo'] . "' placeholder='Enter remark'></td>";
                    echo "<td class='action-buttons'>";
                    if ($row['Status'] == 'Pending' || $row['Status'] == '' || is_null($row['Status'])) {
                        echo "<button class='approve-button' onclick=\"updateAppointmentStatus('approve', '" . $row['AppointmentNo'] . "')\">Approve</button>";
                        echo "<button class='reject-button' onclick=\"updateAppointmentStatus('reject', '" . $row['AppointmentNo'] . "')\">Reject</button>";
                    } else {
                        echo "<span class='done-symbol'>&#10003;</span>";
                    }
                    echo "</td>";
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
</body>
</html>