<?php require_once 'AdminPage.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meesage</title>
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

        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>MESSAGE</h2>

        <?php
        require_once 'db_connect.php';

        // Pagination settings
        $results_per_page = 10;
        $searchQuery = "";

        // Get total records count
        $query = "SELECT * FROM contactus" . $searchQuery;
        $result = mysqli_query($conn, $query);
        $number_of_result = mysqli_num_rows($result);

        echo "<p>Number of customers: " . $number_of_result . "</p>";

        $number_of_page = ceil($number_of_result / $results_per_page);
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $page_first_result = ($page - 1) * $results_per_page;

        // Fetch paginated results
        $query = "SELECT * FROM contactus" . $searchQuery . " LIMIT " . $page_first_result . ',' . $results_per_page;
        $result = mysqli_query($conn, $query);
        ?>

        <!-- Booking Table -->
        <table id="dataTable">
            <tr>
                <th>Full Name</th>
                <th>Phone</th>
                <th>Place</th>
                <th>Purpose</th>
                <th>Massage</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['fullName']; ?></td>
                    <td><?php echo $row['noTel']; ?></td>
                    <td><?php echo $row['destination']; ?></td>
                    <td><?php echo $row['purpose']; ?></td>
                    <td><?php echo $row['massage']; ?></td>
                </tr>
            <?php } ?>
        </table>

        <!-- Pagination Links -->
        <div class="pagination">
            <p>Current Page: <?php echo $page; ?></p>
            <?php for ($i = 1; $i <= $number_of_page; $i++) { ?>
                <a href="Message.php?page=<?php echo $i; ?>&search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"><?php echo $i; ?></a>
            <?php } ?>
        </div>
    </div>
</body>
</html>
