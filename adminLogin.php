<?php
session_start();
include("dbconn.php");

if (isset($_POST['Email']) && isset($_POST['Password'])) {
    $Email = $_POST['Email']; 
    $Password = $_POST['Password'];

    $sql = "SELECT * FROM admin WHERE Email = '$Email'";
    $query = mysqli_query($connect, $sql);

    if (mysqli_num_rows($query) == 0) {
        // Email not found
        echo "<script>alert('You are not an admin');window.location.href='adminLogin.html';</script>";
    } else {
        // Email found, check password
        $row = mysqli_fetch_assoc($query);
        if ($row['Password'] == $Password) {
            // Password matches
            echo "<script>alert('Log in successful!');window.location.href='index.php';</script>";
        } else {
            // Password does not match
            echo "<script>alert('Wrong password');window.location.href='adminLogin.html';</script>";
        }
    }
}
?>
