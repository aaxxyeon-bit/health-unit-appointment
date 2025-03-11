 <?php
/* include db connection file */
include("dbconn.php");

if(isset($_POST['submit'])){

/* capture values from HTML form */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Name'];  //siti
    $DOB = $_POST['DOB'];
    $phoneNo = $_POST['PhoneNo']; //eee
    $email = $_POST['Email'];
    $password = $_POST['Password'];  //eee

$checkEmailQuery = mysqli_query($connect, "SELECT * FROM student WHERE Email='$email'");
    if (mysqli_num_rows($checkEmailQuery) > 0) {
        echo "<script>alert('Email is already registered. Please choose a different email.');window.location.href='signup.php';</script>";
        exit();
    } else {
        // Insert new student into database
        $sql = "INSERT INTO student (Name, DOB, PhoneNo, Email, Password) VALUES ('$name', '$DOB', '$phoneNo', '$email', '$password')";
        if (mysqli_query($connect, $sql)) {
            // Redirect to login page after successful signup
            echo "<script>alert('You have successfully signed up!');window.location.href='login.php';</script>";
            exit();
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - WebWizard</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('./image/background.jpg') no-repeat;
            background-size: cover;

        }
        .login-container {
            background: transparent;
            padding: 20px;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            border-radius: 10px;
        }
        .login-container h2 {
            margin: 20px;
            font-size: 1.8em;
            color: #F0F8FF;
        }
        .login-container input {
            color: #F0F8FF;
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 2px solid rgba(255, 255, 255, .2);
            font-size: 15px;
            border-radius: 50px;
            background: transparent;
        }
        .login-container button {
            width: 100px;
            padding: 10px;
            background: #F5FFFA;
            color: #000000;
            border: none;
            cursor: pointer;
            font-size: 1em;
            border-radius: 50px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .login-container button:hover {
            background: #555;
            color: #F5FFFA;
            animation-delay: 3s;
        }
        .login-container p {
            margin: 10px 0 0;
            font-size: 0.9em;
        }
        .login-container p a {
            color: #F0F8FF;
            text-decoration: none;
        }
        .login-container p a:hover {
            text-decoration: underline;
        }

        .footer{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            background-color: #333;
            padding: 5px 0;
            text-align: center;
            width: 100%;
            position: absolute;
            bottom: 0;
        }

        .footer p{
            color: white;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Sign Up</h2>
        <form action="signup.php" method="post">

            <input type="text" name="Name" id="Name" placeholder="Full Name" required>

            <input type="number" name="PhoneNo" id="PhoneNo" placeholder="Phone Number" required>

            <input type="email" name="Email" id="Email" placeholder="Email" required>

            <input type="password" name="Password" id="Password" placeholder="Password" required>

            <input type="date" name="DOB" id="DOB" placeholder="Date of Birth" required>

            <button type="submit" name="submit">Sign Up</button>
        </form>
        <p><a href="login.html">Have an account? Click here!</a></p>
    </div>

    <div class="footer">
        <p>Copyright &copy;2024; Designed by <span class="dsigner">WebWizard</span>
    </div>


</body>
</html>