<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "huasdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve the number of appointments for each doctor
$sql = "SELECT DocName, COUNT(*) AS appointment_count FROM appointment GROUP BY DocName";

$result = $conn->query($sql);

$doctorNames = [];
$appointmentCounts = [];

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $doctorNames[] = $row['DocName'];
            $appointmentCounts[] = $row['appointment_count'];
        }
    } else {
        echo "No data found";
    }
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Appointments by Doctor</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #F0F8FF;
            font-family: Arial, sans-serif;
        }

        .title-container {
            text-align: center;
            margin: 20px auto;
            padding: 20px 10px;
            border: 2px solid #4682B4;
            border-radius: 10px;
            width: 90%;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1), 0 0 0 2px rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .logo {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 100px;
        }

        h2 {
            margin: 0;
            font-size: 24px;
            color: #4682B4;
            text-transform: uppercase;
        }


        .chart-container {
            width: 60%;
            margin: 40px auto;
            background-color: #ffffff;
            border: 2px solid #4682B4;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1), 0 0 0 2px rgba(0, 0, 0, 0.05);
        }

        .back-button {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            border: 2px solid #1E90FF;
            background-color: #ffffff;
            color: black;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #1E90FF;
            color: #ffffff;
        }

        .back-button a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    <div class="title-container">
         <a href="viewReporting.html" class="back-button">Back</a>
        <img src="img/LOGO.png" alt="Your Logo" class="logo">
        <h2>Number of Appointments per Doctor</h2>
    </div>

    <div class="chart-container">
        <canvas id="barChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($doctorNames); ?>,
                datasets: [{
                    label: 'Number of Appointments',
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: <?php echo json_encode($appointmentCounts); ?>
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Appointments'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Doctor Name'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
