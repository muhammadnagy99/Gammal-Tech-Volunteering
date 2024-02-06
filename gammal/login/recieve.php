<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gammal');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT id, name, email, password, age, city, phone FROM users WHERE email = ?";

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
            mysqli_stmt_bind_result($stmt, $id, $name, $email, $hashed_password, $age, $city, $phone);

            // Fetch the result
            mysqli_stmt_fetch($stmt);

            // Verify the hashed password
            if (password_verify($password, $hashed_password)) {

                session_start();
                // Store user information in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["email"] = $email;
                $_SESSION["id"] = $id;
                $_SESSION["name"] = $name;
                $_SESSION["phone"] = $phone;
                $_SESSION["age"] = $age;
                $_SESSION["city"] = $city;

                // Redirect to the welcome page
                header("Location: ../main(register)/main(register).php");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Password does not match</div>";
            }
        } else {
            echo "<script>alert('Email Not Found')</script>";
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