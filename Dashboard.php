
<?php 
require_once 'AdminPage.php';
require_once 'db_connect.php';

// Query for Dashboard Stats
$sql_total_bookings = "SELECT COUNT(*) as total FROM booking";
$sql_total_male = "SELECT COUNT(*) as total FROM booking WHERE gender='Male'";
$sql_total_female = "SELECT COUNT(*) as total FROM booking WHERE gender='Female'";
$sql_total_room_types = "SELECT COUNT(DISTINCT roomType) as total FROM booking";

$result_total_bookings = mysqli_query($conn, $sql_total_bookings);
$result_total_male = mysqli_query($conn, $sql_total_male);
$result_total_female = mysqli_query($conn, $sql_total_female);
$result_total_room_types = mysqli_query($conn, $sql_total_room_types);

$total_bookings = mysqli_fetch_assoc($result_total_bookings)['total'];
$total_male = mysqli_fetch_assoc($result_total_male)['total'];
$total_female = mysqli_fetch_assoc($result_total_female)['total'];
$total_room_types = mysqli_fetch_assoc($result_total_room_types)['total'];

// Query for Pie Chart (Gender Distribution)
$sql_gender = "SELECT gender, count(gender) as Counts FROM booking GROUP BY gender";
$result_gender = mysqli_query($conn, $sql_gender);

// Query for Bar Chart (Room Type Distribution)
$sql_room = "SELECT roomType, count(roomType) as Counts FROM booking GROUP BY roomType";
$result_room = mysqli_query($conn, $sql_room);

// Query for Pie Chart (Destination Distribution)
$sql_destination = "SELECT destination, count(destination) as Counts FROM booking GROUP BY destination";
$result_destination = mysqli_query($conn, $sql_destination);

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <style>
    h2{
        color: white;
        text-align: center;
        background-color: rgb(209, 119, 3);
        padding: 12px 0px;
    }
    .dashboard {
        display: flex;
        justify-content:center;
        margin-bottom: 20px;
        gap:30px;
    }
    .dashboard-card {
        background: linear-gradient(145deg,rgb(18, 18, 18),rgb(17, 17, 17));
        padding: 15px;
        border-radius: 10px;
        text-align: center;
        width: 200px;
        box-shadow: 0px 0px 10px rgb(209, 119, 3);
        transition: 0.3s;
    }
    .dashboard-card:hover {
        box-shadow: 0px 0px 20px rgb(237, 178, 101);
    }
    .dashboard-card h3 {
        margin: 0;
        font-size: 18px;
        color:rgb(250, 197, 52);
    }
    .dashboard-card p {
        margin: 5px 0 0;
        font-size: 22px;
        font-weight: bold;
        color: #fff;
    }
    .charts-container {
        display: flex;
        gap: 20px;
        justify-content:center;
    }
    /* Chart Styling */
    #pie_chart_gender, #bar_chart_room, #pie_chart_destination {
        background: linear-gradient(145deg,rgb(18, 18, 18),rgb(17, 17, 17));
        padding: 3px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(255, 183, 0, 0.5);
    }
  </style>
  <script src="https://www.gstatic.com/charts/loader.js"></script>
  <script>
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
      // Pie Chart - Gender Distribution
      var genderData = new google.visualization.DataTable();
      genderData.addColumn('string', 'Gender');
      genderData.addColumn('number', 'Counts');
      genderData.addRows([
        <?php
          while ($row = mysqli_fetch_assoc($result_gender)) {
              echo "['" . $row["gender"] . "', " . $row["Counts"] . "], ";
          }
        ?>
      ]);

      var genderOptions = { 
        title: 'Gender Distribution', 
        width: 400, 
        height: 300,
        backgroundColor: '#111112', 
        titleTextStyle: { color: '#FFD700', fontSize: 16 },
        legendTextStyle: { color: '#FFD700' },
        pieSliceBorderColor: '#0c0c0b',
        slices: { 0: { color: '#FFD700' }, 1: { color: '#C0C0C0' } }
      };
      var genderChart = new google.visualization.PieChart(document.getElementById('pie_chart_gender'));
      genderChart.draw(genderData, genderOptions);

      // Bar Chart - Room Type Distribution
      var roomData = google.visualization.arrayToDataTable([
        ['Room Type', 'Counts'],
        <?php
          while ($row = mysqli_fetch_assoc($result_room)) {
              echo "['" . $row["roomType"] . "', " . $row["Counts"] . "], ";
          }
        ?>
      ]);

      var roomOptions = {
        chart: { title: 'Room Type Distribution' },
        backgroundColor: '#111112',
        legend: { position: "none" },
        titleTextStyle: { color: '#f0ce18', fontSize: 16 },
        hAxis: { textStyle: { color: '#f0ce18' } },
        vAxis: { textStyle: { color: '#f0ce18' } },
        bars: 'horizontal',
        colors: ['#eb9e0f']
      };

      var roomChart = new google.charts.Bar(document.getElementById('bar_chart_room'));
      roomChart.draw(roomData, google.charts.Bar.convertOptions(roomOptions));

      // Pie Chart - Destination Distribution
      var destinationData = new google.visualization.DataTable();
      destinationData.addColumn('string', 'Destination');
      destinationData.addColumn('number', 'Counts');
      destinationData.addRows([
        <?php
          while ($row = mysqli_fetch_assoc($result_destination)) {
              echo "['" . $row["destination"] . "', " . $row["Counts"] . "], ";
          }
        ?>
      ]);

      var destinationOptions = { 
        title: 'Popular Destinations', 
        width: 400, 
        height: 300,
        backgroundColor: '#111112', 
        titleTextStyle: { color: '#FFD700', fontSize: 16 },
        legendTextStyle: { color: '#FFD700' },
        pieSliceBorderColor: '#000',
        slices: { 0: { color: '#FFD700' }, 1: { color: '#C0C0C0' } }
      };
      var destinationChart = new google.visualization.PieChart(document.getElementById('pie_chart_destination'));
      destinationChart.draw(destinationData, destinationOptions);
    }
  </script>
</head>
<body>

  <!-- Dashboard Section -->
   <h2>Dashboard & Chart</h2>
   <br>
  <div class="dashboard">
    <div class="dashboard-card">
      <h3>Total Bookings</h3>
      <p><?php echo $total_bookings; ?></p>
    </div>
    <div class="dashboard-card">
      <h3>Total Male Customers</h3>
      <p><?php echo $total_male; ?></p>
    </div>
    <div class="dashboard-card">
      <h3>Total Female Customers</h3>
      <p><?php echo $total_female; ?></p>
    </div>
    <div class="dashboard-card">
      <h3>Total Room Types</h3>
      <p><?php echo $total_room_types; ?></p>
    </div>
  </div>

  <!-- Charts Section -->
  <div class="charts-container">
    <div id="pie_chart_gender"></div>
    <div id="bar_chart_room"></div>
    <div id="pie_chart_destination"></div>
  </div>
  <br><br><br>

</body>
</html>
