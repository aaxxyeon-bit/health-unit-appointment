<?php
include 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $DocID = $_POST['DocID'];
    $sql = "DELETE FROM doctor WHERE DocID=$DocID";

    if ($connect->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $connect->error;
    }

    $connect->close();
    header("Location: index.php");
}
?>
