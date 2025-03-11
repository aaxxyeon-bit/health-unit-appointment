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

// Check if appointmentNo is set and not empty
if (isset($_POST['appointmentNo']) && !empty($_POST['appointmentNo'])) {
    $appointmentNo = $_POST['appointmentNo'];

    // Delete the appointment
    $sql = "DELETE FROM appointment WHERE AppointmentNo = $appointmentNo";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment deleted successfully";
    } else {
        echo "Error deleting appointment: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
