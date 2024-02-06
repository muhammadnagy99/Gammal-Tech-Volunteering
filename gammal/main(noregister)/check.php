<?php
// Initialize the session
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gammal');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check if the user is already logged in, if yes then redirect him to welcome page

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location:  ../login/login.html");
        exit;
    }
    header("location: ../phase one/PhaseOne.html");
    exit;

}
?>