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
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Escape user inputs for security
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $param_password = password_hash($pass, PASSWORD_DEFAULT);
    // attempt insert query execution
    $sql = "INSERT INTO users (name, email, password, phone, age, city) VALUES ('$name', '$email', '$param_password', '$phone', '$age', '$city')";
    if(mysqli_query($link, $sql)){
        $sql = "SELECT id, name, email, password, age, city, phone FROM users WHERE email = '$email'";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_execute($stmt);
        // Store result
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $id, $name, $email, $hashed_password, $age, $city, $phone);
        // Fetch the result
        mysqli_stmt_fetch($stmt);
        session_start();
        // Store user information in session variables
        $_SESSION["loggedin"] = true;
        $_SESSION["email"] = $email;
        $_SESSION["id"] = $id;
        $_SESSION["name"] = $name;
        $_SESSION["phone"] = $phone;
        $_SESSION["age"] = $age;
        $_SESSION["city"] = $city;

        header("Location: ../../main(register)/main(register).php");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    // close connection
    mysqli_close($link);
}
?>