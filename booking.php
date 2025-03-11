<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['ID'])) {
// Redirect to login page if not logged in
header("Location: login.php");
exit();
}

// Fetch user ID from session or request
$name = $_SESSION['Name']; // Assuming the user ID is stored in the session
$email = $_SESSION['Email'];
$phoneNo = $_SESSION['PhoneNo'];
$appointmentNo = $_SESSION['appointmentNo'];

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-icons.css" rel="stylesheet">
<link href="css/owl.carousel.min.css" rel="stylesheet">
<link href="css/owl.theme.default.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


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

  .booking-form {
    background-color: #fff; /* Set the background color for the form container */
    padding: 20px; /* Add padding to the form container */
    border-radius: 10px; /* Add border radius for rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add box shadow for a subtle elevation effect */
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
      background: #d9f1ff;
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

</style>

<title>Booking Page</title>

</head>
<body>

<!--navigation bar-->
<nav class="navbar fixed-top navbar-light navbar-expand-lg bg-body-tertiary" style="background-color: #D9F1FF; font-family: 'Poppins'; font-weight: bold; font-size: 20px;">
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
          <a class="nav-link active" href="booking.php">Book Appointment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewapt.php">View Appointment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log Out</a>
        </li>
        <li class="person">
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

<div id="main">
<section class="section-padding" id="booking" style="margin-top: 120px; font-family: 'Poppins';">
      
        <div class="form-container" >
            <div class="row">
                    
                 <div class="col-lg-8 col-12 mx-auto">
                <div class="booking-form">
                                
                <h2 class="text-center mb-lg-3 mb-2">Book an appointment</h2>
                            
                 <form role="form" method="post" action="booking.php">
                     <div class="row"  style="font-size: 20px;">
                         <div class="col-lg-6 col-12 mb-3">
                              <label>Full Name:</label>
                              <label id="name" class="form-control"><?php echo $name; ?></label>
                         </div>
                      <br>

                        <div class="col-lg-6 col-12 mb-3">
                              <label>Email Address:</label>
                              <label id="name" class="form-control"><?php echo $email; ?></label>
                          </div>
                                   
                          <div class="col-lg-6 col-12 mb-3">
                              <label>Phone Number:</label>
                              <label id="name" class="form-control"><?php echo $phoneNo; ?></label>
                          </div>

                          <div class="col-lg-6 col-12 mb-3">
                                <label>Appointment Date:</label>
                               <input type="date" name="AppointmentDate" id="date" value="" class="form-control">          
                          </div>

                          <div class="col-lg-6 col-12 mb-3">
                                <label>Appointment Time:</label>
                                <input type="time" name="AppointmentTime" id="time" value="" class="form-control">
                          </div>

                          <div class="col-12 mb-3">
                                <label>Do you have any of below:</label>
                                <br>
                                <input type="radio" name="Symptom" id="symptom" value="fever">
                                <label>Fever</label>
                                <br>
                                <input type="radio" name="Symptom" id="symptom" value="vomiting">
                                <label>Vomiting</label>
                                <br>
                                <input type="radio" name="Symptom" id="symptom" value="cough">
                                <label>Cough</label>
                                <br>
                                <input type="radio" name="Symptom" id="symptom" value="itchiness">
                                <label>Itchiness</label>
                                <br>
                                <input type="reset">
                          </div>

                          <div class="col-12 mb-3">
                                <textarea class="form-control" rows="5" id="message" name="Message" placeholder="Additional Message"></textarea>
                          </div>

                          <div class="col-lg-3 col-md-4 col-6 mx-auto mt-3">
                                 <button type="submit" class="form-control" name="submit" id="submit-button">Book Now</button>
                          </div>
                        </div>
                    </div>
                  </form>

<?php

// Fetch user details from session
$name = $_SESSION['Name'];
$email = $_SESSION['Email'];
$phoneNo = $_SESSION['PhoneNo'];
$appointmentNo = $_SESSION['appointmentNo'];

include("dbconn.php");

function generateAppointmentNumber($connect) {
    $sql = "SELECT AppointmentNo FROM appointment ORDER BY AppointmentNo DESC LIMIT 1";
    $result = mysqli_query($connect, $sql);

    // If there are no appointments, start from 1
    if (mysqli_num_rows($result) == 0) {
        return '0001';
    } else {
        // Fetch the last appointment number
        $row = mysqli_fetch_assoc($result);
        $lastAppointmentNo = $row['AppointmentNo'];

        // Increment the last appointment number
        $nextAppointmentNo = str_pad((int)$lastAppointmentNo + 1, 4, '0', STR_PAD_LEFT);
        return $nextAppointmentNo;
    }

}

if (isset($_POST['submit'])) {

    //fetch from the form
    $appointmentDate = $_POST['AppointmentDate'];
    $appointmentTime = $_POST['AppointmentTime'];
    $symptom = $_POST['Symptom'];
    $message = $_POST['Message'];
    $nextAppointmentNo = generateAppointmentNumber($connect);
    $cdate=date('Y-m-d');

// Check if appointment date is valid
    if($appointmentDate<=$cdate){
       echo '<script>alert("Appointment date must be greater than todays date")</script>';
    } else {
        $sql = "INSERT INTO appointment (AppointmentNo, Name, Email, PhoneNo, AppointmentDate, AppointmentTime, Symptom, Message, Status, DocName)
            VALUES ('$nextAppointmentNo', '$name', '$email', '$phoneNo', '$appointmentDate', '$appointmentTime', '$symptom', '$message', 'pending', 'pending')";
    }

    if (mysqli_query($connect, $sql)) {
        echo "<script>alert('Appointment booked successfully. Your appointment number is $nextAppointmentNo'); window.location.href = 'viewapt.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>

            </div>
      </div>
    </div>
   </div>
</div>
</div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>