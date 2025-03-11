<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('Logged Out');window.location.href='homepage.html';</script>";

//satgi tgk session time out
?>

