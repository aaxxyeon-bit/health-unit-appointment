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
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type=text], input[type=tel], input[type=email], input[type=password] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type=submit] {
            background-color: #89CFF0; /* Baby blue */
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
        input[type=submit]:hover {
            background-color: #66B2FF;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="index.php">Doctor</a>
    <a href="indexStudent.php">Student</a>
    <a href="#">Report</a>
    <a href="logout.php">Log Out</a>
</div>

<div class="content">
    <!-- Your content here -->
<?php
include 'dbconn.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $DocID = $_POST['DocID'];
    $sql = "SELECT * FROM doctor WHERE DocID=$DocID";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Name'])) {
    $DocID = $_POST['DocID'];
    $Name = $_POST['Name'];
    $PhoneNo = $_POST['PhoneNo'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    $sql = "UPDATE doctor SET Name='$Name', PhoneNo='$PhoneNo', Email='$Email', Password='$Password' WHERE DocID=$DocID";

    if ($connect->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $connect->error;
    }

    $connect->close();
    header("Location: index.php");
}
?>

<form method="post" action="update.php" onsubmit="return confirm('Confirm edit?');">
    <input type="hidden" name="DocID" value="<?php echo isset($row['DocID']) ? $row['DocID'] : ''; ?>">
    <label for="Name">Name:</label>
    <input type="text" id="Name" name="Name" value="<?php echo isset($row['Name']) ? $row['Name'] : ''; ?>" required><br>
    <label for="PhoneNo">Phone Number:</label>
    <input type="tel" id="PhoneNo" name="PhoneNo" value="<?php echo isset($row['PhoneNo']) ? $row['PhoneNo'] : ''; ?>" required><br>
    <label for="Email">Email:</label>
    <input type="email" id="Email" name="Email" value="<?php echo isset($row['Email']) ? $row['Email'] : ''; ?>" required><br>
    <label for="Password">Password:</label>
    <input type="password" id="Password" name="Password" value="<?php echo isset($row['Password']) ? $row['Password'] : ''; ?>" required><br>
    <input type="submit" value="Update">
</form>
</div>
</body>
</html>
