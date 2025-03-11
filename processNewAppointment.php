<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "huasdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$action = $_POST['action'];
$appointmentNo = $_POST['id'];
$remark = $_POST['remark'];

$status = $action === 'approve' ? 'Approved' : 'Rejected';

$sql = "UPDATE appointment SET Status='$status', Remark='$remark' WHERE AppointmentNo='$appointmentNo'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>