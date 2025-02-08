<?php require_once 'AdminPage.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
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

        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .delete-btn {
            background-color: red;
            color: white;
            padding: 9px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
    <script>
        function confirmDelete(event) {
            if (!confirm('Are you sure you want to delete this customer sign in ?')) {
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>CUSTOMER DATA</h2>

        <?php
        require_once 'db_connect.php';

        if (isset($_POST['delete'])) {
            $custID = $_POST['custId'];
            $deleteQuery = "DELETE FROM users WHERE custId = '$custID'";
            mysqli_query($conn, $deleteQuery);
            echo "<p style='color: red; text-align: center;'>Customer deleted successfully!</p>";
        }

        // Pagination settings
        $results_per_page = 10;
        $searchQuery = "";

        // Get total records count
        $query = "SELECT * FROM users" . $searchQuery;
        $result = mysqli_query($conn, $query);
        $number_of_result = mysqli_num_rows($result);

        echo "<p>Number of Customers: " . $number_of_result . "</p>";

        $number_of_page = ceil($number_of_result / $results_per_page);
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $page_first_result = ($page - 1) * $results_per_page;

        // Fetch paginated results
        $query = "SELECT * FROM users" . $searchQuery . " LIMIT " . $page_first_result . ',' . $results_per_page;
        $result = mysqli_query($conn, $query);
        ?>

        <!-- Booking Table -->
        <table id="dataTable">
            <tr>
                <th>Customer No</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['custId']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td>
                    <form method="POST" action="" onsubmit="confirmDelete(event)">
                            <input type="hidden" name="custId" value="<?php echo $row['custId']; ?>">
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
                <a href="CustData.php?page=<?php echo $i; ?>&search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"><?php echo $i; ?></a>
            <?php } ?>
        </div>
    </div>
</body>
</html>
