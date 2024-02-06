<?php

session_start();

$id = $_SESSION["id"];
$email = $_SESSION["email"];
$name = $_SESSION["name"];
$phone = $_SESSION["phone"];
$age = $_SESSION["age"];
$city = $_SESSION["city"];

// Fetch more user-related data from the database
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gammal');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT id, name, email, age, city, phone FROM users WHERE id = ?";
    
$stmt = mysqli_prepare($link, $sql);

if ($stmt) {
    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Bind result variables
    mysqli_stmt_bind_result($stmt, $id, $name, $email, $age, $city, $phone);

    // Fetch the result
    mysqli_stmt_fetch($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "Error: " . mysqli_error($link);
}

if(isset($_POST['edit'])){
        session_start();
        // Store user information in session variables
        $_SESSION["email"] = $email;
        $_SESSION["id"] = $id;
        $_SESSION["name"] = $name;
        $_SESSION["phone"] = $phone;
        $_SESSION["age"] = $age;
        $_SESSION["city"] = $city;
        header("Location: editinfo.php");
    } 

if(isset($_POST['logout'])){
    $_SESSION = array();
    // Destroy the session
    session_destroy();

    $_SESSION["loggedin"] = false;
    // Redirect to the login page
    header("Location: ../../main(noregister)/main(noregister).php");
    exit();
}

if(isset($_POST['delete'])){

    $id = $_SESSION["id"]; // Assuming you have stored user ID in session
    $sql_select = "SELECT * FROM users WHERE id = $id";
    $result = $link->query($sql_select);

    if ($result->num_rows > 0) {
        // Fetch user data
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $email = $row["email"];
        $phone = $row["phone"];
        $age = $row["age"];
        $city = $row["city"];

        // Insert data into deleted table
        $insert_sql = "INSERT INTO deleted (name, email, phone, age, city) VALUES ('$name', '$email', '$phone', '$age', '$city')";
        if ($link->query($insert_sql) === TRUE) {
            // Delete user record from users table
            $delete_sql = "DELETE FROM users WHERE id = $id";
            if ($link->query($delete_sql) === TRUE) {
                // Deletion successful
                echo "<script>showNotification('User account deleted successfully.');</script>";
                header("refresh:2;url=../../main(noregister)/main(noregister).php");
                exit(); // Stop further execution
            } else {
                echo "Error deleting record: " . $link->error;
            }
        } else {
            echo "Error inserting into deleted table: " . $link->error;
        }
    } else {
        echo "User not found.";
    }

}

// Close the connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class = "logo1">
            <a href = "main.html">
                <img src = "../../media/headerlogo.png">
            </a>
        </div>
      <div class = "sections">
        <a href = "main.html">Home</a>
        <a href = "https://www.gammal.tech/" target="_blank">About</a>
        <div class="dropdown">
            <button class="dropbtn">Me &#11167;</button>
            <div class="dropdown-content">
              <a href="accountdash.html">Account</a>
              <a href="#">Log out</a>
            </div>
          </div>
    </div>
     </header>	
     <main class="mainbody">
        <div class="content">
            <div class="bar">
                <div class="horizontal-bar">
                    <h2>Account Information</h2>
                </div>
            </div>
                <div class="info">
                        <div class="labels">
                            <div class="linfo">
                                <input type="text" disabled="disabled" value="<?php echo $name; ?>">
                            </div>
                            <div class="linfo">
                                <input type="text" disabled="disabled" value="<?php echo $email; ?>">
                            </div>
                            <div class="linfo">
                                <input type="text" disabled="disabled" value="<?php echo $phone; ?>">
                            </div>
                            <div class="linfo">
                                <input type="text" disabled="disabled" value="<?php echo $age; ?>">
                            </div>
                            <div class="linfo">
                                <input type="text" disabled="disabled" value="<?php echo $city; ?>">
                            </div>
                        </div>
                </div>
                
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="buttons">
                    <div class="Ebutton">
                            <button type="submit" name="edit">Edit</button>
                            <button class="delete" name="delete" type="submit" value="Delete My Account" >Delete Account</button>
                            <div class="notification" id="notification"></div>
                        </div>
                        <div class="lbutton">
                                <button type="submit" name="logout">Log Out</button>
                        </div>
                    </div>
                </form>

            </div>
     </main>
     <footer class="footer">
        <div class="footerp1">
            <p>&copy; 2024 Gammal Tech</p>
        </div>
      </footer>
      <script src="script.js"></script>
</body>
</html>