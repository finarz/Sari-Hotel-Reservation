<?php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['bookingId'])) {
        $bookingId = mysqli_real_escape_string($conn, $_POST['bookingId']);
        
        // Toggle confirmation status for booking
        $query = "UPDATE booking SET confirmed = NOT confirmed WHERE bookingId = '$bookingId'";
        
        if (mysqli_query($conn, $query)) {
            header("Location: BookCust.php");
            exit();
        } else {
            echo "Error updating booking record: " . mysqli_error($conn);
        }
    }

    if (isset($_POST['adminId'])) {
        $adminId = mysqli_real_escape_string($conn, $_POST['adminId']);
        
        $query = "UPDATE admins WHERE adminId = '$AdminId'";
        
        if (mysqli_query($conn, $query)) {
            header("Location: StaffData.php");
            exit();
        } else {
            echo "Error updating admin record: " . mysqli_error($conn);
        }
    }
}
?>
