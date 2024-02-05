<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.html");
    exit();
}

$id = $_SESSION["id"];
$email = $_SESSION["email"];
$name = $_SESSION["name"];

// Fetch more user-related data from the database
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

$sql = "SELECT * FROM feedback WHERE id = ?";
    
$stmt = mysqli_prepare($link, $sql);

if ($stmt) {
    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Bind result variables
    mysqli_stmt_bind_result($stmt, $id, $q1, $q2, $q3);

    // Fetch the result
    mysqli_stmt_fetch($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "Error: " . mysqli_error($link);
}

// Close the connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css" />

</head>
<body>
    <div class="label">
        <input type="text" disabled="disabled" value="<?php echo $id; ?>">
    </div>
    <div class="label">
        <input type="text" disabled="disabled" value="<?php echo $name; ?>">
    </div>
    <div class="label">
        <input type="text" disabled="disabled" value="<?php echo $email; ?>">
    </div>
    <a href="logout.php">Logout</a>
</body>
</html>
