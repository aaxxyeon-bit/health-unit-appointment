<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WebWizard</title>
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
            height: 400px;
            text-align: center;
            border-radius: 10px;
        }
        .login-container h2 {
            margin: 20px;
            font-size: 1.8em;
            color: #F0F8FF;
        }
        .login-container input {
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
        <h2>Login</h2>
        <form action="login.php" method="post">
            <input type="text" name="Email" placeholder="Email" required>
            <input type="password" name="Password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p><a href="forgotPass.html">Forgot Password?</a></p>
        <p><a href="signup.php">Create an Account</a></p>
    </div>

    <div class="footer">
        <p>Copyright &copy;2024; Designed by <span class="dsigner">WebWizard</span>
    </div>

<?php
session_start();
include("dbconn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $sql = "SELECT * FROM student WHERE Email = '$email' AND Password = '$password'";


$query = mysqli_query($connect,$sql); 

$result = mysqli_num_rows($query);

if($result == 1){
    $sid = mysqli_fetch_assoc($query);
  $_SESSION['ID'] = $sid['ID'];
  $_SESSION['Name'] = $sid['Name'];
  $_SESSION['DOB'] = $sid['DOB'];
  $_SESSION['Email'] = $sid['Email'];
  $_SESSION['PhoneNo'] = $sid['PhoneNo'];
  header("Location: profileStud.php");
  exit();
}
else
{
  echo("<script>alert('Invalid name or password');window.location.href='login.php';</script>");
    }
}
?>

</body>
</html>