<?php require_once './header.php'; ?>
<?php
    $fullnameErr = $emailErr = $usernameErr = $passwordErr = "";
    $fullname = $email = $username = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fullname"])) {
            $nameErr = "Full name is required";
        } else {
            $fullname = test_input($_POST["fullname"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
                $nameErr = "Only letters and white space allowed";
            }
        }
        
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
            
        if (empty($_POST["username"])) {
            $usernameErr = "Username is required";
        } else {
            $username = test_input($_POST["username"]);
            // check if name only contains letters, numbers, and underscores
            if (!preg_match("/^[a-zA-Z0-9_]+$/",$username)) {
                $usernameErr = "Username can only contain letters, numbers, and underscores.";
                //TODO: Check in DB if username already taken
            }
        }

        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = test_input($_POST["password"]);
            // check if password is less than 8 characters
            if (strlen($password) < 8) {
                $passwordErr = "Password must have at least 8 characters.";
                //TODO: Check if password consists of symbols, digits, letters.
            }
            $password = password_hash($password, PASSWORD_DEFAULT);
        }

        if(empty($nameErr) && empty($emailErr) && empty($usernameErr) && empty($passwordErr)) {
            require_once 'db_connect.php';

            if (isset($_POST['user_submit'])) {
                $sql_user = "INSERT INTO users 
                            (fullname, email, username, password) 
                            VALUES 
                            ('$fullname', '$email', '$username', '$password')";

                if ($conn->query($sql_user) === TRUE) {
                    echo "<script>
                            alert('User Sign Up successful!');
                            window.location.href = 'SignIn.php'; 
                          </script>";
                } else {
                    echo "<script>alert('Error: " . $conn->error . "');</script>";
                }
            }

            // Close db connection
            mysqli_close($conn);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<head>
<link rel="stylesheet" href="./CSS/sign_up.css">
</head>
<br>
<div class="container">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  <h1>Sign Up</h1> 
  Full Name: <input type="text" name="fullname">
  <span class="error"><?php echo $fullnameErr;?></span>
  <br><br>

  E-mail: <input type="text" name="email">
  <span class="error"><?php echo $emailErr;?></span>
  <br><br>

  Username: <input type="text" name="username">
  <span class="error"><?php echo $usernameErr;?></span>
  <br><br>

  Password: <input type="password" name="password">
  <span class="error"><?php echo $passwordErr;?></span>
  <br><br>

  <input type="submit" name="user_submit" value="Sign Up">   
</form>
</div><br><br><br>
<?php require_once './footer.php'; ?>
