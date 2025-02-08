<?php
require_once 'db_connect.php';

if (isset($_GET['bookingId'])) {
    $bookingId = $_GET['bookingId'];
    $query = "SELECT * FROM booking WHERE bookingId = '$bookingId'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "<script>alert('Booking not found!'); window.location.href='BookCust.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('No booking selected!'); window.location.href='BookCust.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customerName = $_POST['customerName'];
    $phoneNo = $_POST['phoneNo'];
    $gender = $_POST['gender'];
    $roomType = $_POST['roomType'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];

    $updateQuery = "UPDATE booking SET 
        customerName='$customerName', 
        phoneNo='$phoneNo', 
        gender='$gender', 
        roomType='$roomType', 
        checkIn='$checkIn', 
        checkOut='$checkOut' 
        WHERE bookingId='$bookingId'";

    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Booking updated successfully!'); window.location.href='BookCust.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #0f0f0f;
    color: #d4af37;
    margin: 0;
    padding: 0;
}

.container {
    width: 50%;
    margin: 50px auto;
    background: rgb(16, 16, 16);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(251, 159, 0, 0.5);
}

h2 {
    color: #eacb66;
    text-align: center;
    margin-bottom: 20px;
}

/* Form Layout */
.form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
}

label {
    font-weight: bold;
    color: rgb(239, 224, 177);
    margin-bottom: 5px;
}

/* Input Fields */
input {
    width: 96.5%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #d4af37;
    background: black;
    color: rgb(239, 224, 177);
}

select {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #d4af37;
    background: black;
    color: rgb(239, 224, 177);
}

/* Buttons */
.button-group {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
}

.btn {
    padding: 10px 20px;
    background: #d4af37;
    border: none;
    border-radius: 5px;
    color: black;
    font-weight: bold;
    text-align: center;
    font-size: 16px;
    cursor: pointer;
    width: 120px;
}

.btn:hover {
    background: gold;
}

.btn-cancel {
    background: #d4af37;
    text-decoration: none;
    padding: 10px 20px;
    color: black;
    font-weight: bold;
    border-radius: 5px;
    text-align: center;
    font-size: 16px;
    cursor: pointer;
    width: 120px;
}

.btn-cancel:hover {
    background: gold;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Booking</h2>
        <form method="POST">
            <div class="form-group">
                <label>Customer Name:</label>
                <input type="text" name="customerName" value="<?php echo $row['customerName']; ?>" required>
            </div>

            <div class="form-group">
                <label>Phone No:</label>
                <input type="text" name="phoneNo" value="<?php echo $row['phoneNo']; ?>" required>
            </div>

            <div class="form-group">
                <label>Gender:</label>
                <select name="gender">
                    <option value="Male" <?php echo ($row['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo ($row['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                </select>
            </div>

            <div class="form-group">
                <label>Room Type:</label>
                <select name="roomType">
                    <option value="Superior King" <?php echo ($row['roomType'] == 'Superior King') ? 'selected' : ''; ?>>Superior King</option>
                    <option value="Superior Twin" <?php echo ($row['roomType'] == 'Superior Twin') ? 'selected' : ''; ?>>Superior Twin</option>
                    <option value="Deluxe King" <?php echo ($row['roomType'] == 'Deluxe King') ? 'selected' : ''; ?>>Deluxe King</option>
                    <option value="Deluxe Twin" <?php echo ($row['roomType'] == 'Deluxe Twin') ? 'selected' : ''; ?>>Deluxe Twin</option>
                    <option value="Executive Suite" <?php echo ($row['roomType'] == 'Executive Suite') ? 'selected' : ''; ?>>Executive Suite</option>
                    <option value="President Suite" <?php echo ($row['roomType'] == 'President Suite') ? 'selected' : ''; ?>>President Suite</option>
                </select>
            </div>

            <div class="form-group">
                <label>Check In:</label>
                <input type="date" name="checkIn" value="<?php echo $row['checkIn']; ?>" required>
            </div>

            <div class="form-group">
                <label>Check Out:</label>
                <input type="date" name="checkOut" value="<?php echo $row['checkOut']; ?>" required>
            </div>

            <button type="submit" class="btn">Update</button>
            <a href="BookCust.php" class="btn-cancel">Back</a>
        </form>
    </div>
</body>
</html>
