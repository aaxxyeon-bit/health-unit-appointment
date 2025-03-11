<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles2.css">
    <script>
        function confirmLogout(event) {
            if (!confirm('You sure you want to log out?')) {
                event.preventDefault();
            }
        }
    </script>
</head>
<body>

<div class="navbar">
    <a href="index.php">Doctor</a>
    <a href="indexStudent.php">Student</a>
    <a href="viewReporting.html">Report</a>
    <a href="indexFeedback.php">Feedback</a>
    <a href="logout.php" onclick="confirmLogout(event)">Log Out</a>
</div>

<div class="content">
    <!-- Your content here -->
<?php
include 'dbconn.php';

$sql = "SELECT * FROM student";
$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #89CFF0; /* Baby blue */
            color: white;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>List of Students</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Password</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["ID"] . "</td>
                <td>" . $row["Name"] . "</td>
                <td>" . $row["DOB"] . "</td>
                <td>" . $row["PhoneNo"] . "</td>
                <td>" . $row["Email"] . "</td>
                <td>" . $row["Password"] . "</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No records found</td></tr>";
    }
    ?>
</table>

</div>

</body>
</html>
