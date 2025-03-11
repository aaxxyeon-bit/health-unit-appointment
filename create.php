<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles2.css">
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
    $Name = $_POST['Name'];
    $PhoneNo = $_POST['PhoneNo'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    $sql = "INSERT INTO doctor (Name, PhoneNo, Email, Password) VALUES ('$Name', '$PhoneNo', '$Email', '$Password')";

    if ($connect->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

    $connect->close();
    header("Location: index.php");
}
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

<form method="post" action="create.php">
    Name: <input type="text" name="Name" required><br>
    Phone Number: <input type="tel" name="PhoneNo" required><br>
    Email: <input type="email" name="Email" required><br>
    Password: <input type="password" name="Password" required><br>
    <input type="submit" value="Add">
</form>
</body>
</html>
</div>
</body>
</html>