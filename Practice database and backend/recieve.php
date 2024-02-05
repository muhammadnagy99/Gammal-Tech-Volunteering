<?php
session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'exp');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT id, name, email, pass FROM feedback WHERE email = ?";

    $stmt = mysqli_prepare($link, $sql);

    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "s", $email);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Store result
        mysqli_stmt_store_result($stmt);

        // Check if email exists
        if (mysqli_stmt_num_rows($stmt) == 1) {
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $id, $name, $email, $hashed_password);

            // Fetch the result
            mysqli_stmt_fetch($stmt);

            // Verify the hashed password
            if (password_verify($password, $hashed_password)) {
                // Store user information in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["email"] = $email;
                $_SESSION["id"] = $id;
                $_SESSION["name"] = $name;

                // Redirect to the welcome page
                header("Location: welcome.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Password does not match</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Email does not match</div>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($link);
    }

    // Close the connection
    mysqli_close($link);
}
?>
