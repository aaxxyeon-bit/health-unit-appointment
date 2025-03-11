<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles2.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        input[type=submit] {
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .create-button {
            background-color: #89CFF0; /* Baby blue */
        }
        .create-button:hover {
            background-color: #66B2FF;
        }
        .edit-button {
            background-color: #4CAF50; /* Green */
        }
        .edit-button:hover {
            background-color: #45a049;
        }
        .delete-button {
            background-color: #f44336; /* Red */
        }
        .delete-button:hover {
            background-color: #d32f2f;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #89CFF0;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e0f7ff;
        }
    </style>
    <script>
        function confirmLogout(event) {
            if (!confirm('You sure you want to log out?')) {
                event.preventDefault();
            }
        }

        function confirmEdit(event) {
            if (!confirm('Edit this record?')) {
                event.preventDefault();
            }
        }

        function confirmDelete(event) {
            if (!confirm('Are you sure you want to delete this record?')) {
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

    $sql = "SELECT * FROM doctor";
    $result = $connect->query($sql);
    ?>

<h1>List of Doctors</h1>
<form method="get" action="create.php" style="display:inline;">
    <input type="submit" value="Add New Doctor" class="create-button">
</form>

<form method="POST" action="assignApt.php" style="display:inline;">
    <input type="submit" value="Assign Doctor" class="create-button">
</form>



<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Password</th>
        <th>Actions</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["DocID"] . "</td>
                <td>" . $row["Name"] . "</td>
                <td>" . $row["PhoneNo"] . "</td>
                <td>" . $row["Email"] . "</td>
                <td>" . $row["Password"] . "</td>
                <td>
                    <form method='post' action='update.php' style='display:inline;' onsubmit='confirmEdit(event);'>
                        <input type='hidden' name='DocID' value='" . $row["DocID"] . "'>
                        <input type='submit' value='Edit' class='edit-button'>
                    </form>
                    <form method='post' action='delete.php' style='display:inline;' onsubmit='confirmDelete(event);'>
                        <input type='hidden' name='DocID' value='" . $row["DocID"] . "'>
                        <input type='submit' value='Delete' class='delete-button'>
                    </form>
                </td>
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
