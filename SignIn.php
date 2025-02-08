<?php
// Initialize error message variables
$usernameErr = $passwordErr = $loginErr = ""; 

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Admin login handling
    if (isset($_POST["adminLogin"])) {
        // Validate username
        if (empty($_POST["username"])) {
            $usernameErr = "Username is required";
        } else {
            $username = trim($_POST["username"]);
        }
        
        // Validate password
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = trim($_POST["password"]);
        }

        // Proceed if there are no validation errors
        if (empty($usernameErr) && empty($passwordErr)) {
            require_once 'db_connect.php'; // Database connection
            
            // Query to fetch admin details
            $sql = "SELECT adminId, username, password FROM admins WHERE username='$username'";
            $result = mysqli_query($conn, $sql);
            
            // Check if username exists
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                
                // Verify password
                if (password_verify($password, $row["password"])) {
                    session_start();
                    $_SESSION["admin_loggedin"] = "yes";
                    $_SESSION["adminId"] = $row["adminId"];
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["fullname"] = $row["fullname"];
                    header("location:Dashboard.php"); // Redirect to dashboard
                } else {
                    $loginErr = "Wrong username or password.";
                }
            } else {
                $loginErr = "Wrong username or password.";
            }
            mysqli_close($conn); // Close database connection
        }
    }
    
    // User login handling
    if (isset($_POST["userLogin"])) {
        // Validate username
        if (empty($_POST["username"])) {
            $usernameErr = "Username is required";
        } else {
            $username = trim($_POST["username"]);
        }
        
        // Validate password
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = trim($_POST["password"]);
        }

        // Proceed if there are no validation errors
        if (empty($usernameErr) && empty($passwordErr)) {
            require_once 'db_connect.php'; // Database connection
            
            // Query to fetch user details
            $sql = "SELECT custId, username, password FROM users WHERE username='$username'";
            $result = mysqli_query($conn, $sql);
            
            // Check if username exists
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                
                // Verify password
                if (password_verify($password, $row["password"])) {
                    session_start();
                    $_SESSION["loggedin"] = "yes";
                    $_SESSION["custId"] = $row["custId"];
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["fullname"] = $row["fullname"];
                    
                    // Redirect to a specific page if a redirect URL is provided
                    if (isset($_GET['redirect'])) {
                        header("location: " . $_GET['redirect']);
                    } else {
                        header("location: Home.php"); // Redirect to home page
                    }
                } else {
                    $loginErr = "Wrong username or password.";
                }
            } else {
                $loginErr = "Wrong username or password.";
            }
            mysqli_close($conn); // Close database connection
        }
    }
}
?>

<head>
<link rel="stylesheet" href="./CSS/sign_in.css">
</head>

<div class="form">
  <h1>Sign In</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    
    <!-- Username input field -->
    <div class="form-input">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username">
      <span class="error"><?php echo $usernameErr;?></span>
    </div>

    <!-- Password input field -->
    <div class="form-input">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password">
      <span class="error"><?php echo $passwordErr;?></span>
    </div>

    <!-- Login buttons for users and admins -->
    <input type="submit" name="userLogin" value="Sign In (Existing User)">
    <input type="submit" name="adminLogin" value="Sign In (Admin)">
    
    <!-- Display login error message if any -->
    <span class="error"><?php echo $loginErr;?></span>
    
    <!-- Redirect to sign-up page if user doesn't have an account -->
    <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
  </form>
</div>
