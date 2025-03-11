<?php
include 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Feedback = $_POST['Feedback'];

    $sql = "INSERT INTO feedback (Name, Email, Feedback) VALUES ('$Name', '$Email', '$Feedback')";

    if ($connect->query($sql) === TRUE) {
        echo "<script>alert('Thank You for Your Feedback!');window.location.href='homepage.html';</script>";
    } else {
        $message = "Error: " . $sql . "<br>" . $connect->error;
    }

    $connect->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        .button {
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
        .button:hover {
            background-color: #66B2FF;
        }
    </style>
</head>
<body>

<?php if (!empty($message)): ?>
<script>
    alert('<?php echo $message; ?>');
</script>
<?php endif; ?>

</body>
</html>
