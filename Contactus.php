<?php require_once './header.php'; ?>
<!DOCTYPE html>
<html>
<body>
<head>
    <title> Contact Us</title>
    <link rel="stylesheet" href="">
    <style>
        h3{
            font-size: 30px;
            background-color: rgba(236, 143, 14, 0.858);
            color: rgb(255, 255, 255);
            text-align: center;
            width: 68%;
            border-radius: 5px;
            margin: auto;
            padding: 5px;
        }

        /* Make sure box-sizing includes padding and border */
        * {
            box-sizing: border-box;
        }

        .form_section {
            max-width: 900px;
            margin: auto;
            padding: 20px; /* Optional: Add some padding to form container for space */
        }

        .form_section input[type="text"],
        .form_section input[type="email"],
        .form_section input[type="tel"],
        .form_section textarea {
            width: 100%; /* Ensures full width */
            padding: 12px; /* Set padding to make input fields equal */
            margin: 10px 0; /* Consistent spacing between fields */
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgba(249, 250, 199, 0.897);
            font-size: 16px; /* Ensure consistent text size */
        }

        .form_section textarea {
            height: 120px; /* Adjust height for textarea */
        }


        button {
            background-color: rgba(236, 143, 14, 0.858);
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
        }
</style>
</head>
<hr style="height:1px;border-width:0;background-color:rgb(209, 127, 11)">
<br>
<h3>Contacts</h3>
<br>
<div class="form_section">
    <form action="contactus.php" method="post">
        <input type="text" id="fullName" name="fullName" placeholder="Full Name" onchange="upperCase()">
        <script>
            function upperCase() {
                const x = document.getElementById("fullName");
                x.value = x.value.toUpperCase();
            }
        </script>
        <input type="email" name="email" placeholder="Email">
        <input type="tel" name="noTel" placeholder="No Telephone">
        <input type="text" name="destination" placeholder="Destination">
        <input type="text" name="purpose" placeholder="Purpose for Contact?">
        <textarea name="massage" placeholder="How can we help?"></textarea>
        <button type="submit">Send</button>
    </form>
</div>
<br><br>
</body>
</html>
<?php require_once './footer.php'; ?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once 'db_connect.php';
        $FullName = $_POST['fullName'];
        $Email = $_POST['email'];
        $NoTel = $_POST['noTel'];
        $Destination = $_POST['destination'];
        $Purpose = $_POST['purpose'];
        $Massage = $_POST['massage'];

        // Prepare SQL query
        $sql = "INSERT INTO contactus (fullName, email, noTel, destination, purpose, massage) 
                VALUES ('$FullName', '$Email', '$NoTel', '$Destination', '$Purpose', '$Massage')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('Your massage has been sent successfully!');
                    window.location.href = 'Contactus.php';
                  </script>";
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        //Close db connection
        mysqli_close($conn);
                }
?>

