<?php
require_once 'db_connect.php';

if (isset($_GET['adminId'])) {
    $AdminId = $_GET['adminId'];
    $query = "SELECT * FROM admins WHERE adminId = '$AdminId'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "<script>alert('Admin not found!'); window.location.href='StaffData.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('No admin selected!'); window.location.href='StaffData.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Username = $_POST['Username'];
    $FullName = $_POST['FullName'];
    $Email = $_POST['Email'];
    
    // Check if password is entered, then hash it
    if (!empty($_POST['Password'])) {
        $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT); // Hash password
        $updateQuery = "UPDATE admins SET 
            username='$Username', 
            password='$Password', 
            fullname='$FullName', 
            email='$Email'
            WHERE adminId='$AdminId'";
    } else {
        // Update without changing password if not provided
        $updateQuery = "UPDATE admins SET 
            username='$Username', 
            fullname='$FullName', 
            email='$Email'
            WHERE adminId='$AdminId'";
    }

    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Staff updated successfully!'); window.location.href='StaffData.php';</script>";
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
    <title>Edit Staff</title>
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
        <h2>Edit Staff</h2>
        <form method="POST">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="Username" value="<?php echo htmlspecialchars($row['username']); ?>" required>
            </div>

            <div class="form-group">
                <label>Password: Insert new password.</label>
                <input type="password" name="Password">
            </div>

            <div class="form-group">
                <label>Full Name:</label>
                <input type="text" name="FullName" value="<?php echo htmlspecialchars($row['fullname']); ?>" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="Email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            </div>

            <div class="button-group">
                <button type="submit" class="btn">Update</button>
                <a href="StaffData.php" class="btn-cancel">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
