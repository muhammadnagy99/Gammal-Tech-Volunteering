<?php
require_once "config.php";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Escape user inputs for security
    $q1 = $_POST['name'];
    $q2 = $_POST['email'];
    $q3 = $_POST['password'];
    $param_password = password_hash($q3, PASSWORD_DEFAULT);
    // attempt insert query execution
    $sql = "INSERT INTO feedback (name, email, pass) VALUES ('$q1', '$q2', '$param_password')";
    if(mysqli_query($link, $sql)){
        header("Location: login.html");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    // close connection
    mysqli_close($link);
}
?>