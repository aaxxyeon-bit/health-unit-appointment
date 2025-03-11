<?php
// Include the database connection file
include 'dbconn.php';

// Check if AppointmentNo parameter is set and not empty
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $appointmentNo = $_GET['id'];

    // Prepare SQL statement to delete appointment
    $sql = "DELETE FROM appointment WHERE AppointmentNo = ?";

    // Prepare and bind parameters
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $appointmentNo);

    // Execute the delete statement
    if ($stmt->execute()) {
        // Appointment deleted successfully
        echo "<script>alert('Appointment deleted successfully'); window.location.href = 'totalAppointment.php';</script>";
    } else {
        // Error occurred while deleting appointment
        echo "Error: " . $connect->error;
    }

    // Close statement
    $stmt->close();
} else {
    // AppointmentNo parameter is missing or empty
    echo "Error: Missing appointment number parameter";
}

// Close connection (optional if you want to close it here)
$connect->close();
?>
