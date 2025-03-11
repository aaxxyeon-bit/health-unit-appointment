<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['ID'])) {
// Redirect to login page if not logged in
header("Location: login.php");
exit();
}

include("dbconn.php");
// Get the user's name from the session

$Email = $_SESSION['Email'];
$appointmentNo = $_SESSION['AppointmentNo'];

$sql = "SELECT * FROM appointment WHERE Email = '$Email'";
$result = mysqli_query($connect, $sql);

ob_start();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["AppointmentNo"] . "</td>
                <td>" . $row["Name"] . "</td>
                <td>" . $row["PhoneNo"] . "</td>
                <td>" . $row["Email"] . "</td>
                <td>" . $row["AppointmentDate"] . "</td>
                <td>" . $row["AppointmentTime"] . "</td>
                <td>" . $row["Status"] . "</td>
                <td>" . $row["DocName"] . "</td>
                <td>
                    <form method='post' action='editapt.php' >
                        <input type='hidden' name='ID' value='" . $row["Email"] . "'>
                        <input type='submit' value='Edit' class='edit-button'>
                    </form>
                </td>                     
            </tr>";
    }
} else {
    echo "<tr><td colspan='9'>No records found</td></tr>";
}
            
$tableRows = ob_get_clean();
mysqli_close($connect);
           
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Appointment</title>
  <style>
  body{
    background-color: #F8F9FA;
  }
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <!--   <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
        $('#example').DataTable();
        });
    </script> -->

    <style>
        body {
      font-family: 'Poppins', sans-serif;
      display: flex;
      background-color: #F8F9FA;
      color: #343A40;
    }

    .nav-item {
        margin-left: 20px;
        margin-right: 20px;
    }

        .center-table {
            display: flex;
            justify-content: center;
            background-color:#D9F1FF; 
            color: #343A40;;
            border-radius: 20px;
            padding: 20px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 2);
            text-align: center;
        }
        .container {
            width: 90%; 
            margin: 0 auto; 
        }

        .person{
      position: absolute;
      margin-right: 45px;
      right: 0;
    }

    .person-icon{
      font-size: 50px;
      cursor: pointer;

    }

    .dropdown{
      width: 100px;
      background: #87CEEB;
      position: absolute;
      z-index: 999 ;
      display: none;
      list-style-type: none;
      padding: 0;
      margin: 0;
      top: 100%;
      right: 0;
    }

   .dropdown li {
      display: block;
    }

    .person:hover .dropdown{
      display: block;
    }

    .edit-button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 8px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    transition-duration: 0.4s;
}

.edit-button:hover {
    background-color: #0056b3; /* Darker Green */
}
    </style>

</head>
<body>

    <!--navigation bar-->
<nav class="navbar fixed-top navbar-light navbar-expand-lg bg-body-tertiary" style="background-color: #87CEEB;font-family: 'Poppins'; font-weight: bold; font-size: 20px;">
   <a class="navbar-brand" href="#">
    <img src="image/LOGO.png" width="100" height="65" alt="">
  </a>

  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="homepage.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="booking.php">Book Appointment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="viewapt.php">View Appointment</a>
        </li>
        <li class="person nav-item">
          <a><i class="material-icons person-icon">person</i></a>
          <ul class="dropdown">
            <li class="nav-link"><a href="profileStud.php">Profile</a></li>
            <li class="nav-link"><a href="logout.php">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--end-->



  <div class="container" style="margin-top: 120px;">
  <h1>LIST OF ALL APPOINTMENT</h1>
  <br>
    <div class="row justify-content-center center-table" >
      <table class="table table-striped">
      <thead>
              <tr>
                  <th>APPOINTMENT NO</th>
                  <th>NAME</th>
                  <th>PHONE NUMBER</th>
                  <th>EMAIL</th>
                  <th>APPOINTMENT DATE</th>
                  <th>APPOINTMENT TIME</th>
                  <th>STATUS</th>
                  <th>DOCTOR NAME</th>
                  <th>ACTION</th>
              </tr>

              
          </thead>

          <tbody>
            <?php echo $tableRows; ?>
      </tbody>
  </table>
</div>
</div>

</body>
</html>