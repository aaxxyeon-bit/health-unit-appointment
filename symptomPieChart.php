<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "huasdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve symptom data from database
$sql = "SELECT symptom AS symptom_name, COUNT(*) as count FROM appointment GROUP BY symptom";
$result = $conn->query($sql);

$symptoms = [];
$counts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $symptoms[] = $row['symptom_name'];
        $counts[] = $row['count'];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Symptom Frequency
</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #F0F8FF;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
            width: 30%;
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
        <h2>Frequency of Reported Symptoms in Appointments
</h2>
    </div>

    <div class="chart-container">
        <canvas id="symptomPieChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('symptomPieChart').getContext('2d');
        var symptomPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($symptoms); ?>,
                datasets: [{
                    label: 'Number of Cases',
                    data: <?php echo json_encode($counts); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)',
                        'rgba(199, 199, 199, 0.7)',
                        'rgba(83, 102, 255, 0.7)',
                        'rgba(255, 99, 71, 0.7)',
                        'rgba(46, 139, 87, 0.7)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(199, 199, 199, 1)',
                        'rgba(83, 102, 255, 1)',
                        'rgba(255, 99, 71, 1)',
                        'rgba(46, 139, 87, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                animation: {
                    animateScale: true,
                    animateRotate: true,
                    duration: 3000,
                    easing: 'easeOutBounce'
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.raw || 0;
                                return `${label}: ${value}`;
                            }
                        }
                    },
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                size: 14,
                                family: 'Arial, sans-serif',
                                weight: 'bold'
                            },
                            color: '#4682B4'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
