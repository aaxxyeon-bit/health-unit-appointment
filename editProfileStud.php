<?php
session_start();
if (!isset($_SESSION['ID'])) {
    header("Location: login.php");
    exit();
}

include("dbconn.php");

$ID = $_SESSION['ID'];

// Fetch current user data from the database using the user ID
$query = mysqli_query($connect, "SELECT * FROM student WHERE ID='$ID'");
$user = mysqli_fetch_assoc($query);

$name = $_SESSION['Name']; // Assuming the user ID is stored in the session
$DOB = $_SESSION['DOB'];
$email = $_SESSION['Email'];
$phone = $_SESSION['PhoneNo'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Name'];
    $DOB = $_POST['DOB'];
    $email = $_POST['Email'];
    $phone = $_POST['PhoneNo'];

    // Update the database
    $sql = "UPDATE student SET Name = '$name', DOB = '$DOB', Email = '$email', PhoneNo = '$phone' WHERE ID = '$ID'";
    if (mysqli_query($connect, $sql)) {
        $_SESSION['Name'] = $name;
        $_SESSION['DOB'] = $DOB;
        $_SESSION['Email'] = $email;
        $_SESSION['PhoneNo'] = $phone;
        
        echo "<script>alert('Profile updated successfully.');window.location.href='profileStud.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }
}
mysqli_close($connect);
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
<title>Edit Profile</title>
<style>
  
  body {
      font-family: 'Poppins', sans-serif;
      display: flex;
    }

  .nav-item {
      margin-left: 20px;
      margin-right: 20px;
      position: relative;
    }

  .booking-form {
    background-color: #fff; /* Set the background color for the form container */
    padding: 20px; /* Add padding to the form container */
    border-radius: 10px; /* Add border radius for rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add box shadow for a subtle elevation effect */
    margin-left: 390px;
    position: absolute;
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
          <a class="nav-link" href="booking.php">Book Appointment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewapt.php">View Appointment</a>
        </li>
        <li class="person">
          <a><i class="material-icons person-icon">person</i></a>
          <ul class="dropdown">
            <li class="nav-link"><a href="profileStud.php">Edit Profile</a></li>
            <li class="nav-link"><a href="logout.php">Log Out</a></li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--end-->
<div id="main">
<section class="section-padding" id="booking" style="margin-top: 150px; font-family: 'Poppins';">
      
        <div class="form-container" >
            <div class="row">
                    
                 <div class="col-lg-8 col-12 mx-auto">
                <div class="booking-form">
                                
                <h2 class="text-center mb-lg-3 mb-2">Edit Profile</h2>
                            
                 <form role="form" method="post" action="editProfileStud.php">
                     <div class="row">

                     	<div class="col-lg-6 col-12 mb-3">
                     		<label>Name:</label><br>
                            <input type="text" name="Name" value="<?php echo $name; ?>" class="form-control" required>
                         </div>
                      <br>

                      <div class="col-lg-6 col-12 mb-3">
                      		<label>Date of Birth:</label><br>
                            <input type="date" name="DOB" value="<?php echo $DOB; ?>" class="form-control" required>
                          </div>

                        <div class="col-lg-6 col-12 mb-3">
                        	<label>Email:</label><br>
                            <input type="email" name="Email" value="<?php echo $email; ?>" class="form-control" required>
                          </div>
       
                          <div class="col-lg-6 col-12 mb-3">
                          	<label>Phone No:</label><br>
                            <input type="number" name="PhoneNo" value="<?php echo $phone; ?>" class="form-control" required>
                          </div>
 

                          <div class="col-lg-3 col-md-4 col-6 mx-auto mt-3">
                                 <button type="submit" class="form-control" name="submit" id="submit-button">Update</button>
                          </div>
                        </div>
                    </div>
                  </form>



            </div>
      </div>
    </div>
   </div>
</div>
</div>
</section>
</body>
</html>