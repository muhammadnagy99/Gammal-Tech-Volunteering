<?php

session_start();

$id = $_SESSION["id"];
$email = $_SESSION["email"];
$name = $_SESSION["name"];
$phone = $_SESSION["phone"];
$age = $_SESSION["age"];
$city = $_SESSION["city"];

$nemail = $nname = $nphone = $nage = $ncity = "";

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

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Escape user inputs for security
    $nname = $_POST['name'];
    $nemail = $_POST['email'];
    $nage = $_POST['age'];
    $ncity = $_POST['city'];
    $nphone = $_POST['phone'];
    // Fetch existing values from the database
    $sql = "SELECT name, email, phone, age, city FROM users WHERE id = '$id'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);

    // Update only non-empty fields
    if (!empty($nname)) {
        $row['name'] = $nname;
    }
    if (!empty($nemail)) {
        $row['email'] = $nemail;
    }
    if (!empty($nage)) {
        $row['age'] = $nage;
    }
    if (!empty($ncity)) {
        $row['city'] = $ncity;
    }
    if (!empty($nphone)) {
        $row['phone'] = $nphone;
    }

    // Update the database with the new values
    $sql = "UPDATE users SET name='{$row['name']}', email='{$row['email']}', phone='{$row['phone']}', age='{$row['age']}', city='{$row['city']}' WHERE id='$id'";
    if (mysqli_query($link, $sql)) {
        session_start();
        $_SESSION["name"] = $row['name'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["age"] = $row['age'];
        $_SESSION["city"] = $row['city'];
        $_SESSION["phone"] = $row['phone'];
        
        header("Location: accountdash.php");
        exit();
    } else {
        echo "ERROR: " . mysqli_error($link);
    }
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Information</title>
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="info">
                        <div class="labels">
                            <div class="linfo">
                                <input type="text" name="name" placeholder="<?php echo $name; ?>">
                            </div>
                            <div class="linfo">
                                <input type="text" name="email" placeholder="<?php echo $email; ?>">
                            </div>
                            <div class="linfo">
                                <input type="text" name="phone" placeholder="<?php echo $phone; ?>">
                            </div>
                            <div class="linfo">
                                <input type="text" name="age" placeholder="<?php echo $age; ?>">
                            </div>
                            <div class="linfo">
                                <input type="text" name="city" placeholder="<?php echo $city; ?>">
                            </div>
                        </div>
                </div>
                    <div class="buttons">
                        <div class="Ebutton">
                            <button type="submit" value="submit">Confirm</button>
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
    
</body>
</html>