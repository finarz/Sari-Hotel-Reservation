<?php require_once './AdminPage.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Booking</title>
    <link rel="stylesheet" href="">
    <style>
        /* Table Styling */
        .container {
            width: 90%;
            margin: 20px auto;
            background: rgb(16, 16, 16);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(251, 159, 0, 0.5);
        }

        h2 {
            text-align: center;
            color: rgb(234, 203, 102);
        }

        .search-container {
            text-align: center;
            margin-bottom: 15px;
        }

        #searchInput {
            width: 40%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #d4af37;
        }

        #searchBtn, .action-btn {
            padding: 10px 15px;
            background: #d4af37;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 5px;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        #searchBtn:hover, .action-btn:hover {
            background: #b8860b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: rgb(0, 0, 0);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid rgb(218, 194, 116);
        }

        th {
            background: rgb(255, 140, 0);
            color: #000000;
            font-weight: bold;
        }

        td {
            background: rgb(0, 0, 0);
            color: rgb(248, 235, 193);
        }

        td:hover {
            background: #333;
        }

        .confirm-btn, .edit-btn, .delete-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: black;
        }
        
        .confirmed {
            background: green;
            color: white;
        }
        
        .not-confirmed {
            background: red;
            color: white;
        }

        .edit-btn {
            background: blue;
            color: white;
            text-decoration: none;
        }

        .delete-btn {
            background: red;
            color: white;
        }

        .pagination {
            text-align: center;
            margin-top: 20px;
        }

        .pagination a {
            text-decoration: none;
            padding: 10px 15px;
            margin: 5px;
            background: #d4af37;
            color: #000000;
            border-radius: 5px;
            transition: 0.3s;
        }

        .pagination a:hover {
            background: #b8860b;
        }
    </style>
    <script>
        function confirmDelete(event) {
            if (!confirm('Are you sure you want to delete this booking ?')) {
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>CUSTOMERS BOOKING</h2>

        <!-- Search Form -->
        <div class="search-container">
            <form method="GET" action="">
                <input type="text" name="search" id="searchInput" placeholder="Enter Booking ID..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <button type="submit" id="searchBtn">Search</button>
            </form>
        </div>

        <?php
        require_once 'db_connect.php';

        if (isset($_POST['delete'])) {
            $bookingID = $_POST['bookingId'];
            $deleteQuery = "DELETE FROM booking WHERE bookingId = '$bookingID'";
            mysqli_query($conn, $deleteQuery);
            echo "<p style='color: red; text-align: center;'>Booking deleted successfully!</p>";
        }

        // Pagination settings
        $results_per_page = 10;
        $searchQuery = "";

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = mysqli_real_escape_string($conn, $_GET['search']);
            $searchQuery = " WHERE bookingId LIKE '%$search%' ";
        }

        // Get total records count
        $query = "SELECT * FROM booking" . $searchQuery;
        $result = mysqli_query($conn, $query);
        $number_of_result = mysqli_num_rows($result);

        echo "<p>Number of Booking: " . $number_of_result . "</p>";

        $number_of_page = ceil($number_of_result / $results_per_page);
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $page_first_result = ($page - 1) * $results_per_page;

        $query = "SELECT * FROM booking" . $searchQuery . " LIMIT " . $page_first_result . ',' . $results_per_page;
        $result = mysqli_query($conn, $query);
        ?>

        <!-- Booking Table -->
        <table id="dataTable">
            <tr>
                <th>Booking No.</th>
                <th>Customer Name</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Room Type</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Confirm Order</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['bookingId']; ?></td>
                    <td><?php echo $row['customerName']; ?></td>
                    <td><?php echo $row['phoneNo']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['roomType']; ?></td>
                    <td><?php echo $row['checkIn']; ?></td>
                    <td><?php echo $row['checkOut']; ?></td>
                    <td>
                        <form method="POST" action="updateConfirm.php">
                            <input type="hidden" name="bookingId" value="<?php echo $row['bookingId']; ?>">
                            <button type="submit" class="confirm-btn <?php echo ($row['confirmed'] ? 'confirmed' : 'not-confirmed'); ?>">
                                <?php echo ($row['confirmed'] ? 'Confirmed' : 'Confirm'); ?>
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="editBooking.php?bookingId=<?php echo $row['bookingId']; ?>" class="edit-btn">Edit</a>
                        <form method="POST" action="" onsubmit="confirmDelete(event)" style="display:inline;">
                                <input type="hidden" name="bookingId" value="<?php echo $row['bookingId']; ?>">
                                <button type="submit" name="delete" class="delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <!-- Pagination Links -->
        <div class="pagination">
            <p>Current Page: <?php echo $page; ?></p>
            <?php for ($i = 1; $i <= $number_of_page; $i++) { ?>
                <a href="BookCust.php?page=<?php echo $i; ?>&search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"><?php echo $i; ?></a>
            <?php } ?>
        </div>
    </div>
</body>
</html>
